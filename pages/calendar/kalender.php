<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W+F Münster | Terminkalender</title>
    <link rel="icon" type="image/jpg" href="../../assets/img/logo.jpg">
    <link rel="stylesheet" href="../../assets/css/kalender.css">
    <script src="../../assets/js/script1.js"></script>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="../../assets/img/logo.jpg" alt="Vereinslogo">
                <h1>Wasser + Freizeit Münster</h1>
            </div>
            <ul class="nav-links">
                <li><a href="../../home.php">Startseite</a></li>
                <li><a href="../../pages/calendar/kalender.php">Termine</a></li>
                <li><a href="../../pages/forms/weiterleitungsseite.php">Anmelden</a></li>
                <li><a href="../../pages/overview/unseretrainer.php">Unsere Trainer</a></li>
                <li><a href="../../pages/map/karte.html">Unser Schwimmbad</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="events">
            <h2>Termine</h2>
            <div class="event-calendar">
                <div class="month">
                    <span class="prev">&#10094;</span> <!--Uni-Code-Zeichen für die Pfeile (Gibts im Internet -> https://graphemica.com/%E2%9D%AE)-->
                    <span class="next">&#10095;</span> <!--Uni-Code-Zeichen für die Pfeile (Gibts im Internet -> https://graphemica.com/%E2%9D%AF)-->
                    <h2 id="month"></h2>
                </div>
                <ul class="weekdays">
                    <li>Mo</li>
                    <li>Di</li>
                    <li>Mi</li>
                    <li>Do</li>
                    <li>Fr</li>
                    <li>Sa</li>
                    <li>So</li>
                </ul>
                <ul class="days" id="days"></ul>
            </div>
            <div id="event-list"></div>
        </section>
    </main>
    <footer>
        <div class="footer-content">
            <p>&copy; Valentin Horstmann</p>
            <ul class="social-links">
                <li><a href="https://www.facebook.com/"><img src="../../assets/img/facebook.png" alt="Facebook"></a></li>
                <li><a href="https://www.twitter.com/"><img src="../../assets/img/twitter.png" alt="Twitter"></a></li>
                <li><a href="https://www.instagram.com/"><img src="../../assets/img/instagram.png" alt="Instagram"></a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
