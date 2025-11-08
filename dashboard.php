<?php
session_start();

// Redirect if user not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Get user info safely
$username = $_SESSION['user_name'] ?? "Guest";
$role = $_SESSION['role'] ?? "member";
?>

<?php include 'includes/header.php'; ?>

<section class="page-header">
  <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
</section>

<section class="content" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">

  <!-- Profile Card -->
  <div style="background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
    <h3>👤 Profile</h3>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($username); ?></p>
    <p><strong>Role:</strong> <?php echo htmlspecialchars($role); ?></p>
  </div>

  <!-- Links / Features -->
  <div style="background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
    <h3>📢 Announcements</h3>
   <ul>
  <li><a href="members/announcements.php">📢 Announcements</a></li>
  <li><a href="members/songs.php">🎵 Songs to Learn</a></li>
  <li><a href="members/contributions.php">💰 Contributions</a></li>
  <li><a href="members/disciplinary.php">⚠ Disciplinary Records</a></li>
</ul>
  </div>

  <!-- Member Info -->
  <div style="background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
    <h3>📂 Member Area</h3>
    <p>This is the member-only dashboard where you’ll see band updates and resources.</p>
  </div>

  <!-- Logout -->
  <div style="background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); text-align:center;">
    <h3>🔑 Logout</h3>
    <form method="post" action="logout.php">
      <button type="submit" style="padding: 10px 20px; background: #a30000; color: #fff; border: none; border-radius: 6px; cursor: pointer;">Logout</button>
    </form>
  </div>

</section>

<?php include 'includes/footer.php'; ?>
