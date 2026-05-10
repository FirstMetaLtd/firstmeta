-- ============================================================
-- FirstMeta Website — Initial PostgreSQL Schema
-- Migrated from MySQL to PostgreSQL for Supabase
-- Apply via: Supabase Dashboard > SQL Editor
-- ============================================================

CREATE TABLE IF NOT EXISTS admin (
  id         SERIAL PRIMARY KEY,
  username   VARCHAR(100) NOT NULL,
  email      VARCHAR(100) NOT NULL,
  password   VARCHAR(255) NOT NULL,
  admin_url  VARCHAR(100) NOT NULL,
  date       TEXT NOT NULL,
  type       VARCHAR(30) NOT NULL,
  role       VARCHAR(20) NOT NULL
);

CREATE TABLE IF NOT EXISTS advertisment (
  id     SERIAL PRIMARY KEY,
  image  VARCHAR(200) NOT NULL,
  link   VARCHAR(200) NOT NULL
);

CREATE TABLE IF NOT EXISTS applications (
  id      SERIAL PRIMARY KEY,
  title   VARCHAR(220) NOT NULL,
  name    VARCHAR(220) NOT NULL,
  email   VARCHAR(220) NOT NULL,
  phone   VARCHAR(20)  NOT NULL,
  message TEXT DEFAULT NULL,
  resume  VARCHAR(220) NOT NULL,
  date    VARCHAR(50)  NOT NULL
);

CREATE TABLE IF NOT EXISTS category (
  id    SERIAL PRIMARY KEY,
  name  VARCHAR(200) NOT NULL,
  slug  VARCHAR(200) NOT NULL
);

CREATE TABLE IF NOT EXISTS comments (
  id      SERIAL PRIMARY KEY,
  post_id VARCHAR(50)   NOT NULL,
  name    VARCHAR(200)  NOT NULL,
  email   VARCHAR(200)  NOT NULL,
  comment TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS contact (
  id      SERIAL PRIMARY KEY,
  name    VARCHAR(100)  NOT NULL,
  email   VARCHAR(100)  NOT NULL,
  phone   VARCHAR(100)  NOT NULL,
  subject TEXT          NOT NULL,
  message TEXT          NOT NULL,
  date    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS general_settings (
  id            SERIAL PRIMARY KEY,
  logo          VARCHAR(210) DEFAULT NULL,
  site_title    VARCHAR(200) NOT NULL,
  email         VARCHAR(200) DEFAULT NULL,
  phone         VARCHAR(100) DEFAULT NULL,
  facebook_url  VARCHAR(300) DEFAULT NULL,
  instagram_url VARCHAR(300) DEFAULT NULL,
  twitter_url   VARCHAR(300) DEFAULT NULL,
  linkedin_url  VARCHAR(300) DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS jobs (
  id          SERIAL PRIMARY KEY,
  icon        VARCHAR(100)   NOT NULL,
  title       VARCHAR(220)   NOT NULL,
  description TEXT           NOT NULL,
  date        VARCHAR(100)   NOT NULL,
  slug        VARCHAR(100)   NOT NULL,
  benefits    TEXT           DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS posts (
  id               SERIAL PRIMARY KEY,
  post_id          VARCHAR(20)    NOT NULL,
  title            VARCHAR(200)   NOT NULL,
  short_desc       TEXT           NOT NULL,
  description      TEXT           NOT NULL,
  image            VARCHAR(200)   NOT NULL,
  tags             VARCHAR(100)   NOT NULL,
  meta_keywords    VARCHAR(200)   NOT NULL,
  meta_description TEXT           NOT NULL,
  date             VARCHAR(20)    NOT NULL,
  status           VARCHAR(10)    NOT NULL DEFAULT 'Active',
  slug             VARCHAR(120)   NOT NULL,
  views            INTEGER        DEFAULT 0,
  post_for         VARCHAR(40)    NOT NULL DEFAULT 'Normal'
);

CREATE TABLE IF NOT EXISTS products (
  id          SERIAL PRIMARY KEY,
  title       VARCHAR(220) NOT NULL,
  short_desc  TEXT NOT NULL,
  description TEXT NOT NULL,
  image       VARCHAR(220) NOT NULL,
  slug        VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS services (
  id          SERIAL PRIMARY KEY,
  title       VARCHAR(200) NOT NULL,
  short_desc  TEXT NOT NULL,
  description TEXT DEFAULT NULL,
  image       VARCHAR(220) DEFAULT NULL,
  slug        VARCHAR(232) NOT NULL
);

CREATE TABLE IF NOT EXISTS team (
  id            SERIAL PRIMARY KEY,
  name          VARCHAR(100) NOT NULL,
  designation   VARCHAR(100) NOT NULL,
  image         VARCHAR(210) NOT NULL,
  exp           TEXT DEFAULT NULL,
  qualification TEXT DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS technology (
  id    SERIAL PRIMARY KEY,
  image TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS views (
  id      SERIAL PRIMARY KEY,
  post_id VARCHAR(200) NOT NULL,
  ip_add  VARCHAR(200) NOT NULL
);
