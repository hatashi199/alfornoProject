<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asotrame</title>
    <link rel="shortcut icon" type="image/x-icon" href="./images/favicon_logo.ico">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/hamburgers.css">
    <link rel="stylesheet" href="styles/estructura.css">
    <link rel="stylesheet" href="styles/asotrameStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.nav.js"></script>
    <script src="js/jquery-scrolltofixed-min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
</head>
<body>
    <script>
        $(document).ready(function(){
            $("header").scrollToFixed();

            $('#mainMenu').onePageNav({
                currentClass: "menuActive"            
                });
                $.scrollUp({
                    scrollName: 'flechaSubir',        // Element ID
                    scrollDistance: 100,              // Distance from top/bottom before showing element (px)
                    scrollFrom: 'top',                // 'top' or 'bottom'
                    scrollSpeed: 500,                 // Speed back to top (ms)
                    easingType: 'linear',             // Scroll to top easing (see http://easings.net/)
                    animation: 'fade',                // Fade, slide, none
                    animationSpeed: 800,              // Animation speed (ms)
                    scrollTrigger: false,             // Set a custom triggering element. Can be an HTML string or jQuery object
                    scrollTarget: false,              // Set a custom target element for scrolling to. Can be element or number
                    scrollText: false,                // Text for element, can contain HTML
                    scrollTitle: false,               // Set a custom <a> title if required.
                    scrollImg: false,                 // Set true to use image
                    activeOverlay: true,              // Set CSS color to display scrollUp active point, e.g '#00FFFF'
                    zIndex: 2147483647                // Z-Index for the overlay
                });
        })
    </script>

    <header class="xs100 flex xsjc bWhite">
        <div class="centrado flex xsjc">
            <div class="xs80 m90 l15 flex xsjc xsac">
                <div class="xs35 s25 m20 l100 overhide">
                    <a href="index.php">
                        <img src="images/logo.png" alt="logoAsotrame" class="xs100">
                    </a>
                </div>
            </div>
        </div>
    </header>