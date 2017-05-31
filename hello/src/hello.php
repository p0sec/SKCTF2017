<?php
header("tip:  &#105;&#110;&#99;&#108;&#117;&#100;&#101;&#46;&#112;&#104;&#112")
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>SK CTF</title>
    <link rel="stylesheet" type="text/css" href="./about/main.css"/>
</head>

<body>
<div class="vi">
    <div class="sidebar">
		 <div class="header">
            <h1>SK CTF</h1>
            <div class="quote">
                <p class="quote-text animate-init">WELCOME TO SK CTF</a></p>
            </div>
        </div>
        <div class="relocating">
            Navigating to: <span class="relocate-location"></span>...
        </div>
    </div>

    <div class="content">
        <span class="close">close</span>
    </div>
</div>
<script type="text/javascript" src="./about/index.js"></script>
<script>
    $(document).ready(function () {
        var delay = 1;
        var DELAY_STEP = 200;
        var animationOptions = { opacity: 1, top: 0};

        $('h1').animate(animationOptions).promise()
                .pipe(animateMain)
                .pipe(animateLocationIcon);

        function animateMain() {
            var dfd = $.Deferred();
            var els = $('.animate-init');
            var size = els.size();

            els.each(function (index, el) {
                delay++;
                $(el).delay(index * DELAY_STEP)
                        .animate(animationOptions);
                (size - 1 === index) && dfd.resolve();
            });
            return dfd.promise();
        }

        function animateLocationIcon() {
            $('.location-icon').delay(delay * DELAY_STEP).animate({
                opacity: 1,
                top: 0
            }).promise().done(animationQuote);
        }

        function animationQuote() {}

        $(document.body).on('keydown', function (event) {
            // Press 'b' key
            if (event.which === 66) {
                $('.relocate-location').text('Bookmark Page');
                $('.relocating').css('opacity', 1);

                window.setTimeout(function () {
                    window.location.href = '/bookmarks.html';
                }, 1000);
            }
        });
    });
</script>
</body>
</html>
