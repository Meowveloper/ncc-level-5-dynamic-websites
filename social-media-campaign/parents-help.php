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
      <section id="parents-help">
        <h2>How Parents Can Help</h2>
        <p>
          Discover top tips for parents to support healthy teen use of social
          media.
        </p>
        <!-- Add content with tips for parents -->
        <ul>
          <li>Stay involved and communicate openly with your teenager.</li>
          <li>
            Set boundaries and establish clear rules for social media use.
          </li>
          <li>
            Teach the importance of privacy settings and online etiquette.
          </li>
          <li>
            Monitor your teen's online activities without invading their
            privacy.
          </li>
          <li>
            Encourage a healthy balance between online and offline activities.
          </li>
        </ul>
        <!-- Add more tips or content as needed -->
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
