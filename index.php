<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="description" content="Toms3 is a pure anarchy Minecraft server, inspired by 2b2t.org and hisparquia.org. Zero rules, zero admins, zero resets. Just one permanent world, player-driven.">

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta property="og:title" content="Toms3 Anarchy - Minecraft Server">
  <meta property="og:description" content="Toms3 is a pure anarchy Minecraft server, inspired by 2b2t.org and hisparquia.org. Zero rules, zero admins, zero resets. Just one permanent world, player-driven.">
  <meta property="og:image" content="hd_logo.png">
  <meta property="og:url" content="https://www.toms3.cc">
  <meta property="og:type" content="website">

  <meta name="theme-color" content="#60e438">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Toms3 Anarchy - Minecraft Server">
  <meta name="twitter:description" content="Minecraft Anarchy server.">
  <meta name="twitter:image" content="hd_logo.png">

  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="styles.css?version=2" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
  <title>Toms3 Anarchy - Minecraft Server</title>
</head>
<body>

<!--- precarga de los backgrounds para evitar c bug -->
<div style="display: none;">
  <img src="resources/backgrounds/bg1.jpg">
  <img src="resources/backgrounds/bg2.jpg">
  <img src="resources/backgrounds/bg3.jpg">
  <img src="resources/backgrounds/bg4.jpg">
</div>

<header>
  <div class="header-left">
    <img src="hd_logo.png" alt="">
  </div>

  <div class="header-right">
    <nav>
      <a href="#" id="selected">Home</a>
      <a href="leaderboards">Leaderboards</a>
      <a href="vote">Vote&nbsp;us</a>
      <a href="https://x.com/tomsanarchy" target="_blank">Twitter</a>
      <a href="https://discord.gg/toms3" target="_blank">Discord</a>
    </nav>
  </div>
</header>

<div class="hero">
  <div>
    <h2>toms3.cc</h2>
    <h3>Anarchy inspired by 2b2t and Hisparquia</h3>
    <p>
      Toms3 is a pure anarchy server. No rules, no moderation, no resets, no admins. A permanent world controlled only by the players.
    </p>

    <div class="ip"><span id="status">Loading...</span><div class="players-wrapper">
    <span id="jugadores"></span>
    <div id="players-list" class="players-popup">
        <div class="popup-header">Players Online</div>
        <div id="players-container">Loading...</div>
    </div>
    </div> — Currently on 1.21.11<br><span id="days"></span></div>
    <div class="discord"><span id="status-discord">Loading...</span></div>
    <div class="performance"><span id="tps">Loading...</span> TPS — <span id="mspt">Loading...</span> MSPT</div>

    <div class="copy-container">
      <button class="copy-ip-btn" onclick="copyIP('java')">
        <span class="material-icons-outlined">content_copy</span>
        <span id="copy-text">toms3.cc</span>
      </button>
      <p>Click to copy the IP</p>
    </div>
  </div>
</div>

<script>
    const days = document.getElementById('days');
    const ip = "toms3.cc";
    const serverID = "1466280177335013533";

    async function getMCStatus() {
      const statusEl = document.getElementById('status');
      const playersEl = document.getElementById('jugadores');

      try {
          const response = await fetch(`https://mcapi.us/server/status?ip=${ip}`);
          
          if (!response.ok) {
              throw new Error(`Error de red: ${response.status}`);
          }

          const data = await response.json();

          if (data.status === "success" && data.online) {
              statusEl.innerHTML = '<span style="color: #37d45c;">● Online</span> — ';
          } else {
              statusEl.innerHTML = '<span style="color: #d43c37;">● Offline</span>';
              playersEl.innerText = "";
          }

      } catch (error) {
          console.error("Error al obtener el status:", error);
          statusEl.innerHTML = '<span style="color: #d48837;">● Not available</span>';
          playersEl.innerText = " (retrying...)";
          setTimeout(getMCStatus, 10000);
      }
  }

  async function getDiscordStats() {
    try {
      const response = await fetch(`https://discord.com/api/guilds/${serverID}/widget.json`);
      const data = await response.json();

      const totalMembers = data.presence_count;
      const instantInvite = data.instant_invite;
      
      const status = document.getElementById("status-discord");
      status.innerHTML = `${totalMembers} members online on <span style="color: #16b6e7;">Discord</span>`
    } catch (error) {
      console.error("Error al obtener datos:", error);
    }
  }

  function copyIP() {
    const ipText = "toms3.cc";
    const btnText = document.getElementById('copy-text');
    
    navigator.clipboard.writeText(ipText).then(() => {
        const originalText = btnText.innerText;
        btnText.innerText = "Copied";
        
        setTimeout(() => {
            btnText.innerText = originalText;
        }, 1000);
    }).catch(err => {
        console.error('Error al copiar: ', err);
    });
  }

  function daysSinceDate(startDate) {
    const today = new Date();

    const startUTC = Date.UTC(startDate.getFullYear(), startDate.getMonth(), startDate.getDate());
    const todayUTC = Date.UTC(today.getFullYear(), today.getMonth(), today.getDate());

    const ONE_DAY_MS = 1000 * 60 * 60 * 24;
    const daysDifference = Math.floor(Math.abs(todayUTC - startUTC) / ONE_DAY_MS);

    return daysDifference;
  }

  const pastDate = new Date(2026, 1, 3);
  const daysPassed = daysSinceDate(pastDate);

  days.innerHTML = `${daysPassed} days since the server opened`;
  setInterval(getMCStatus, 30000);
  setInterval(getDiscordStats, 30000);
  getMCStatus();
  getDiscordStats();
</script>
<div class="section-start">
  <h2 id="stats-title">Live Server Statistics</h2>

  <div class="server-data">
    <div class="data-block">
      <span class="material-icons-outlined">groups</span>
      <h1>Unique players</h1>
      <p id="unique-players">Loading...</p>
      <small>Total joined users</small>
    </div>
    <div class="data-block">
      <span class="material-icons-outlined">storage</span>
      <h1>World size</h1>
      <p id="world-size">Loading...</p>
      <small>Disk usage</small>
    </div>
    <div class="data-block">
      <span class="material-icons-outlined">history</span>
      <h1>Server Uptime</h1>
      <p id="server-uptime">Loading...</p>
      <small>Time since last reboot</small>
    </div>
  </div>

  <div class="update-info">
    <span class="material-icons-outlined" id="last-update-icon">update</span>
    <p>Last updated: <span id="last-update">Just now</span></p>
  </div>

  <script>
    let lastUpdateTimestamp = null;
    let debug = true;

    function getPlayerCount(){
      fetch('php/getPlayerCount.php')
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.warn(data.error);
                return;
            }
            if (debug) {
                console.log("Player count data received:", data);
            }

            if (data.player_count != 1) {
              document.getElementById('jugadores').innerHTML = `${data.player_count} players connected`;
            }
            else{
              document.getElementById('jugadores').innerHTML = `${data.player_count} player connected`;
            }
        })
        .catch(error => console.error('Error al obtener jugadores:', error));
    }

    function getPlayers() {
        const container = document.getElementById('players-container');
        const BEDROCK_SKIN_FALLBACK = 'https://minotar.net/helm/Bedrock/20'; 
        
        fetch('php/getPlayers.php')
            .then(response => response.json())
            .then(data => {
                if (data.error || !Array.isArray(data)) {
                    container.innerHTML = '<div class="player-entry">No players online</div>';
                    return;
                }
        
                if (data.length === 0) {
                    container.innerHTML = '<div class="player-entry">No players online</div>';
                } else {
                    container.innerHTML = data.map(player => {
                        const isBedrock = player.name.startsWith('.');
                        const skinUrl = isBedrock 
                            ? BEDROCK_SKIN_FALLBACK 
                            : `https://minotar.net/helm/${player.name}/20`;
        
                        return `
                            <div class="player-entry" style="justify-content: space-between;">
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <img src="${skinUrl}" alt="${player.name}">
                                    <span>${player.name}</span>
                                </div>
                                <span style="color: var(--muted); margin-left: 15px;">${player.ping}ms</span>
                            </div>
                        `;
                    }).join('');
                }
            })
            .catch(error => {
                console.error('Error al obtener jugadores:', error);
                container.innerHTML = '<div class="player-entry" style="color: #d43c37;">No players online</div>';
            });
    }

    function refreshData() {
      fetch('php/getData.php')
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.warn(data.error);
                return;
            }
            if (debug) {
                console.log("Data received:", data);
            }
            document.getElementById('unique-players').textContent = data.unique_joins;
            document.getElementById('world-size').textContent = data.world_size + "GB";
            document.getElementById('server-uptime').textContent = data.uptime;

            let tps = parseFloat(data.tps);
            if (tps >= 16) {
                if (tps > 20.0){

                  document.getElementById('tps').innerHTML = `<span style="color: #37d45c;">20.0*</span>`;
                }
                else{
                  document.getElementById('tps').innerHTML = `<span style="color: #37d45c;">${tps}</span>`;
                }
            } else if (tps >= 13) {
                document.getElementById('tps').innerHTML = `<span style="color: #e7c416;">${tps}</span>`;
            } else {
                document.getElementById('tps').innerHTML = `<span style="color: #d43c37;">${tps}</span>`;
            }

            let mspt = parseFloat(data.mspt);
            if (mspt <= 40) {
                document.getElementById('mspt').innerHTML = `<span style="color: #37d45c;">${mspt}</span>`;
            } else if (mspt <= 80) {
                document.getElementById('mspt').innerHTML = `<span style="color: #e7c416;">${mspt}</span>`;
            } else {
                document.getElementById('mspt').innerHTML = `<span style="color: #d43c37;">${mspt}</span>`;
            }
            const display = document.getElementById('last-update-icon');
            display.classList.remove('update-animation');
            void display.offsetWidth;
            display.classList.add('update-animation');
            lastUpdateTimestamp = new Date();
            updateTimeAgo();
        })
        .catch(error => console.error('Error al obtener JSON:', error));
    }

    function updateTimeAgo() {
        const display = document.getElementById('last-update');
        if (!lastUpdateTimestamp) return;

        const now = new Date();
        const seconds = Math.floor(Math.max(0, now - lastUpdateTimestamp) / 1000);

        if (seconds < 4) {
            display.textContent = "Just now";
        } else if (seconds < 60) {
            display.textContent = `${seconds} seconds ago`;
        } else {
            const minutes = Math.floor(seconds / 60);
            display.textContent = `${minutes} ${minutes === 1 ? 'minute' : 'minutes'} ago`;
        }
    }

    setInterval(refreshData, 30000);
    setInterval(getPlayers, 30000);
    setInterval(getPlayerCount, 30000);
    setInterval(updateTimeAgo, 1000);
    refreshData();
    getPlayers();
    getPlayerCount();
  </script>
</div>
<section class="renders">
  <h3>Renders</h3>
  <div class="gallery">
    <div class="gallery-img">
        <img src="renders/render2.png" alt="Render 2">
        <p id="subtitle">Isometric spawn 1000x1000 <b>(03/08)</b></p>
    </div>
    <div class="gallery-img">
        <img src="renders/render1.png" alt="Render 1">
        <p id="subtitle">Spawn 1000x1000 <b>(04/11)</b></p>
    </div>
  </div>
</section>
<section id="about">
  <h3>What is Toms3?</h3>
  <p>
    Toms3 is a Minecraft anarchy server, inspired by servers like 2b2t and Hisparquia.
    <br>
    We have existed since 2020 as a Hispanic server, and in the past, we managed to build a small but active community for nearly a entire year. 
    <br><br>
    And now, we are doing it again from scratch, with a new world, new momentum, a larger budget, and more experience, trying to reach for a larger, more global scale.
    <br><br>
    The server remains faithful to what we call the "classic anarchy model", which is a server with no rules, no weird commands like /tpa or /home, no chat filters, no shadowbans, no resets, and zero admin intervention.
    <br><br>
    Everything is allowed, including griefing, the use of hacks, exploits, dupes, bypasses, etc. Toms3 does not penalize any of it. The server is an open world where players can do whatever they want, with no exceptions.
    <br><br>
  </p>
</section>
<section id="modifications">
  <h3>Modifications</h3>
  <p>
    Toms3 tries to be as vanilla as possible, but that's just not realistic at all with all the Minecraft exploits out there. To prevent crashes and possible instability, we have these specific modifications:
    <br><br>
    <b>Anticheat</b>
    <br>
    Players are allowed to use cheats and all sort of modifications. However, certain movement exploits and specific cheats are limited.
    Macekill is also patched.
    <br><br>
    <b>Chat</b>
    <br>
    Chat is uncensored and allows players to ignore other players when needed.
    <br>
    The default "Kicked for spamming" kick is enabled to prevent excessive spam.
    <br>
    Greentext is also enabled.
    <br><br>
    <b>Monsters</b>
    <br>
    Monster spawns are nerfed by a ~15%. This is generally unnoticeable.
    <br>
    Spawns are also per player, so this means that there is no mob-cap limit.
    <br><br>
    <b>Nether roof</b>
    <br>
    Nether roof is disabled and will teleport any player seven blocks below.
    <br><br>
    <b>Void areas</b>
    <br>
    Overworld void area is untouched.
    <br>
    Nether void area will teleport any player seven blocks up if the server detects the player is using an elytra.
    <br><br>
    <b>Render distance</b>
    <br>
    Render distance is limited to 14 chunks.
    <br><br>
    <b>Blocks per chunk</b>
    <br>
    Blocks that cause tons of lag in large quantities are limited per chunk.
    <br>
    Tile entities are limited to 250 per chunk.
    <br><br>
    <b>Phantoms</b>
    <br>
    Phantoms are disabled.
    <br><br>
    <b>Locator bar</b>
    <br>
    Locator bar is disabled.
    <br><br>
    <b>Ender pearls</b>
    <br>
    Ender pearls do not vanish when the player dies.
    <br><br>
    <b>Redstone</b>
    <br>
    Redstone mechanisms are limited to prevent lag machines.
    <br>
    This may change in the future.
    <br><br>
    <b>Other commands</b>
    <br>
    Only /kill and /suicide are enabled.
    <br>
    We also have other commands like /stats, /joindate, /playtime and so on.
    <br>
    Please refer to the /help command to know more.
  </p>
</section>
<section id="join">
  <h3>How to join</h3>
  <div class="info">
    <strong class="floating-ip">
        <span>t</span><span>o</span><span>m</span><span>s</span><span>3</span><span>.</span><span>c</span><span>c</span>
    </strong>
    <strong class="floating-ip-small">
        <span>b</span><span>e</span><span>d</span><span>r</span><span>o</span><span>c</span><span>k</span><span>.</span><span>t</span><span>o</span><span>m</span><span>s</span><span>3</span><span>.</span><span>c</span><span>c</span>
    </strong>
    <strong class="version-text">1.16.5 — 26.1</strong>
  </div>
</section>

<section id="owners">
  <h3>Owners</h3>
  <div class="owners">
    <div class="owners-block">
      <img src="resources/pfps/cherryh4ck.jpg" alt="">
      <h2>Cherryh4ck</h2>
      <p><strong>"</strong>i hate you all<strong>"</strong></p>
    </div> 
    <div class="owners-block">
      <img src="resources/pfps/kurau.jpg" alt="">
      <h2>Kurau</h2>
      <p><strong>"</strong>Don't do drugs kids<strong>"</strong></p>
    </div>
    <div class="owners-block">
      <img src="resources/pfps/santydork.jpg" alt="">
      <h2>santydork</h2>
      <p><strong>"</strong>supreme larper<strong>"</strong></p>
    </div>
  </div>
</section>

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
