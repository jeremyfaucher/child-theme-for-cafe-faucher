<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Cafe_Faucher
 * @since Cafe Faucher 1.0
 */
get_header(); ?>
<?php
// Set the Current Author Variable $curauth
$curauth = (isset($_GET['author_name'])) ? 
get_user_by('slug', $author_name) : 
get_userdata(intval($author));
?>
<h1 class="container-nb">Author Archives: <?php echo $curauth->display_name; ?></h1>
<main class="container">
    <section class="feature-box">
        <div class="grid-1x5">
            <img alt="" src="/wp-content/uploads/Jeremy-Headshot-f.jpg" class="avatar avatar-90 photo" height="90" width="90" loading="lazy">
            <div class="grid">
                <p class="no-top">
                    <strong>About:</strong> <?php echo $curauth->user_description; ?><br />
                   </p>
                    <p class="small">Follow on:
                        <?php 
                        $twitter = get_the_author_meta( 'twitter', $post->post_author );
                        $linkedin = get_the_author_meta( 'linkedin', $post->post_author );
                        echo '<a href="https://twitter.com/' . $twitter .'" rel="nofollow" target="_blank">Twitter</a> | <a href="'. $linkedin .'" rel="nofollow" target="_blank">linkedin</a>';
                        ?> </p>
                    </div>
                </div>
                <br>
               <div class="grid-1x1">
                    <?php if ( have_posts() ) : ?>
                        <?php
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content-category-archive', get_post_format() );
                        endwhile; ?>
                    <?php endif; ?>
                </div>
            </section>
         </main><!-- end of main -->
        <section class="container-nb">
            <?php cafefaucher_content_nav( 'nav-below' ); ?>
        </section>
        <?php get_footer(); ?>
