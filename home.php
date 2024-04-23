<?php
session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wasser + Freizeit Münster</title>
    <link rel="icon" type="image/jpg" href="assets/img/logo.jpg">
    <link rel="stylesheet" href="assets/css/startseite.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<header>
    <nav class="navbar">
        <div class="logo">
            <a href="home.php">
                <img src="assets/img/logo.jpg" alt="Vereinslogo">
            </a>
            <h1>Wasser + Freizeit Münster</h1>
        </div>
        <ul class="nav-links" id="menu-links">
<?php
// Überprüft, ob der Benutzer eingeloggt ist und zeigt die entsprechenden Links an
if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'Admin') {
        // Admin-spezifische Navigationslinks
        echo '<li><a href="pages/admin/mitglieder_table.php">Mitglieder-DB</a></li>';
        echo '<li><a href="pages/admin/trainer_table.php">Trainer-DB</a></li>';
        echo '<li><a href="pages/admin/search/mitglied_suchen.html">Suchen</a></li>';
        echo '<li class="auth-link"><a href="pages/logout/logout_confirm.html">Abmelden</a></li>';
    } elseif ($_SESSION['role'] == 'Trainer') {
        // Trainer-spezifische Navigationslinks
        echo '<li><a href="pages/trainer-sites/anwesenheitscheck.html">Anwesenheitscheck</a></li>';
        echo '<li><a href="pages/trainer-sites/trainer-kursübersichten.html">Kursübersichten/Anforderungen</a></li>';
        echo '<li class="auth-link"><a href="pages/logout/logout_confirm.html">Abmelden</a></li>';
    }
} else {
    // Standard-Navigationslinks für nicht eingeloggte Benutzer
    echo '<li><a href="#termine">Veranstaltungen</a></li>';
    echo '<li><a href="pages/forms/kids_registration/anmeldenkinder.php">Kind anmelden</a></li>';
    echo '<li><a href="pages/overview/unseretrainer.php">Unsere Trainer</a></li>';
    echo '<li><a href="pages/map/karte.html">Unser Schwimmbad</a></li>';
    echo '<li><a href="pages/forms/kids_registration/kursübersicht.html">Unsere Schwimmkurse</a></li>';
    echo '<li class="auth-link"><a href="pages/forms/login/login.php">Login</a></li>';
}
?>

        </ul>
    </nav>
</header>
<main>
    <section class="hero">
        <div class="background-image">
            <img src="assets/img/main.jpg" alt="Hintergrundbild">
        </div>
        <div class="content">
            <h1>Willkommen auf der Webseite von Wasser und Freizeit Münster</h1>
            <p>Gemeinsam schwimmen, Spaß haben und die Freizeit im Wasser genießen.</p>
            <a href="pages/forms/weiterleitungsseite.php" class="cta-button">Jetzt Mitglied werden</a>
        </div>
    </section>
    <section class="news">
        <h2>Neuigkeiten aus dem Verein</h2>
        <div class="news-item">
            <h3>Max Mustermann gewinnt den Triathlon</h3>
            <p>Max Mustermann, ein stolzes Mitglied unseres Vereins, hat kürzlich den ersten Platz beim örtlichen Triathlon Wettbewerb erreicht. Herzlichen Glückwunsch, Max!</p>
        </div>
        <div class="news-item">
            <h3>Rekordzeit im 100-Meter-Freistil:</h3>
            <p>Unsere talentierte Schwimmerin Lisa Müller hat eine beeindruckende Rekordzeit von 1.15 Sekunden im 100-Meter-Freistil erreicht.</p>
        </div>
        <div class="news-item" id="informationen">
            <h3>Jugend-Schwimmlager:</h3>
            <p>In den Sommerferien veranstalten wir ein aufregendes Schwimmlager für Kinder und Jugendliche. Lassen Sie Ihre Kinder Teil dieser Spaß- und Lernerfahrung sein.</p>
        </div>
    </section>
    <section class="custom-accordion">
    <h3 style="margin-left: 15px; font-size: 22px;">Nützliche Informationen:</h3>
    <div class="accordion-item">
        <button class="accordion-heading">
            <span class="accordion-title">Unsere Mission</span>
            <i class="fas fa-chevron-down accordion-icon"></i>
        </button>
        <div class="accordion-content">
            Bei 'Wasser + Freizeit Münster' ist es unsere Mission, Menschen jeden Alters die Freude am Schwimmen näherzubringen. Wir bieten Schwimmkurse für alle Altersgruppen und Erfahrungsniveaus an und fördern gleichzeitig eine breite Palette von Freizeitaktivitäten rund um das Wasser. Unser Ziel ist es, ein gesundes, aktives und ausgewogenes Leben durch die Liebe zum Wasser zu fördern und Menschen zu inspirieren, sich regelmäßig im Wasser zu bewegen und Spaß zu haben. Willkommen in unserer Gemeinschaft, wo Wasser und Freizeit zu einem unvergesslichen Erlebnis werden!
        </div>
    </div>
    
    <div class="accordion-item">
        <button class="accordion-heading">
            <span class="accordion-title">Das Hallenbad</span>
            <i class="fas fa-chevron-down accordion-icon"></i>
        </button>
        <div class="accordion-content">
            Das umfangreich renovierte und modernisierte Hallenbad Wolbeck verbreitet eine warme Wohlfühl-Atmosphäre und hat jedem etwas zu bieten.
            <p><strong>Die Austattung</strong></p>
            <ul>
                <li>kombiniertes Schwimmer- und Nichtschwimmerbecken</li>
                <li>Eingangsbereich mit Rampenanlage für Rollstühle</li>
                <li>Umkleide- und Sanitärbereich mit neuen Umkleiden, Duschen und WCs</li>
                <li>große Aufenthaltszone mit Blick in die Schwimmhalle</li>
                <li>30 m lange Wärmebänke</li>
                <li>barrierefrei und behindertenfreundlich in allen Bereichen (z. B. taktiler/visueller Leitstreifen)</li>
                <li>Pool-Lift</li>
            </ul>
        </div>
    </div>
    
    <div class="accordion-item">
        <button class="accordion-heading">
            <span class="accordion-title">Unser Verein</span>
            <i class="fas fa-chevron-down accordion-icon"></i>
        </button>
        <div class="accordion-content">
            Der Wasser + Freizeit Verein Münster e.V. wurde im Jahr 1990 gegründet und hat sich seitdem der Förderung des Breiten- und Leistungssports im Bereich Triathlon und Schwimmen verschrieben. Unser Vereinsleben gründet sich auf wichtigen Werten wie Fairness, Toleranz, Transparenz und Gleichberechtigung.
            <p>Wir glauben daran, dass der Sport Menschen zusammenbringt und die Möglichkeit bietet, persönliche Grenzen zu überwinden. Unabhängig von Geschlecht, Herkunft oder Hintergrund fördern wir die Teilnahme an unseren Aktivitäten und Veranstaltungen. Dabei legen wir großen Wert auf einen fairen und respektvollen Umgang miteinander.</p>
            <p>Unsere Mitglieder sind in verschiedenen Altersgruppen und Leistungsniveaus vertreten, und wir unterstützen sowohl Anfänger als auch erfahrene Athleten dabei, ihre sportlichen Ziele zu erreichen. Wir organisieren regelmäßige Trainingseinheiten, Wettkämpfe und gesellschaftliche Veranstaltungen, um ein starkes Gemeinschaftsgefühl innerhalb des Vereins zu fördern.</p>
            <p>Wir sind stolz darauf, eine offene und inklusive Umgebung zu schaffen, in der jeder die Möglichkeit hat, seine sportlichen Fähigkeiten zu entfalten und Freundschaften zu schließen. Unser Engagement für Fairness, Toleranz, Transparenz und Gleichberechtigung bleibt das Herzstück unserer Vereinsphilosophie und leitet uns in allem, was wir tun.</p>
        </div>
    </div>
    
    <div class="accordion-item">
        <button class="accordion-heading">
            <span class="accordion-title">Unser Trainer-Team</span>
            <i class="fas fa-chevron-down accordion-icon"></i>
        </button>
        <div class="accordion-content">
            Unser Team setzt sich aus einer vielfältigen Gruppe von erfahrenen Schwimmlehrern und begeisterten Wassersportlern zusammen. Jedes Mitglied unseres Teams bringt eine einzigartige Perspektive und Expertise mit, die uns als Ganzes stärker macht.
            <p>Unsere Schwimmlehrer verfügen über langjährige Erfahrung im Unterrichten von Menschen jeden Alters und jeder Fähigkeitsstufe. Sie sind zertifizierte Profis, die sich leidenschaftlich dafür einsetzen, Schwimmen zu lehren und Sicherheit im Wasser zu fördern. Sie sind geduldig, einfühlsam und haben eine besondere Gabe, Menschen dabei zu unterstützen, ihre Ängste zu überwinden und ihr Selbstvertrauen im Wasser aufzubauen.</p>
            <p>Unsere begeisterten Wassersportler sind wahre Enthusiasten, die ihre Liebe zum Schwimmen und Wassersportarten wie Tauchen, Wasserski und Wasserpolo teilen. Sie leben für die Freude und die Freiheit, die das Wasser bietet, und sind immer bereit, ihre Leidenschaft mit anderen zu teilen. Ihre Begeisterung ist ansteckend und motiviert unsere Schüler, sich immer weiter zu verbessern und Spaß im Wasser zu haben.</p>
            <p>Wir sind stolz darauf, ein engagiertes und professionelles Team zu haben, das sich darauf freut, mit Ihnen zusammenzuarbeiten, um Ihre Schwimmziele zu erreichen. Egal, ob Sie Schwimmen lernen, Ihre Technik verbessern oder an Wettkämpfen teilnehmen möchten, wir sind hier, um Sie zu unterstützen und Sie auf Ihrem Weg zu begleiten. Wir glauben fest daran, dass jeder das Potenzial hat, ein sicherer und kompetenter Schwimmer zu werden, und wir freuen uns darauf, Ihnen dabei zu helfen, dieses Potenzial zu entfalten. Mit unserem Team an Ihrer Seite werden Sie nicht nur Ihre Schwimmziele erreichen, sondern auch eine tiefe Freude am Wasser entdecken.</p>
        </div>
    </div>
</section>
    <section class="events">
        <h2>Kommende Veranstaltungen</h2>
        <div class="event-item" id="termine">
            <h3>Wasserballturnier</h3>
            <p>Sei am 25. September bei unserm jährlichen Wasserballturnier dabei, jeder kann teilnehmen. Und das beste, du kannst tolle Preise gewinnen. </p>
            <a href="pages/calendar/kalender.php" class="cta-button secondary-cta-button">Alle Termine anzeigen</a>
        </div>
        <div class="event-item">
            <h3>Schwimmwettkampf</h3>
            <p>Nehmen Sie an unserem Schwimmwettkampf teil und zeigen Sie Ihre Fähigkeiten im Wasser.</p>
            <a href="pages/calendar/kalender.php" class="cta-button secondary-cta-button">Alle Termine anzeigen</a>
        </div>
        <div class="event-item">
            <h3>Sommer-Schwimmcamp</h3>
            <p>Verbringen Sie die Sommerferien mit uns im Schwimmcamp! Genießen Sie das Schwimmen im Freien, Teamaktivitäten und verbessern Sie Ihre Schwimmfähigkeiten in einer entspannten Umgebung.</p>
            <a href="pages/calendar/kalender.php" class="cta-button secondary-cta-button">Alle Termine anzeigen</a>
        </div>

    </section>
</main>
<footer>
    <div class="footer-content">
        <p>&copy; Valentin Horstmann</p>
        <ul class="social-links">
            <li><a href="https://www.facebook.com/"><img src="assets/img/facebook.png" alt="Facebook"></a></li>
            <li><a href="https://www.twitter.com/"><img src="assets/img/twitter.png" alt="Twitter"></a></li>
            <li><a href="https://www.instagram.com/"><img src="assets/img/instagram.png" alt="Instagram"></a></li>
        </ul>
    </div>
</footer>

<script>
    // Logik für das DropDown Menü
    document.querySelectorAll('.accordion-heading').forEach(button => {
        button.addEventListener('click', () => {
            const accordionContent = button.nextElementSibling;
            button.parentElement.toggleAttribute('open');

            if (button.parentElement.hasAttribute('open')) {
                accordionContent.style.display = 'block';
            } else {
                accordionContent.style.display = 'none';
            }
        });
    });
</script>

</body>
</html>
