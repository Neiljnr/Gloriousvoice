<?php include 'includes/header.php'; ?>

<section class="page-header">
  <h2>📸 Glorious Voice Photo Gallery</h2>
  <p style="text-align:center;">Browse through memories from our ministrations, rehearsals, and church events.</p>
</section>

<section class="content" style="max-width:1200px; margin:auto; padding:20px;">
  
  <!-- Category Navigation -->
  <div class="gallery-nav" style="text-align:center; margin-bottom:30px;">
    <button class="filter-btn active" data-category="all">All</button>
    <button class="filter-btn" data-category="church">Church Events</button>
    <button class="filter-btn" data-category="practice">Choir Practice</button>
    <button class="filter-btn" data-category="crusade">Crusades</button>
    <button class="filter-btn" data-category="concert">Concerts</button>
    <button class="filter-btn" data-category="wedding">Weddings</button>
  </div>

  <!-- Gallery Grid -->
  <div class="gallery-grid" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:15px;">
    
    <!-- Church Events -->
    <div class="gallery-item" data-category="church">
      <img src="https://source.unsplash.com/800x600/?church,worship" alt="Church Event">
      <p>Sunday Worship Service</p>
    </div>
    <div class="gallery-item" data-category="church">
      <img src="https://source.unsplash.com/800x600/?church,choir" alt="Church Event">
      <p>Choir Ministration</p>
    </div>

    <!-- Choir Practice -->
    <div class="gallery-item" data-category="practice">
      <img src="https://source.unsplash.com/800x600/?music,rehearsal" alt="Choir Practice">
      <p>Weekly Rehearsal</p>
    </div>
    <div class="gallery-item" data-category="practice">
      <img src="https://source.unsplash.com/800x600/?microphone,singing" alt="Choir Practice">
      <p>Voice Training Session</p>
    </div>

    <!-- Crusades -->
    <div class="gallery-item" data-category="crusade">
      <img src="https://source.unsplash.com/800x600/?crowd,revival" alt="Crusade">
      <p>Open Air Crusade</p>
    </div>
    <div class="gallery-item" data-category="crusade">
      <img src="https://source.unsplash.com/800x600/?stage,preaching" alt="Crusade">
      <p>Street Evangelism</p>
    </div>

    <!-- Concerts -->
    <div class="gallery-item" data-category="concert">
      <img src="https://source.unsplash.com/800x600/?concert,gospel" alt="Concert">
      <p>Glorious Praise Night</p>
    </div>
    <div class="gallery-item" data-category="concert">
      <img src="https://source.unsplash.com/800x600/?lights,performance" alt="Concert">
      <p>Music Festival</p>
    </div>

    <!-- Weddings -->
    <div class="gallery-item" data-category="wedding">
      <img src="https://source.unsplash.com/800x600/?wedding,church" alt="Wedding">
      <p>Wedding Ministration</p>
    </div>
    <div class="gallery-item" data-category="wedding">
      <img src="https://source.unsplash.com/800x600/?wedding,choir" alt="Wedding">
      <p>Reception Song</p>
    </div>

  </div>
</section>

<script>
  // Simple filter script
  const buttons = document.querySelectorAll('.filter-btn');
  const items = document.querySelectorAll('.gallery-item');

  buttons.forEach(btn => {
    btn.addEventListener('click', () => {
      buttons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const category = btn.dataset.category;

      items.forEach(item => {
        if (category === 'all' || item.dataset.category === category) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });
</script>

<style>
  .gallery-item {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    overflow: hidden;
    text-align: center;
    transition: transform 0.3s;
  }

  .gallery-item img {
    width: 100%;
    height: 200px;
    object-fit: cover;
  }

  .gallery-item:hover {
    transform: scale(1.03);
  }

  .gallery-item p {
    padding: 10px;
    background: #f8f8f8;
    font-weight: bold;
  }

  .filter-btn {
    background: #a30000;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 8px 15px;
    margin: 5px;
    cursor: pointer;
    transition: background 0.3s;
  }

  .filter-btn:hover, .filter-btn.active {
    background: #7a0000;
  }
</style>

<?php include 'includes/footer.php'; ?>
