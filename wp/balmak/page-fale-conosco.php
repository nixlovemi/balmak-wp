<?php
/* Template Name: Balmak - Fale Conosco */
get_header();
?>

<div class="chamada-topo balmak-border-bottom-red" data-img="<?php echo esc_url( get_template_directory_uri() ); ?>/images/chamada-fale-conosco.jpg">
	<div class="chamada-topo-txt"><span>Fale Conosco</span></div>
</div>
<div class="content">
  <div class="main-width">
  	<?php
		$falecon_titulo = simple_fields_values("page_fale_conosco_1_titulo");
		$falecon_conteudo = simple_fields_values("page_fale_conosco_1_conteudo");
		
		// monta array com infos
		$arr_info_atab = array();
		for($i=0; $i<count($falecon_titulo); $i++){
			$v_titulo = (isset($falecon_titulo[$i])) ? $falecon_titulo[$i]: "";
			$v_conteudo = (isset($falecon_conteudo[$i])) ? $falecon_conteudo[$i]: "";
			
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
    <h3 class="balmak-title">SEJA UM CLIENTE</h3>
  	<p>O objetivo da BALMAK é ser a melhor indústria brasileira de pesagem, levando até pessoas e empresas produtos que fazem a diferença e agregam valor ao seu cotidiano. Vantagens Balmak:</p>
    <ul>
    	<li>Um dos mais modernos e completos portfólios de produtos de pesagem do mundo;</li>
      <li>O melhor serviço pós-venda do Brasil;</li>
      <li>A Balmak é um fabricante, e, especializada em soluções na área de pesagem;</li>
      <li>O atendimento comercial é pessoal, e preserva as necessidades e prioridades do cliente;</li>
      <li>Estar com a Balmak é ter a garantia de crescimento, ética e as melhores políticas de gestão.</li>
      <li>Faça parte desta revolução.</li>
    </ul>
    <p class="">Ligue grátis para nossa CENTRAL DE ATENDIMENTO AO CLIENTE 0800 771 79 81 ou envie e-mail para... VENDAS: vendas@balmak.com.br. Ou ainda...</p>
    <div class="section group mt30 mb15">
      <div class="col span_1_of_3 images-div-center">
      	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-fale-conosco-1.jpg" />
      </div>
      <div class="col span_1_of_3 images-div-center">
      	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-fale-conosco-2.jpg" />
      </div>
      <div class="col span_1_of_3 images-div-center">
      	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-fale-conosco-3.jpg" />
      </div>
    </div>
    
    <h3 class="balmak-title">SERVIÇOS E ASSISTÊNCIA TÉCNICA</h3>
    <p>Fale conosco, e descubra porque a BALMAK é campeã em satisfação e evolui sem parar, oferecendo cada vez mais qualidade, tecnologia e segurança ao mercado brasileiro.</p>
    <p>Ligue grátis para nossa CENTRAL DE ATENDIMENTO AO CLIENTE 0800 771 79 81 ou envie e-mail para... DPV (Divisão Pós-Venda): dpv@balmak.com.br. Ou ainda...</p>
    <div class="section group mt30 mb15">
      <div class="col span_2_of_4 images-div-center">
      	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-dpv-3.jpg" />
      </div>
      <div class="col span_2_of_4 images-div-center">
      	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-dpv-2.jpg" />
      </div>
    </div>
    <p>Para assistência técnica em sua localidade, encontre o ATAB (Assistente Técnico Autorizado BALMAK) mais próximo, <a href="javascript:;">clicando aqui</a>.</p>
    
    <h3 class="balmak-title">SEJA UM FORNECEDOR</h3>
    <p>A Balmak esta continuamente em busca de fornecedores comprometidos com alta qualidade, prazos e custos competitivos. Tenha a Balmak como seu cliente.</p>
    <p>Ligue para +55 (19) 3026.1229 ou envie e-mail para... COMPRAS: compras@balmak.com.br | COMEX: comex@balmak.com.br</p>
    
    <h3 class="balmak-title">TRABALHE CONOSCO</h3>
    <p>A Balmak é uma empresa formada por profissionais altamente qualificados e que fazem a diferença.</p>
    <p>Acreditamos no aprendizado contínuo e, por essa razão, investimos em treinamentos e desenvolvimento profissional de todos os colaboradores, com a intenção de formar um time de alto desempenho.</p>
    <p>Manter um quadro de profissionais competentes, motivados e alinhados com as nossas diretrizes é um dos pilares da Balmak.</p>
    <p>Fazer parte deste time, é contribuir não apenas para nossa qualidade, mas também para o cumprimento de nossa filosofia.</p>
    <p>Envie seu currículo para: rh@balmak.com.br</p>
    
    <h3 class="balmak-title">OUTROS CANAIS</h3>
    <p>Fale diretamente com os departamentos</p>
    <p>Ligue para +55 (19) 3026.1229 ou envie e-mail para... </p>
    <br />
    <p>CDE (Centro de Desenvolvimento e Engenharia): engenharia@balmak.com.br</p>
    <p>PRODUÇÃO: producao@balmak.com.br</p>
    <p>FISCAL: fiscal@balmak.com.br</p>
    <p>MARKETING: marketing@balmak.com.br</p>
    <p>CONCIERGE: recepcao@balmak.com.br </p>
    <br />
    <p> *** Atendimento: Segunda a Sexta-Feira, das 8h às 11:30h e 13h às 17:30h, exceto feriados.</p>
		*/
		?>
  </div>
</div>

<?php
get_footer();
?>