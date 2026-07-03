<?php
// PDO-backed session storage. PHP's default file-based sessions don't
// persist reliably across requests on Vercel's serverless hosting, since
// consecutive requests aren't guaranteed to hit the same instance.

class DbSessionHandler implements SessionHandlerInterface {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function open($savePath, $sessionName): bool {
        return true;
    }

    public function close(): bool {
        return true;
    }

    public function read($id): string {
        $stmt = $this->pdo->prepare("SELECT data FROM sessions WHERE id = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $row['data'] : '';
    }

    public function write($id, $data): bool {
        $stmt = $this->pdo->prepare("
            INSERT INTO sessions (id, data, last_activity) VALUES (:id, :data, :last_activity)
            ON CONFLICT (id) DO UPDATE SET data = EXCLUDED.data, last_activity = EXCLUDED.last_activity
        ");
        return $stmt->execute(['id' => $id, 'data' => $data, 'last_activity' => time()]);
    }

    public function destroy($id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM sessions WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function gc($max_lifetime): int|false {
        $stmt = $this->pdo->prepare("DELETE FROM sessions WHERE last_activity < :threshold");
        $stmt->execute(['threshold' => time() - $max_lifetime]);
        return $stmt->rowCount();
    }
}

function register_db_session_handler(PDO $pdo): void {
    session_set_save_handler(new DbSessionHandler($pdo), true);
}
