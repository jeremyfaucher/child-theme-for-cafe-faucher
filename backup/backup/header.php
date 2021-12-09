<?php
/**
* Header file for the Cafe Faucher WordPress theme.
*
* @package Cafe_Faucher
* @since Cafe Faucher 1.1
*/
?><!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php if(is_user_logged_in()) { ?>
  <?php } elseif (is_page()) { ?>
  <?php } elseif (is_category()) { ?>
  <?php } elseif (in_category('tools')) { ?>
  <?php } elseif (in_category('portfolio')) { ?>
  <?php } else { ?>
   <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4917482250462493"
     crossorigin="anonymous"></script>
  <?php } ?>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-YSR3YYWRMB"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-YSR3YYWRMB');
  </script>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header role="banner">
    <section class="container-full grid-1x2">
     <div class="logo">
      <a href="https://www.design2seo.com/" class="desktop" rel="home" itemprop="url"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/design-2-seo-logo.png" class="logo" alt="Design2SEO" /></a></div>
      <?php wp_nav_menu(array(
        'theme_location' => 'main', 
        'container' => false, 
        'menu_class' => 'header-menu', 
      )); 
      ?>
      <nav class="mobile-menu">
        <input id="hamburger" type="checkbox" name="hamb" value="hamb">
        <label class="hamb" for="hamb">☰</label>
        <?php wp_nav_menu(array(
          'theme_location' => 'main', 
          'container' => false, 
          'menu_class' => 'mobile', 
        )); 
        ?>
      </nav>
    </section>
  </header>
  <?php if (is_page('home')) { ?>
  <div class="container-nb home-banner">
    <div class="home-banner grid-1x1">
      <div class="grid">
        <h1>From Concept To Launch</h1>
        <h5>I’m Jeremy Faucher, a Seattle-based web designer & developer with a passion for usability.</h5>
      </div>
      <div class="grid banner-right box">
        <img class="banner" loading="lazy" src="<?php echo get_home_url(); ?>/wp-content/uploads/home-banner.png" alt="Design2SEO" />
      </div>
    </div>
    <div class="spacer-sm"></div>
  </div>
  <script type="text/javascript">
    function observe(selector, threshold, callback) {
      const elements = document.querySelectorAll(selector);
      const container = document.querySelector('body.home')
      const options = {
        root: null,
        rootMargin: '-50px',
        threshold: threshold,
      };
      const observer = new IntersectionObserver(callback, options);
      for (const element of elements) { observer.observe(element);}
    }
  function translateY(ratio, total) {
    return `translateY(calc(-${ratio} * ${total})`;}
    let target = document.querySelector('.home-banner');
    function boxParallax(entries, observer) {
      for (const entry of entries) {
        if (entry.isIntersecting) {
          entry.target.style.transform = translateY(entry.intersectionRatio, '30%');
          console.log(entry.intersectionRatio); }
        }
      }
      function createThreshold() {
        const threshold = [];
        for (let i = 0; i <= 1.0; i += 0.01) {
          threshold.push(i);
        }
        return threshold;
      }
      const threshold = createThreshold();
      observe('.box', threshold, boxParallax);
    </script>
    <?php } else { ?>
    <?php } ?>

