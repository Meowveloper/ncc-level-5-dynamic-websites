<!DOCTYPE html>
<?php 
require_once("Controller/NewsLetterController.php");

use Controller\NewsLetterController;

$newsLetterController = new NewsLetterController();
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Safety Campaign</title>
    <link rel="stylesheet" href="./styles/style.css">
  </head>
  <body>
  <nav>
      <ul>
        <li class="link"><a href="./admin-home.php">Home</a></li>
        <li class="link"><a href="./service-setup.php">Service</a></li>
        <li class="link"><a href="./newsletter-setup.php">Newsletter</a></li>
        <li class="link"><a href="./how-parent-help-setup.php">How Parents Help</a></li>
        <li class="link"><a href="./social-media-app-setup.php">Social Media Apps</a></li>
        <li class="link"><a href="./contact-list.php">Contact List</a></li>
        <li class="link"><a href="./member-list.php">Member List</a></li>
        <li class="link"><a href="./logout.php">Logout</a></li>
      </ul>
    </nav>
    <header>
      <h1>Online Safety Campaign</h1>
      <!-- Custom Cursors and 3D Illustrations can be added here -->
    </header>

    <main>
      <section id="contact">
        <h2>News Letter Setup</h2>
        <p>
          Create News Letter
        </p>
        <?php 
        if(isset($_POST['btnNewsLetterCreate'])) : 
          $newsLetter = $newsLetterController->newsLetterSetupCreate();
          print_r($newsLetter);
        endif;
        ?>
        <!-- Contact Form -->
        <form action="#" method="post" enctype="multipart/form-data">
          <label for="title">Title:</label>
          <input type="text" id="title" name="title" required />

          <label for="content">Content:</label>
          <input type="content" id="content" name="content" required />

          <label for="image">Image:</label>
          <input type="file" name="image">

          <button type="submit" name="btnNewsLetterCreate">Create News Letter</button>
        </form>

        <!-- Privacy Policy Link -->
        <p>
          Before sending a message, please review our
          <a href="privacy-policy.html" target="_blank">Privacy Policy</a>.
        </p>
      </section>
    </main>

    <footer>
      <p>You are here: Home</p>
      <div class="footer-content">
        <p>&copy; 2024 Online Safety Campaign</p>
        <!-- Add social media buttons with relevant links -->
        <a href="#" style="color: white">Facebook</a>
        <a href="#" style="color: white; margin-left: 10px">Twitter</a>
        <a href="#" style="color: white; margin-left: 10px">Instagram</a>
      </div>
    </footer>
  </body>
</html>
