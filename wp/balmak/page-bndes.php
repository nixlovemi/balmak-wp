<?php
/* Template Name: Balmak - BNDES */
get_header();
?>

<div class="chamada-topo balmak-border-bottom-red" data-img="<?php echo esc_url( get_template_directory_uri() ); ?>/images/chamada-home-grupo.jpg">
	<div class="chamada-topo-txt"><span>BNDES</span></div>
</div>
<div class="content">
  <div class="main-width">
  	<?php
		while (have_posts()) :
			the_post();
      the_content();
   	endwhile;
		?>
  </div>
</div>

<?php
get_footer();
?>