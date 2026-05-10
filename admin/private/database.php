<?php
// ============================================================
// Database Connection — FirstMeta Website
// All credentials are loaded from environment variables.
// Set them in Railway dashboard, .env file locally.
// ============================================================

// Load .env file if it exists (for local development)
$envFile = __DIR__ . '/../../.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        if (strpos($line, '=') !== false) {
            [$key, $value] = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            if (!array_key_exists($key, $_ENV)) {
                $_ENV[$key] = $value;
                putenv("$key=$value");
            }
        }
    }
}

// Database configuration from environment
$db_host = $_ENV['DB_HOST']     ?? getenv('DB_HOST')     ?? 'db.yehpaaosvnrywobxwozd.supabase.co';
$db_port = $_ENV['DB_PORT']     ?? getenv('DB_PORT')     ?? '5432';
$db_name = $_ENV['DB_NAME']     ?? getenv('DB_NAME')     ?? 'postgres';
$db_user = $_ENV['DB_USER']     ?? getenv('DB_USER')     ?? 'postgres';
$db_pass = $_ENV['DB_PASS']     ?? getenv('DB_PASS')     ?? '';

// App URL
$baseurl = ($_ENV['APP_URL'] ?? getenv('APP_URL') ?? 'https://firstmeta.com.ng') . '/';

// Build PostgreSQL DSN
$dsn = "pgsql:host={$db_host};port={$db_port};dbname={$db_name};sslmode=require";

try {
    $con = new PDO($dsn, $db_user, $db_pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
} catch (PDOException $e) {
    // In production, never show DB errors to the user
    $isDebug = filter_var($_ENV['APP_DEBUG'] ?? getenv('APP_DEBUG') ?? false, FILTER_VALIDATE_BOOLEAN);
    if ($isDebug) {
        die("Database connection failed: " . $e->getMessage());
    } else {
        error_log("DB Connection Error: " . $e->getMessage());
        die("We're experiencing technical difficulties. Please try again later.");
    }
}
?>