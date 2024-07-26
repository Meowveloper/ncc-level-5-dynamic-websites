<!DOCTYPE html>
<?php
$currentPage = "guest_home";
$pageType = 0;
require_once("Controller/SocialMediaAppController.php");

use Controller\SocialMediaAppController;

$socialMediaAppController = new SocialMediaAppController();
$socialMediaApps = $socialMediaAppController->getAllSocialMediaApps();
?>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Online Safety Campaign</title>
	<link rel="stylesheet" href="./styles/style.css" />
	<link rel="stylesheet" href="./styles/guest/index.css">
</head>

<body>
	<?php include_once("layouts/nav.php"); ?>
	<header>
		<h1>Online Safety Campaign</h1>
	</header>

	<main>
		<div class="flex justify-center items-center flex-wrap px-100px py-40px gap-20rem">
			<div class="w-500px">
				<h2>Welcome to Our Social Media Campaign</h2>
				<p class="text-justify">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas tempora a libero hic veritatis incidunt, ipsa eveniet consequatur iste harum nihil dicta, delectus error excepturi deleniti, voluptatibus esse placeat aperiam odit eaque! Saepe laborum accusantium, beatae ipsum consequatur excepturi quod at officia, amet expedita suscipit voluptatum, illo minima? Ut unde asperiores fugiat cupiditate harum qui hic, aspernatur quis nisi non dolorem repellat maxime quia delectus, beatae blanditiis ad, magni eum obcaecati suscipit modi laudantium pariatur sed. Consequuntur quia ex ipsam tempora odit cupiditate tenetur repellat natus omnis nihil laudantium, ullam aliquam dolor. A enim pariatur, blanditiis impedit vel dolorem delectus.
				</p>
				<div>
					<button class="bgBlueButton w-151px h-44px cursor-pointer">
						<a class="text-decoration-none" href="login.php">Let's Get Started</a>
					</button>
				</div>
			</div>
			<img src="assets/welcome_image_1.jpg" alt="" width="400px">
		</div>
		<section id="guest_home">
			<div class="px-70px">
				<p class="welcomeText fs-20px fw-bold text-center">
					Empowering teenagers to navigate the digital world safely.
				</p>
			</div>

			<section class="flex justify-center flex-wrap items-stretch gap-2rem">
				<!-- Web Service 1 -->
				<div class="bg-primary-light-blue-25-opa30 flex column justify-between items-center shadow rounded-10px overflow-hidden">
					<img src="assets/work-shops.webp" alt="" class="w-500px h-250px">
					<div class="p-20px w-500px">
						<h3>Online Safety Workshops</h3>
						<p>
							Join our interactive workshops to learn about online
							safety and responsible social media use.
						</p>
						<p><strong>Date:</strong> November 15, 2024</p>
						<p><strong>Location:</strong> Virtual Event</p>
						<a href="#">Register Now</a>
					</div>
					
				</div>

				<!-- Web Service 2 -->
				<div class="bg-primary-light-blue-25-opa30 flex column justify-between items-center shadow rounded-10px overflow-hidden">
					<img src="assets/annonymous-helpline.png" alt="" class="w-500px h-250px">
					<div class="p-20px w-500px">
						<h3>Anonymous Helpline</h3>
						<p>
							Need assistance or advice? Connect with our anonymous
							helpline for support regarding online challenges.
						</p>
						<p><strong>Helpline:</strong> 1-800-123-4567</p>
						<p><strong>Email:</strong> help@onlinesafety.org</p>
					</div>
				</div>
			</section>

			<section class="bg-primary-light-blue-25-opa30 mt-40px py-40px gap-2rem flex px-70px justify-center items-stretch flex-wrap">
				<!-- Most Popular Social Media Apps -->
				<div class="bg-background-color w-350px shadow rounded-10px py-40px px-2rem">
					<div class="socialMediaAppsAnimation"></div>
					<h3>Most Popular Social Media Apps</h3>
					<ul>
						<?php foreach ($socialMediaApps as $item) : ?>
							<li><?= $item->name ?></li>
						<?php endforeach; ?>
					</ul>
				</div>

				<!-- How to Stay Safe Online -->
				<div class="bg-background-color w-350px shadow rounded-10px py-40px px-2rem">
					<div class="howToStaySafeOnlineAnimation"></div>
					<h3>How to Stay Safe Online</h3>
					<p>
						Follow these tips to ensure a secure online experience:
					</p>
					<ul>
						<li>Set strong, unique passwords</li>
						<li>Enable two-factor authentication</li>
						<li>Be cautious about sharing personal information</li>
						<li>Regularly update privacy settings</li>
						<li>Use antivirus software</li>
						<li>Verify the authenticity of online information</li>
					</ul>
				</div>
			</section>
		</section>
	</main>

	<?php include_once("layouts/footer.php"); ?>
</body>

</html>