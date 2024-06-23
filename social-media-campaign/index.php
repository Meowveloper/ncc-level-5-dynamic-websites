<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Online Safety Campaign</title>
		<link rel="stylesheet" href="./styles/style.css" />
	</head>
	<body>
		<nav>
			<ul>
				<li class="link">
					<a href="./index.php">Home</a>
				</li>
				<li class="link">
					<a href="./b-information.php">Information</a>
				</li>
				<li class="link">
					<a href="./b-legislation.php">Legislation</a>
				</li>
				<li class="link">
					<a href="./login.php">Login</a>
				</li>
			</ul>
			<form action="/search" method="get" class="search-input">
				<input
				type="text"
				id="search"
				name="search"
				placeholder="Search..."
				/>
				<button type="submit">Search</button>
			</form>
		</nav>
		<header>
			<h1>Online Safety Campaign</h1>
			<!-- Custom Cursors and 3D Illustrations can be added here -->
		</header>

		<main>
			<section id="home">
				<h2>Welcome to Our Campaign</h2>
				<form action="/search" method="get">
					<input
						type="text"
						id="search"
						name="search"
						placeholder="Search..."
					/>
					<button type="submit">Search</button>
				</form>
				<p>
					Empowering teenagers to navigate the digital world safely.
				</p>

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

				<!-- Most Popular Social Media Apps -->
				<section class="popular-apps">
					<h3>Most Popular Social Media Apps</h3>
					<ul>
						<li>Instagram</li>
						<li>Facebook</li>
						<li>Twitter</li>
						<li>Snapchat</li>
						<li>TikTok</li>
						<li>WhatsApp</li>
						<!-- Add more social media apps as needed -->
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
		</main>

		<footer>
			<p>You are here: Home</p>
			<div class="footer-content">
				<p>&copy; 2024 Online Safety Campaign</p>
				<!-- Add social media buttons with relevant links -->
				<a href="#" style="color: white">Facebook</a>
				<a href="#" style="color: white; margin-left: 10px">Twitter</a>
				<a href="#" style="color: white; margin-left: 10px"
					>Instagram</a
				>
			</div>
		</footer>
	</body>
</html>
