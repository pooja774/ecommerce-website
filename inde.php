<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SNEAKERS</title>
  <!-- Linking Google font link for icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- center name start here -->
  <section id="banner">                                     
    <div class="banner-text">
      <h1>SNEAKERS</h1>                   
      <p>find your desired items to Your doorstep's!</p>
      <div class="banner-btn">
        <a href="buy.php"><span></span> BUY</a>
      </div>
    </div>
  </section>
  <!-- center name end here -->

  <aside class="sidebar">
    <div class="logo">
      <img src="logo.jpg" alt="logo">
      <!-- sidebar star from here -->
      <h2>SNEAKERS</h2>
    </div>
    <ul class="links"> 
      <h4>MAIN MENU</h4>
      <li>
      <span class="material-symbols-outlined">HOME</span>
        <a href="first.php">HOME</a>
      </li>
      <br>
      <li>
        <span class="material-symbols-outlined">add_shopping_cart</span>
        <a href="buy.php">BUY</a>
      </li>
      <br>
      <li>
        <span class="material-symbols-outlined">person</span>
        <a href="contact.html">CONTACT-US</a>
      </li>
      <br>
      <li>
        <span class="material-symbols-outlined">shopping_cart</span>
        <a href="cart.php">CART</a>
      </li>
      <br>
      <li>
        <span class="material-symbols-outlined">person</span>
        <a href="aboutus.html">ABOUT-US</a>
      </li>
      <hr>
      <?php
      // Check if user is logged in
      session_start();
      if (isset($_SESSION['email'])) {
        echo '<li class="logout-link"> 
                <span class="material-symbols-outlined">Logout</span>
                <a href="logout.php">Logout</a>
              </li>';
        echo '<li class="profile-link"> 
                <span class="material-symbols-outlined">Person</span>
                <a href="profile1.php">Profile</a>
              </li>';
      }else {
        echo '<li class="logout-link"> 
                <span class="material-symbols-outlined">app_registration</span>
                <a href="sign-up.php">Register</a>
              </li>';
        echo '<li class="logout-link"> 
                <span class="material-symbols-outlined">Login</span>
                <a href="signin.php">Login</a>
              </li>';
      }
      ?>
     
      <hr>
    </ul>
  </aside>
  <!-- sidebar ends here -->
</body>
</html>
