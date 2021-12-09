<?php
/**
 * Single Post Template: Coded
 */
get_header(); ?>
<div class="container-nb wide sm-bottom">
  <h1 class="archive-title"><?php
  if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
  }
  ?></h1>
  <h1><?php the_title(); ?></h1>
  <div class="author">By: <?php the_author_posts_link(); ?> on   
    <?php the_date(); ?></div>
  </div>
  </div>
  <main class="container wide">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'template-parts/content-blog', get_post_format() ); ?>
    <?php endwhile; // end of the loop. ?>
    <?php //get_sidebar(); ?>
  </main><!-- end of main -->
  <?php get_template_part( 'template-parts/content-nav', get_post_format() ); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<style type="text/css">
iframe {
    border: none;
    width: 100%;
}
#share-wrapper {
position: relative;
    margin: 0 auto;
    width: 100%;
}
#share {
   position: absolute;
    z-index: 1;
    background: #f1f1f1;
    padding: 18px;
    width: 90%;
    box-shadow: 0px 0px 8px 2px #d4d4d4;
}
#sharebutton {
    color:#333;
    height:30px;
    width:30px;
    border-radius:15px;
    text-align:center;
    line-height:26px;
    margin: 0px 0px 10px 5px;
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
    -webkit-transition: -webkit-transform 0.6s;
    -moz-transition: -moz-transform 0.6s;
    -o-transition: -o-transform 0.6s;
    transition: transform 0.6s;
}
#sharebutton:hover { color:#eee; background-color:#333; cursor:pointer; }
#sharebutton.open  {
    -webkit-transform: rotate(180deg);
    -moz-transform: rotate(180deg);
    -ms-transform: rotate(180deg);
    -o-transform: rotate(180deg);
    transform: rotate(180deg);
    -webkit-transition: -webkit-transform 0.6s;
    -moz-transition: -moz-transform 0.6s;
    -o-transition: -o-transform 0.6s;
    transition: transform 0.6s;
}

</style>
  <script type="text/javascript">
    $(document).ready(function () {
$("#share").hide();
 $("#sharebutton").addClass("open");
    $("#sharebutton").click(function () {

        $("#share").toggle("slide");
        if ($("#sharebutton").hasClass("open")) {
            $("#sharebutton").removeClass("open");
        }
        else {
            $("#sharebutton").addClass("open"); 
        }
    });

});
  </script>

  <?php get_footer(); ?>
