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
</head>

<body>
	<?php include_once("layouts/nav.php"); ?>
	<header>
		<h1>Online Safety Campaign</h1>
	</header>

	<main>
		<section id="guest_home">
			<div class="px-70px">
				<h2>Welcome to Our Campaign</h2>
				<form class="searchForm" action="#" method="get">
					<input type="text" id="search" name="search" placeholder="Search..." />
					<button type="submit" class="bgBlueButton">Search</button>
				</form>
				<p class="welcomeText">
					Empowering teenagers to navigate the digital world safely.
				</p>
			</div>

			<section class="webServiceContainer">
				<!-- Web Service 1 -->
				<div class="web-service">
					<h3>Online Safety Workshops</h3>
					<p>
						Join our interactive workshops to learn about online
						safety and responsible social media use.
					</p>
					<p><strong>Date:</strong> November 15, 2024</p>
					<p><strong>Location:</strong> Virtual Event</p>
					<a href="#">Register Now</a>
				</div>

				<!-- Web Service 2 -->
				<div class="web-service">
					<h3>Anonymous Helpline</h3>
					<p>
						Need assistance or advice? Connect with our anonymous
						helpline for support regarding online challenges.
					</p>
					<p><strong>Helpline:</strong> 1-800-123-4567</p>
					<p><strong>Email:</strong> help@onlinesafety.org</p>
				</div>
			</section>

			<section class="webServiceContainer webServiceContainer2">
				<!-- Most Popular Social Media Apps -->
				<section class="popular-apps">
					<h3>Most Popular Social Media Apps</h3>
					<ul>
						<?php foreach ($socialMediaApps as $item) : ?>
							<li><?= $item->name ?></li>
						<?php endforeach; ?>
					</ul>
				</section>

				<!-- How to Stay Safe Online -->
				<section class="stay-safe-online">
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
				</section>
			</section>
		</section>
	</main>

	<?php include_once("layouts/footer.php"); ?>
</body>
</html>

