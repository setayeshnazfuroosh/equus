<?php
if (!isset($pageTitle)) $pageTitle = 'Equus — The World of Horses';
if (!isset($pageDescription)) $pageDescription = 'Explore horse breeds, equestrian life, horse care and a curated gallery with Equus.';
if (!isset($activePage)) $activePage = '';
$navItems = ['Home'=>'index.php','About'=>'about.php','Breeds'=>'horse.php','Gallery'=>'gallery.php','Contact'=>'contact.php'];
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
  <meta name="theme-color" content="#17251f">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Equus">
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
  <meta name="twitter:card" content="summary_large_image">
  <?php if (defined('SITE_URL') && SITE_URL !== ''): ?><link rel="canonical" href="<?= htmlspecialchars(rtrim(SITE_URL, '/') . '/' . basename(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH)), ENT_QUOTES, 'UTF-8') ?>"><?php endif; ?>
  <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
  <link rel="icon" type="image/svg+xml" href="assets/favicon.svg">
  <link rel="stylesheet" href="css/base.css">
  <?php if (!empty($pageCss)): ?><link rel="stylesheet" href="<?= htmlspecialchars($pageCss, ENT_QUOTES, 'UTF-8') ?>"><?php endif; ?>
</head>
<body>
<a class="skip-link" href="#main-content">Skip to content</a>
<header class="site-header">
  <div class="header-inner wrap">
    <a class="brand" href="index.php" aria-label="Equus home"><span class="brand-mark" aria-hidden="true">♞</span><span>Equus<span class="brand-dot">.</span></span></a>
    <button class="menu-toggle" type="button" aria-label="Open navigation" aria-expanded="false" aria-controls="primary-navigation"><span></span><span></span><span></span></button>
    <nav class="main-nav" id="primary-navigation" aria-label="Main navigation">
      <?php foreach ($navItems as $label => $href): ?>
        <a href="<?= $href ?>"<?= $activePage === $label ? ' class="active" aria-current="page"' : '' ?>><?= $label ?></a>
      <?php endforeach; ?>
    </nav>
  </div>
</header>
