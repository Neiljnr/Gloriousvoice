<?php 
include 'includes/db.php';
include 'includes/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'member')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $password);

    try {
        if ($stmt->execute()) {
            echo "<p style='color:green; text-align:center;'>✅ Registration successful. 
                  <a href='login.php' style='color:#007bff;'>Login here</a></p>";
        }
    } catch (mysqli_sql_exception $e) {
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            echo "<p style='color:red; text-align:center;'>⚠️ This email is already registered. 
                  <a href='login.php' style='color:#007bff;'>Login here</a></p>";
        } else {
            echo "<p style='color:red; text-align:center;'>❌ Error: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    }
}
?>

<section class="page-header">
  <h2>Register</h2>
</section>

<section class="content" style="max-width:400px; margin:auto; text-align:center;">
  <form method="POST" style="display:flex; flex-direction:column; gap:15px;">
    <input type="text" name="name" placeholder="Full Name" required 
           style="padding:10px; border-radius:6px; border:1px solid #ccc;">
    <input type="email" name="email" placeholder="Email" required 
           style="padding:10px; border-radius:6px; border:1px solid #ccc;">
    <input type="password" name="password" placeholder="Password" required 
           style="padding:10px; border-radius:6px; border:1px solid #ccc;">
    <button type="submit" 
            style="padding:10px; background:#007bff; color:#fff; border:none; border-radius:6px; cursor:pointer;">
      Register
    </button>
  </form>

  <p style="margin-top:15px;">Already have an account? 
    <a href="login.php" style="color:#007bff;">Login here</a>
  </p>
</section>

<?php include 'includes/footer.php'; ?>
