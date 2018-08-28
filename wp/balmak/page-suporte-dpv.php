<?php
/* Template Name: Balmak - DPV */
get_header();
?>

<div class="chamada-topo balmak-border-bottom-red" data-img="<?php echo esc_url( get_template_directory_uri() ); ?>/images/chamada-suporte-dpv.jpg">
	<div class="chamada-topo-txt"><span>Divisão Pós Venda</span></div>
</div>
<div class="content">
  <div class="main-width">
  	<div class="section group mb60">
    	<?php
			$ctt_topo_img = simple_fields_value("page_divisao_pos_venda_1_imagem_topo");
			$ctt_topo_title = simple_fields_value("page_divisao_pos_venda_1_titulo_topo");
			$ctt_topo_txt = simple_fields_value("page_divisao_pos_venda_1_texto_topo");
			?>

    	<div class="col span_2_of_4 txt-align-center">
      	<img src="<?php echo esc_url( $ctt_topo_img ); ?>" />
      </div>
      <div class="col span_2_of_4 txt-align-center">
      	<h3 class="balmak-title"><?php echo $ctt_topo_title; ?></h3>
        <p><?php echo $ctt_topo_txt; ?></p>
      </div>
    </div>

    <?php
		$dpv_titulo = simple_fields_values("page_divisao_pos_venda_2_titulo");
		$dpv_conteudo = simple_fields_values("page_divisao_pos_venda_2_conteudo");

		// monta array com infos
		$arr_info_atab = array();
		for($i=0; $i<count($dpv_titulo); $i++){
			$v_titulo = (isset($dpv_titulo[$i])) ? $dpv_titulo[$i]: "";
			$v_conteudo = (isset($dpv_conteudo[$i])) ? $dpv_conteudo[$i]: "";

			array_push($arr_info_atab, array(
				"titulo"=>$v_titulo,
				"conteudo"=>$v_conteudo,
			));
		}

		foreach($arr_info_atab as $key => $info_atab){
			$v_titulo = (isset($info_atab["titulo"])) ? $info_atab["titulo"]: "";
			$v_conteudo = (isset($info_atab["conteudo"])) ? $info_atab["conteudo"]: "";

			echo "<h3 class='balmak-title'>$v_titulo</h3>
						$v_conteudo
						<br />";
		}
		?>

  	<?php
		/*
  	<h3 class="balmak-title">Quem pode ser atendido pelo DPV?</h3>
    <ul>
      <li>Software House</li>
      <li>Assistente Técnico Autorizado BALMAK (ATAB)</li>
      <li>Distribuidor</li>
      <li>Revendedor (varejo ou atacado)</li>
      <li>Consumidor (usuário do equipamento)</li>
    </ul>

    <h3 class="balmak-title">Quais assuntos são atendidos pelo DPV?</h3>
    <ul>
      <li>Contratação e administração da Rede de Suporte Técnico BALMAK;</li>
      <li>Auxílio telefônico à manutenção;</li>
      <li>Manutenção técnica em peças e equipamentos (em garantia ou não);</li>
      <li>Dúvidas sobre operação e funcionamento dos produtos;</li>
      <li>Vendas de peças e acessórios;</li>
      <li>Troca de peças ou equipamentos (em garantia ou não);</li>
      <li>Encaminhamento de produto à fábrica, ou, à assistência técnica.</li>
      <li>Auxílio na instalação de equipamentos nos mais diversos níveis – desde a função de uma simples tecla até a definição de protocolos para a comunicação de dados com uma rede ou PDV.</li>
    </ul>
		*/
		?>

    <h3 class="balmak-title balmak-border-bottom-red">Formas de Contato</h3>
    <p><strong>Ligação gratuita: 0800 771 79 81</strong></p>
    <p>(Seg-Sexta das 8h às 11:30h e 13h às 17:30h, exceto feriados)</p>
    <p>E-mail: dpv@balmak.com.br</p>

		<div class="section group mt30">
			<div class="col span_2_of_4 txt-align-center">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-dpv-2.jpg" />
			</div>

			<div class="col span_2_of_4 txt-align-center">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-dpv-3.jpg" />
			</div>
		</div>
  </div>
</div>

<?php
get_footer();
?>
