<?php
/**
* Template Name: Front Page
*/
get_header();
?>
<main class="container-bg">
  <div class="spacer-sm"></div>
  <section class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php the_content(); ?>
      <div class="home-about">
        <h2>From Concept To Launch</h2>
         <p>I’ve been working as a web designer/developer for over 8 years and enjoy collaborating with creative partners to provide a quality product. I’ve helped companies of all sizes build strong brands and websites.</p>
<p>Strengthen your brand by having captivating, SEO-rich content to engage your users and help your business stand out in a competitive marketplace.</p>
<p>I have worked with clients to solve complex problems and my ultimate goal is to make your business more successful and easier to manage.</p>
      </div>
      <div class="spacer-sm"></div>
      </div>
      <div class="spacer-sm"></div>
      <div class="grid-1x1x1 staggered-entries">
        <div class="entry-summary grid services box">
          <div class="services-wrap">
            <div class="icon icon-profile"></div>
            <h2>Website Mobility Tool</h2>
          </div>
          <p class="services-text">Quickly test your websites responsiveness.</p>
          <a class="more" href="/blog/tools/">-> COMING SOON!</a>
        </div>
        <div class="entry-summary grid services">
          <div class="services-wrap">
            <div class="icon icon-paint-format"></div>
            <h2 id="web-design">Wire Frame Builder Tool</h2>
          </div>
          <p class="services-text">A simple to use drag-and-drop wire frame builder.</p>
          <a class="more" href="/blog/tools/">-> COMING SOON!</a>
        </div>

        <div class="entry-summary grid services">
          <div class="services-wrap">
            <div class="icon icon-rocket"></div>
            <h2>Image SEO Tool</h2>
          </div>
          <p class="services-text">Check your images for Alt, Title, Files Size and more.</p>
          <a class="more" href="/blog/tools/image-seo-analyzer/">-> USE FREE</a>
        </div>
      </div>
      <div class="spacer-sm"></div>
    <?php endwhile; ?>
  <?php endif; ?>
</section>
</main>
<script type="text/javascript">
  const img = document.querySelector('.home-about')

  const callback = (entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("fadeIn")
      }
    })
  }
  const options = {
  //threshold: .5
}
const myObserver = new IntersectionObserver(callback, options)
myObserver.observe(img)
</script>
<style type="text/css">
.home-about {
  position: relative;
  opacity: 0;
  transform: translateY(100px);
  transition: transform 1s, opacity 1s;
}
.fadeIn {
  opacity: 1;
  transform: translateY(0px);
}
</style>
<section class="container-nb blog">
  <div class="spacer-md"></div>
  <h2>Blog</h2>
  <section class="grid-1x1">
   <?php 
   if ( get_query_var('paged') ) {
     $paged = get_query_var('paged');
   } elseif ( get_query_var('page') ) {
     $paged = get_query_var('page');
   } else {
     $paged = 1;
   }
   query_posts( array( 'cat' => 11, 'orderby' => 'rand','order'=> 'DESC', 'category' => 'blog', 'post_type' => 'post', 'paged' => $paged ) );
   if ( have_posts() ) : $count = 0; while ( have_posts() ) : the_post(); $count++;
     ?>
     <!-- Post Starts -->
     <div class="entry-summary grid">
      <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
      <h2 class="entry-title-blog"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
      <?php the_excerpt(); ?>
      <span class="topic"><a href="javascript:void(0);" id="clickme" class="show-post" name="" value="<?php the_id(); ?>">
      Quick View</a></span>
    </div>
  <?php endwhile; else: ?>
  <div class="post">
   <p><?php _e('Sorry, no posts matched your criteria.', 'cafe-faucher') ?></p>
 </div><!-- /.post -->
<?php endif; ?>
</section>
</section>
<section class="container-nb">
  <nav class="nav-pagination" role="navigation">
    <span class="nav-previous">
      <?php next_posts_link( __( '<span class="meta-nav"><i class="fa fa-chevron-left"></i></span> Older Posts', 'cafe-faucher' ) ); ?>
    </span>
    <span class="nav-next">
      <?php previous_posts_link( __( 'Newer posts <span class="meta-nav"><i class="fa fa-chevron-right"></i></span>', 'cafe-faucher' ) ); ?>
    </span>
  </nav>
</section>
<div id="lightbox">
  <div id="lightbox_content">
    <div id="close">&times;</div>
    <div class="posts-area"></div>
  </div>
</div>
<style type="text/css">
#lightbox {
  position: fixed;
  width: 100%;
  height: 100%;
  top: 0px;
  left: 0px;
  background: rgba(0, 0, 0, 0.3);
  display: none;
}
#lightbox.open {
  display: block;
  opacity: 1;
  animation-name: fadeInOpacity;
  animation-iteration-count: 1;
  animation-timing-function: ease-in;
  animation-duration: .6s;
}
@keyframes fadeInOpacity {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
#lightbox_content {
  position: absolute;
  overflow-y:scroll;
  overflow-x: hidden;
  width: 100%;
  max-width: 400px;
  height: 400px;
  background: #ffffff;
  border-radius: 3px;
  left: 50%;
  top: 50%;
  margin-left: -222px;
  margin-top: -200px;
  text-align: center;
  padding: 22px;
}
#close {
  position: absolute;
  right: 20px;
  top: 20px;
  background: rgba(0, 0, 0, 0.2);
  height: 20px;
  width: 20px;
  border-radius: 15px;
  text-align: center;
  color: #ffffff;
  cursor: pointer;
}
</style>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>

