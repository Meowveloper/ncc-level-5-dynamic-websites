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
	<link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
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
					Welcome to Social Media Campaign, your ultimate guide to navigating the digital world with confidence and security! Whether you're a tech-savvy teen or a concerned parent, we're here to equip you with the tools and knowledge needed to stay safe and savvy online. Dive into our rich resources, interactive guides, and expert tips designed to protect your privacy, combat cyberbullying, and foster responsible digital citizenship. Join our community and embark on a journey towards a safer, smarter online experience!
				</p>
				<div>
					<button class="bgBlueButton w-151px h-44px cursor-pointer">
						<a class="text-decoration-none cursor-pointer" href="login.php">Let's Get Started</a>
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

		<section class="p-20px">
			<div class="w-full fs-20px fw-bold mb-50px text-center">
				How Social Media Affects the Teens' Brains
			</div>
			<div class="w-full flex flex-wrap px-100px justify-center items-center gap-5rem mb-50px">
				<img src="assets/teen_brain_and_social_media_1.jpg" class="w-500px h-450px shadow rounded-10px" alt="">
				<div class="w-500px text-justify">
					Social media can significantly impact the teenage brain by triggering the release of dopamine, a neurotransmitter associated with pleasure and reward. The instant gratification from likes, comments, and shares can create a sense of validation and boost self-esteem. However, this can also lead to addictive behaviors, as teens may seek constant engagement to maintain that pleasurable feeling. The brain's reward system becomes highly active, reinforcing the desire for social media interactions and making it difficult for teens to disengage from their devices.
				</div>
			</div>
			<div class="w-full flex flex-wrap px-100px justify-center items-center gap-5rem">
				<div class="w-500px text-justify">
					Excessive social media use can affect mental health by increasing feelings of anxiety, depression, and loneliness. The constant comparison to peers and exposure to idealized images can create unrealistic expectations and body image issues. Teens may also experience cyberbullying, which can lead to significant emotional distress. The prefrontal cortex, responsible for decision-making and impulse control, is still developing in teenagers, making them more susceptible to these negative effects and less able to regulate their social media usage effectively.
				</div>
				<img src="assets/teen-brain-and-social-media_2.jpg" class="w-500px h-450px shadow rounded-10px" alt="">
			</div>
		</section>
	</main>

	<?php include_once("layouts/footer.php"); ?>
</body>

</html>