<?php
/* Template Name: Balmak - Prêmios */
get_header();
?>

<div class="chamada-topo balmak-border-bottom-red" data-img="<?php echo esc_url( get_template_directory_uri() ); ?>/images/chamada-home-premios.jpg">
	<div class="chamada-topo-txt"><span>Nossos Prêmios</span></div>
</div>
<div class="content">
  <div class="main-width">
  	<?php
		// ARRAY COM OS TEXTOS
		$premios_titulo = simple_fields_values("page_premios_1_titulo");
		$premios_conteudo = simple_fields_values("page_premios_1_conteudo");

		// monta array com infos
		$arr_info_premios = array();
		for($i=0; $i<count($premios_titulo); $i++){
			$v_titulo = (isset($premios_titulo[$i])) ? $premios_titulo[$i]: "";
			$v_conteudo = (isset($premios_conteudo[$i])) ? $premios_conteudo[$i]: "";

			array_push($arr_info_premios, array(
				"titulo"=>$v_titulo,
				"conteudo"=>$v_conteudo,
			));
		}

		foreach($arr_info_premios as $key => $info_premios){
			$v_titulo = (isset($info_premios["titulo"])) ? $info_premios["titulo"]: "";
			$v_conteudo = (isset($info_premios["conteudo"])) ? $info_premios["conteudo"]: "";

			echo "<h3 class='balmak-title'>$v_titulo</h3>
						$v_conteudo
						<br />";
		}
		// ===================
		?>

    <?php
		/*
  	<h3 class="balmak-title">Nossos Pr&ecirc;mios</h3>
    <p>A Balmak é uma das mais premiadas empresas do segmento de pesagem e automação comercial do Brasil. Diversos grupos de comunicação & imprensa, e institutos de pesquisa, reconhecem a consolidação e o crescimento da marca.</p>
    <p>Não há maior certificação que comprove o compromisso da BALMAK com a qualidade e a excelência nos produtos e serviços oferecidos ao mercado. Confira: </p>
		*/
		?>

    <?php
		// ARRAY COM OS PREMIOS
		function fnc_order_array_ano($a, $b) {
			#return $b["ano"] - $a["ano"];
			return strcmp($a["ano"], $b["ano"]);
		}

		$premios2_titulo = simple_fields_values("page_premios_2_titulo");
		$premios2_subtitulo = simple_fields_values("page_premios_2_subtitulo");
		$premios2_conteudo = simple_fields_values("page_premios_2_conteudo");
		$premios2_ano = simple_fields_values("page_premios_2_ano");
		$premios2_url_imagem = simple_fields_values("page_premios_2_url_imagem");

		// monta array com infos
		$arr_info_premios2 = array();
		for($i=0; $i<count($premios2_titulo); $i++){
			$v_titulo = (isset($premios2_titulo[$i])) ? $premios2_titulo[$i]: "";
			$v_subtitulo = (isset($premios2_subtitulo[$i])) ? $premios2_subtitulo[$i]: "";
			$v_conteudo = (isset($premios2_conteudo[$i])) ? $premios2_conteudo[$i]: "";
			$v_ano = (isset($premios2_ano[$i])) ? $premios2_ano[$i]: "";
			$v_url_imagem = (isset($premios2_url_imagem[$i])) ? $premios2_url_imagem[$i]: "";

			array_push($arr_info_premios2, array(
				"titulo"=>$v_titulo,
				"subtitulo"=>$v_subtitulo,
				"conteudo"=>$v_conteudo,
				"ano"=>$v_ano,
				"url_imagem"=>$v_url_imagem,
			));
		}

		$arr_agrup_ano = array();
		foreach($arr_info_premios2 as $premio2){
			$v_ano = $premio2["ano"];

			if( !array_key_exists($v_ano, $arr_agrup_ano) ){
				$arr_agrup_ano[$v_ano] = array();
			}

			array_push($arr_agrup_ano[$v_ano], $premio2);
		}

		// qdo da sort, muda as keys; teria que achar uma forma de preservar as keys
		// usort($arr_agrup_ano, "fnc_order_array_ano");

		foreach($arr_agrup_ano as $ano => $premio2){
			?>
      <div class="ano-premio-holder">
      	<p class="title"><strong><?php echo $ano; ?></strong></p>

        <?php
				foreach($premio2 as $premio){
					$v_titulo = (isset($premio["titulo"])) ? $premio["titulo"]: "";
					$v_subtitulo = (isset($premio["subtitulo"])) ? $premio["subtitulo"]: "";
					$v_conteudo = (isset($premio["conteudo"])) ? $premio["conteudo"]: "";
					$v_url_imagem = (isset($premio["url_imagem"])) ? $premio["url_imagem"]: "";
					?>

          <div class="section group">
            <div class="col span_2_of_4 txt-align-center">
              <img src="<?php echo esc_url( $v_url_imagem ); ?>" />
            </div>
            <div class="col span_2_of_4">
              <br />
              <p class="balmak-title-red"><strong><?php echo $v_titulo; ?></strong></p>
              <p><strong><?php echo $v_subtitulo; ?></strong></p>
              <?php echo $v_conteudo; ?>
            </div>
          </div>
          <?php
				}
				?>
      </div>
      <?php
		}
		// ====================
		?>

    <?php
		/*
    <div class="ano-premio-holder">
      <p class="title"><strong>2013</strong></p>
      <div class="section group">
        <div class="col span_2_of_4 txt-align-center">
        	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-home-premios-1.jpg" />
        </div>
        <div class="col span_2_of_4">
        	<br />
        	<p class="balmak-title-red"><strong>MAIORES & MELHORES (14ª edição)</strong></p>
          <p><strong>Revista Panificação Brasileira | Editora MaxFoods</strong></p>
          <p>A Balmak foi a única marca de pesagem citada entre as maiores e melhores marcas na categoria equipamentos e utensílios, no segmento de panificação brasileiro.</p>
        </div>
      </div>

      <div class="section group">
        <div class="col span_2_of_4 txt-align-center">
        	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-home-premios-2.jpg" />
        </div>
        <div class="col span_2_of_4">
        	<br />
        	<p class="balmak-title-red"><strong>PESQUISA DE PREFERÊNCIA DE MARCA (31ª edição)</strong></p>
          <p><strong>NEI SOLUÇÕES | Editora NEI</strong></p>
          <p>A Balmak foi citada entre as 7 marcas mais lembradas na categoria balanças eletrônicas, para o mercado industrial brasileiro.</p>
        </div>
      </div>

      <div class="section group">
        <div class="col span_2_of_4 txt-align-center">
        	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-home-premios-3.jpg" />
        </div>
        <div class="col span_2_of_4">
        	<br />
        	<p class="balmak-title-red"><strong>PRÊMIO HOSPITAL BEST (9ª edição)</strong></p>
          <p><strong>ABMS - Associação Brasileira de Marketing em Saúde</strong></p>
          <p>A Balmak foi citada entre as 3 maiores marcas na categoria balanças hospitalares, no segmento hospitalar brasileiro.</p>
        </div>
      </div>
    </div>

    <div class="ano-premio-holder">
      <p class="title"><strong>2012</strong></p>
      <div class="section group">
        <div class="col span_2_of_4 txt-align-center">
        	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-home-premios-4.jpg" />
        </div>
        <div class="col span_2_of_4">
        	<br />
        	<p class="balmak-title-red"><strong>MAIORES & MELHORES (13ª edição)</strong></p>
          <p><strong>Revista Panificação Brasileira | Editora MaxFoods</strong></p>
          <p>A Balmak foi citada entre as maiores e melhores marcas na categoria equipamentos e utensílios, no segmento de panificação brasileiro.</p>
        </div>
      </div>

      <div class="section group">
        <div class="col span_2_of_4 txt-align-center">
        	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-home-premios-5.jpg" />
        </div>
        <div class="col span_2_of_4">
        	<br />
        	<p class="balmak-title-red"><strong>PRÊMIO HOSPITAL BEST (8ª edição)</strong></p>
          <p><strong>ABMS - Associação Brasileira de Marketing em Saúde </strong></p>
          <p>A Balmak foi citada entre as 3 maiores marcas na categoria balanças hospitalares, no segmento hospitalar brasileiro.</p>
        </div>
      </div>

      <div class="section group">
        <div class="col span_2_of_4 txt-align-center">
        	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-home-premios-6.jpg" />
        </div>
        <div class="col span_2_of_4">
        	<br />
        	<p class="balmak-title-red"><strong>ANUÁRIO PADARIA MODERNA (13ª edição)</strong></p>
          <p><strong>Revista Padaria Moderna | Editora Maná</strong></p>
          <p>A Balmak foi citada entre as 10 maiores marcas de balanças no segmento de panificação brasileiro.</p>
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
