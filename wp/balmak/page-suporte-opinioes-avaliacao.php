<?php
/* Template Name: Balmak - Opinioes e Avaliacao */
get_header();
?>

<div class="chamada-topo balmak-border-bottom-red" data-img="<?php echo esc_url( get_template_directory_uri() ); ?>/images/chamada-suporte-ctt.jpg">
	<div class="chamada-topo-txt"><span>Opiniões e Avaliação</span></div>
</div>
<div class="content">
  <div class="main-width">
  	<?php
		while ( have_posts() ): the_post();
    	the_content();
		endwhile;
		?>
    
    <h2 class="mb15 mt15">Acompanhe os resultados das avaliações:</h2>
  
  	<?php
		$oa_texto = simple_fields_values("page_opinioes_avaliacao_1_texto");
		$oa_nota = simple_fields_values("page_opinioes_avaliacao_1_nota");
		
		// monta array com infos
		$arr_info_atab = array();
		for($i=0; $i<count($oa_texto); $i++){
			$v_texto = (isset($oa_texto[$i])) ? $oa_texto[$i]: "";
			$v_nota = (isset($oa_nota[$i])) ? $oa_nota[$i]: "";
			
			array_push($arr_info_atab, array(
				"texto"=>$v_texto,
				"nota"=>$v_nota,
			));
		}
		
		foreach($arr_info_atab as $key => $info_atab){
			$v_texto = (isset($info_atab["texto"])) ? $info_atab["texto"]: "";
			$v_nota = (isset($info_atab["nota"])) ? $info_atab["nota"]: "";
			
			echo "<p class='ml10'>&gt; Nota final | $v_texto: $v_nota</p>";
		}
		?>
  
  	<div style="width:100%; height:1px; background-color:#000000; margin-top:15px; margin-bottom:15px;"></div>
  
  	<h2 class="mb15 mt15">Acompanhe as opiniões:</h2>
    
    <?php
		$oa_comentario = simple_fields_values("page_opinioes_avaliacao_2_comentario");
		$oa_detalhe = simple_fields_values("page_opinioes_avaliacao_2_detalhe");
		
		// monta array com infos
		$arr_info_atab = array();
		for($i=0; $i<count($oa_comentario); $i++){
			$v_comentario = (isset($oa_comentario[$i])) ? $oa_comentario[$i]: "";
			$v_detalhe = (isset($oa_detalhe[$i])) ? $oa_detalhe[$i]: "";
			
			array_push($arr_info_atab, array(
				"comentario"=>$v_comentario,
				"detalhe"=>$v_detalhe,
			));
		}
		
		foreach($arr_info_atab as $key => $info_atab){
			$v_comentario = (isset($info_atab["comentario"])) ? $info_atab["comentario"]: "";
			$v_detalhe = (isset($info_atab["detalhe"])) ? $info_atab["detalhe"]: "";
			
			echo "
				<p class='ml10'>
					'$v_comentario'
					<br />
					<i style='font-size:12px;'>($v_detalhe)</i>
				</p>
			";
		}
		?>
  
  	<?php
		/*
  	<h3 class="balmak-title">CTT - Centro de Treinamento e Tecnologia</h3>
    <p>A BALMAK oferece o mais completo e tecnológico centro de treinamento do mercado brasileiro.</p>
    <p>O CTT - Centro de Treinamento e Tecnologia está localizado na planta da fábrica em Santa Bárbara dOeste, e apresenta espaço e recursos voltados à formação e aprimoramento de toda a Rede de Suporte Técnico Autorizado BALMAK, além dos clientes da marca.</p>
    <p>Nossos treinamentos tem como objetivo atualizar o conhecimento técnico dos profissionais envolvidos com os produtos da marca BALMAK. Nosso principal compromisso é oferecer cada vez mais confiança, qualidade e tecnologia aos nossos parceiros.</p>
    
    <p class="mt20" align="center"><img width="800" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-ctt-1.jpg" /></p>
    <p class="mt20" align="center"><img width="800" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-ctt-2.jpg" /></p>
    <p class="mt20" align="center"><img width="800" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-ctt-3.jpg" /></p>
    <p class="mt20 mb30" align="center"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-ctt-logo.jpg" /></p>
    
    <p>A BALMAK oferece o mais completo e tecnológico centro de treinamento do mercado brasileiro.</p>
    <p>O CTT - Centro de Treinamento e Tecnologia está localizado na planta da fábrica em Santa Bárbara dOeste, e apresenta espaço e recursos voltados à formação e aprimoramento de toda a Rede de Suporte Técnico Autorizado BALMAK, além dos clientes da marca.</p>
    <p>Nossos treinamentos tem como objetivo atualizar o conhecimento técnico dos profissionais envolvidos com os produtos da marca BALMAK. Nosso principal compromisso é oferecer cada vez mais confiança, qualidade e tecnologia aos nossos parceiros.</p>
    
    <p><strong>Para mais informações, verifique abaixo:</strong></p>
    <h3 class="balmak-title">Cronograma de realização de treinamentos (1º SEM/2016)</h3>
    <p>Abril - 13,14 e 15 - Treinamento STANDARD no CTT</p>
    <p class="mb25">Abril - 26 - Treinamento no CTT (voltado para linha COMERCIAL, INDUSTRIAL e FARMA-MÉDICO-HOSPITALAR)</p>
    
    <h3 class="balmak-title">TREINAMENTO STANDARD | Conteúdo pedagógico e cronograma</h3>
    <p>Três dias de treinamento, sendo:</p>
    <div class="ml20 mb20">
      <p class="">::: 1º Dia</p>
      <p class="balmak-title-red">MANHÃ</p>
      <ul>
        <li>Boas vindas e apresentação do cronograma do treinamento</li>
        <li>Apresentação Institucional da BALMAK</li>
        <li>Guia de Procedimentos</li>
        <li>Qualidade, Valores e Ética na prestação de serviços</li>
        <li>Rating</li>
        <li>Apresentação comercial da linha Órion</li>
        <li>Visita na Fábrica</li>
      </ul>
      <p class="balmak-title-red">TARDE</p>
      <ul>
        <li>ÓRION: Configuração e operações stand-alone</li>
        <li>ÓRION: Configuração e operações com a balança e os softwares aplicativos.</li>
      </ul>
    </div>
    
    <div class="ml20 mb20">
      <p class="">::: 2º Dia</p>
      <p class="balmak-title-red">MANHÃ</p>
      <ul>
        <li>ÓRION: Configuração e operações com a balança e os softwares aplicativos</li>
        <li>ÓRION: Configuração e operações com a balança + DFS + Software de retaguarda</li>
        <li>ÓRION: Roteiro de Manutenção</li>
      </ul>
      <p class="balmak-title-red">TARDE</p>
      <ul>
        <li>ÓRION: Roteiro de Manutenção</li>
        <li>LINHA COMERCIAL: Roteiro de Manutenção</li>
        <li>LINHA INDUSTRIAL: Roteiro de Manutenção</li>
        <li>LINHA FARMA-MÉDICO-HOSPITALAR: Roteiro de Manutenção</li>
      </ul>
    </div>
    
    <div class="ml20 mb20">
      <p class="">::: 3º Dia</p>
      <p class="balmak-title-red">MANHÃ</p>
      <ul>
        <li>BALANÇAS MECÂNICAS E HÍBRIDAS: Roteiro de Manutenção</li>
        <li>Questionário de avaliação do treinamento</li>
        <li>Teste de assimilação</li>
        <li>Entrega dos CERTIFICADOS individual e por empresa, entrega da carta ao IPEM individual, assinatura do contrato revisado para ATAB e ATAB AVANÇADO por empresa</li>
      </ul>
    </div>
    
    <h3 class="balmak-title">TREINAMENTO LINHAS COMERCIAL, INDUSTRIAL E FARMA-MÉDICO-HOSPITALAR | Conteúdo pedagógico e cronograma</h3>
    <p>Um dia de treinamento, sendo:</p>
    <div class="ml20 mb20">
      <p class="balmak-title-red">MANHÃ</p>
      <ul>
        <li>Boas vindas e apresentação do cronograma do treinamento</li>
        <li>Apresentação Institucional da BALMAK</li>
        <li>Guia de Procedimentos</li>
        <li>Qualidade, Valores e Ética na prestação de serviços</li>
        <li>Rating</li>
        <li>Visita na Fábrica</li>
        <li>LINHA COMERCIAL: Roteiro de Manutenção</li>
      </ul>
      <p class="balmak-title-red">TARDE</p>
      <ul>
        <li>LINHA INDUSTRIAL: Roteiro de Manutenção</li>
        <li>LINHA FARMA-MÉDICO-HOSPITALAR: Roteiro de Manutenção</li>
        <li>BALANÇAS MECÂNICAS E HÍBRIDAS: Roteiro de Manutenção</li>
        <li>Questionário de avaliação do treinamento</li>
        <li>Teste de assimilação</li>
        <li>Entrega dos CERTIFICADOS individual e por empresa, entrega da carta ao IPEM individual, assinatura do contrato revisado para ATAB e ATAB AVANÇADO por empresa</li>
      </ul>
      <p class="balmak-title-red mt30">VANTAGENS DESSE TREINAMENTO</p>
      <ul>
        <li>Aquisição de conhecimento global sobre toda a linha de produtos da BALMAK, a indústria de balanças que atualmente mais cresce no Brasil;</li>
        <li>Aquisição de CD* contendo apostilas (de literatura técnica completa com informações e roteiros de relacionamento, serviços, manutenção e calibração para atendimento de toda a linha de produtos da Balmak) + software aplicativo DFS | Dynamic Friendly Software e seu pacote completo de aplicativos gratuitos com DGI/RGI/LBS;</li>
        <li>Entrega de Certificado Premium à empresa para ser colocado a mostra (em parede), qualificando a autorizada como ATAB AVANÇADO (Assistente Técnico Autorizado BALMAK - AVANÇADO);</li>
        <li>Entrega de Certificado Premium ao treinando para ser colocado a mostra (em parede), certificando a capacitação do técnico para realizar serviços para a BALMAK, como ATAB AVANÇADO;</li>
        <li>Habilitação da autorizada a categoria de ATAB AVANÇADO, podendo realizar serviços de instalação, configuração e manutenção em redes de balanças ÓRION e automação comercial, recebendo assim pelo deslocamento e serviços prestados;</li>
        <li>Direito as condições especiais de aquisição de peças, com descontos que vão de 25% a 40%;</li>
        <li>Divulgação da autorizada no site da BALMAK com o selo** de ATAB AVANÇADO;</li>
        <li>Divulgação da autorizada no livreto da Rede de Suporte Técnico Autorizado BALMAK, com o selo** de ATAB AVANÇADO; </li>
      </ul>
    </div>
    
    <div class="section group mb60">
    	<div class="col span_2_of_4 txt-align-center">
      	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-ctt-cd-materiais.jpg" />
        <br />
        Cd com Materiais
      </div>
      <div class="col span_2_of_4 txt-align-center">
      	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-ctt-selo.jpg" />
        <br />
        Selo de ATAB Avançado
      </div>
    </div>
    
    <h3 class="balmak-title">Informações importantes</h3>
    <p><strong>Conhecimento prévio/mínimo do treinando:</strong> a BALMAK oferecerá treinamentos-padrão que consideram conhecimento mínimo do participante em eletrônica, microinformática e noções de estrutura de redes (configuração e cabeamento).</p>
    <p><strong>Hospedagem/reserva:</strong> A BALMAK se responsabilizará por fazer a reserva em hotéis na cidade de Santa Bárbara d’Oeste/SP para os treinandos inscritos (dentro do prazo de inscrição estabelecido), e confirmará a reserva ao ATAB com todos os dados do hotel. (Obs 1: como padrão, e objetivando a redução de custos para o ATAB, a BALMAK oferecerá hotel em categoria business ou 2 ou 3 estrelas, com café da manhã incluso. Consulte-nos caso queira fazer um upgrade na categoria de hotel oferecida. Obs 2 : É de responsabilidade do participante efetuar o pagamento da(s) diária(s) junto ao hotel).</p>
    <p><strong>Prazo limite para inscrição:</strong> até 20 dias antes da data inicial de realização do treinamento.</p>
    <p><strong>Custos:</strong> Para estes modelos de treinamento aqui oferecidos o custo (por pessoa) é de R$ 500,00 para assistentes técnicos não autorizados, e R$ 300,00 para o ATAB (Assistentente Técnico Autorizado BALMAK). Para ambos os casos, a cada dois participantes da mesma empresa, o segundo tem direito a 50% de desconto.</p>
    <p><strong>Forma de pagamento:</strong> existem duas condições a disposição do treinando.</p>
    <ul>
      <li>A vista antecipado, através de depósito/transferência, antes da data inicial do treinamento escolhido, para efetivação da inscrição;</li>
      <li>A vista, em dinheiro, no primeiro dia de treinamento, tendo registrado essa informação na ficha de inscrição; (Obs: o pagamento deverá ser combinado junto ao atendimento do CTT, no ato da inscrição).</li>
    </ul>
    <p><strong>Outras despesas do treinando:</strong> passagens e translado até Santa Bárbara dOeste, hospedagem (o pagamento será realizado pelo treinando no check-out), e refeições ocorrerão por conta do ATAB.</p>
    <p><strong>Translado hotel-fábrica-hotel:</strong> O CTT disponibilizará o transporte, que ocorrerá por conta e responsabilidade da BALMAK.</p>
    <p><strong>Material:</strong> A BALMAK disponibilizará todo o material de apoio necessário (teórico e prático) para a realização do treinamento.</p>
    <p><strong>Presença mínima:</strong> Os participantes devem ter no mínimo 85% de presença no treinamento para lograr certificação de conclusão.</p>
    <p><strong>Certificação de conclusão:</strong> cada participante receberá um certificado premium de conclusão ao final do treinamento (considerando aprovação na prova final), que habilitará a empresa autorizada a categoria de ATAB AVANÇADO.</p>
    <p><strong>Atenção:</strong> não será concedido treinamento em nível de recuperação de placas de circuitos eletrônicos.</p>
    <p><strong>Efetivação de inscrição:</strong> clique aqui, preencha o formulário individual de inscrição e envie para ctt@balmak.com.br, ou contate-nos através do telefone 0800 771 79 81.</p>
    
    <h3 class="balmak-title">Opiniões e avaliação</h3>
    <p>A BALMAK se preocupa com a qualidade e a melhoria contínua dos seus treinamentos.</p>
    <p>Por isso, ao final de cada período de treinamento ministrado em nosso CTT, pedimos aos treinandos que realizem uma avaliação completa sobre todos os quesitos envolvidos (espaço, estrutura, materiais, apostilas, cronograma, ministrações, palestrantes, visitação a fábrica) e também nos deixem sua opinião geral com críticas, elogios ou sugestões.</p>
    <p>O resultado destas avaliações, e as opiniões de nossos treinandos estão publicadas! Acompanhe clicando aqui.</p>
    
    <h3 class="balmak-title">Outros treinamentos | treinamento exclusivo</h3>
    <p>Os ATABs interessados poderão contratar e confirmar a presença de funcionários nos treinamentos-padrão oferecidos pela BALMAK, ou, encaminhar consulta ao DPV da BALMAK, via fax ou email, identificando suas demandas específicas (como quantidade de pessoas e temas diversos) para que a BALMAK possa estudar e proporcionar um treinamento exclusivo baseado nas suas necessidades, montando um cronograma especialmente pensado para a sua empresa.</p>
    <p>Os treinamentos-standard serão ministrados no CTT da BALMAK, em horário comercial de 2ª a 6ª, em Santa Bárbara dOeste/SP. Os treinamentos exclusivos poderão ser ministrados no CTT ou no ATAB.</p>
	*/
	?>	
		
  </div>
</div>

<?php
get_footer();
?>