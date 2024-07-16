<!DOCTYPE html>
<?php
$currentPage = "user_home";
$pageType = 2;
require_once "Helper/Text.php";
require_once "Controller/HowParentHelpController.php";
require_once "Controller/ServiceController.php";
require_once "Controller/NewsLetterController.php";
use Helper\Text;
use Controller\HowParentHelpController;
use Controller\ServiceController;
use Controller\NewsLetterController;

$howParentHelpController = new HowParentHelpController();
$serviceController = new ServiceController();
$newsLetterController = new NewsLetterController();
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>
  <link rel="stylesheet" href="./styles/style.css">
  <link rel="stylesheet" href="./styles/user/home.css">
</head>

<body>
  <?php include_once "layouts/nav.php" ?>
  <main id="home">
    <div class="flex justify-center items-center flex-wrap px-100px py-40px gap-20rem">
      <div class="w-500px">
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

    <section class="flex flex-wrap justify-center items-stretch px-100px pt-20px pb-80px gap-2rem mt-40px bg-primary-light-blue-25">
      <div class="w-full fs-20px fw-700">Empowering teenagers to navigate the digital world safely.</div>
      <div class="shadow rounded-10px w-400px bg-background-color p-20px min-h-215px">

        <span class="m-0px fs-18px fw-700">Online Safety Workshops</span>
        <p>
          Join our interactive workshops to learn about online safety and
          responsible social media use.
        </p>
        <p><strong>Date:</strong> November 15, 2024</p>
        <p><strong>Location:</strong> Virtual Event</p>
        <button class="bgBlueButton w-151px h-44px">
          <a href="#" class="text-decoration-none">Register Now</a>
        </button>
      </div>

      <div class="relative shadow w-400px min-h-215px bg-background-color p-20px rounded-10px">
        <span class="mb-10px fs-18px fw-700 block">How Parents Help</span>
        <span>As, a parent, you can also see how parents can help in your child's online safety.</span>
        <div class="absolute bottom-20px left-20px">
          <button class="cursor-pointer bgBlueButton w-151px h-44px">
            <a href="parents-help.php" class="text-decoration-none">See Details</a>
          </button>
        </div>
      </div>

      <div class="w relative bg p shadow rounded min-h" style="--min-h: 215px; --w: 400px; --bg: var(--background-color); --p: 20px; --rounded: 10px">
        <span class="mb-10px fs-18px fw-700 block">Services</span>
        <span>You can also checkout our services.</span>
        <div class="absolute bottom-20px left-20px">
          <button class="cursor-pointer bgBlueButton w-151px h-44px">
            <a href="service.php" class="text-decoration-none">See Details</a>
          </button>
        </div>
      </div>
    </section>

    <!-- how parents help -->
    <?php 
      $howParentHelps_x_3 = $howParentHelpController->getAllHowParentHelps('', 3);
      if(!(count($howParentHelps_x_3) < 1)) : 
    ?>
      <section class="px-100px mt-40px py-2rem">
        <p class="fs-20px fw-bold">A Introduction of How Parents Can Help In This Campaign</p>
        <?php foreach($howParentHelps_x_3 as $item) : ?>
          <div class="flex justify-start items-center gap-2rem mb-1rem flex-wrap bg-primary-light-blue-25 py-15px px-20px rounded-10px shadow">
            <div>
              <img src="<?= "images/" . $item->image_1 ?>" alt="" class="w-100px h-100px rounded-10px">
              <img src="<?= "images/" . $item->image_2 ?>" alt="" class="w-100px h-100px rounded-10px">
            </div>
            <div class="w-half">
              <p class="pSeeMore text-gray-2 text-justify" data-show-less="1" data-text="<?= $item->description ?>" data-short-text="<?= Text::truncate($item->description, 10); ?>"><?= Text::truncate($item->description, 10); ?></p>
            </div>
            <button class="cursor-pointer bgBlueButton btnSee">See More</button>
          </div>
        <?php endforeach; ?>
        <div class="w-full text-center">
          <button class="cursor-pointer bgWhiteButton bg-none px-20px py-10px">
            <a href="parents-help.php" class="text-decoration-none">See All Details of How Parents Can Help</a>
          </button>
        </div>
      </section>
    <?php endif; ?>
    <!-- how parents help end -->

    <!-- services -->
    <?php 
      $services_x_3 = $serviceController->searchOrGetAllServices('', 3);
      if(!(count($services_x_3) < 1)) : 
    ?>
      <section class="px-100px mt-40px py-2rem bg-primary-light-blue-25">
        <p class="fs-20px fw-bold">A Introduction of Our Services</p>
        <?php foreach($services_x_3 as $item) : ?>
          <div class="flex justify-start items-center gap-2rem bg-background-color mb-1rem flex-wrap py-15px px-20px rounded-10px shadow">
            <div class="w-20-percent">
              <p class="fs-18px fw-bold"><?= $item->title ?></p>
            </div>
            <div class="w-half">
              <p class="pSeeMore text-gray-2 text-justify" data-show-less="1" data-text="<?= $item->description ?>" data-short-text="<?= Text::truncate($item->description, 10); ?>"><?= Text::truncate($item->description, 10); ?></p>
            </div>
            <button class="cursor-pointer bgBlueButton btnSee">See More</button>
          </div>
        <?php endforeach; ?>
        <div class="w-full text-center">
          <button class="cursor-pointer bgBlueButton px-20px py-10px">
            <a href="service.php" class="text-decoration-none">See All Details of Our Services</a>
          </button>
        </div>
      </section>
    <?php endif; ?>
    <!-- services end -->

    <!-- newsletter -->
    <?php 
      $newsletters_x_3 = $newsLetterController->getAllNewsletters('', 3);
      if(!(count($newsletters_x_3) < 1)) : 
    ?>
      <section class="px-100px mt-40px py-2rem">
        <p class="fs-20px fw-bold">A Introduction of Our Newsletters</p>
        <?php foreach($newsletters_x_3 as $item) : ?>
          <div class="flex justify-start items-center gap-2rem mb-1rem flex-wrap bg-primary-light-blue-25 py-15px px-20px rounded-10px shadow">
            <div class="w-20-percent">
              <img src="<?= "images/" . $item->image ?>" alt="" class="w-100px h-100px rounded-10px">
              <p class="fw-bold"><?= $item->title ?></p>
            </div>
            <div class="w-half">
              <p class="pSeeMore text-gray-2 text-justify" data-show-less="1" data-text="<?= $item->content ?>" data-short-text="<?= Text::truncate($item->content, 10); ?>"><?= Text::truncate($item->content, 10); ?></p>
            </div>
            <button class="cursor-pointer bgBlueButton btnSee">See More</button>
          </div>
        <?php endforeach; ?>
        <div class="w-full text-center">
          <button class="cursor-pointer bgWhiteButton bg-none px-20px py-10px">
            <a href="newsletter.php" class="text-decoration-none">See All Details of Our Newsletters</a>
          </button>
        </div>
      </section>
    <?php endif; ?>
    <!-- newsletter end -->
  </main>

  <?php include_once "layouts/footer.php" ?>
</body>
<script>
  const pSeeMore = document.querySelectorAll(".pSeeMore");
  const btnSee = document.querySelectorAll(".btnSee");
  window.onload = () => {
    btnSee.forEach((item, i) => {
      item.addEventListener("click", () => {
        if(!!Number(pSeeMore[i].dataset.showLess)) {
          pSeeMore[i].innerHTML = pSeeMore[i].dataset.text;
          pSeeMore[i].dataset.showLess = 0;
          item.innerHTML = 'See Less';
        } else {
          pSeeMore[i].innerHTML = pSeeMore[i].dataset.shortText;
          pSeeMore[i].dataset.showLess = 1;
          item.innerHTML = 'See More';
        }
      });
    })
  }
</script>

</html>