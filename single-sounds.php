<?php
/**
 * Single Post Template: Ambient Sounds Mixer
 */
get_header(); ?>
<div class="container-nb sm-bottom">
  <h1 class="archive-title"><?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
}
?></h1>
<h1><?php the_title(); ?></h1>
 <?php  $author = sprintf( '<div class="author">By: <a href="%1$s" title="%2$s" rel="author">%3$s</a></div>',
          esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
          esc_attr( sprintf( __( 'View all posts by %s', 'cafe-faucher' ), get_the_author() ) ),
          get_the_author()
      );printf(

            $author
        ); ?>
      </div>
<main class="container">
  <div class="entry-content">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'template-parts/content-blog', get_post_format() ); ?>
      <?php endwhile; // end of the loop. ?>
      <div class="grid-1x1">
<div class="grid soundbox">
<h2>Cafe</h2>
<p>Recording by <a href="https://soundcloud.com/samueljustice" target="_blank" rel="noopener noreferrer">Samuel Justice</a></p>
<audio id="cafe" loop="" preload=""><source src="/blog/wp-content/uploads/audio/cafe.mp3" type="audio/mpeg"></audio>
<div><input id="cafeToggle" type="checkbox" value="cafe"><label for="cafeToggle"><span>Toggle Audio</span></label><input max="100" min="0" step="1" type="range" value="100"></div></div>

<div class="grid soundbox">
<h2>City</h2>
<p>Recording by <a href="https://www.youtube.com/watch?v=ElU8g7xi6ws" target="_blank" rel="noopener noreferrer">Ambience Hub</a></p>
<audio id="city" loop="" preload=""><source src="/blog/wp-content/uploads/audio/City-Sounds-Ambience.mp3" type="audio/mpeg"></audio>
<div><input id="cityToggle" type="checkbox" value="city"><label for="cityToggle"><span>Toggle Audio</span></label><input max="100" min="0" step="1" type="range" value="100"></div></div>

<div class="grid soundbox">
<h2>Rain</h2>
<p>Recording by <a href="https://soundcloud.com/mattt" target="_blank" rel="noopener noreferrer">Matt Barnard</a></p>
<audio id="rain" loop="" preload=""><source src="/blog/wp-content/uploads/audio/rain.mp3" type="audio/mpeg"></audio>
<div><input id="rainToggle" type="checkbox" value="rain"><label for="rainToggle"><span>Toggle Audio</span></label><input max="100" min="0" step="1" type="range" value="100"></div></div>

<div class="grid soundbox">
<h2>White Sound With Waves</h2>
<p>Recording by <a href="https://design2seo.com/about/" target="_blank" rel="noopener noreferrer">Jeremy Faucher</a></p>
<audio id="whitesound" loop="" preload=""><source src="/blog/wp-content/uploads/audio/cafe-faucher-white-sound.mp3" type="audio/mpeg"></audio>
<div><input id="whitesoundToggle" type="checkbox" value="whitesound"><label for="whitesoundToggle"><span>Toggle Audio</span></label><input max="100" min="0" step="1" type="range" value="100"></div></div>

<div class="grid soundbox">
<h2>Forest Campfire</h2>
<p>Recording by <a href="https://www.youtube.com/watch?v=5F-J9hX6L8g" target="_blank" rel="noopener noreferrer">Virtual Fireplace</a></p>
<audio id="campfire" loop="" preload=""><source src="/blog/wp-content/uploads/audio/Forest-Campfire.mp3" type="audio/mpeg"></audio>
<div><input id="campfireToggle" type="checkbox" value="campfire"><label for="campfireToggle"><span>Toggle Audio</span></label><input max="100" min="0" step="1" type="range" value="100"></div></div>

<div class="grid soundbox">
<h2>Ocean Waves</h2>
<p>Recording by <a href="https://www.7digital.com/artist/sounds-for-life/release/ocean-waves-extended" target="_blank" rel="noopener noreferrer">Sounds For Life</a></p>
<audio id="waves" loop="" preload=""><source src="/blog/wp-content/uploads/audio/cafe-faucher-ocean-waves.mp3" type="audio/mpeg"></audio>
<div><input id="wavesToggle" type="checkbox" value="waves"><label for="wavesToggle"><span>Toggle Audio</span></label><input max="100" min="0" step="1" type="range" value="100"></div></div>

<div class="grid soundbox">
<h2>Carmel By The Sea Birds</h2>
<p>Recording by <a href="http://www.soundtracker.com/" target="_blank" rel="noopener noreferrer">Gordon Hempton</a></p>
<audio id="birds" loop="" preload=""><source src="/blog/wp-content/uploads/audio/Carmel-birds.mp3" type="audio/mpeg"></audio>
<div><input id="birdsToggle" type="checkbox" value="birds"><label for="birdsToggle"><span>Toggle Audio</span></label><input max="100" min="0" step="1" type="range" value="100"></div></div>

<div class="grid soundbox">
<h2>Calm</h2>
<p>Recording by <a href="https://www.calm.com/" target="_blank" rel="noopener noreferrer">Calm.com</a></p>
<audio id="calm" loop="" preload=""><source src="/blog/wp-content/uploads/audio/calm-sounds.mp3" type="audio/mpeg"></audio>
<div><input id="calmToggle" type="checkbox" value="calm"><label for="calmToggle"><span>Toggle Audio</span></label><input max="100" min="0" step="1" type="range" value="100"></div></div>

<style type="text/css">
/* Toggle Sound Player */
.soundbox h2 {
margin-bottom: 0px;
}
.soundbox p {
font-size: 12px;
margin-top: 0;
}
.soundbox {
margin-bottom: 18px;
}
.soundbox audio:not([controls]) {
display: none;
height: 0;
}
.soundbox audio {
display: inline-block;
display: inline;
zoom: 1;
}
.soundbox input[type=checkbox], input[type=radio] {
box-sizing: border-box;
padding: 0;
height: 13px;
width: 13px;
}
.soundbox label {
color: transparent;
background: url(/blog/wp-content/uploads/sprite.png) -40px 0 no-repeat;
border-radius: 14px;
box-shadow: 0 1px 2px #888, 0 0 3px #777, inset 0 -1px 5px #333;
display: block;
position: relative;
text-indent: 100%;
width: 65px;
height: 29px;
-webkit-transition: background-position .3s ease;
-moz-transition: background-position .3s ease;
cursor: pointer;
font-size: .01em;
float: left;
}
.soundbox input[type=range] {
float: left;
}
.soundbox input[type=checkbox] {
display: none;
}
.soundbox label span {
background: url(/blog/wp-content/uploads/sprite.png) -1px -30px no-repeat;
border: 0 solid transparent;
border-radius: 14px;
box-shadow: 0 1px 3px #000, 0 2px 13px #000;
content: "";
display: block;
position: absolute;
top: 0;
left: -1px;
width: 28px;
height: 28px;
-webkit-transition: left .3s ease;
-moz-transition: left .3s ease;
}
.soundbox input[type=checkbox]:checked + label {
background-position: 0 0;
}
.soundbox input[type=checkbox]:checked + label span {
left: 40px;
}
input[type="range"] {
display: block;
width: 100%;
}
.soundbox input[type="range"] {
width: 126px;
margin-left: 20px;
}
</style>

<script type='text/javascript' src='/blog/wp-content/uploads/audio/js/cf_soundmix.js'></script></div>
    <?php //get_sidebar(); ?>
</div>
</main><!-- end of main -->
   <?php get_template_part( 'template-parts/content-nav', get_post_format() ); ?>
<?php get_footer(); ?>
