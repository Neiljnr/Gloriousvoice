<?php include 'includes/header.php'; ?>

<section class="page-header">
  <h2>Contact Us</h2>
</section>

<section class="content" style="max-width:600px; margin:auto; background:#fff; padding:30px; border-radius:10px; box-shadow:0 4px 8px rgba(0,0,0,0.1);">

  <p style="text-align:center; margin-bottom:20px;">
    If you would like to invite <strong>Glorious Voice</strong> for a ministration or have a question,
    please reach out to us using the form below.
  </p>

  <form id="contactForm" method="POST" action="contact.php" style="display:flex; flex-direction:column; gap:15px;">
    
    <div>
      <label for="name" style="font-weight:bold;">Full Name</label><br>
      <input type="text" id="name" name="name" required 
             style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; font-size:16px;">
    </div>

    <div>
      <label for="email" style="font-weight:bold;">Email Address</label><br>
      <input type="email" id="email" name="email" required 
             style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; font-size:16px;">
    </div>

    <div>
      <label for="message" style="font-weight:bold;">Message</label><br>
      <textarea id="message" name="message" rows="5" required
                style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; font-size:16px; resize:none;"></textarea>
    </div>

    <button type="submit" 
            style="padding:12px; background:#a30000; color:#fff; border:none; border-radius:6px; font-size:16px; cursor:pointer; transition:background 0.3s;">
      Send Message
    </button>
  </form>

</section>

<?php include 'includes/footer.php'; ?>
