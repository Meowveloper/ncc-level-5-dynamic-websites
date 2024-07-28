<!DOCTYPE html>
<?php
$currentPage = "user_information";
$pageType = 2;
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>
  <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="./styles/style.css">
  <link rel="stylesheet" href="./styles/information.css">
</head>

<body>
  <?php
  include_once('layouts/nav.php');
  ?>
  <header>
    <h1>Online Safety Campaign</h1>
  </header>

  <div>
    <div class="w-600px p-20px mx-auto text-justify fs-18px">
    Howdy, partners. This here's a spread about our roundup against the varmints of the digital plains. We're aimin' to teach our young'uns how to ride the newfangled tech without gettin' trampled. We're out to show 'em the dangers lurkin' in the shadows of the internet, and how to keep their spurs clean. Our dream is for every young'un to roam free in this digital wild without fear, with a heart full of courage and a mind sharp as a hawk's eye.
    </div>
    <div class="informationAnimation"></div>
  </div>

  <main>
    <section id="" class="px-100px flex flex-wrap justify-center items-center gap-2rem">
      <div class="w-500px h-500px relative rounded-10px overflow-hidden shadow">
        <img src="assets/information-welcome.jpg" alt="" class="w-full h-full">
        <div class="absolute bg-background-color bottom-0px left-0px bg-semi-transparent px-2rem py-2rem h-half">
          <h2 class="text-white">Information</h2>
          <p class="text-white">
            Welcome to the Information page of the Online Safety Campaign. Here,
            we provide details about our social media campaigns and their aims and
            vision to keep teenagers safe online.
          </p>
        </div>
      </div>
      <div class="w-500px h-500px relative rounded-10px overflow-hidden shadow">
        <img src="assets/information-campaigns.jpg" alt="" class="w-full h-full">
        <div class="absolute bg-background-color bottom-0px left-0px bg-semi-transparent px-2rem py-2rem h-half">
          <h3 class="text-white">Social Media Campaigns</h3>
          <p class="text-white">
            Our campaigns focus on empowering teenagers to navigate the digital
            world safely. We aim to create awareness about online risks and
            promote responsible use of social media platforms.
          </p>
        </div>
      </div>
      <div class="w-500px h-500px relative rounded-10px overflow-hidden shadow">
        <img src="assets/information-aim-vision.jpg" alt="" class="w-full h-full">
        <div class="absolute bg-background-color bottom-0px left-0px bg-semi-transparent px-2rem py-2rem h-half">
          <h3 class="text-white">Aims and Vision</h3>
          <p class="text-white">
            Our primary aim is to foster a secure online environment for
            teenagers, promoting positive interactions and preventing
            cyberbullying. We envision a future where young individuals can
            explore the digital space without compromising their safety and
            well-being.
          </p>
        </div>
      </div>
    </section>
  </main>

  <?php include_once "layouts/footer.php"; ?>
</body>

</html>