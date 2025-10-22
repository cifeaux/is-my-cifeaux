# cPanel Deployment Guide: Is My Cifeaux?

Complete step-by-step instructions for deploying to ccff00.com via cPanel.

---

## Prerequisites

- cPanel access to ccff00.com
- MySQL database access
- File Manager or FTP access

---

## Step 1: Create MySQL Database

1. **Login to cPanel**
   - Go to ccff00.com/cpanel
   - Login with your credentials

2. **Create Database**
   - Navigate to: **MySQL® Databases**
   - Under "Create New Database":
     - Database Name: `cifeaux` (will become `ccff00_cifeaux`)
     - Click **Create Database**

3. **Create Database User**
   - Scroll down to "MySQL Users"
   - Username: `cifeaux_user` (will become `ccff00_cifeaux_user`)
   - Password: **Generate strong password** (save this!)
   - Click **Create User**

4. **Add User to Database**
   - Scroll to "Add User To Database"
   - User: Select `ccff00_cifeaux_user`
   - Database: Select `ccff00_cifeaux`
   - Click **Add**
   - On privileges page: Select **ALL PRIVILEGES**
   - Click **Make Changes**

---

## Step 2: Import Database Schema

1. **Open phpMyAdmin**
   - In cPanel, click **phpMyAdmin**
   - Select database `ccff00_cifeaux` from left sidebar

2. **Import Schema**
   - Click **Import** tab
   - Click **Choose File**
   - Select `database-schema.sql`
   - Click **Go** at bottom
   - Should see success message

3. **Verify Tables Created**
   - Click database name in sidebar
   - Should see table: `cifeaux_results`
   - Should see views: `cifeaux_stats`, `cifeaux_daily_stats`

---

## Step 3: Update Configuration File

1. **Edit config.php**
   - Open `config.php` in text editor
   - Update these values:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'ccff00_cifeaux_user'); // Your actual username
define('DB_PASS', 'YOUR_STRONG_PASSWORD'); // Password from Step 1.3
define('DB_NAME', 'ccff00_cifeaux'); // Your actual database name
```

2. **Save the file**

---

## Step 4: Upload Files to cPanel

### Option A: File Manager (Recommended)

1. **Open File Manager**
   - In cPanel, click **File Manager**
   - Navigate to: `public_html/`

2. **Create is-my-cifeaux folder**
   - Click **+ Folder**
   - Name: `is-my-cifeaux`
   - Click **Create New Folder**

3. **Upload Files**
   - Open the `is-my-cifeaux` folder
   - Click **Upload**
   - Select these files:
     - `index.html`
     - `save-results.php`
     - `config.php`
   - Wait for upload to complete

4. **Set Permissions**
   - Select `config.php`
   - Click **Permissions** in top menu
   - Set to: `644` (rw-r--r--)
   - Click **Change Permissions**

### Option B: FTP

1. **Connect via FTP**
   - Host: `ftp.ccff00.com`
   - Username: Your cPanel username
   - Password: Your cPanel password
   - Port: 21

2. **Navigate to folder**
   - Go to: `/public_html/`
   - Create folder: `is-my-cifeaux`

3. **Upload files**
   - Upload `index.html`, `save-results.php`, `config.php`
   - Set `config.php` permissions to 644

---

## Step 5: Test the Installation

1. **Visit the URL**
   - Go to: `https://ccff00.com/is-my-cifeaux/`

2. **Take the test**
   - Click "Start Test"
   - Answer all 6 questions
   - Check if results page loads

3. **Verify database saving**
   - Go back to phpMyAdmin
   - Select `ccff00_cifeaux` database
   - Click `cifeaux_results` table
   - Click **Browse** tab
   - Should see your test result!

4. **Check Google Analytics**
   - Go to: analytics.google.com
   - Select property with ID: G-N498PE7E7L
   - Real-time reports should show your visit

---

## Step 6: Update WordPress Article

1. **Edit WordPress Draft**
   - Go to: ccff00.com/wp-admin
   - Posts → find "Is My Cifeaux?" draft
   - Update all URLs to: `https://ccff00.com/is-my-cifeaux/`
   - Update permalink/slug to: `/is-my-cifeaux/`

2. **Add Link to Live Test**
   - Replace `[LIVE URL]` placeholders with:
     `https://ccff00.com/is-my-cifeaux/`

3. **Publish Article**
   - Click **Publish**

---

## Step 7: Commit to Git

Update GitHub repository with new code:

```bash
cd /Users/kl/Documents/Kade-Vault/Projects/CCFF00/is-my-cifeaux

git add .
git commit -m "Add cPanel deployment with database integration

- Google Analytics tracking (G-N498PE7E7L)
- Adaptive branching logic (15 colour pool)
- MySQL database for results storage
- PHP backend (save-results.php)
- cPanel deployment configuration

Live at: https://ccff00.com/is-my-cifeaux/"

git push origin main
```

---

## Troubleshooting

### Test loads but results don't save

**Check:**
1. Open browser console (F12)
2. Look for errors when submitting test
3. Common issues:
   - `config.php` has wrong credentials
   - PHP file permissions incorrect (should be 644)
   - Database user doesn't have privileges

**Fix:**
- Verify database credentials in `config.php`
- Re-check user privileges in phpMyAdmin

### 500 Internal Server Error

**Check:**
1. PHP error logs in cPanel
2. File permissions (should be 644 for PHP files)

**Fix:**
- Contact hosting support
- Check PHP version (needs 7.4+)

### Google Analytics not tracking

**Check:**
1. Measurement ID is correct: `G-N498PE7E7L`
2. Wait 24-48 hours for data to appear
3. Use Real-Time reports for immediate verification

---

## File Structure After Deployment

```
public_html/
└── is-my-cifeaux/
    ├── index.html (the test)
    ├── save-results.php (backend API)
    ├── config.php (database config)
    └── .htaccess (optional, for URL rewriting)
```

---

## Security Notes

**Protect config.php:**
1. Never commit `config.php` with real credentials to GitHub
2. Keep `.gitignore` updated
3. Set file permissions to 644 (not 777!)

**Database Security:**
- Use strong password for database user
- Grant only necessary privileges
- Keep phpMyAdmin access restricted

---

## Viewing Results

### Via phpMyAdmin

```sql
-- View all results
SELECT * FROM cifeaux_results ORDER BY created_at DESC;

-- Verdict distribution
SELECT verdict, COUNT(*) as count
FROM cifeaux_results
GROUP BY verdict
ORDER BY count DESC;

-- Daily stats
SELECT DATE(created_at) as date, COUNT(*) as tests
FROM cifeaux_results
GROUP BY DATE(created_at)
ORDER BY date DESC;
```

### Via Statistics Views

```sql
-- Overall stats by verdict
SELECT * FROM cifeaux_stats;

-- Daily breakdown
SELECT * FROM cifeaux_daily_stats
WHERE date >= DATE_SUB(NOW(), INTERVAL 7 DAY);
```

---

## Next Steps After Deployment

1. **Monitor Analytics**
   - Check Google Analytics daily
   - Track completion rates
   - Monitor verdict distribution

2. **Build Results Dashboard** (future)
   - Create `results.php` to display aggregate stats
   - Show verdict distribution publicly
   - Add charts/graphs

3. **Social Sharing** (future)
   - Add "Share Result" buttons
   - Generate result images
   - Twitter/Instagram sharing

4. **A/B Testing** (future)
   - Test different colour pools
   - Experiment with adaptive logic
   - Optimize for engagement

---

## Support

**Database Issues:**
- cPanel → MySQL® Database Wizard
- phpMyAdmin documentation

**File Upload Issues:**
- Check disk space quota in cPanel
- Verify folder permissions

**PHP Errors:**
- Check Error Log in cPanel
- Contact hosting support

---

**Deployment Checklist:**

- [ ] Database created: `ccff00_cifeaux`
- [ ] Database user created with ALL PRIVILEGES
- [ ] Schema imported successfully
- [ ] `config.php` updated with credentials
- [ ] Files uploaded to `/public_html/is-my-cifeaux/`
- [ ] File permissions set correctly (644)
- [ ] Test completed successfully
- [ ] Results saved to database (verified in phpMyAdmin)
- [ ] Google Analytics tracking verified
- [ ] WordPress article updated with live URL
- [ ] GitHub repository updated
- [ ] Social media posted

---

**Live URL:** https://ccff00.com/is-my-cifeaux/

**Support Contact:** [Your hosting support]

---
