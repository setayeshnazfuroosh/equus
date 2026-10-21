<?php
$pageTitle = 'Equus | Discover the World of Horses';
$pageDescription = 'Discover horse breeds, equestrian culture, responsible care and beautiful moments from the world of horses.';
$activePage = 'Home'; $pageCss = 'css/home.css';
require __DIR__ . '/includes/header.php';
?>
<main id="main-content">
  <section class="home-hero">
    <div class="wrap hero-layout">
      <div>
        <span class="eyebrow">The art of equestrian living</span>
        <h1>More than a horse.<br><em>A lifelong bond.</em></h1>
        <p class="hero-copy">Explore the breeds, care and traditions that make the equestrian world so remarkable. Thoughtfully curated for curious horse lovers.</p>
        <div class="hero-actions"><a class="btn" href="horse.php">Explore breeds <span aria-hidden="true">↗</span></a><a class="btn btn-secondary" href="gallery.php">View the gallery</a></div>
      </div>
      <div class="hero-art"><img src="index_files/horse.webp" srcset="index_files/horse-600.webp 600w, index_files/horse-900.webp 900w, index_files/horse.webp 1200w" sizes="(max-width: 800px) 100vw, 50vw" width="1200" height="800" alt="A horse standing in a calm, elegant pose" fetchpriority="high"><span class="hero-caption">Knowledge · Care · Connection</span></div>
    </div>
  </section>
  <section class="section"><div class="wrap">
    <div class="section-head"><div><span class="eyebrow">A world worth knowing</span><h2>Meet the equestrian world</h2></div><p>From breed history to everyday care, discover practical knowledge and inspiration grounded in respect for the horse.</p></div>
    <div class="card-grid">
      <article class="feature-card"><img src="gallery_files/06-tacked-horse.webp" width="378" height="506" alt="A horse fitted with riding tack" loading="lazy"><div class="card-body"><span class="eyebrow">01 / Learn</span><h3>Explore horse breeds</h3><p>Understand the origins, characteristics and common roles of different breeds.</p><a class="text-link" href="horse.php">Discover breeds <span aria-hidden="true">→</span></a></div></article>
      <article class="feature-card"><img src="gallery_files/07-grooming-tools.webp" width="378" height="506" alt="Tools used for routine horse grooming" loading="lazy"><div class="card-body"><span class="eyebrow">02 / Care</span><h3>Care with intention</h3><p>Good horsemanship begins with daily care, patience and attention to welfare.</p><a class="text-link" href="about.php#care">Read about care <span aria-hidden="true">→</span></a></div></article>
      <article class="feature-card"><img src="gallery_files/08-jumping-arena.webp" width="378" height="506" alt="An equestrian show-jumping arena" loading="lazy"><div class="card-body"><span class="eyebrow">03 / Discover</span><h3>See the moments</h3><p>A visual collection of riding, equipment and equestrian life.</p><a class="text-link" href="gallery.php">Open gallery <span aria-hidden="true">→</span></a></div></article>
    </div>
  </div></section>
  <section class="quote-band"><div class="wrap"><blockquote>“Great horsemanship begins with respect: for the animal, the partnership and the work.”<cite>The Equus philosophy</cite></blockquote></div></section>
  <section class="section"><div class="wrap"><div class="section-head"><div><span class="eyebrow">Our approach</span><h2>Curiosity, backed by care</h2></div><p>Equus is a learning project designed to bring reliable structure and a calm, editorial experience to horse-related topics.</p></div><p class="intro-copy">Breed characteristics can vary widely between individual horses. Use this site as a starting point for learning, and consult breed registries, veterinarians and qualified equestrian professionals for decisions involving animal care or training.</p><a class="btn btn-secondary" href="about.php">About Equus</a></div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
