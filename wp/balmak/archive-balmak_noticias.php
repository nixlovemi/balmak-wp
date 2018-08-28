<div class="chamada-topo balmak-border-bottom-red" data-img="<?php echo esc_url( get_template_directory_uri() ); ?>/images/chamada-imprensa-noticias.jpg">
	<div class="chamada-topo-txt"><span>Blog de Notícias</span></div>
</div>
<div class="content">
  <div class="main-width">
    <!--
    <form class="mb40">
      <table width="100%" align="center" class="txt-align-center">
        <tr>
          <td align="center" >
            <select name="blog_mes" style="width:50%;">
              <option value="">--Escolha o mês/ano</option>
              <option value="12/2015">Dez/2015</option>
              <option selected value="01/2016">Jan/2016</option>
              <option value="02/2016">Fev/2016</option>
              <option value="03/2016">Mar/2016</option>
            </select>
          </td>
        </tr>
      </table>
    </form>
    -->
    
    <div class="section group">
      <div class="col span_3_of_4">
      
      	<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				
				$loop = new WP_Query(
											array(
												'post_type' => 'balmak_noticias',
												'posts_per_page' => 10,
												'orderby'=> 'date',
												'paged'=>$paged
											)
								); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<?php
					$V_TITULO = get_the_title();
					$V_DATA = date("d F Y", strtotime(get_the_time()));
					$V_AUTOR = get_the_author();
					//$V_CONTEUDO = get_the_content();
					$V_CONTEUDO = get_the_excerpt();
					?>
					
					<div class="blog-item">
            <div class="meta-top">
              <h3 class="title"><a href="<?php echo get_permalink($V_ID); ?>"><?php echo $V_TITULO; ?></a></h3>
              <p style="display: none;" class="mb0">
                <small><?php echo $V_DATA; ?></small>
                <br />
                <small>Postado por: <?php echo $V_AUTOR; ?></small>
              </p>
            </div>
            <div class="image">
              <?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail();
							} 
							?>
            </div>
            <div class="body">
              <?php echo $V_CONTEUDO; ?>
              <p class="mt10" align="left"><a href="<?php echo get_permalink($V_ID); ?>">Veja mais ...</a></p>
            </div>
            
            <?php
						/*
            <div class="social">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-imprensa-agenda-1.jpg" />
            </div>
						*/
						?>
          </div>
					
				<?php endwhile; ?>
        <?php wp_pagenavi( array( 'query' => $loop ) ); ?>
        <?php wp_reset_query(); ?>
      </div>
      <div class="col span_1_of_4">
      	<?php
				include("page-imprensa-agenda-eventos-side.php");
				?>
      </div>
    </div>
  </div>
</div>