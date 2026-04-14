<?php
    include(__DIR__ . "/php/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <title>Toms3 Anarchy - Leaderboards</title>
</head>
<body class="leaderboards-page">

<header>
  <div class="header-left">
    <img src="hd_logo.png" alt="Logo">
  </div>
  <div class="header-right">
    <nav>
      <a href="index">Home</a>
      <a href="leaderboards" id="selected">Leaderboards</a>
      <a href="vote">Vote&nbsp;us</a>
      <a href="https://x.com/tomsanarchy" target="_blank">Twitter</a>
      <a href="https://discord.gg/toms3" target="_blank">Discord</a>
    </nav>
  </div>
</header>

<main class="content-wrapper">
  <section class="leaderboards-hero">
    <h2 id="stats-title">Leaderboards</h2>
    <p>The most dedicated, and maybe, unfortunate players of Toms3.</p>
  </section>

  <div class="leaderboards-grid">
    <div class="leaderboard-card">
      <div class="card-header">
        <span class="material-icons-outlined">schedule</span>
        <h3>Playtime</h3>
      </div>
      <div class="leaderboard-list" id="top-playtime">
        <?php
            $query = $conn->prepare("SELECT name, playtime, kills, deaths, joindate FROM PlayerData ORDER BY playtime DESC LIMIT 10");
            $query->execute();
            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($fetch as $index => $player) {
                $rank = $index + 1;
                $name = htmlspecialchars($player['name']);
                $playtime = round((($player['playtime'] / 20) / 3600), 2) . 'h';
                $kills = $player['kills'];
                $deaths = $player['deaths'];
                $joindate = date('Y-m-d', (int)$player['joindate'] / 1000);

                echo "
                <div class='players-wrapper'>
                    <div class='entry'>
                        <span class='rank'>#$rank</span>
                        <img src='https://minotar.net/helm/$name/20' alt='$name'>
                        <span class='name'>$name</span>
                        <span class='value'>$playtime</span>
                    </div>
                    
                    <div class='players-popup'>
                        <div class='popup-header'>Player Profile</div>
                        <div class='players-container'>
                            <div class='popup-row profile-header'>
                                <img src='https://minotar.net/helm/$name/24' alt='$name'>
                                <span class='player-name-title'>$name</span>
                            </div>
                            
                            <div class='popup-row'>
                                <span class='label'>Playtime:</span>
                                <span class='val'>$playtime</span>
                            </div>
                            <div class='popup-row'>
                                <span class='label'>Kills:</span>
                                <span class='val'>$kills</span>
                            </div>
                            <div class='popup-row'>
                                <span class='label'>Deaths:</span>
                                <span class='val'>$deaths</span>
                            </div>
                            
                            <div class='popup-row join-row'>
                                <span class='label'>Joined:</span>
                                <span class='val date-val'>$joindate</span>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        ?>
       </div>
    </div>

    <div class="leaderboard-card">
      <div class="card-header">
        <span class="material-icons-outlined">swords</span>
        <h3>Kills</h3>
      </div>
      <div class="leaderboard-list" id="top-kills">
        <?php
            $query = $conn->prepare("SELECT name, playtime, kills, deaths, joindate FROM PlayerData ORDER BY kills DESC LIMIT 10");
            $query->execute();

            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($fetch as $index => $player) {
                $rank = $index + 1;
                $name = htmlspecialchars($player['name']);
                $playtime = round((($player['playtime'] / 20) / 3600), 2) . 'h';
                $kills = $player['kills'];
                $deaths = $player['deaths'];
                $joindate = date('Y-m-d', (int)$player['joindate'] / 1000);
                echo "
                <div class='players-wrapper'>
                    <div class='entry'>
                        <span class='rank'>#$rank</span>
                        <img src='https://minotar.net/helm/$name/20' alt='$name'>
                        <span class='name'>$name</span>
                        <span class='value'>$kills</span>
                    </div>

                    <div class='players-popup'>
                        <div class='popup-header'>Player Profile</div>
                        <div class='players-container'>
                            <div class='popup-row profile-header'>
                                <img src='https://minotar.net/helm/$name/24' alt='$name'>
                                <span class='player-name-title'>$name</span>
                            </div>
                            
                            <div class='popup-row'>
                                <span class='label'>Playtime:</span>
                                <span class='val'>$playtime</span>
                            </div>
                            <div class='popup-row'>
                                <span class='label'>Kills:</span>
                                <span class='val'>$kills</span>
                            </div>
                            <div class='popup-row'>
                                <span class='label'>Deaths:</span>
                                <span class='val'>$deaths</span>
                            </div>
                            
                            <div class='popup-row join-row'>
                                <span class='label'>Joined:</span>
                                <span class='val date-val'>$joindate</span>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        ?>
      </div>
    </div>

    <div class="leaderboard-card">
      <div class="card-header">
        <span class="material-icons-outlined">skull</span>
        <h3>Deaths</h3>
      </div>
      <div class="leaderboard-list" id="top-deaths">
        <?php
            $query = $conn->prepare("SELECT name, playtime, kills, deaths, joindate FROM PlayerData ORDER BY deaths DESC LIMIT 10");
            $query->execute();

            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($fetch as $index => $player) {
                $rank = $index + 1;
                $name = htmlspecialchars($player['name']);
                $playtime = round((($player['playtime'] / 20) / 3600), 2) . 'h';
                $kills = $player['kills'];
                $deaths = $player['deaths'];
                $joindate = date('Y-m-d', (int)$player['joindate'] / 1000);
                echo "
                <div class='players-wrapper'>
                    <div class='entry'>
                        <span class='rank'>#$rank</span>
                        <img src='https://minotar.net/helm/$name/20' alt='$name'>
                        <span class='name'>$name</span>
                        <span class='value'>$deaths</span>
                    </div>

                    <div class='players-popup'>
                        <div class='popup-header'>Player Profile</div>
                        <div class='players-container'>
                            <div class='popup-row profile-header'>
                                <img src='https://minotar.net/helm/$name/24' alt='$name'>
                                <span class='player-name-title'>$name</span>
                            </div>
                            
                            <div class='popup-row'>
                                <span class='label'>Playtime:</span>
                                <span class='val'>$playtime</span>
                            </div>
                            <div class='popup-row'>
                                <span class='label'>Kills:</span>
                                <span class='val'>$kills</span>
                            </div>
                            <div class='popup-row'>
                                <span class='label'>Deaths:</span>
                                <span class='val'>$deaths</span>
                            </div>
                            
                            <div class='popup-row join-row'>
                                <span class='label'>Joined:</span>
                                <span class='val date-val'>$joindate</span>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        ?>
      </div>
    </div>
  </div>

  <div class="info-thanks">
    <p>Leaderboards are permanent, so no actual resets.</p>
    <p>Thank you for playing Toms3 Anarchy!</p>
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