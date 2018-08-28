<?php
/* Template Name: Balmak - O Grupo */
get_header();
?>

<div class="chamada-topo balmak-border-bottom-red" data-img="http://balmak.com.br/wp-content/uploads/2017/02/ban_ogrupo.png">
	<div class="chamada-topo-txt"><span>O Grupo</span></div>
</div>
<div class="content">
  <div class="main-width">
  	<?php
		$o_grupo_url_image = simple_fields_values("page_o_grupo_1_url_imagem");
		$o_grupo_titulo = simple_fields_values("page_o_grupo_1_titulo");
		$o_grupo_descricao = simple_fields_values("page_o_grupo_1_descricao");
		
		// monta array com infos
		$arr_info_o_grupo = array();
		for($i=0; $i<count($o_grupo_titulo); $i++){
			$v_url_img = (isset($o_grupo_url_image[$i])) ? $o_grupo_url_image[$i]: "";
			$v_titulo = (isset($o_grupo_titulo[$i])) ? $o_grupo_titulo[$i]: "";
			$v_descricao = (isset($o_grupo_descricao[$i])) ? $o_grupo_descricao[$i]: "";
			
			array_push($arr_info_o_grupo, array(
				"url_image"=>$v_url_img,
				"titulo"=>$v_titulo,
				"descricao"=>$v_descricao,
			));
		}
		
		foreach($arr_info_o_grupo as $key => $info_atab){
			$v_url_img = (isset($info_atab["url_image"])) ? $info_atab["url_image"]: "";
			$v_titulo = (isset($info_atab["titulo"])) ? $info_atab["titulo"]: "";
			$v_descricao = (isset($info_atab["descricao"])) ? $info_atab["descricao"]: "";
			?>
      
      <div class="section group">
        <div id="linha1_col1" class="col span_2_of_4 txt-align-center">
          <img src="<?php echo esc_url( $v_url_img ); ?>" />
        </div>
        <div id="linha1_col1" class="col span_2_of_4">
          <br />
          <p><strong><?php echo $v_titulo; ?></strong></p>
          <p><?php echo $v_descricao; ?></p>
        </div>
      </div>
      
      <?php
		}
		?>
  
  	<?php
		/*
    <div class="section group">
      <div id="linha1_col1" class="col span_2_of_4 txt-align-center">
      	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-home-grupo-1.jpg" />
      </div>
      <div id="linha1_col1" class="col span_2_of_4">
      	<br />
      	<p><strong>GRUPO DELLA ROSA</strong></p>
        <p>A Balmak é parte integrante de um grupo sólido e de sucesso, nascido em 1976, e que opera 3 grandes empresas no Brasil. É o Grupo Della Rosa, que além da tradicional indústrias de balanças, possui também outras duas empresas lideradas pelo empreendedorismo do Sr. Devanir Della Rosa.</p>
      </div>
    </div>
    
    <div class="section group">
      <div id="linha1_col1" class="col span_2_of_4 txt-align-center">
      	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-home-grupo-2.jpg" />
      </div>
      <div id="linha1_col1" class="col span_2_of_4">
      	<p><strong>METAL&Uacute;RGICA DELLA ROSA</strong></p>
        <p>Empresa localizada em Santa Bárbara d´Oeste, fabricante de Auto-parts para tratores, caminhões, ônibus, empilhadeiras, colheitadeiras, utilitários e outros automotores. Com quase 40 anos de mercado, é líder absoluta na fabricação de peças para tratores, fornecendo a linha de montagem de fabricantes como a VALMET (Valtra) e a Massey Ferguson (AGCO do Brasil). A empresa possui certificado ISO 9001:2008 e atua através de uma filosofia de altíssima qualidade em produtos e atendimento. Conta com entrega imediata para todo o Brasil e preços justos em função de seus diferenciais.</p>
      </div>
    </div>
    
    <div class="section group">
      <div id="linha1_col1" class="col span_2_of_4 txt-align-center">
      	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-home-grupo-3.jpg" />
      </div>
      <div id="linha1_col1" class="col span_2_of_4">
      	<br />
      	<p><strong>FAZENDA ROSANE</strong></p>
        <p>Empresa de agro-business localizada no norte no Mato Grosso, produtora rural de gado de corte de alto padrão, qualidade e genética. Conta com uma propriedade dotada de instalações diferenciadas, destacando-se diante dos frigoríficos compradores locais. Conta também com tecnologia de inseminação artificial e plantel selecionado de mais de 6000 cabeças.</p>
      </div>
    </div>
		*/
		?>
  </div>
</div>

<?php
get_footer();
?>