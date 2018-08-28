<?php
// starta as variáveis do formulário
$raz_social = "";
$nom_fantasia = "";
$email = "";
$telefone = "";
$endereco = "";
$cidade = "";
$estado = "";
$nom_responsavel = "";
// =================================

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if(isset($_POST["action"]) && $_POST["action"] == "send"){
		$raz_social = trim($_POST["raz-social"]);
		$nom_fantasia = trim($_POST["nom-fantasia"]);
		$email = trim($_POST["email"]);
		$telefone = trim($_POST["telefone"]);
		$endereco = trim($_POST["endereco"]);
		$cidade = trim($_POST["cidade"]);
		$estado = trim($_POST["estado"]);
		$nom_responsavel = trim($_POST["nom-responsavel"]);
		$atendimento_a = $_POST["atendimento-a"];
		$revende_balancas = $_POST["revende-balancas"];

		$msg_validacao = "";
		$js_line_break = "\n";

		if(strlen($raz_social) < 3){
			$msg_validacao .= " * Razão Social;$js_line_break";
			$raz_social = "";
		}
		if(strlen($nom_fantasia) < 3){
			$msg_validacao .= " * Nome Fantasia;$js_line_break";
			$nom_fantasia = "";
		}
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$msg_validacao .= " * Email;$js_line_break";
			$email = "";
		}
		if(strlen($telefone) < 8){
			$msg_validacao .= " * Telefone;$js_line_break";
			$telefone = "";
		}
		if(strlen($endereco) < 5){
			$msg_validacao .= " * Endereço;$js_line_break";
			$endereco = "";
		}
		if(strlen($cidade) < 5){
			$msg_validacao .= " * Cidade;$js_line_break";
			$cidade = "";
		}
		if(strlen($estado) < 2){
			$msg_validacao .= " * Estado;$js_line_break";
			$estado = "";
		}
		if(strlen($nom_responsavel) < 3){
			$msg_validacao .= " * Nome Responsável;$js_line_break";
			$nom_responsavel = "";
		}
		if($atendimento_a == ""){
			$msg_validacao .= " * Atendimento à;$js_line_break";
		}
		if($revende_balancas == ""){
			$msg_validacao .= " * Revenda Balanças;$js_line_break";
		}

		if($msg_validacao != ""){
			$msg_validacao = "Antes de prosseguir com o formulário, preencha as seguintes informações:$js_line_break$js_line_break" . $msg_validacao;
			echo "<div data-scroll='#formulario-suporte-atab' id='dv-alert-jquery'>$msg_validacao</div>";
		}
		else{
			// combos ==============================
			$cmb_atendimento = array();
			$cmb_atendimento["ee"] = "Equipamentos Eletr&ocirc;nicos";
			$cmb_atendimento["em"] = "Equipamentos Mec&acirc;nicos";
			$cmb_atendimento["am"] = "Ambos";
			$str_cmb_atendimento = (isset($cmb_atendimento[$atendimento_a])) ? $cmb_atendimento[$atendimento_a]: " --- ";

			$cmb_revende = array();
			$cmb_revende["s"] = "Sim";
			$cmb_revende["n"] = "N&atilde;o";
			$str_cmb_revende = (isset($cmb_revende[$revende_balancas])) ? $cmb_revende[$revende_balancas]: " --- ";
			// =====================================

			// envia o email
			$body = "";
			$body .= "<strong>Raz&atilde;o Social</strong>: $raz_social<br />";
			$body .= "<strong>Nome Fantasia</strong>: $nom_fantasia<br />";
			$body .= "<strong>Email:</strong>: $email<br />";
			$body .= "<strong>Telefone</strong>: $telefone<br />";
			$body .= "<strong>Endere&ccedil;o</strong>: $endereco<br />";
			$body .= "<strong>Cidade</strong>: $cidade<br />";
			$body .= "<strong>Estado</strong>: $estado<br />";
			$body .= "<strong>Nome Respons&aacute;vel</strong>: $nom_responsavel<br />";
			$body .= "<strong>Atendimento &agrave;</strong>: $str_cmb_atendimento<br />";
			$body .= "<strong>Revende Balan&ccedil;as?</strong>: $str_cmb_revende<br />";

			# include("functions.php");
			$to_addr = "dpv@balmak.com.br";
			$subject = "Contato - ASSISTENTE TÉCNICO AUTORIZADO BALMAK";
			$ret = send_mail($to_addr, $subject, $body);
			// =============

			// limpa as variaveis
			$raz_social = "";
			$nom_fantasia = "";
			$email = "";
			$telefone = "";
			$endereco = "";
			$cidade = "";
			$estado = "";
			$nom_responsavel = "";
			// ==================

			$msg = ($ret) ? "Formulário enviado com sucesso!": "Erro ao enviar formulário. Tente novamente em breve!";
			echo "<div data-scroll='#formulario-suporte-atab' id='dv-alert-jquery'>$msg</div>";
		}
	}
}
?>

<?php
/* Template Name: Balmak - ATAB */
get_header();
?>

<div class="chamada-topo balmak-border-bottom-red" data-img="<?php echo esc_url( get_template_directory_uri() ); ?>/images/chamada-suporte-atab.jpg">
	<div class="chamada-topo-txt"><span>Torne-se um ATAB</span></div>
</div>
<div class="content">
  <div class="main-width">
  	<?php
		$atab_titulo = simple_fields_values("page_assistente_tecnico_autorizado_1_titulo");
		$atab_conteudo = simple_fields_values("page_assistente_tecnico_autorizado_1_conteudo");

		// monta array com infos
		$arr_info_atab = array();
		for($i=0; $i<count($atab_titulo); $i++){
			$v_titulo = (isset($atab_titulo[$i])) ? $atab_titulo[$i]: "";
			$v_conteudo = (isset($atab_conteudo[$i])) ? $atab_conteudo[$i]: "";

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
    <h3 class="balmak-title">ASSISTENTE TÉCNICO AUTORIZADO BALMAK</h3>
    <p>A Rede de Suporte Técnico da BALMAK é formada por mais de 500 Assistentes Técnicos Autorizados (ATABs). Os ATABs estão localizados em todos os estados, e na maioria das grandes cidades do Brasil, assegurando agilidade e comodidade no atendimento dos clientes BALMAK.</p>
    <p>O ATAB é um prestador de serviço terceirizado, credenciado através de contrato para atender aos clientes da BALMAK nos assuntos de ordem técnica, e possui importância fundamental no relacionamento da BALMAK com o mercado.</p>

    <h3 class="balmak-title">OS ATABs SÃO CLASSIFICADOS DE DUAS FORMAS:</h3>
    <p><strong>1. ATAB</strong> - Assistente Técnico Autorizado BALMAK</p>
    <p>Consiste numa assistência técnica comum, que realizará serviços técnicos gerais em toda a linha, principalmente em pós-venda (manutenção), e frequentemente no balcão da autorizada.</p>
    <p><strong>2. ATAB AVANÇADO</strong> - Assistente Técnico Autorizado BALMAK (AVANÇADO)</p>
    <p>Consiste numa assistência técnica de alto nível, que (1) realizará serviços técnicos gerais em toda a linha, em pré-venda (instalação) e pós-venda (manutenção), e poderá atender no balcão ou no local de instalação (verificar condições para deslocamento no Guia de Procedimentos). E (2) realizará instalação e configuração de redes de balanças, em automação comercial, sendo qualificado para isso através de frequentes treinamentos no CTT (Centro de Treinamento e Tecnologia) da BALMAK, além de receber pagamentos conforme tabela fixa, por seus serviços prestados.</p>

    <h3 class="balmak-title">Pré-requisitos e Obrigações do Assistente Técnico Autorizado BALMAK (ATAB):</h3>
    <p>Para que uma assistência técnica de balanças venha a ser considerada ATAB, torna-se necessário que os seguintes pré-requisitos sejam atendidos.</p>
    <p class="balmak-title-red">Pré-requisitos para o ATAB:</p>
    <p>1. Tratar-se de empresa jurídica regularmente constituída e estabelecida.</p>
		<p>2. Possuir autorização de funcionamento emitida pelo INMETRO - Instituto Nacional de Metrologia e Qualidade Industrial, ou órgão delegado pelo mesmo (IPEM’s estaduais).</p>
		<p>3. Possuir área de oficina e ferramental adequado, segundo as regras estabelecidas pela autorização do INMETRO, acima indicada.</p>
		<p>4. Possuir corpo técnico próprio, constituído por empregados regularmente registrados, ou sócios da empresa.</p>
		<p>5. Possuir telefone, fax, endereço eletrônico (e-mail) e acesso à Internet.</p>
    <p>6. Dispor-se à:</p>
    <ul>
    	<li>Acatar e executar as orientações da BALMAK.</li>
      <li>Prestar esclarecimentos sobre os serviços executados, quando solicitado.</li>
      <li>Manter seu corpo técnico treinado e atualizado nos produtos BALMAK.</li>
      <li>Receber os representantes da BALMAK, prestando-lhes todos os esclarecimentos solicitados.</li>
    </ul>

    <p class="balmak-title-red">Pré-requisitos (adicionais) para o ATAB AVANÇADO:</p>
    <p>1. Realizar treinamentos específicos no CTT (Centro de Treinamento e Tecnologia) da BALMAK, para instalação e configuração de redes de balanças, em automação comercial.</p>
		<p>2. Obter aprovação no teste de avaliação que é aplicado ao final do treinamento executado na BALMAK.</p>

    <p class="balmak-title-red">Obrigações do ATAB e ATAB AVANÇADO:</p>
    <p>1. O ATAB deverá atender aos produtos BALMAK independentemente da origem de aquisição pelo cliente usuário, respeitando as condições previstas no “Termo de Garantia”.</p>
		<p>2. Utilizar somente material de reposição original da BALMAK, ou por ela indicado.</p>
		<p>3. Praticar preços de peças e serviços compatíveis com a Política de Preços divulgada pela BALMAK.</p>
		<p>4. Zelar pela marca BALMAK.</p>
		<p>5. Manter o corpo de técnicos devidamente atualizados com relação aos novos produtos e ou reciclagens que são realizadas periodicamente pela BALMAK.</p>

    <h3 class="balmak-title">Quer fazer parte deste time vencedor?</h3>
    <p><strong>Primeiro, leia atentamente o Guia de Procedimentos.</strong></p>
    <p>Se a sua empresa atende aos pré-requisitos e você tem interesse em se tornar um Assistente Técnico Autorizado BALMAK (ATAB), pedimos sua gentileza em preencher o formulário abaixo. O DPV fará contato solicitando documentações e o preenchimento de um novo formulário, mais completo, para realizar a qualificação cadastral de sua empresa. Reunidos os documentos necessários, estaremos analisando sua solicitação e enviando resposta para o seu credenciamento junto a BALMAK! Obrigado!</p>
  </div>
	*/
	?>
</div>

<?php
/*
<div class="content content-red pt20 pb20">
  <div class="main-width">
    <h3 class="balmak-title balmak-title-white">PREENCHA O FORMULÁRIO</h3>
    <form id="formulario-suporte-atab" name="formulario-suporte-atab" method="post" action="">
      <table width="100%" border="0" class="tb-form-atab mb30">
        <tr>
          <td width="22%">Razão Social</td>
          <td><input type="text" name="raz-social" value="<?php echo $raz_social; ?>" /></td>
        </tr>
        <tr>
          <td width="22%">Nome Fantasia</td>
          <td><input type="text" name="nom-fantasia" value="<?php echo $nom_fantasia; ?>" /></td>
        </tr>
        <tr>
          <td width="22%">Email</td>
          <td><input type="text" name="email" class="medium" value="<?php echo $email; ?>" /></td>
        </tr>
        <tr>
          <td width="22%">Telefone</td>
          <td><input type="text" name="telefone" class="medium" value="<?php echo $telefone; ?>" /></td>
        </tr>
        <tr>
          <td width="22%">Endereço Completo</td>
          <td><input type="text" name="endereco" value="<?php echo $endereco; ?>" /></td>
        </tr>
        <tr>
          <td width="22%">Cidade</td>
          <td><input type="text" name="cidade" class="medium" value="<?php echo $cidade; ?>" /></td>
        </tr>
        <tr>
          <td width="22%">Estado</td>
          <td><input type="text" name="estado" class="medium" value="<?php echo $estado; ?>" /></td>
        </tr>
        <tr>
          <td width="22%">Nome Responsável</td>
          <td><input type="text" name="nom-responsavel" value="<?php echo $nom_responsavel; ?>" /></td>
        </tr>
      </table>
      <table width="100%" border="0" class="tb-form-atab mb20">
        <tr>
          <td width="22%">Atendimento à:</td>
          <td>
            <select name="atendimento-a">
              <option value="">--Escolha</option>
              <option value="ee">Equipamentos Eletrônicos</option>
              <option value="em">Equipamentos Mecânicos</option>
              <option value="am">Ambos</option>
            </select>
          </td>
        </tr>
        <tr>
          <td width="22%">Revende balanças?</td>
          <td>
            <select name="revende-balancas" class="medium">
              <option value="">--Escolha</option>
              <option value="s">Sim</option>
              <option value="n">Não</option>
            </select>
          </td>
        </tr>
      </table>
      <div align="right">
      	<input type="hidden" name="action" value="send" />
        <input style="margin-right: 24px;" type="button" value=" ENVIAR " class="btn-enviar-branco" onClick="this.form.submit();" />
      </div>
    </form>
  </div>
</div>
*/
?>

<?php
get_footer();
?>
