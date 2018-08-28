<?php
/* Template Name: Balmak - Políticas e Valores */
get_header();
?>

<div class="chamada-topo balmak-border-bottom-red" data-img="<?php echo esc_url( get_template_directory_uri() ); ?>/images/chamada-home-valores.jpg">
	<div class="chamada-topo-txt"><span>Políticas e Valores</span></div>
</div>
<div class="content">
  <div class="main-width">
  	<?php
		$valores_titulo = simple_fields_values("page_politica_valores_1_titulo");
		$valores_conteudo = simple_fields_values("page_politica_valores_1_conteudo");
		
		// monta array com infos
		$arr_info_valores = array();
		for($i=0; $i<count($valores_titulo); $i++){
			$v_titulo = (isset($valores_titulo[$i])) ? $valores_titulo[$i]: "";
			$v_conteudo = (isset($valores_conteudo[$i])) ? $valores_conteudo[$i]: "";
			
			array_push($arr_info_valores, array(
				"titulo"=>$v_titulo,
				"conteudo"=>$v_conteudo,
			));
		}
		
		foreach($arr_info_valores as $key => $info_valores){
			$v_titulo = (isset($info_valores["titulo"])) ? $info_valores["titulo"]: "";
			$v_conteudo = (isset($info_valores["conteudo"])) ? $info_valores["conteudo"]: "";
			
			echo "<h3 class='balmak-title'>$v_titulo</h3>
						$v_conteudo
						<br />";
		}
		?>
  
  	<?php
		/*
    <h3 class="balmak-title">Missão</h3>
    <p>Fornecer produtos e serviços relacionados às necessidades de pesagem aos diversos mercados (e seus segmentos) atendidos pela BALMAK, com o compromisso de criar valor e atender aos interesses de seus clientes, fornecedores, acionistas, colaboradores, sociedade em geral e da própria BALMAK.</p>
    
    <h3 class="balmak-title">Visão</h3>
    <p>Ser a melhor indústria brasileira de pesagem ampliando progressivamente sua participação no mercado, atuando de forma segura, eficiente, rentável e sustentável.</p>
    
    <h3 class="balmak-title">Valores</h3>
    <p>A BALMAK pauta sua atuação por princípios que sustentam todo o seu modelo organizacional. Ao longo do tempo alguns valores básicos foram associados à cultura da empresa, definindo seu núcleo de identidade corporativa, se consolidando como alicerces sobre os quais a BALMAK construiu seu modo de agir e de se relacionar:</p>
    <p><strong>A humanidade</strong> - respeitamos em primeiro lugar o ser humano.</p>
    <p><strong>A ética e o respeito às leis.</strong></p>
    <p><strong>Transparência e integridade</strong> - Sempre seremos francos, e honraremos acordos pré-estabelecidos. Falaremos o que acreditamos e faremos o que dizemos.</p>
    <p><strong>Inovação</strong> – Desafiamos o pensamento convencional, exploramos novas tecnologias e idéias.</p>
    <p><strong>Trabalho em equipe</strong> - Venceremos trabalhando como uma única empresa, uma única família. Nossas forças estão no nosso pessoal altamente qualificado e na nossa diversidade.</p>
		*/
		?>
    
    <div class="mb40"></div>
    
    <?php
		$valores_bl2_url_imagem = simple_fields_values("page_politica_valores_2_url_imagem");
		$valores_bl2_conteudo = simple_fields_values("page_politica_valores_2_conteudo");
		
		// monta array com infos
		$arr_info_valoreBl2 = array();
		for($i=0; $i<count($valores_bl2_url_imagem); $i++){
			$v_titulo = (isset($valores_bl2_url_imagem[$i])) ? $valores_bl2_url_imagem[$i]: "";
			$v_conteudo = (isset($valores_bl2_conteudo[$i])) ? $valores_bl2_conteudo[$i]: "";
			
			array_push($arr_info_valoreBl2, array(
				"url_imagem"=>$v_titulo,
				"conteudo"=>$v_conteudo,
			));
		}
		
		foreach($arr_info_valoreBl2 as $key => $info_valoresBl2){
			$v_url_imagem = (isset($info_valoresBl2["url_imagem"])) ? $info_valoresBl2["url_imagem"]: "";
			$v_conteudo = (isset($info_valoresBl2["conteudo"])) ? $info_valoresBl2["conteudo"]: "";
			?>
      
      <div class="section group">
        <div id="linha1_col1" class="col span_2_of_4 txt-align-center">
          <img src="<?php echo esc_url( $v_url_imagem ); ?>" />
        </div>
        <div id="linha1_col1" class="col span_2_of_4">
          <?php echo $v_conteudo; ?>
        </div>
      </div>
      
      <?php
		}
		?>
    
    <?php
		/*
    <div class="section group">
      <div id="linha1_col1" class="col span_2_of_4 txt-align-center">
      	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-home-valores-1.jpg" />
      </div>
      <div id="linha1_col1" class="col span_2_of_4">
      	<p><strong>Política de qualidade</strong></p>
        <p>Atingir continuamente resultados consistentemente melhores em termos de Satisfação do Cliente com produtos e serviços. Indicadores confiáveis serão empregados para gestão do negócio. Processos e pessoas têm sido, e sempre serão, a chave para a excelência nos resultados.</p>
        <p>A BALMAK obedece a legislação metrológica vigente e garante publicamente que todos os produtos de sua linha de balanças de uso profissional apresentam portaria de aprovação de modelo em acordo com o mais atual RTM do INMETRO (Instituto Nacional de Metrologia, Normalização e Qualidade Industrial). Para serem comercializados, todos os produtos são aferidos e selados através do processo de Verificação Metrológica Inicial, realizado na fábrica diariamente pelo IPEM/SP (Instituto de Pesos e Medidas do Estado de São Paulo).</p>
      </div>
    </div>
    
    <div class="section group">
      <div id="linha1_col1" class="col span_2_of_4 txt-align-center">
      	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-home-valores-2.jpg" />
      </div>
      <div id="linha1_col1" class="col span_2_of_4">
      	<p><strong>Política Ambiental</strong></p>
        <p>A BALMAK tem como objetivo ser não apenas uma empresa que produz balanças de qualidade, mas uma organização socialmente responsável que contribui para a melhoria da qualidade de vida e o bem-estar da comunidade. A preservação ambiental é uma prioridade dentro desse compromisso, assumido publicamente pela empresa.</p>
        <p>A BALMAK possui Certificado de Regularidade do Cadastro Técnico Federal emitido pelo IBAMA (Instituto Brasileiro do Meio Ambiente e dos Recursos Naturais Renováveis), em conformidade com as obrigações cadastrais e de prestação de informações ambientais sobre as atividades desenvolvidas sob controle e fiscalização do Ibama.</p>
      </div>
    </div>
		*/
		?>
  </div>
</div>

<?php
get_footer();
?>