-- ============================================================
-- FirstMeta Website — Database-backed PHP sessions
-- Required for Vercel's serverless hosting: PHP's default file-based
-- session storage does not persist reliably across requests, since
-- consecutive requests are not guaranteed to hit the same instance.
-- Apply via: Supabase Dashboard > SQL Editor
-- ============================================================

CREATE TABLE IF NOT EXISTS sessions (
  id             VARCHAR(128) PRIMARY KEY,
  data           TEXT NOT NULL DEFAULT '',
  last_activity  INTEGER NOT NULL
);

CREATE INDEX IF NOT EXISTS idx_sessions_last_activity ON sessions (last_activity);
