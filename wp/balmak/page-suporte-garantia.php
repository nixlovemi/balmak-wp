<?php
/* Template Name: Balmak - Garantia */
get_header();
?>

<div class="chamada-topo balmak-border-bottom-red" data-img="<?php echo esc_url( get_template_directory_uri() ); ?>/images/chamada-suporte-garantia.jpg">
	<div class="chamada-topo-txt"><span>Garantia e Conserva&ccedil;&atilde;o</span></div>
</div>
<div class="content">
  <div class="main-width">
  	<p>
    	<strong>Para seu conforto e comodidade, a BALMAK apresenta as condições para a perfeita cobertura de serviços durante o período de vigência da garantia de seu produto.</strong>
    </p>
    
    <?php
		$garantia_titulo = simple_fields_values("page_garantia_1_titulo");
		$garantia_conteudo = simple_fields_values("page_garantia_1_conteudo");
		
		// monta array com infos
		$arr_info_atab = array();
		for($i=0; $i<count($garantia_titulo); $i++){
			$v_titulo = (isset($garantia_titulo[$i])) ? $garantia_titulo[$i]: "";
			$v_conteudo = (isset($garantia_conteudo[$i])) ? $garantia_conteudo[$i]: "";
			
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
    <h3 class="balmak-title">Garantia</h3>
  	<p>A Balmak Indústria e Comércio Ltda garante seus produtos contra eventuais vícios de qualidade de materiais e/ou fabricação, se consideradas as condições estabelecidas no Manual do Usuário, a partir da data da Nota Fiscal de venda ao consumidor final e compreenderá a substituição de peças e mão-de-obra no reparo de vícios de qualidade devidamente constatados como sendo de origem na fabricação. Tanto a constatação dos vícios de qualidade, como os reparos necessários serão providos por um ATAB ou ATAB AVANÇADO (Assistente Técnico Autorizado Balmak) que se encontre mais próximo do local de instalação do equipamento.</p>
    
    <h3 class="balmak-title">Tipo da Garantia</h3>
  	<p>GARANTIA TIPO BALCÃO! Caso o equipamento necessite de algum reparo durante o período de garantia, o consumidor final estará isento de quaisquer despesas com serviços (mão de obra) e materiais necessários ao perfeito funcionamento do equipamento, exceto despesas provenientes de transporte do mesmo, bem como deslocamentos técnicos.</p>
    
    <h3 class="balmak-title">Uso da Garantia</h3>
  	<p>Para efeito de garantia, apresente o Certificado de Garantia devidamente preenchido e a Nota Fiscal de compra do equipamento contendo – obrigatoriamente – o seu número de série. </p>
    
    <h3 class="balmak-title">A garantia fica automaticamente inálida se:</h3>
  	<ul>
    	<li>O equipamento não for instalado e utilizado conforme as instruções contidas neste manual.</li>
      <li>O equipamento tiver sofrido danos por acidentes ou agentes da natureza, maus tratos, descuido, ligação à rede elétrica imprópria, exposição a agentes químicos e/ou corrosivos, presença de água ou insetos no seu interior, utilização em desacordo as instruções deste manual ou ainda por alterações, modificações ou consertos feitos por pessoas ou entidades não credenciadas pela Balmak.</li>
      <li>Houver substituição de peças originais por não originais (similares), incluindo a fonte externa (conversor AC/DC).</li>
      <li>Houver remoção e/ou alteração do número de série ou da placa de identificação, bem como lacre e selos do IPEM e INMETRO, presentes no equipamento.</li>
      <li>Constatada adulteração ou rasuras no Certificado de Garantia ou espirada a vigência do período de garantia.</li>
    </ul>
    
    <h3 class="balmak-title">A garantia não cobre:</h3>
    <ul>
    	<li>Despesas com instalação do equipamento realizada pela Balmak ou ATAB (Assistente Técnico Autorizado Balmak).</li>
      <li>Despesas com mão-de-obra, materiais, peças e adaptações necessárias à preparação do local para a instalação do equipamento, ou seja, rede elétrica, tomadas, cabos de comunicação, conectores, suportes mecânicos, aterramento, etc.</li>
      <li>Reposição de peças pelo desgaste natural, como teclado, prato de pesagem, painéis, gabinete, bem como a mão-de-obra utilizada na aplicação das peças e as consequências advindas destas ocorrências.</li>
      <li>Equipamentos ou peças que tenham sido danificadas em consequência de acidentes de transporte ou manuseio, amassamentos, riscos, trincas ou atos e efeitos de catástrofe da natureza.</li>
      <li>Falhas no funcionamento do equipamento decorrentes de problemas no abastecimento elétrico.</li>
      <li>Remoção, embalagem, transporte e seguro do equipamento para conserto.</li>
      <li>Despesas relativas ao atendimento no local de instalação do equipamento, tais como, transporte de ida e volta; deslocamento, tempo de viagem, refeições e estada do(s) técnico(s), acrescidas dos impostos incidentes e taxas de administração.</li>
    </ul>
    
    <h3 class="balmak-title">Observações:</h3>
    <ul>
    	<li>Em nenhum caso a Balmak poderá ser responsabilizada por perda de produtividade ou dados, danos diretos ou indiretos, reclamações de terceiros, paralisações ou ainda quaisquer outras perdas ou despesas, incluindo lucros cessantes, provenientes do fornecimento. Se, em razão de lei ou acordo, a Balmak vier a ser responsabilizada por danos causados ao cliente, o limite global de tal responsabilidade será equivalente a 5% do valor do equipamento, ou da parte do equipamento que tiver causado o dano, à vista das características especiais do fornecimento.</li>
      <li>A Balmak não autoriza nenhuma pessoa ou entidade a assumir, por sua conta, qualquer outra responsabilidade relativa à garantia de seus produtos além das aqui explicitadas.</li>
      <li>Peças e/ou acessórios que forem substituídos em garantia serão de propriedade da Balmak.</li>
      <li>Quando houver bateria interna, a garantia da bateria será de 180 dias.</li>
      <li>O Certificado de Garantia é válido para equipamentos vendidos e instalados no território brasileiro.</li>
      <li>Em caso de necessidade de reparo, utilize apenas a Rede de Suporte Técnico Autorizado Balmak.</li>
      <li>Encontre nossos ATABs e ATABs AVANÇADOS no guia que segue dentro da embalagem do produto, ou, em nosso site através do menu suporte.</li>
      <li>Eventuais dúvidas quanto às condições de garantia deverão ser tratadas diretamente com a Balmak.</li>
    </ul>
    
    <h3 class="balmak-title">Dicas de Conservação</h3>
    <p>Para a cobertura da garantia de fábrica, perfeito funcionamento e extensão da vida útil da balança, algumas dicas devem ser seguidas:</p>
    <ul>
    	<li>Proteja a balança de produtos químicos, raios solares diretos, calor e umidade excessivos, e mantenha longe de correntes de vento;</li>
      <li>Nunca direcione jatos d´agua diretamente na balança;</li>
      <li>Para limpeza, utilize apenas pano úmido e sabão neutro. Não use qualquer produto químico: detergente, solvente, thinner, álcool, ou outros;</li>
      <li>Não pressione as teclas, ou painéis, com objetivos pontudos (ex.: caneta);</li>
      <li>Modelos com bateria não poderão ultrapassar 3 meses sem recarga;</li>
      <li>Modelos com bateria não poderão ultrapassar 6 meses sem que haja utilização da mesma. Ainda que seja seguida a recomendação do item anterior.</li>
      <li>Em caso de avarias técnicas, procure imediatamente um Assistente Técnico Autorizado BALMAK (ATAB).</li>
      <li>Jamais, em hipótese alguma, o usuário deve tentar reparar o equipamento por tratar-se de produto controlado por legislação metrológica federal, além claro, de possuir fina tecnologia eletrônica.</li>
    </ul>
		*/
		?>
  </div>
</div>

<?php
get_footer();
?>