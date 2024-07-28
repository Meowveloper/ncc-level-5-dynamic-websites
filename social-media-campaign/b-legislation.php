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
  <link rel="stylesheet" href="./styles/legislation.css">
  <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
</head>

<body>

  <?php include_once "layouts/nav.php"; ?>
  <header>
    <h1>Online Safety Campaign</h1>
    <!-- Custom Cursors and 3D Illustrations can be added here -->
  </header>

  <div class="mb-20px">
    <div class="w-600px p-20px mx-auto text-justify fs-18px">
      Now, pardner, let's talk 'bout the law of the land and how to ride this digital pony safe-like.
      There's laws on the books 'bout how to handle folks' information and keepin' our young'uns safe. It's smart to know 'em. Best to teach 'em young how to behave on this here internet. Talk straight with your kid about what they're up to. Keep a sharp eye on who can see their business. And if something ain't right, stand tall and report it.
    </div>
    <div class="w-fit mx-auto">
      <div class="legislationAnimation"></div>
    </div>
  </div>

  <main>
    <section class="px-100px flex flex-wrap justify-center items-center gap-2rem">
      <div class="w-500px h-500px relative rounded-10px overflow-hidden shadow">
        <img src="assets/legislation-guidance.jpg" alt="" class="w-full h-full">
        <div class="absolute bg-background-color bottom-0px left-0px bg-semi-transparent px-2rem py-2rem h-half">
          <h2 class="text-white">Legislation and Guidance</h2>

          <p class="text-white">
            Stay informed about the legal aspects and best practices when it comes
            to online social media use.
          </p>
        </div>
      </div>
      <div class="w-500px h-500px relative rounded-10px overflow-hidden shadow">
        <img src="assets/legislation-revelant.jpg" alt="" class="w-full h-full">
        <div class="absolute bg-background-color bottom-0px left-0px bg-semi-transparent px-2rem py-2rem h-half">
          <h3 class="text-white">Relevant Legislation</h3>
          <p class="text-white">
            Understanding the legal framework is crucial. Here are some key pieces
            of legislation related to online safety:
          </p>
          <ul>
            <li class="text-white">The Online Safety Act</li>
            <li class="text-white">Data Protection Regulations</li>
            <li class="text-white">Child Online Privacy Act (COPA)</li>
          </ul>
        </div>
      </div>
      <div class="w-500px h-500px relative rounded-10px overflow-hidden shadow">
        <img src="assets/legislation-best-practice.jpg" alt="" class="w-full h-full">
        <div class="absolute bg-background-color bottom-0px left-0px bg-semi-transparent px-2rem py-2rem h-half">
          <h3 class="text-white">Best Practice Guidance</h3>

          <ul>
            <li class="text-white">Teach responsible social media use from a young age</li>
            <li class="text-white">
              Encourage open communication with children about their online
              activities
            </li>
            <li class="text-white">
              Use privacy settings to control the visibility of personal
              information
            </li>
            <li class="text-white">Report and block inappropriate content or users</li>
            <!-- Add more best practice guidance items as needed -->
          </ul>
        </div>
      </div>
    </section>
  </main>

  <?php include_once "layouts/footer.php"; ?>
</body>

</html>