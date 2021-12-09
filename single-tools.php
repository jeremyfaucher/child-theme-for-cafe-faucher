<?php
/**
 * Single Post Template: Image SEO Analyzer
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
    get_the_author() );printf($author); ?>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <style type="text/css">
  html {
    position: relative;
    min-height: 100%;
}
body {
    margin: 0 0 140px; /* bottom = footer height */
}
footer {
    position: absolute;
    left: 0;
    bottom: 0;
    height: 140px;
    width: 100%;
}
  .grid {
    overflow: hidden;
    word-wrap: break-word;
  }
  form {
    margin-bottom: 0;
  }
  input[type="text"] {
    margin-bottom: 0;
  }
  input[type="submit"] {
    margin-bottom: 0;
  }
  /* SEO Checker */
  div.card-checker { box-shadow: 0 1px 6px 0 rgba(32, 33, 36, 0.28); border: 1px solid #dfe1e5; background: white; border-radius: 8px; margin-top: 22px; margin-bottom: 22px; }
  .single .entry-content .card-checker p {
    font-size: 18px;
    margin: 0;
  }
  .card-checker img {
    position: relative;
  }
  .png-bg {
    background: #f9f9f9;
    padding: 12px;
}
p.small.l-grey {
    color: #26abc8;
}
  .card-checker p.test-description {
    font-size: 21px;
    line-height: normal;
    display: inline-block;
    color: black;
    margin-top: 5px;
  }
  .checker-text:after {
    content: '';
    display: block;
    clear: both;
  }
  .dot {
    float: left;
    display: block;
    position: relative;
    bottom: -10px;
    height: 12px;
    width: 12px;
    border-radius: 50%;
    margin-right: 6px;
  }
  .dot-green {
    background-color: #1de81d; 
  }
  .dot-red {
    background-color: #ff5d5d;
  }
  p {
    font-size: 18px;
    margin:0;
  }
  p.checker-heading {
    font-size: 16px;
    color: gray;
    line-height: 22px;
  }
  p.result-text {
    display: block !important;
  }
  p.checker-text-text {
    font-size: 18px;
    display: block;
    overflow: hidden;
  }
  p.missing {
    color:red;
  }
  .checker-wrap {
    padding: 22px;
  }
  .checker-section {
    border-bottom: 2px solid #c4beb9;
  }
  div.card-checker div.checker-section:last-child {
    border-bottom: none;
  }
  span.icon-checkmark {
    color: #1de81d;
    font-size: 18px;
    margin-right: 6px;
  }
  span.icon-cross {
    color: #ff5d5d;
    font-size: 18px;
    margin-right: 6px;
  }
  .red-kb {
    background-color: #ff5d5d;
  }
  .loading {
    opacity: .7;
    animation: pulse 1s linear infinite alternate;
    background-color: white;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;
    border-radius: 4px;
  }
  .loading.heading {
  }
  @keyframes pulse {
    0% {
      background-color: hsl(200, 20%, 70%);
    }

    100% {
      background-color: hsl(200, 20%, 95%);
    }
  }
  table.xdebug-error.xe-warning {
    display: none;
  }
  @media (max-width: 747px) {
    input[type="text"] {
      margin-bottom: 22px;
    }
  }
</style>
<div class="container pad">
  <form>
    <div class="grid-2x1">
      <input type="text" name="name1" id="name1">
      <input id="submit" type="submit" name="" value="submit">
    </div>
  </form>
</div>
<br>
<div class="container details" style="min-height: 300px">
<h3>Enter an URL address and get a Free Website Image Analysis!</h3>
<br>
<p>My Image SEO Tool will check & analyze for:</p>
<ul>
  <li>Broken images</li>
  <li>Image file size</li>
  <li>Image dimensions</li>
  <li>Image alt tags</li>
  <li>Image title tags</li>
</ul>
</div>
<h3 class="loaderDiv container loading heading" style="display: none;">Loading <span class="the-url"></span></h3>

<div class="card-checker container loaderDiv" style="display: none;">

<div class="checker-section loaderDiv" style="display: none;">
  <div class="checker-wrap">
    <div class="grid-1x1x1">
      <div class="grid loaderDiv loading" style="display: none; height: 200px; width: 200px"></div>
      <div class="grid loaderDiv loading" style="display: none; height: 200px; width: 200px"></div>
      <div class="grid loaderDiv loading" style="display: none; height: 200px; width: 200px"></div>
    </div>
  </div>
  <div class="checker-wrap">
    <div class="grid-1x1x1">
      <div class="grid loaderDiv loading" style="display: none; height: 200px; width: 200px"></div>
      <div class="grid loaderDiv loading" style="display: none; height: 200px; width: 200px"></div>
      <div class="grid loaderDiv loading" style="display: none; height: 200px; width: 200px"></div>
    </div>
  </div>
</div>

</div>


<div id="msg"></div>

<script type="text/javascript"><?php require_once( get_stylesheet_directory() . '/include/image-seo.js'); ?></script>


<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function(event) {
    const fileSize = document.querySelectorAll('.checker-size')
    fileSize.forEach((size, key) => {
        if (size.innerHTML > '70') {
            console.log("bigger");
        } else { 
        }
    });
  });
</script>

<?php //require_once( get_stylesheet_directory() . '/include/process2.php'); ?>
<?php get_template_part( 'template-parts/content-nav', get_post_format() ); ?>
<?php get_footer(); ?>
