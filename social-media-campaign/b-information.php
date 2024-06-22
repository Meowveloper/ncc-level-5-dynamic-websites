<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Safety Campaign</title>
    <style>
      * {
        cursor: url(https://cdn.custom-cursor.com/db/9387/32/among-us-minion-pointer.png),
          auto;
      }
      body {
        font-family: "Arial", sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f2f2f2;
      }

      header {
        text-align: center;
        padding: 10px;
      }

      nav {
        box-sizing: border-box;
        width: 100%;
        display: flex;
        justify-content: space-between;
        background-color: #333;
        align-items: center;
        padding: 10px;
      }
      nav ul {
        list-style: none;
        padding: 16px;
        margin: 0;
        flex: 1;
      }
      nav li,
      nav li a {
        opacity: 0.8;
        color: #ffffff;
        transition: 200ms;
        text-decoration: none;
        white-space: nowrap;
        font-weight: 700;
      }
      nav li:hover {
        opacity: 1;
      }
      nav li a {
        display: flex;
        align-items: center;
        height: 100%;
        width: 100%;
      }
      nav li {
        padding-right: 36px;
      }
      nav li::before {
        content: "";
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid #ffa500;
        position: absolute;
        right: 8px;
        top: 50%;
        transform: translateY(-50%);
      }
      nav .link::before {
        padding-right: 0;
        display: none;
      }
      nav > ul {
        display: flex;
        height: var(--menu-height);
        align-items: center;
        background-color: #333;
      }
      nav > ul li {
        position: relative;
        margin: 0 8px;
      }
      nav > ul li ul {
        visibility: hidden;
        opacity: 0;
        padding: 0;
        min-width: 160px;
        background-color: #333;
        position: absolute;
        top: calc(var(--menu-height) + 5px);
        left: 50%;
        transform: translateX(-50%);
        transition: 200ms;
        transition-delay: 200ms;
        z-index: 100;
      }
      nav > ul li ul li {
        margin: 0;
        padding: 8px 16px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        height: 30px;
        padding-right: 40px;
      }
      nav > ul li ul li::before {
        width: 0;
        height: 0;
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent;
        border-left: 5px solid #ffa500;
      }
      nav > ul li ul li ul {
        top: -2%;
        left: 100%;
        transform: translate(0);
      }
      nav > ul li ul li:hover {
        background-color: #000000;
      }
      nav > ul li:hover > ul {
        opacity: 1;
        visibility: visible;
        transition-delay: 0ms;
      }

      nav > .search-input {
        padding-right: 10px;
      }

      nav > .search-input > input {
        padding: 8px 16px;
      }

      nav > .search-input > button {
        padding: 8px 16px;
      }

      main {
        padding: 20px;
       min-height: 56.8dvh;
      }

      .web-service {
        margin-top: 20px;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      .popular-apps,
      .stay-safe-online {
        margin-top: 20px;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 10px;
        /* position: fixed; */
        bottom: 0;
        /* width: 100%;
        display: flex;
        flex-direction: column; */
      }

      .footer-content {
        flex: 1;
      }

      /* Add additional styles for specific elements as needed */

      /* Responsive Styles */
      @media only screen and (max-width: 600px) {
        nav > ul {
          flex-direction: column;
        }
        nav > ul > li {
          padding: 10px;
        }
        nav {
          flex-direction: column;
        }
      }
    </style>
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
      <section id="information">
        <h2>Information</h2>
        <p>
          Welcome to the Information page of the Online Safety Campaign. Here,
          we provide details about our social media campaigns and their aims and
          vision to keep teenagers safe online.
        </p>
        <h3>Social Media Campaigns</h3>
        <p>
          Our campaigns focus on empowering teenagers to navigate the digital
          world safely. We aim to create awareness about online risks and
          promote responsible use of social media platforms.
        </p>
        <h3>Aims and Vision</h3>
        <p>
          Our primary aim is to foster a secure online environment for
          teenagers, promoting positive interactions and preventing
          cyberbullying. We envision a future where young individuals can
          explore the digital space without compromising their safety and
          well-being.
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
