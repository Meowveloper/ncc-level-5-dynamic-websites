<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Safety Campaign</title>
    <link rel="stylesheet" href="./styles/style.css">
  </head>
  <body>
  <nav>
      <ul>
        <li class="link"><a href="home.php">Home</a></li>
        <li class="link"><a href="information.php">Information</a></li>
        <li>
          Campaigns
          <ul>
            <li class="link">
              <a href="popular-apps.php">Popular Apps</a>
            </li>
            <li class="link">
              <a href="parents-help.php">Parents Help</a>
            </li>
            <li class="link">
              <a href="livestreaming.php">Livestreaming</a>
            </li>
          </ul>
        </li>

        <li class="link"><a href="contact.php">Contact</a></li>
        <li class="link"><a href="legislation.php">Legislation</a></li>
      </ul>
      <form action="/search" method="get" class="search-input">
        <input type="text" id="search" name="search" placeholder="Search..." />
        <button type="submit">Search</button>
      </form>
    </nav>
    <header>
      <h1>Online Safety Campaign</h1>
      <!-- Custom Cursors and 3D Illustrations can be added here -->
    </header>

    <main>
      <section id="contact">
        <h2>Contact Us</h2>
        <p>
          Feel free to reach out to us using the contact form below. We
          appreciate your feedback and inquiries.
        </p>

        <!-- Contact Form -->
        <form action="./controllers/member/store.php" method="post">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required />

          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required />

          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required></input>  

          <button type="submit">Register</button>
        </form>

        <!-- Privacy Policy Link -->
        <p>
          Before sending a message, please review our
          <a href="privacy-policy.html" target="_blank">Privacy Policy</a>.
        </p>
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
