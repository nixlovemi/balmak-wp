<?php
get_header();
include("include-slider.php");
?>

<div class="content">
  <div class="main-width">
    
    <section id="primary" class="content-area">
      <main id="main" class="site-main main-search-results" role="main">
  
      <?php if ( have_posts() ) : ?>
  
        <header class="page-header">
          <h3 class="balmak-title mt20 mb20">
          	<?php
						echo "Resultado da Pesquisa por '<i>".esc_html( get_search_query() )."</i>'";
						?>
          </h3>
        </header>
  
        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();
          /**
           * Run the loop for the search to output the results.
           * If you want to overload this in a child theme then include a file
           * called content-search.php and that will be used instead.
           */
          ?>
          
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          	<img class="search-image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/search.jpg" />
          
            <header class="entry-header">
              <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            </header>
          
            <?php the_excerpt(); ?>
          </article><!-- #post-## -->
          
          <?php
        // End the loop.
        endwhile;
  
        // Previous/next page navigation.
        /*the_posts_pagination( array(
          'prev_text'          => __( 'Previous page', 'twentysixteen' ),
          'next_text'          => __( 'Next page', 'twentysixteen' ),
          'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
        ) );*/
				wp_pagenavi();
  
      // If no content, include the "No posts found" template.
      else :
        get_template_part( 'template-parts/content', 'none' );
				echo 123;
  
      endif;
      ?>
  
      </main><!-- .site-main -->
    </section><!-- .content-area -->
    
  </div>
</div>

<?php
get_footer();
?>