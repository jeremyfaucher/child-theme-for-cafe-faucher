<?php
/**
 * Single Post Template: Name It
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
    <?php while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'template-parts/content-blog', get_post_format() ); ?>
    <?php endwhile; // end of the loop. ?>
    <?php //get_sidebar(); ?>
  </main><!-- end of main -->
  <?php get_template_part( 'template-parts/content-nav', get_post_format() ); ?>
  <?php get_footer(); ?>
