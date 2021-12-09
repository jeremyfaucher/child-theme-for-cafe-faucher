<footer>
<?php $social_data = get_option( 'wpseo_social' ); ?>
<?php //var_dump($social_data); ?>
<section class="container grid-1x1x1">
<div class="social-block">
<a class="socials" href="https://twitter.com/<?php echo $social_data['twitter_site']; ?>" target="_blank"><span class="icon-twitter"></span></a>
<a class="socials" href="<?php echo $social_data['linkedin_url']; ?>" target="_blank"><span class="icon-linkedin2"></span></a>
<a class="socials" href="<?php echo $social_data['instagram_url']; ?>" target="_blank"><span class="icon-instagram"></span></a>
</div>
<?php wp_nav_menu(array(
'theme_location' => 'footer', 
'container' => false, 
'menu_class' => 'footer-menu', 
)); 
?>  
<div class='copyright'><p class="no-top">Design 2 SEO &copy All Rights Reserved <?php echo date('Y') ?><br>Website by <a href="http://localhost/blog/author/jeremy-faucher/" target="_blank">Jeremy Faucher</a></p></div>
</section>
</footer>
<?php wp_footer() ?>
</body></html>
 <script type="text/javascript">
// This JS is use to change between the hamburger icon and the X icon
checkbox = document.getElementById("hamburger");
lab = document.getElementsByTagName("label");
function checker(){
if(checkbox.checked == false){
lab[0].innerHTML = '☰';
}else{
lab[0].innerHTML = '✖';
}
}
checkbox.onclick = function(){
checker();
}
</script>

