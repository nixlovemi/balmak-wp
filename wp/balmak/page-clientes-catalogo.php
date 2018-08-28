<?php
/* Template Name: Balmak - Catálogos e Manuais */
get_header();
?>

<?php
$url_banner_produto = simple_fields_value("page_produtos_3_url_banner");
$txt_banner_produto = simple_fields_value("page_produtos_3_texto_banner");

if($url_banner_produto == ""){
	$url_banner_produto = "http://balmak.com.br/wp-content/themes/balmak/images/chamada-institucional.jpg";
	$txt_banner_produto = get_the_title();
}
?>

<div class="chamada-topo balmak-border-bottom-red" data-img="<?php echo $url_banner_produto; ?>">
	<div class="chamada-topo-txt"><span><?php echo $txt_banner_produto; ?></span></div>
</div>
<div class="content">
  <div class="main-width">
  	<?php
		$catalogos_titulo = simple_fields_values("page_catalogos_manuais_1_titulo");
		$catalogos_url_imagem = simple_fields_values("page_catalogos_manuais_1_url_imagem");
		$catalogos_linha1 = simple_fields_values("page_catalogos_manuais_1_linha1");
		$catalogos_linha2 = simple_fields_values("page_catalogos_manuais_1_linha2");
		$catalogos_url_catalogo = simple_fields_values("page_catalogos_manuais_1_url_catalogo");
		$arr_catalogo_loop = array();

		$i=0;
		$v_key=0;
		for($ii=0; $ii<count($catalogos_titulo);$ii++){
			if(!array_key_exists($v_key, $arr_catalogo_loop)){
				$arr_catalogo_loop[$v_key] = array();
			}

			array_push($arr_catalogo_loop[$v_key], array(
				"titulo"=>$catalogos_titulo[$ii],
				"url_imagem"=>$catalogos_url_imagem[$ii],
				"linha1"=>$catalogos_linha1[$ii],
				"linha2"=>$catalogos_linha2[$ii],
				"url_catalogo"=>$catalogos_url_catalogo[$ii],
			));
			$i++;

			if($i==2){
				$i=0;
				$v_key++;
			}
		}

		// fazer loop
		$css_dv = "mt30";
		foreach($arr_catalogo_loop as $key => $arr_catalogo){
			echo "<div class='section group'>";
			$css_dv = "";

			foreach($arr_catalogo as $kkey => $catalogo){
				echo "<div class='col span_2_of_4 txt-align-center'>
								<div class='hold-clientes-catalogos-item'>
									<p><img src='".$catalogo["url_imagem"]."' /></p>
									<p class='title'>".$catalogo["titulo"]."</p>
									<p>".$catalogo["linha1"]."</p>
									<p>".$catalogo["linha2"]."</p>
									<p>
										<a target='_blank' href='".$catalogo["url_catalogo"]."' class='btn-enviar-vermelho' style='color:#FFF; display:inline-block;'>BAIXAR CAT&Aacute;LOGO</a>
									</p>
								</div>
							</div>";
			}

			echo "</div>";
		}
		?>

  	<?php
		/*
  	<div class="section group">
      <div class="col span_2_of_4 txt-align-center">
      	<div class="hold-clientes-catalogos-item">
        	<p><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-clientes-catalogo-1.jpg" /></p>
          <p class="title">Linha &Oacute;RION</p>
          <p>Linha Automa&ccedil;&atilde;o Comercial</p>
          <p>2015/2016</p>
          <p><input type="button" class="btn-enviar-vermelho" value="BAIXAR CAT&Aacute;LOGO" /></p>
        </div>
      </div>
      <div class="col span_2_of_4 txt-align-center">
      	<div class="hold-clientes-catalogos-item">
        	<p><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-clientes-catalogo-2.jpg" /></p>
          <p class="title">Linha Comercial</p>
          <p>Linha Comercial</p>
          <p>2015/2016</p>
          <p><input type="button" class="btn-enviar-vermelho" value="BAIXAR CAT&Aacute;LOGO" /></p>
        </div>
      </div>
    </div>

    <div class="section group">
      <div class="col span_2_of_4 txt-align-center">
      	<div class="hold-clientes-catalogos-item">
        	<p><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-clientes-catalogo-3.jpg" /></p>
          <p class="title">Linha Industrial</p>
          <p>Linha Industrial Advance</p>
          <p>2015/2016</p>
          <p><input type="button" class="btn-enviar-vermelho" value="BAIXAR CAT&Aacute;LOGO" /></p>
        </div>
      </div>
      <div class="col span_2_of_4 txt-align-center">
      	<div class="hold-clientes-catalogos-item">
        	<p><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-clientes-catalogo-4.jpg" /></p>
          <p class="title">Linha BKF-M&oacute;bile</p>
          <p>Balan&ccedil;a Digital Port&aacute;til</p>
          <p>2015/2016</p>
          <p><input type="button" class="btn-enviar-vermelho" value="BAIXAR CAT&Aacute;LOGO" /></p>
        </div>
      </div>
    </div>
		*/
		?>
  </div>
</div>

<?php
get_footer();
?>
