<!DOCTYPE html>
<html dir="ltr" lang="ru-RU">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Montserrat:300,400,500,600,700,900|Roboto:700,900|Roboto+Slab:400" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" />
    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layers.css">
    <link rel="stylesheet" type="text/css" href="css/navigation.css">

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
    ============================================= -->
    <title>@yield('title')</title>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">
    @yield('content')
</div><!-- #wrapper end -->

<!-- External JavaScripts
============================================= -->
<script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>

<!-- Footer Scripts
============================================= -->
<script src="js/functions.js"></script>
<script src="js/custom-functions.js"></script>

<!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
<script src="js/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

<script src="js/rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="js/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="js/rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="js/rs-plugin/js/extensions/revolution.extension.video.min.js"></script>

<script>
    var tpj=jQuery;
    var revapi98;
    tpj(document).ready(function() {
        if(tpj("#rev_slider_98_1").revolution == undefined){
            revslider_showDoubleJqueryError("#rev_slider_98_1");
        }else{
            revapi98 = tpj("#rev_slider_98_1").show().revolution({
                sliderType:"hero",
                jsFileLocation:"include/rs-plugin/js/",
                sliderLayout:"fullscreen",
                dottedOverlay:"none",
                delay:9000,
                navigation: {
                },
                responsiveLevels:[1200,992,768,480,320],
                gridwidth:[1140,940,720,420,280],
                gridheight:[600,500,400,300,200],
                lazyType:"none",
                parallax: {
                    type:"mouse",
                    origo:"slidercenter",
                    speed:2000,
                    levels:[2,3,4,5,6,7,12,16,10,50],
                },
                fullScreenOffsetContainer:"header",
                shadow:0,
                spinner:"off",
                autoHeight:"off",
                disableProgressBar:"on",
                hideThumbsOnMobile:"off",
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                debugMode:false,
                fallbacks: {
                    simplifyAll:"off",
                    disableFocusListener:false,
                }
            });
        }
    });	/*ready*/
</script>

</body>
</html>
