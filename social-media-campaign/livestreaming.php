<!DOCTYPE html>
<?php
$currentPage = "user_livestreaming";
$pageType = 2;
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>
  <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="./styles/style.css">
  <link rel="stylesheet" href="./styles/user/livestreaming.css">
</head>

<body>
  <?php include_once "layouts/nav.php" ?>
  <header>
    <h1>Online Safety Campaign</h1>
    <!-- Custom Cursors and 3D Illustrations can be added here -->
  </header>

  <main>
    <section id="" class="px-100px flex justify-between items-center flex-wrap gap-2rem">
      <img src="assets/livestreaming.jpg" class="w-400px" alt="">
      <div class="flex-1-1-auto">
        <h2>Livestreaming</h2>
        <p>
          Explore an overview of livestreaming and learn how it can be done in a
          safe environment.
        </p>
        <!-- Add content related to livestreaming and safety tips -->
        <p>
          Livestreaming is a popular way for individuals to share content in
          real-time. Here are some tips to ensure a safe livestreaming
          experience:
        </p>
        <ul>
          <li>
            Be mindful of the content you share – avoid sharing personal
            information.
          </li>
          <li>
            Use privacy settings to control who can view your livestreams.
          </li>
          <li>
            Interact responsibly with viewers and be aware of potential risks.
          </li>
          <li>Report and block any inappropriate comments or behavior.</li>
          <li>
            Educate yourself on the platform's guidelines and community
            standards.
          </li>
        </ul>
      </div>

    </section>
  </main>

  <?php include_once "layouts/footer.php"; ?>
</body>

</html>