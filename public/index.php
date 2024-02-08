<!-- BIRDRIBS -->
<!-- THE REST ARE IRRELEVANT, CUNT -->
<?php


function getNextEvent()
{
  $futureEvents = array_filter(EVENTS, static function (array $event) {
    return date_diff(
      new DateTime(),
      date_create_immutable_from_format('d-m-Y', $event['date'])
    )->format('%R') === '+';
  });

  if (count($futureEvents) === 0) {
    return;
  }

  return array_shift($futureEvents);
}

$nextEvent = getNextEvent();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>birdribs - get fucked</title>
  <meta name="description" content="bright, energetic 3 piece ready to fuck your day up" />
  <link rel="preconnect" href="https://kit.fontawesome.com" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Dokdo&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="/css/main.css" />

  <!-- favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png" />
  <link rel="manifest" href="/favicon/site.webmanifest" />
  <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#605d58" />
  <link rel="shortcut icon" href="/favicon/favicon.ico" />
  <meta name="apple-mobile-web-app-title" content="BIRDRIBS" />
  <meta name="application-name" content="BIRDRIBS" />
  <meta name="msapplication-TileColor" content="#605d58" />
  <meta name="msapplication-TileImage" content="/favicon/mstile-144x144.png" />
  <meta name="msapplication-config" content="/favicon/browserconfig.xml" />
  <meta name="theme-color" content="#605d58" />
</head>

<body>
  <main>
    <div class="hero">
      <!-- <h1>birdribs</h1> -->
      <img src="/img/logo.png" alt="birdribs">
      <div class="top">
        <a href="https://epk.birdribs.uk" class="epk-button" target="_blank" rel="noreferrer"><i
            class="fa-solid fa-arrow-up-right-from-square"></i>
          EPK</a>
      </div>
      <div class="bottom" id="bottomMount">
        <div class="links">
          <a class="bandcamp" href="https://birdribs.bandcamp.com/" target="_blank" rel="noopener noreferrer"
            aria-label="bandcamp">
            <i class="fa-brands fa-bandcamp"></i>
          </a>

          <a class="spotify" href="https://open.spotify.com/artist/2n1IIctLetLRqR28XNSVfz" target="_blank"
            rel="noopener noreferrer" aria-label="spotify">
            <i class="fa-brands fa-spotify"></i>
          </a>

          <a class="instagram" href="https://www.instagram.com/birdribsband/" target="_blank" rel="noopener noreferrer"
            aria-label="instagram">
            <i class="fa-brands fa-instagram"></i>
          </a>

          <a class="soundcloud" href="https://soundcloud.com/birdribs" target="_blank" rel="noopener noreferrer"
            aria-label="soundcloud">
            <i class="fa-brands fa-soundcloud"></i>
          </a>

          <a class="threads" href="https://www.threads.net/@birdribsband" target="_blank" rel="noopener noreferrer"
            aria-label="threads">
            <i class="fa-brands fa-threads"></i>
          </a>

          <a class="email" href="mailto:birdribsband@gmail.com" target="_blank" rel="noopener noreferrer"
            aria-label="email">
            <i class="fa-solid fa-envelope"></i>
          </a>
        </div>
        <?php if ($nextEvent): ?>
          <div id="notice">
            <a class="closeButton" href="javascript:close()" aria-label="close notice button"><i
                class="fa-solid fa-circle-xmark"></i></a>
            <div class="content">
              <a href="<?php echo ($nextEvent['link']); ?>" target="_blank" rel="noreferrer noopener">
                <?php echo ($nextEvent['label']); ?>
              </a>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </main>
  <footer>
    <div class="copyright">
      <a href="https://lloydculpepper.uk" rel="noopener noreferrer">© 2023 opvl</a>
    </div>
  </footer>
  <script>
    function close() {
      var x = document.getElementById("notice");
      x.style.display = "none";
    }
  </script>
  <script src="https://kit.fontawesome.com/d83d45983d.js" crossorigin="anonymous"></script>
</body>

</html>