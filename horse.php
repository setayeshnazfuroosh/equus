<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/includes/security.php';
$pageTitle = 'Horse Breeds & Selection | Equus';
$pageDescription = 'Explore Caspian and Hanoverian horse breed profiles, then save a sample horse preference in the Equus database.';
$activePage = 'Breeds'; $pageCss = 'css/breeds.css';
$horses = [];
try { $horses = $pdo->query('SELECT * FROM horses ORDER BY name ASC')->fetchAll(); }
catch (PDOException $e) { http_response_code(500); $dbError = true; }
$saved = isset($_GET['saved']) && $_GET['saved'] === '1';
$selectionError = isset($_GET['error']);
require __DIR__ . '/includes/header.php';
?>
<main id="main-content">
  <section class="page-hero"><div class="wrap"><span class="eyebrow">Breed guide</span><h1>Meet the breeds.</h1><p>Every breed has a history and a purpose. Explore these introductory profiles, keeping in mind that individual horses may differ from general breed descriptions.</p></div></section>
  <section class="section"><div class="wrap"><div class="section-head"><div><span class="eyebrow">Featured profiles</span><h2>Two distinctive breeds</h2></div><p>Breed names describe populations and histories—not the age, colour or identity of an individual horse.</p></div>
    <?php if (!empty($dbError)): ?><p class="notice">The breed database could not be read. Check that MySQL is running and review <code>config.php</code>.</p><?php endif; ?>
    <?php if ($horses): ?><div class="card-grid">
      <?php foreach ($horses as $index => $horse): ?>
        <article class="breed-card" data-number="<?= str_pad((string)($index + 1), 2, '0', STR_PAD_LEFT) ?>"><span class="breed-kicker">Breed profile</span><h2><?= e($horse['name'] ?? 'Horse breed') ?></h2><p><?= e($horse['description'] ?? '') ?></p><div class="breed-facts">
          <?php foreach ([['Origin','origin_country',''],['Typical height','height_cm',' cm'],['Typical weight','weight_kg',' kg'],['Temperament','temperament',''],['Common uses','uses','']] as [$label,$key,$suffix]): if (!empty($horse[$key])): ?><div class="breed-fact"><span><?= e($label) ?></span><strong><?= e($horse[$key]) ?><?= e($suffix) ?></strong></div><?php endif; endforeach; ?>
        </div><div class="gold-rule"></div><p class="muted">Measurements and traits vary by individual. Consult a breed registry for verified standards.</p></article>
      <?php endforeach; ?>
    </div><?php else: ?><p class="notice">No breed profiles are available yet. Import the provided <code>setup.sql</code> or check the existing database schema.</p><?php endif; ?>
  </div></section>
  <section class="section selection-section"><div class="wrap"><span class="eyebrow">Try the database feature</span><h2>Save your horse preferences.</h2><p class="selection-intro">This demo form stores your selected preferences in the local MySQL database. It is a sample feature, not a purchase or reservation.</p>
    <?php if ($saved): ?><p class="form-message" role="status">Your preferences were saved to the database.</p><?php endif; ?>
    <?php if ($selectionError): ?><p class="form-message error" role="alert">Your preferences could not be saved. Please check the fields and try again.</p><?php endif; ?>
    <form class="panel" action="save_selection.php" method="post"><input type="hidden" name="csrf_token" value="<?= e($_SESSION['csrf_token']) ?>">
      <div class="form-grid">
        <fieldset class="field"><legend>Preferred coat colour</legend><div class="choice-list"><label class="choice-pill"><input type="radio" name="color" value="black" required> Black</label><label class="choice-pill"><input type="radio" name="color" value="brown"> Brown</label><label class="choice-pill"><input type="radio" name="color" value="bay"> Bay</label><label class="choice-pill"><input type="radio" name="color" value="gray"> Gray</label></div></fieldset>
        <fieldset class="field"><legend>Age range (years)</legend><div class="choice-list"><label class="choice-pill"><input type="radio" name="age" value="5" required> 5</label><label class="choice-pill"><input type="radio" name="age" value="10"> 10</label><label class="choice-pill"><input type="radio" name="age" value="15"> 15</label><label class="choice-pill"><input type="radio" name="age" value="20"> 20</label></div></fieldset>
        <div class="field"><label for="number">Number of horses</label><select id="number" name="number" required><option value="" selected disabled>Select quantity</option><option value="1">1 horse</option><option value="2">2 horses</option><option value="3">3 horses</option></select></div>
        <fieldset class="field"><legend>Equipment interests (optional)</legend><div class="choice-list"><?php foreach (['Riding boots','Riding clothes','Equestrian helmet','Equestrian gloves','Grooming tools'] as $item): ?><label class="choice-pill"><input type="checkbox" name="need[]" value="<?= e($item) ?>"> <?= e($item) ?></label><?php endforeach; ?></div></fieldset>
        <div class="field field-full"><button class="btn" type="submit">Save preferences <span aria-hidden="true">→</span></button></div>
      </div>
    </form>
  </div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
