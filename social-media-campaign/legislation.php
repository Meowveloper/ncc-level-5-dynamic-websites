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
      <section class="legislation-content">
        <h2>Legislation and Guidance</h2>

        <p>
          Stay informed about the legal aspects and best practices when it comes
          to online social media use.
        </p>

        <!-- Information about Legislation and Guidance -->
        <h3>Relevant Legislation</h3>
        <p>
          Understanding the legal framework is crucial. Here are some key pieces
          of legislation related to online safety:
        </p>
        <ul>
          <li>The Online Safety Act</li>
          <li>Data Protection Regulations</li>
          <li>Child Online Privacy Act (COPA)</li>
          <!-- Add more legislation items as needed -->
        </ul>

        <h3>Best Practice Guidance</h3>
        <p>
          Follow these best practices to ensure a safe and responsible online
          experience:
        </p>
        <ul>
          <li>Teach responsible social media use from a young age</li>
          <li>
            Encourage open communication with children about their online
            activities
          </li>
          <li>
            Use privacy settings to control the visibility of personal
            information
          </li>
          <li>Report and block inappropriate content or users</li>
          <!-- Add more best practice guidance items as needed -->
        </ul>
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
