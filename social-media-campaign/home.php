<!DOCTYPE html>
<?php
$currentPage = "user_home";
$pageType = 2;
require_once "Controller/SocialMediaAppController.php";

use Controller\SocialMediaAppController;

$socialMediaAppController = new SocialMediaAppController();
if (isset($_GET['search'])) :
  $socialMediaApps = $socialMediaAppController->getAllSocialMediaApps($_GET['search']);
else :
  $socialMediaApps = $socialMediaAppController->getAllSocialMediaApps();
endif;
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>
  <link rel="stylesheet" href="./styles/style.css">
  <link rel="stylesheet" href="./styles/home.css">
</head>

<body>
  <?php include_once "layouts/nav.php" ?>
  <main id="home">
    <div class="flex justify-center items-center flex-wrap px py gap" style="--px : 100px; --py: 40px; --gap: 20rem">
      <div class="w" style="--w: 500px">
        <h2>Welcome to Our Social Media Campaign</h2>
        <p class="text-justify">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas tempora a libero hic veritatis incidunt, ipsa eveniet consequatur iste harum nihil dicta, delectus error excepturi deleniti, voluptatibus esse placeat aperiam odit eaque! Saepe laborum accusantium, beatae ipsum consequatur excepturi quod at officia, amet expedita suscipit voluptatum, illo minima? Ut unde asperiores fugiat cupiditate harum qui hic, aspernatur quis nisi non dolorem repellat maxime quia delectus, beatae blanditiis ad, magni eum obcaecati suscipit modi laudantium pariatur sed. Consequuntur quia ex ipsam tempora odit cupiditate tenetur repellat natus omnis nihil laudantium, ullam aliquam dolor. A enim pariatur, blanditiis impedit vel dolorem delectus.
        </p>
        <div>
          <button class="bgBlueButton w-151px h-44px cursor-pointer">
            <a class="text-decoration-none" href="profile.php">Go To Your Profile</a>
          </button>
        </div>
      </div>
      <img src="assets/welcome_image_1.jpg" alt="" width="400px">
    </div>

    <section class="px flex flex-wrap justify-center items-stretch gap mt bg pt pb" style="--px: 100px; --gap: 2rem; --mt: 40px; --bg: var(--primary-light-blue-25); --pb: 80px; --pt: 20px;">
      <div class="fs fw w-full" style="--fs: 20px; --fw: 700;">Empowering teenagers to navigate the digital world safely.</div>
      <div class="w bg p shadow rounded min-h" style="--min-h: 215px; --w: 400px; --bg: var(--background-color); --p: 20px; --rounded: 10px">

        <span class="m fs fw" style="--m: 0px; --fs: 18px; --fw: 700;">Online Safety Workshops</span>
        <p>
          Join our interactive workshops to learn about online safety and
          responsible social media use.
        </p>
        <p><strong>Date:</strong> November 15, 2024</p>
        <p><strong>Location:</strong> Virtual Event</p>
        <button class="bgBlueButton w h" style="--w: 151px; --h: 44px">
          <a href="#" class="text-decoration-none">Register Now</a>
        </button>
      </div>

      <div class="w relative bg p shadow rounded min-h" style="--min-h: 215px; --w: 400px; --bg: var(--background-color); --p: 20px; --rounded: 10px">
        <span class="mb fs fw block" style="--mb: 10px; --fs: 18px; --fw: 700;">How Parents Help</span>
        <span>As, a parent, you can also see how parents can help in your child's online safety.</span>
        <div class="absolute bottom left" style="--bottom: 20px; --left: 20px">
          <button class="cursor-pointer bgBlueButton w h" style="--w: 151px; --h: 44px;">
            <a href="parents-help.php" class="text-decoration-none">See Details</a>
          </button>
        </div>
      </div>

      <div class="w relative bg p shadow rounded min-h" style="--min-h: 215px; --w: 400px; --bg: var(--background-color); --p: 20px; --rounded: 10px">
        <span class="mb fs fw block" style="--mb: 10px; --fs: 18px; --fw: 700;">Services</span>
        <span>You can also checkout our services.</span>
        <div class="absolute bottom left" style="--bottom: 20px; --left: 20px">
          <button class="cursor-pointer bgBlueButton w h" style="--w: 151px; --h: 44px;">
            <a href="service.php" class="text-decoration-none">See Details</a>
          </button>
        </div>
      </div>
    </section>

    <section id="toScroll" class="px flex flex-wrap justify-center items-stretch gap mt bg pb" style="--px: 100px; --gap: 2rem; --mt: 40px; --bg: var(--background-color); --pb: 50px;">
      <h1 class="w-full">Popular Social Media Apps</h1>
      <?php if (count($socialMediaApps) < 1) : ?>
        <p class="fs fw text-center" style="--fs: 18px; --fw: bold;">
          <?= isset($_GET['search']) ? "Nothing found on " . $_GET['search'] : "Admins haven't add any social media apps to the database." ?>
        </p>
        <?php if (isset($_GET['search'])) : ?>
          <div class="text-center">
            <button class="bgBlueButton w-151px h-44px ms-2rem">
              <a href="home.php" class="text-decoration-none">Clear Search</a>
            </button>
          </div>
        <?php endif; ?>
      <?php endif; ?>
      <?php if (count($socialMediaApps) > 0) : ?>
        <?php if (isset($_GET['search'])) : ?>
          <div class="text-center w-full flex justify-center items-center">
            <div class="text-18px font-bold">Search Result On <?= $_GET['search'] ?></div>
            <button class="bgBlueButton w-151px h-44px ms-2rem">
                <a href="home.php" class="text-decoration-none">Clear Search</a>
            </button>
          </div>
        <?php endif; ?>
        <?php foreach ($socialMediaApps as $item) : ?>
          <div class="w relative bg p shadow rounded min-h" style="--min-h: 250px; --w: 400px; --bg: var(--primary-light-blue-25); --p: 20px; --rounded: 10px">
            <div class="flex justify-start items-center gap" style="--gap: 1rem">
              <img src="<?= "images/" . $item->logo ?>" alt="" width="80px" height="80px" class="rounded-full">
              <p class="fs fw" style="--fs: 20px; --fw: 800;"><?= $item->name ?></p>
            </div>
            <div class="mt" style="--mt: 20px;">
              <button class="bgBlueButton h w-full mb" style="--h: 40px; --mb: 20px;">
                <a href="" class="text-decoration-none">Go to <?= $item->name ?></a>
              </button>
              <button class="bgBlueButton h w-full" style="--h: 40px;">
                <a href="" class="text-decoration-none"><?= $item->name ?>'s' Privacy Link</a>
              </button>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

    </section>
  </main>

  <?php include_once "layouts/footer.php" ?>
</body>
<script>
  window.onload = () => {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const search = urlParams.get('search');
    const paramToScroll = urlParams.get('toScroll');
    const toScroll = document.getElementById("toScroll");
    if (search || paramToScroll) {
      toScroll.scrollIntoView({
        behavior: 'smooth'
      });
    }
  }
</script>

</html>