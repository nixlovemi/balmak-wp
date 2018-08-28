<?php
/* Template Name: Balmak - Nossa Historia */
get_header();
?>

<div class="chamada-topo balmak-border-bottom-red" data-img="<?php echo esc_url( get_template_directory_uri() ); ?>/images/chamada-institucional.jpg">
	<div class="chamada-topo-txt"><span>Somos a evolução.</span></div>
</div>
<div class="content">
  <div class="main-width">
    <h3 class="balmak-title mt20">NOSSA HISTÓRIA</h3>
    <div class="section group mt10">
      <div class="col span_1_of_8 txt-align-right">
      	
      </div>
      <div class="col span_7_of_8">
      	<p>A BALMAK se orgulha de sua história. Preparamos uma linha do tempo que mostra os principais fatos históricos, ano após ano. Acompanhe:</p>
      </div>
    </div>
    
    <?php
		$hist_anos = simple_fields_values("page_institucional_3_ano");
		$hist_titulos = simple_fields_values("page_institucional_3_titulo");
		$hist_descricoes = simple_fields_values("page_institucional_3_descricao");
		$hist_imagens = simple_fields_values("page_institucional_3_url_imagem");
		
		// monta array com infos
		$arr_info_historia = array();
		for($i=0; $i<count($hist_anos); $i++){
			$v_ano = (isset($hist_anos[$i])) ? $hist_anos[$i]: "";
			$v_titulo = (isset($hist_titulos[$i])) ? $hist_titulos[$i]: "";
			$v_desc = (isset($hist_descricoes[$i])) ? $hist_descricoes[$i]: "";
			$v_img = (isset($hist_imagens[$i])) ? $hist_imagens[$i]: "";
			
			array_push($arr_info_historia, array(
				"ano"=>$v_ano,
				"titulo"=>$v_titulo,
				"desc"=>$v_desc,
				"img"=>$v_img,
			));
		}
		// =====================
		
		foreach($arr_info_historia as $key => $arr_hist){
			$v_ano = $arr_hist["ano"];
			$v_titulo = $arr_hist["titulo"];
			$v_desc = $arr_hist["desc"];
			$v_img = ($arr_hist["img"] != "" ) ? "<p align='left'><img style='position:relative; margin-left:0;' src='".$arr_hist["img"]."' /></p>": "";
			
			echo "<div class='section group mt10 p-mb5'>
							<div class='col span_1_of_8 txt-align-right'>
								<strong class='balmak-title-ano'>$v_ano</strong>
							</div>
							<div class='col span_7_of_8'>
								<p><strong>$v_titulo</strong></p>
								<p>$v_desc</p>
								$v_img
							</div>
						</div>";
		}
		?>
    
    <?php
		/*
    <div class="section group mt10 p-mb5">
      <div class="col span_1_of_8 txt-align-right">
      	<strong class="balmak-title-ano">1993</strong>
      </div>
      <div class="col span_7_of_8">
      	<p><strong>Sonho realizado</strong></p>
      	<p>Fundada por Devanir Della Rosa - empresário do setor metalúrgico -, nasce a BALMAK Indústria e Comércio Ltda.</p>
        <p><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo-balmak-institucional.jpg" /></p>
      </div>
    </div>
    <div class="section group mt10 p-mb5">
    	<div class="col span_1_of_8 txt-align-right">
      	<strong class="balmak-title-ano">1994</strong>
      </div>
      <div class="col span_7_of_8">
      	<p><strong>O começo</strong></p>
      	<p>A operação de produção é iniciada com a aprovação no INMETRO dos modelos de balanças mecânicas 63, 101 e 104. O modelo 63, semi-roberval de capacidade 15kg, desponta como um grande sucesso!</p>
        <p><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/balanca-institucional.jpg" /></p>
      </div>
    </div>
    <div class="section group mt10 p-mb5">
    	<div class="col span_1_of_8 txt-align-right">
      	<strong class="balmak-title-ano">1995</strong>
      </div>
      <div class="col span_7_of_8">
      	<p><strong>Definindo o mercado</strong></p>
      	<p>A BALMAK, que no princípio não tinha objetivo exclusivo de produção de balanças, inicia a produção de carrinhos de hot dog e também máquinas depenadeiras de frango. Os itens foram descontinuados alguns anos depois.</p>
        <p><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/hotdog-institucional.jpg" /></p>
      </div>
    </div>
    <div class="section group mt10 p-mb5">
    	<div class="col span_1_of_8 txt-align-right">
      	<strong class="balmak-title-ano">1996</strong>
      </div>
      <div class="col span_7_of_8">
      	<p><strong>O Progresso</strong></p>
      	<p>São lançadas as primeiras balanças eletrônicas. A era digital chega junto com a linha industrial de balanças de plataforma ´BK´, com capacidades entre 50kg e 500kg.</p>
        <p><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/balancas-institucional.jpg" /></p>
      </div>
    </div>
    <div class="section group mt10 p-mb5">
    	<div class="col span_1_of_8 txt-align-right">
      	<strong class="balmak-title-ano">1997</strong>
      </div>
      <div class="col span_7_of_8">
      	<p><strong>Uma nova era</strong></p>
      	<p>1997 é um ano importante para a empresa. Uma nova marca é lançada para ser estampada nos lançamentos.</p>
        <p><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/balancas2-institucional.jpg" /></p>
        <p><strong>Novos Produtos</strong></p>
        <p>Chega ao mercado a MASTER. Uma nova linha de balanças comerciais, computadoras de preço, que apresentam como grande diferencial a opção de modelo com capacidade 50kg e divisão 10g.</p>
      </div>
    </div>
    <div class="section group mt10 p-mb5">
    	<div class="col span_1_of_8 txt-align-right">
      	<strong class="balmak-title-ano">1998</strong>
      </div>
      <div class="col span_7_of_8">
      	<p><strong>Chegando para ficar</strong></p>
      	<p>A BALMAK entra pra valer no segmento Farma-Médico-Hospitalar, lançando balanças mecânicas e eletrônicas para pesar bebês, e para pesar e medir adultos.</p>
        <p><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/balancas3-institucional.jpg" /></p>
      </div>
    </div>
		*/
		?>
    
  </div>
</div>

<?php
get_footer();
?>