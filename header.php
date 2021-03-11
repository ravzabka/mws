
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/favicons/apple-touch-icon.png?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory'); ?>/favicons/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory'); ?>/favicons/favicon-16x16.png?v=2">
    <link rel="manifest" href="<?php bloginfo('template_directory'); ?>/favicons/site.webmanifest?v=2">
    <link rel="mask-icon" href="<?php bloginfo('template_directory'); ?>/favicons/safari-pinned-tab.svg?v=2" color="#0060a8">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicons/favicon.ico?v=2">
    <meta name="msapplication-TileColor" content="#0060a8">
    <meta name="theme-color" content="#ffffff">
   
    <?php wp_head(); ?>  
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-13301260-19"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-13301260-19');
    </script>
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window,document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '467522657125050'); 
    fbq('track', 'PageView');
    </script>
    <noscript>
    <img height="1" width="1" 
    src="https://www.facebook.com/tr?id=467522657125050&ev=PageView
    &noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
    <!-- Facebook Feeds -->


    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v9.0&appId=615797591786535&autoLogAppEvents=1" nonce="ZI8L5yf3"></script>
    <!-- End Facebook Feeds -->
 
</head>
<body <?php body_class(); ?>>

<header class="header">  
    <div class="container">
        <div class="header__container">

            <div class="header__logo-container"> 
                <a href="<?php echo home_url();?>" class="header__logo">
                     <img src="<?php bloginfo('template_directory'); ?>/img/brandmarks/mws.svg" alt="MWS Logo">
                </a>  
           
                <p class="header__motto">Portal <br class="header__motto-break">nowoczesnych <br class="header__motto-break">nauczycieli</p>               
            </div>
           
        </div> 
    </div>
    <div class="nav-container">
        <div class="container">
            
            <nav class="navbar navbar-expand-lg navbar-light">
  
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul id="menu" class="navbar-nav mr-auto">

                        <li <?php if (get_post_type() == 'post') echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/aktualnosci'); ?>">Aktualności</a></li>

                        <li <?php if (is_page('artykuly') or get_post_type() == 'artykul') echo 'class="current-menu-item-blue"';?>><a href="<?php echo site_url('/artykuly') ?>">Artykuły</a></li>

                        <li <?php if (is_page('inspiracje') or get_post_type() == 'inspiracja') echo 'class="current-menu-item-green"';  ?>><a href="<?php echo site_url('/inspiracje') ?>">Inspiracje</a></li>

                        <li <?php if (is_page('narzedzia') or get_post_type() == 'narzedzia') echo 'class="current-menu-item"';  ?>><a href="<?php echo site_url('/narzedzia') ?>">Narzędzia</a></li>

                        <li <?php if (is_page('dotacje') or get_post_type() == 'dotacje') echo 'class="current-menu-item"';  ?>><a href="<?php echo site_url('/dotacje') ?>">Dotacje</a></li>

                        <li <?php if (is_page('poradniki') or get_post_type() == 'poradniki') echo 'class="current-menu-item"';  ?>><a href="<?php echo site_url('/poradniki') ?>">Poradniki</a></li>

                        <li <?php if (is_page('konsultanci')) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/konsultanci') ?>">Konsultanci edukacyjni</a></li>

                        <li <?php if (is_page('webinary') or get_post_type() == 'webinary') echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/webinary') ?>">Webinary</a></li>


                        <li <?php if (is_page('kontakt')) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/kontakt') ?>">Kontakt</a></li>
                    </ul>

                        <div class="header__search"> 

                            <form role="search" method="get" class="c-search-form" action="<?php echo home_url();?>">
                                <label class="c-search-form__label">
                                    <span class="screen-reader-text">Szukaj:</span>

                                <input type="search" name="s" class="c-search-form__field" placeholder="<?php echo esc_attr_x( 'szukaj …', 'placeholder' ) ?>" value="<?php echo trim(get_search_query()); ?>">
                                </label>
                                <button type="submit" class="c-search-form__button"><span class="u-screen-reader-text">Szukaj</span><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>


                            <div class="header__social">
                                <a href="https://www.facebook.com/groups/sPokojNauczycielski" class="header__social-icon" target="_blank" title="sPokójNauczycielski"><img src="<?php bloginfo('template_directory'); ?>/img/icons/sPokoj-Nauczycielski-color.png" alt="sPokój Nauczycielski grupa na facebook"></a>

                                <a href="https://www.facebook.com/portalMWS/" class="header__social-icon" target="_blank" title="Facebook"><img src="<?php bloginfo('template_directory'); ?>/img/icons/facebook.png" alt="Multimedia w szkole facebook"></a>

                                <a href="https://www.youtube.com/channel/UCfNcJmGKmxXjYr5prZzodiQ" class="header__social-icon" target="_blank" title="Youtube"><img src="<?php bloginfo('template_directory'); ?>/img/icons/youtube.png" alt="Multimedia w szkole kanał youtube"></a>
                                  
                            </div>

                        </div>
                    </div>
            </nav> 
        </div>
    </div>
</header> 

