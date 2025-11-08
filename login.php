<?php 
session_start();
include 'includes/db.php';
include 'includes/header.php';

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Simple authentication (no password hashing)
    $sql = "SELECT * FROM users WHERE email=? AND password=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['name'];
        $_SESSION['role'] = $user['role'];

        // Redirect by role
        if ($user['role'] === 'admin') {
            header("Location: admin/dashboard.php");
        } elseif ($user['role'] === 'leader' || $user['role'] === 'member') {
            header("Location: dashboard.php");
        } else {
            echo "<p style='color:red; text-align:center;'>Unknown role assigned to this user.</p>";
        }
        exit;
    } else {
        echo "<p style='color:red; text-align:center;'>❌ Invalid email or password.</p>";
    }
}
?>

<section class="page-header">
  <h2>Login</h2>
</section>

<section class="content" style="max-width:400px; margin:auto; text-align:center;">
  <form method="POST" style="display:flex; flex-direction:column; gap:15px;">
    <input type="email" name="email" placeholder="Email" required 
           style="padding:10px; border-radius:6px; border:1px solid #ccc;">
    <input type="password" name="password" placeholder="Password" required 
           style="padding:10px; border-radius:6px; border:1px solid #ccc;">
    <button type="submit" 
            style="padding:10px; background:#007bff; color:#fff; border:none; border-radius:6px; cursor:pointer;">
      Login
    </button>
  </form>
</section>

<?php include 'includes/footer.php'; ?>
