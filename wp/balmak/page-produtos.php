<?php
/* Template Name: Balmak - Produtos */
get_header();
?>

<?php
$url_banner_produto = simple_fields_value("page_produtos_3_url_banner");
$txt_banner_produto = simple_fields_value("page_produtos_3_texto_banner");

if($url_banner_produto == "" || $txt_banner_produto == ""){
	$url_banner_produto = esc_url( get_template_directory_uri() ) . "/images/chamada-produtos.jpg";
	$txt_banner_produto = "Produtos";
}
?>

<div class="chamada-topo balmak-border-bottom-red" data-img="<?php echo $url_banner_produto; ?>">
	<div class="chamada-topo-txt"><span><?php echo $txt_banner_produto; ?></span></div>
</div>
<div class="content">
  <div class="main-width">
		<div class='section group'>
    	<div class='col span_1_of_4'>
        <div class="side-item">
          <div class="title">
            Escolha
          </div>
					<div class="title2 mb20">
            <a href="javascript:;" onclick="$('.side-item .body').toggle();">Escolha (clique aqui)</a>
          </div>
          <div class="body">
          	<ul id="menu-side-produtos">
							<?php
							fncPrintSideProdutos();
							?>
          	</ul>
          </div>
        </div>
      </div>
      <div class='col span_3_of_4'>
      	<?php
				$vIdPgProdutos = 100;
				if(is_numeric($id) && $id != $vIdPgProdutos){
					$ARR_FILTER = array(
						'post_type' => 'balmak-produtos',
						'posts_per_page' => -1,
						'p' => $id,
					);
				}
				else{
					$ARR_FILTER = array(
						'post_type' => 'page',
						'posts_per_page' => -1,
						'p' => 100,
					);
				}
				?>

      	<?php $loop = new WP_Query($ARR_FILTER); ?>
				<?php while ( $loop->have_posts() ) : setup_postdata($loop->the_post()); ?>
					<div style="padding: 0 0 0 29px; border-left: 1px solid #f1f1f1; position: relative; left: 23px;">

						<h1 class="produtos-title"><?php the_title(); ?></h1>

	          <div class="div-content-produtos">
	          	<?php the_content(); ?>
	          </div>

	          <?php
						$produtos_titulo = simple_fields_values("page_produtos_2_titulo", $id);
						$produtos_url = simple_fields_values("page_produtos_2_pag_produto", $id);

						if( count($produtos_titulo) > 0 ){
							?>
	            <div class="lista-produtos mt40 images-div-center">
	          		<?php
								for( $i=0; $i<count($produtos_titulo); $i++ ){
									$V_TITULO = $produtos_titulo[$i];
									$V_URL = $produtos_url[$i];

									echo "<a href='$V_URL'>$V_TITULO</a><br />";
								}
								?>
	          	</div>
	            <?php
						}
						?>

	          <div class="icones-download mt40 images-div-center">
	          	<?php
							$catalogos_zip = simple_fields_value("page_produtos_1_catalogo_zip", $id);
							$catalogos_pdf = simple_fields_value("page_produtos_1_catalogo_pdf", $id);
							$video_url = simple_fields_value("page_produtos_1_video_inst", $id);
							?>

	            <?php
							if( $catalogos_zip != "" ){
								?>
	              <a href="<?php echo $catalogos_zip; ?>" target="_blank">
	                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-produto-2.jpg" />
	                &nbsp;
	              </a>
	              <?php
							}
							?>

	            <?php
							if( $catalogos_pdf != "" ){
								?>
	              <a href="<?php echo $catalogos_pdf; ?>" target="_blank">
	                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-produto-3.jpg" />
	                &nbsp;
	              </a>
	              <?php
							}
							?>

	            <?php
							if( $video_url != "" ){
								?>
	              <a href="<?php echo $video_url; ?>" target="_blank">
	                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-produto-4.jpg" />
	                &nbsp;
	              </a>
	              <?php
							}
							?>
	          </div>

					</div>
        <?php endwhile; wp_reset_query(); ?>
      </div>
    </div>
  </div>
</div>

<?php
get_footer();
?>
