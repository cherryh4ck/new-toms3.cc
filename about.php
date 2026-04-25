<?php
    include("php/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="leaderboards.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  <meta property="og:title" content="Toms3 Anarchy - Contact & Info">
  <meta property="og:description" content="Get to know more about the server.">
  <meta property="og:image" content="hd_logo.png">
  <meta property="og:url" content="https://www.toms3.cc">
  <meta property="og:type" content="website">

  <meta name="theme-color" content="#60e438">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Toms3 Anarchy - Minecraft Server">
  <meta name="twitter:description" content="Minecraft Anarchy server.">
  <meta name="twitter:image" content="hd_logo.png">
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <title>Toms3 Anarchy - About</title>
</head>
<body class="leaderboards-page">

<header>
  <div class="header-left">
    <img src="hd_logo.png" alt="Logo">
  </div>
  <div class="header-right">
    <nav>
      <nav>
      <a href="index">Home</a>
      <a href="leaderboards">Leaderboards</a>
      <a href="chat">Chat</a>
      <a href="#" id="selected">Contact & Info</a>
      <a href="vote">Vote</a>
    </nav>
    </nav>
  </div>
</header>

<main class="content-wrapper">
  <section class="leaderboards-hero">
    <h2 id="stats-title">Contact & Info</h2>
    <p>Get in touch or learn more about Toms3.</p>
  </section>

  <div class="leaderboards-grid">
    <div class="leaderboard-card">
      <div class="card-header">
        <span class="material-icons-outlined">alternate_email</span>
        <h3>Contact</h3>
      </div>
      <div class="leaderboard-list">
        <p class="card-description">
          If you need to reach out for whatever reason, please use these:
        </p>
        
        <div class="entry">
            <span class="material-icons-outlined contact-icon">mail</span>
            <span class="name"><a href="mailto:cherry@toms3.cc" style="letter-spacing: 1px; padding-left: 5px;">cherry@toms3.cc</a></span>
        </div>

        <div class="entry">
            <span class="material-icons-outlined contact-icon">forum</span>
            <span class="name"><a href="https://discord.gg/toms3" target="_blank" style="letter-spacing: 1px; padding-left: 5px;">discord.gg/toms3</a></span>
        </div>

        <div class="about-box donation-box">
            <p class="box-text">
                <span class="material-icons-outlined info-icon">block</span>
                We currently do not accept donations, but in the future we might.
            </p>
        </div>
      </div>
    </div>

    <div class="leaderboard-card">
      <div class="card-header">
        <span class="material-icons-outlined">code</span>
        <h3>Info</h3>
      </div>
      <div class="leaderboard-list">
        <p class="card-text-main">
            We have created a few custom plugins for the server, including a "core" plugin which contains unique features and fixes. Those plugins are open source and can be found on <strong>Cherryh4ck's GitHub</strong>.
            <br><br>
            Plugins are still on development and are not yet fully optimized, feel free to collaborate if you want to help out.
        </p>
        <a href="https://github.com/stars/cherryh4ck/lists/toms3" target="_blank" class="about-box github-link-box">
            <span class="material-icons-outlined contact-icon">terminal</span>
            Browse GitHub Repos
        </a>
      </div>
    </div>
  </div>
</main>

<footer>
  <div class="footer-content">
    <p class="copyright">© 2026 Toms3</p>
    <div class="credits">
      <span>Designed by <strong>Kurau</strong></span>
      <span class="separator">|</span>
      <span>Server owned by <strong>Cherryh4ck</strong>, <strong>Kurau</strong> & <strong>Santydork</strong></span>
    </div>
  </div>
</footer>

</body>
</html>