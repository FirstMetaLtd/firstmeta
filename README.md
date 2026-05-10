# FirstMeta Website

A professional IT services company website built with PHP and PostgreSQL (Supabase).

**Live Site:** [firstmeta.com.ng](https://firstmeta.com.ng)

---

## 🏗️ Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | PHP 8.2 |
| Database | PostgreSQL via Supabase |
| Hosting | Railway (Docker) |
| Domain | firstmeta.com.ng |
| Container | Docker + Apache |

---

## 🚀 Local Development Setup

### Prerequisites
- PHP 8.2+ with `pdo_pgsql` extension
- Or Docker Desktop

### Option A — Docker (Recommended)

```bash
# Clone the repo
git clone https://github.com/HammedSodiq/firstmeta-website.git
cd firstmeta-website

# Copy environment file
cp .env.example .env
# Edit .env with your Supabase credentials

# Run with Docker
docker build -t firstmeta .
docker run -p 8080:80 --env-file .env firstmeta

# Visit: http://localhost:8080
```

### Option B — Local PHP Server

```bash
# Install PHP pgsql extension first
# Ubuntu: sudo apt install php8.2-pgsql
# macOS:  brew install php && pecl install pdo_pgsql

cp .env.example .env
# Edit .env with your credentials

php -S localhost:8080
```

---

## 🗄️ Database

The database is hosted on **Supabase (PostgreSQL)**.

- Project URL: `https://yehpaaosvnrywobxwozd.supabase.co`
- Dashboard: [supabase.com/dashboard/project/yehpaaosvnrywobxwozd](https://supabase.com/dashboard/project/yehpaaosvnrywobxwozd)

Schema migrations are in `database/migrations/`.

---

## 📁 Project Structure

```
firstmeta-website/
├── admin/              # Admin dashboard (login-protected)
│   ├── private/        # DB config, functions, header/footer
│   └── *.php           # Admin pages (posts, services, team...)
├── assets/             # CSS, JS, fonts, images
├── private/            # Shared header, footer, autoload
├── img/                # Uploaded images (gitignored)
├── resumes/            # Uploaded resumes (gitignored)
├── database/
│   └── migrations/     # PostgreSQL schema & seed files
├── .env.example        # Environment variable template
├── .htaccess           # Apache URL routing + security headers
├── Dockerfile          # Production Docker image
├── railway.json        # Railway deployment config
└── index.php           # Homepage
```

---

## 🔧 Environment Variables

Copy `.env.example` to `.env` and fill in:

| Variable | Description |
|----------|-------------|
| `DB_HOST` | Supabase PostgreSQL host |
| `DB_PORT` | Database port (5432) |
| `DB_NAME` | Database name |
| `DB_USER` | Database user |
| `DB_PASS` | Database password |
| `APP_URL` | Your live domain |
| `APP_DEBUG` | Set `false` in production |

---

## 🚢 Deployment (Railway)

1. Push code to GitHub
2. Create new project on [railway.app](https://railway.app) → **Deploy from GitHub repo**
3. Select `firstmeta-website` repository
4. Add environment variables in Railway dashboard
5. Set custom domain → `firstmeta.com.ng`

---

## 🔐 Admin Access

Admin dashboard is at `/admin/` — login with your admin credentials.

> ⚠️ Change default passwords immediately after first login.

---

## 📝 License

Copyright © 2024 FirstMeta Ltd (RC:1933162). All rights reserved.
