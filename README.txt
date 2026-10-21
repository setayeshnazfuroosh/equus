EQUUS — Horse Website (XAMPP / PHP / MySQL)
===========================================

START LOCALLY
1. Copy the complete horse-site folder to C:\xampp\htdocs\horse-site\.
2. Start Apache and MySQL in XAMPP Control Panel.
3. Open http://localhost/phpmyadmin/.
4. If the `horse_site` database already exists from the earlier version, first inspect the `horses` table. If any of `origin_country`, `height_cm`, `weight_kg`, `temperament`, or `uses` are missing, add only the missing columns in phpMyAdmin BEFORE importing `setup.sql`:
      ALTER TABLE horses ADD COLUMN origin_country VARCHAR(100) NULL;
      ALTER TABLE horses ADD COLUMN height_cm SMALLINT UNSIGNED NULL;
      ALTER TABLE horses ADD COLUMN weight_kg SMALLINT UNSIGNED NULL;
      ALTER TABLE horses ADD COLUMN temperament VARCHAR(160) NULL;
      ALTER TABLE horses ADD COLUMN uses VARCHAR(255) NULL;
   Do not run an ALTER statement for a column that already exists. If this is a brand-new database, skip this migration step.
5. Import `setup.sql`. It creates the horse_site database and the horses, selections and contacts tables and adds Caspian/Hanoverian sample profiles without deleting existing records.
6. Review config.php. Default settings are typical for a fresh XAMPP install (root with no password); use your own credentials if changed.
7. Open http://localhost/horse-site/ or http://localhost/horse-site/index.php. Do not open PHP files with file:// or Live Server.

WHAT IS INCLUDED
- Shared responsive header/footer and accessible mobile navigation
- Home, About, Breeds + database-backed preference form, Gallery lightbox, Contact form, Privacy notice
- Server-side validation, PDO prepared statements, CSRF tokens, basic session-based contact rate limiting
- WebP image variants; original image assets are retained as fallbacks/reference
- SEO title/description/Open Graph basics, favicon, robots.txt and sitemap.xml
- Reduced-motion support and visible keyboard focus

BEFORE PUBLIC DEPLOYMENT
- Set HTTPS and strong database credentials; never expose phpMyAdmin publicly. Set SITE_URL in config.php to the real HTTPS base URL so canonical URLs can be emitted.
- Configure absolute canonical URLs and sitemap URLs for the real domain. They are intentionally not fabricated for localhost.
- Add server-level rate limiting, error logging/monitoring, backups and a formal privacy/retention policy.
- The current form stores messages in MySQL; it does not send emails. Add an authenticated mail service only if required.
- Run Lighthouse/PageSpeed on the deployed site; this environment did not execute a browser Lighthouse test.

CONTENT NOTE
Breed descriptions are introductory. Exact measurements are left blank unless verified; please check recognized breed registries before publishing factual breed standards.
