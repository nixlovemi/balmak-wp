<?php
/* Template Name: Balmak - Produzido no Brasil */
get_header();
?>

<div class="chamada-topo balmak-border-bottom-red" data-img="<?php echo esc_url( get_template_directory_uri() ); ?>/images/chamada-home-produzido-brasil.jpg">
	<div class="chamada-topo-txt"><span>Premium Quality</span></div>
</div>
<div class="content">
  <div class="main-width">
  	<?php
		$prodBR_titulo = simple_fields_values("page_fabricado_brasil_1_titulo");
		$prodBR_conteudo = simple_fields_values("page_fabricado_brasil_1_conteudo");
		
		// monta array com infos
		$arr_info_prodBR = array();
		for($i=0; $i<count($prodBR_titulo); $i++){
			$v_titulo = (isset($prodBR_titulo[$i])) ? $prodBR_titulo[$i]: "";
			$v_conteudo = (isset($prodBR_conteudo[$i])) ? $prodBR_conteudo[$i]: "";
			
			array_push($arr_info_prodBR, array(
				"titulo"=>$v_titulo,
				"conteudo"=>$v_conteudo,
			));
		}
		
		foreach($arr_info_prodBR as $key => $info_prodBR){
			$v_titulo = (isset($info_prodBR["titulo"])) ? $info_prodBR["titulo"]: "";
			$v_conteudo = (isset($info_prodBR["conteudo"])) ? $info_prodBR["conteudo"]: "";
			
			echo "<h3 class='balmak-title'>$v_titulo</h3>
						$v_conteudo
						<br />";
		}
		?>
		
		<?php
		/*
    <h3 class="balmak-title">Fabricado no Brasil</h3>
    <div class="txt-align-center">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-home-produzido-1.jpg" />
    </div>
    <div class="txt-align-center">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-home-produzido-2.jpg" />
    </div>
		*/
		?>
  </div>
</div>

<?php
get_footer();
?>