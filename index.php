<?php 
session_start();
include 'includes/db.php';
include 'includes/functions.php';
?>
<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<section class="hero">
  <div class="hero-text">
    <h1>Welcome to <span>Glorious Voice</span></h1>
    <p>St. John Anglican Church Majaga</p>
  </div>
</section>

<!-- Grid Container for Sections -->
<div class="grid-sections">

  <!-- Daily Bible Verse -->
  <section class="card">
    <h2>Daily Bible Verse</h2>
    <p id="dailyVerseText"><?php echo getDailyVerse($conn); ?></p>
  </section>

  <!-- Latest Ministration -->
  <section class="card">
    <h2>Latest Ministration</h2>
    <?php
      $media = getLatestMinistration($conn);
      if($media) {
          echo "<video controls width='100%'>
                  <source src='assets/uploads/video/".$media['media_path']."' type='video/mp4'>
                </video>";
      } else {
          echo "<p>No recent ministrations uploaded.</p>";
      }
    ?>
  </section>

  <!-- Random Event Countdown (JS Generated) -->
  <section class="card">
    <h2>Random Event Countdown</h2>
    <div id="eventsContainer" class="events-grid"></div>
  </section>

  <!-- Upcoming Events (from Database) -->
  <section class="card">
    <h2>Upcoming Events</h2>
    <ul>
      <?php
        $events = getUpcomingEvents($conn);
        if($events) {
          foreach($events as $event) {
            echo "<li>".$event['title']." - ".$event['date']."</li>";
          }
        } else {
          echo "<li>No upcoming events.</li>";
        }
      ?>
    </ul>
  </section>

  <!-- Announcements -->
  <section class="card">
    <h2>Band Announcements</h2>
    <ul>
      <?php
        $announcements = getAnnouncements($conn);
        if($announcements) {
          foreach($announcements as $note) {
            echo "<li>".$note['title']." - ".$note['content']."</li>";
          }
        } else {
          echo "<li>No announcements.</li>";
        }
      ?>
    </ul>
  </section>

</div> <!-- end grid-sections -->

<section class="page-header">
  <h2>Welcome to Our Church</h2>
  <p>"For where two or three gather in my name, there am I with them." – Matthew 18:20</p>
</section>

<!-- Member Prompt Modal -->
<div id="memberModal" class="modal">
  <div class="modal-content">
    <span class="close-btn" onclick="closeModal()">&times;</span>
    <h2>Welcome to Glorious Voice</h2>
    <p>Are you a new band member?</p>
    <div class="modal-actions">
      <a href="register.php" class="btn">Yes, Register</a>
      <a href="login.php" class="btn">I’m already registered</a>
      <button onclick="closeModal()" class="btn secondary">Just Browse</button>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>

<!-- Attach JS at the bottom -->
<script src="javascript/script.js?v=<?php echo time(); ?>"></script>
</body>
</html>
