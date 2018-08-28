<?php
/* Template Name: Balmak - Institucional */
get_header();
?>

<div class="chamada-topo balmak-border-bottom-red" data-img="<?php echo esc_url( get_template_directory_uri() ); ?>/images/chamada-institucional.jpg">
	<div class="chamada-topo-txt"><span>Somos a evolução.</span></div>
</div>
<div class="content">
  <div class="main-width">
    <div class="section group">
      <?php
			$txt_coluna_1 = simple_fields_value("page_institucional_1_coluna_1");
			$txt_coluna_2 = simple_fields_value("page_institucional_1_coluna_2");
			$mostra_duas_colunas = ($txt_coluna_1!='' && $txt_coluna_2!='');
			
			if( $mostra_duas_colunas ){
				?>
        <div id="linha1_col1" class="col span_2_of_4">
          <?php
						/*
						<p>A BALMAK é a indústria de balanças que mais evoluiu e cresceu no Brasil na última década. Está localizada em Santa Bárbara d´Oeste a apenas uma hora da cidade de São Paulo, e apresenta:</p>
						<p>Um dos mais completos e modernos portfólios de produtos de pesagem do mundo, atuando nos segmentos de automação, comercial, industrial, farmacêutico, médico-hospitalar e de uso doméstico;</p>
						<p>O melhor pós-venda do Brasil com peças de reposição a pronta entrega, e a presença de mais de 400 ATABs e ATABs AVANÇADOS em todo o território nacional, comandados pelo 
		DPV (Divisão Pós-Venda) localizado na sede da fábrica;</p>
						<p>Produção nacional com associação aos melhores fabricantes mundiais, oferecendo máxima especialização em tecnologia de pesagem;</p>
						*/
						echo $txt_coluna_1;
					?>
        </div>
        <div id="linha1_col1" class="col span_2_of_4">
          <?php
						/*
						<p>CDE (Centro de Desenvolvimento e Engenharia) que garante a qualidade total dos produtos, e o CTT (Centro de Treinamento e Tecnologia) que garante o treinamento constante da Rede Técnica Autorizada;</p>
						<p>Atendimento comercial pessoal, com presença de equipe de vendas em todo o Brasil e América Latina, garantindo a preservação e o respeito do canal de distribuição;</p>
						<p>Garantia ao cliente: de crescimento sustentado, ética profissional e as melhores políticas de gestão.</p>
						<p>O objetivo da BALMAK é ser a melhor indústria brasileira de pesagem, levando até pessoas e empresas produtos que fazem a diferença e agregam valor ao seu cotidiano. </p>
						<p>Faça parte desta revolução.</p>
						*/
						echo $txt_coluna_2;
					?>
        </div>
        <?php
			}
			else{
				?>
        <div id="linha1_col1" class="col span_4_of_4">
        	<?php echo $txt_coluna_1; ?>
        </div>
        <?php
			}
			?>
    </div>
    
    <!-- imagens institucional -->
    <?php
		$imagens_inst = simple_fields_values("page_institucional_2_url_imagem");
		$arr_img_loop = array();
		
		$i=0;
		$v_key=0;
		foreach($imagens_inst as $key => $url_image){
			if(!array_key_exists($v_key, $arr_img_loop)){
				$arr_img_loop[$v_key] = array();
			}
			
			array_push($arr_img_loop[$v_key], $url_image);
			$i++;
			
			if($i==4){
				$i=0;
				$v_key++;
			}
		}
		
		// fazer loop
		$css_dv = "mt30";
		foreach($arr_img_loop as $key => $arr_imagens){
			echo "<div class='section group $css_dv dv-holder-img-institucional'>";
			$css_dv = "";
			
			foreach($arr_imagens as $kkey => $url_imagem){
				$pathParts = pathinfo($url_imagem);
				
				$fileName = $pathParts["filename"]; // inst1
				$fileExt = $pathParts["extension"]; // png
				$fileDir = $pathParts["dirname"]; // http://balmak.com.br/wp-content/uploads/2017/01
				$filePath = str_replace("http://balmak.com.br", "/home/storage/6/75/72/balmak1/public_html", $fileDir); // /wp-content/uploads/2017/01
	
				$prefixThumb = "-350x350";
				$imgThumb = $fileDir . "/" . $fileName . $prefixThumb . "." . $fileExt;
				$imgPath = $filePath . "/" . $fileName . $prefixThumb . "." . $fileExt;
				
				if(!file_exists($imgPath)){
					$imgThumb = $fileDir . "/" . $fileName . "." . $fileExt;
				}
				
				echo "<div class='col span_1_of_4'>
								<a href='$url_imagem' class='fresco' data-fresco-group='fresco_institucional_imagens'><img src='$imgThumb' /></a>
							</div>";
			}
			
			echo "</div>";
		}
		?>
    
    <?php
		/*
    <div class="section group mt30 dv-holder-img-institucional">
    	<div class="col span_1_of_4">
      	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/institucional-1.jpg" />
      </div>
      <div class="col span_1_of_4">
      	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/institucional-2.jpg" />
      </div>
      <div class="col span_1_of_4">
      	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/institucional-3.jpg" />
      </div>
      <div class="col span_1_of_4">
      	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/institucional-4.jpg" />
      </div>
    </div>
    <div class="section group dv-holder-img-institucional">
    	<div class="col span_1_of_4">
      	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/institucional-5.jpg" />
      </div>
      <div class="col span_1_of_4">
      	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/institucional-6.jpg" />
      </div>
      <div class="col span_1_of_4">
      	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/institucional-7.jpg" />
      </div>
      <div class="col span_1_of_4">
      	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/institucional-8.jpg" />
      </div>
    </div>
    */
		?>
    
    <!-- xxxxxxxxxxxxxxxxxxxxx -->
    <div class="section group ml0 mr0 mt15 dv-pos-img-institucional">
    	<div class="col span_4_of_4">
      	<p style="text-align:center;">
        	<a href="/ao-cliente/videos/">
          	<img style="position:relative; margin-left:auto; margin-right:auto;" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/assista-videos.jpg" class="" />
          </a>
        </p>
        <p style="text-align:center;">
        	<a href="/produtos/">
          	<img style="position:relative; margin-left:auto; margin-right:auto;" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/solucao-prod-pesagem.jpg" class="" />
          </a>
        </p>
      </div>
    </div>
    
  </div>
</div>

<?php
get_footer();
?>