<!DOCTYPE html>
<?php 
$currentPage = "guest_legislation";
$pageType = 0;
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Safety Campaign</title>
    <link rel="stylesheet" href="./styles/style.css">
  </head>
  <body>
  
    <?php include_once("layouts/nav.php"); ?>
    <header>
      <h1>Online Safety Campaign</h1>
      <!-- Custom Cursors and 3D Illustrations can be added here -->
    </header>

    <main>
      <section class="legislation-content">
        <h2>Legislation and Guidance</h2>

        <p>
          Stay informed about the legal aspects and best practices when it comes
          to online social media use.
        </p>

        <!-- Information about Legislation and Guidance -->
        <h3>Relevant Legislation</h3>
        <p>
          Understanding the legal framework is crucial. Here are some key pieces
          of legislation related to online safety:
        </p>
        <ul>
          <li>The Online Safety Act</li>
          <li>Data Protection Regulations</li>
          <li>Child Online Privacy Act (COPA)</li>
          <!-- Add more legislation items as needed -->
        </ul>

        <h3>Best Practice Guidance</h3>
        <p>
          Follow these best practices to ensure a safe and responsible online
          experience:
        </p>
        <ul>
          <li>Teach responsible social media use from a young age</li>
          <li>
            Encourage open communication with children about their online
            activities
          </li>
          <li>
            Use privacy settings to control the visibility of personal
            information
          </li>
          <li>Report and block inappropriate content or users</li>
          <!-- Add more best practice guidance items as needed -->
        </ul>
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
