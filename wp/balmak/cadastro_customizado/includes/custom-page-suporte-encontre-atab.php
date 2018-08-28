<?php
header('Content-Type: text/html; charset=utf-8');

// classe pra gerenciar a tabela
class nix_encontre_atab{
	public static $nome_tabela = 'tb_nix_encontre_atab';
	public static $nome_id_dv = 'dv_tb_nix_encontre_atab';

	public static function checaCreateTable(){
		$v_nome_tabela = nix_encontre_atab::$nome_tabela;

		$sql = "SELECT count(*)
						FROM information_schema.TABLES
						WHERE (TABLE_SCHEMA = '".DB_NAME."') AND (TABLE_NAME = '".$v_nome_tabela."')";
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result);

		if($row[0] <= 0){
			$sql = "CREATE TABLE $v_nome_tabela (
								ea_id 					  int(11) 			AUTO_INCREMENT,
								ea_nome_empresa 	varchar(80) 	NOT NULL,
								ea_rating 				float 				NOT NULL,
								ea_endereco 			varchar(100) 	NOT NULL,
								ea_numero 				varchar(25)		NOT NULL,
								ea_bairro					varchar(60),
								ea_cidade					varchar(100)	NOT NULL,
								ea_estado					varchar(80)		NOT NULL,
								ea_cep						varchar(9),
								ea_telefone1			varchar(25),
								ea_telefone2			varchar(25),
								ea_telefone3			varchar(25),
								ea_email					varchar(100),
								ea_ramos_aten		varchar(255)	NOT NULL,
								ea_atab_avanc		int(1)				NOT NULL,
								ea_especialista	int(1)				NOT NULL,
								PRIMARY KEY  (ea_id)
							)";
			$result = mysql_query($sql);
		}
	}

	public static function pegaInfoCad($_ID){
		if(!is_numeric($_ID)){
			return array();
			exit;
		}

		$v_nome_tabela = nix_encontre_atab::$nome_tabela;
		$sql = "SELECT ea_id
										,ea_nome_empresa
										,ea_rating
										,ea_endereco
										,ea_numero
										,ea_bairro
										,ea_cidade
										,ea_estado
										,ea_cep
										,ea_telefone1
										,ea_telefone2
										,ea_telefone3
										,ea_email
										,ea_ramos_aten
										,ea_atab_avanc
										,ea_especialista
						FROM $v_nome_tabela
						WHERE ea_id = $_ID";
		$result = mysql_query($sql);
		$num_rows = mysql_num_rows($result);

		if (!$result || $num_rows <=0) {
			return array();
			exit;
		}
		else{
			$arr_info = array();
			while($row = mysql_fetch_assoc($result)) {
				array_push($arr_info, $row);
			}

			return $arr_info[0];
		}
	}

	public static function pegaHtmlCadastro($_ID=""){

		if( is_numeric($_ID) ){
			$arr_info = nix_encontre_atab::pegaInfoCad($_ID);
			#array_map("utf8_decode", $arr_info);

			$ea_id = $arr_info["ea_id"];
			$ea_nome_empresa = $arr_info["ea_nome_empresa"];
			$ea_rating = $arr_info["ea_rating"];
			$ea_endereco = $arr_info["ea_endereco"];
			$ea_numero = $arr_info["ea_numero"];
			$ea_bairro = $arr_info["ea_bairro"];
			$ea_cidade = $arr_info["ea_cidade"];
			$ea_estado = $arr_info["ea_estado"];
			$ea_cep = $arr_info["ea_cep"];
			$ea_telefone1 = $arr_info["ea_telefone1"];
			$ea_telefone2 = $arr_info["ea_telefone2"];
			$ea_telefone3 = $arr_info["ea_telefone3"];
			$ea_email = $arr_info["ea_email"];
			$ea_ramos_aten = $arr_info["ea_ramos_aten"];
			$ea_atab_avanc = $arr_info["ea_atab_avanc"];
			$ea_especialista = $arr_info["ea_especialista"];
		}
		else{
			$ea_id = "";
			$ea_nome_empresa = "";
			$ea_rating = "";
			$ea_endereco = "";
			$ea_numero = "";
			$ea_bairro = "";
			$ea_cidade = "";
			$ea_estado = "";
			$ea_cep = "";
			$ea_telefone1 = "";
			$ea_telefone2 = "";
			$ea_telefone3 = "";
			$ea_email = "";
			$ea_ramos_aten = "";
			$ea_atab_avanc = "";
			$ea_especialista = "";
		}

		$html = "";
		$html .= "<table class='form-table'>";
		$html .= "  <tbody>";

		$html .= "    <tr>";
		$html .= "      <th><label for='ea_nome_empresa'>Nome</label></th>";
		$html .= "      <td><input maxlength='80' size='80%' name='ea_nome_empresa' id='ea_nome_empresa' class='' value='$ea_nome_empresa' required='' autofocus='' type='text' /></td>";
		$html .= "    </tr>";

		$arr_ea_rating = array('0.5', '1.0', '1.5', '2.0', '2.5', '3.0', '3.5', '4.0', '4.5', '5.0');
		$html_ea_rating = "<select name='ea_rating' id='ea_rating'>";
		$html_ea_rating .= "  <option value=''>--Escolha</option>";
		foreach($arr_ea_rating as $key => $value){
			$sel = ($value == $ea_rating) ? " selected ": "";
			$html_ea_rating .= "<option $sel value='$value'>$value</option>";
		}
		$html_ea_rating .= "</select>";

		$html .= "    <tr>";
		$html .= "      <th><label for='ea_rating'>Rating</label></th>";
		$html .= "      <td>
											$html_ea_rating
										</td>";
		$html .= "    </tr>";

		$html .= "    <tr>";
		$html .= "      <th><label for='ea_cep'>CEP</label></th>";
		$html .= "      <td><input maxlength='9' size='10' name='ea_cep' id='ea_cep' class='' value='$ea_cep' required='' autofocus='' type='text' /></td>";
		$html .= "    </tr>";

		$html .= "    <tr>";
		$html .= "      <th><label for='ea_endereco'>Endere&ccedil;o</label></th>";
		$html .= "      <td><input maxlength='100' size='85' name='ea_endereco' id='ea_endereco' class='' value='$ea_endereco' required='' autofocus='' type='text' /></td>";
		$html .= "    </tr>";

		$html .= "    <tr>";
		$html .= "      <th><label for='ea_numero'>N&uacute;mero</label></th>";
		$html .= "      <td><input maxlength='25' size='20' name='ea_numero' id='ea_numero' class='' value='$ea_numero' required='' autofocus='' type='text' /></td>";
		$html .= "    </tr>";

		$html .= "    <tr>";
		$html .= "      <th><label for='ea_bairro'>Bairro</label></th>";
		$html .= "      <td><input maxlength='60' size='50' name='ea_bairro' id='ea_bairro' class='' value='$ea_bairro' required='' autofocus='' type='text' /></td>";
		$html .= "    </tr>";

		$html .= "    <tr>";
		$html .= "      <th><label for='ea_cidade'>Cidade</label></th>";
		$html .= "      <td><input maxlength='100' size='90' name='ea_cidade' id='ea_cidade' class='' value='$ea_cidade' required='' autofocus='' type='text' /></td>";
		$html .= "    </tr>";

		$arr_ea_estado = array('Acre', 'Alagoas', 'Amapá', 'Amazonas', 'Bahia', 'Ceará', 'Distrito Federal', 'Espírito Santo', 'Goiás', 'Maranhão', 'Mato Grosso', 'Mato Grosso do Sul', 'Minas Gerais', 'Pará', 'Paraíba', 'Paraná', 'Pernambuco', 'Piauí', 'Rio de Janeiro', 'Rio Grande do Norte', 'Rio Grande do Sul', 'Rondônia', 'Roraima', 'Santa Catarina', 'São Paulo', 'Sergipe', 'Tocantins');
		$arr_ea_estado = array_map("utf8_decode", $arr_ea_estado);
		// $arr_ea_estado = array('Acre', 'Alagoas', 'Amapa', 'Amazonas', 'Bahia', 'Ceara', 'Distrito Federal', 'Espirito Santo', 'Goias', 'Maranhao', 'Mato Grosso', 'Mato Grosso do Sul', 'Minas Gerais', 'Para', 'Paraiba', 'Parana', 'Pernambuco', 'Piaui', 'Rio de Janeiro', 'Rio Grande do Norte', 'Rio Grande do Sul', 'Rondonia', 'Roraima', 'Santa Catarina', 'Sao Paulo', 'Sergipe', 'Tocantins');

		$html_ea_estado = "<select name='ea_estado' id='ea_estado'>";
		$html_ea_estado .= "  <option value=''>--Escolha</option>";
		foreach($arr_ea_estado as $key => $value){
			#$value = utf8_decode($value);
			$sel = ($value == $ea_estado) ? " selected ": "";
			$html_ea_estado .= "<option $sel value='$value'>$value</option>";
		}
		$html_ea_estado .= "</select>";

		$html .= "    <tr>";
		$html .= "      <th><label for='ea_estado'>Estado</label></th>";
		$html .= "      <td>
											$html_ea_estado
										</td>";
		$html .= "    </tr>";

		$html .= "    <tr>";
		$html .= "      <th><label for=''>Telefones</label></th>";
		$html .= "      <td>
											#1 <input maxlength='25' size='18' name='ea_telefone1' id='ea_telefone1' class='' value='$ea_telefone1' required='' autofocus='' type='text' />
											&nbsp;
											#2 <input maxlength='25' size='18' name='ea_telefone2' id='ea_telefone2' class='' value='$ea_telefone2' required='' autofocus='' type='text' />
											&nbsp;
											#3 <input maxlength='25' size='18' name='ea_telefone3' id='ea_telefone3' class='' value='$ea_telefone3' required='' autofocus='' type='text' />
										</td>";
		$html .= "    </tr>";

		$html .= "    <tr>";
		$html .= "      <th><label for='ea_email'>Email</label></th>";
		$html .= "      <td><input maxlength='100' size='90' name='ea_email' id='ea_email' class='' value='$ea_email' required='' autofocus='' type='text' /></td>";
		$html .= "    </tr>";

		$java_ea_ramos_aten = "
		  var values = new Array();
		  jQuery(\"#ea_ramos_aten\").val(\"\");
			jQuery(\"input.chk_ea_ramos_aten:checked\").each( function () {
				var text = decodeURIComponent(escape( jQuery(this).val() ));
				values.push(text);
			});

			jQuery(\"#ea_ramos_aten\").val( values.join(\",\") );
		";
		$chkd_com = ( strpos($ea_ramos_aten, "omercial") !== false ) ? " checked='checked' ": "";
		$chkd_aut = ( strpos($ea_ramos_aten, utf8_decode("utomação")) !== false ) ? " checked='checked' ": "";
		$chkd_ind = ( strpos($ea_ramos_aten, "ndustrial") !== false ) ? " checked='checked' ": "";
		$chkd_fmh = ( strpos($ea_ramos_aten, "dico-hospitalar") !== false ) ? " checked='checked' ": "";
		$chkd_dom = ( strpos($ea_ramos_aten, utf8_decode("doméstico")) !== false ) ? " checked='checked' ": "";

		$html .= "    <tr>";
		$html .= "      <th><label for='ea_ramos_aten'>Ramos Atendidos</label></th>";
		$html .= "      <td>
											<input $chkd_com onclick='$java_ea_ramos_aten' class='chk_ea_ramos_aten' type='checkbox' id='ea_ramos_aten1' value='Comercial' /> Comercial
											<br />
											<input $chkd_aut onclick='$java_ea_ramos_aten' class='chk_ea_ramos_aten' type='checkbox' id='ea_ramos_aten2' value='Automação' /> Automa&ccedil;&atilde;o
											<br />
											<input $chkd_ind onclick='$java_ea_ramos_aten' class='chk_ea_ramos_aten' type='checkbox' id='ea_ramos_aten3' value='Industrial' /> Industrial
											<br />
											<input $chkd_fmh onclick='$java_ea_ramos_aten' class='chk_ea_ramos_aten' type='checkbox' id='ea_ramos_aten4' value='Farma-médico-hospitalar' /> Farma-m&eacute;dico-hospitalar
											<br />
											<input $chkd_dom onclick='$java_ea_ramos_aten' class='chk_ea_ramos_aten' type='checkbox' id='ea_ramos_aten5' value='Uso doméstico' /> Uso dom&eacute;stico
											<br />
											<input size='50' type='text' readonly='readonly' id='ea_ramos_aten' name='ea_ramos_aten' value='$ea_ramos_aten' />
										</td>";
		/*$html .= "      <td>
											<input $chkd_com onclick='$java_ea_ramos_aten' class='chk_ea_ramos_aten' type='checkbox' id='ea_ramos_aten1' value='Comercial' /> Comercial
											<br />
											<input $chkd_aut onclick='$java_ea_ramos_aten' class='chk_ea_ramos_aten' type='checkbox' id='ea_ramos_aten2' value='Automacao' /> Automa&ccedil;&atilde;o
											<br />
											<input $chkd_ind onclick='$java_ea_ramos_aten' class='chk_ea_ramos_aten' type='checkbox' id='ea_ramos_aten3' value='Industrial' /> Industrial
											<br />
											<input $chkd_fmh onclick='$java_ea_ramos_aten' class='chk_ea_ramos_aten' type='checkbox' id='ea_ramos_aten4' value='Farma-medico-hospitalar' /> Farma-m&eacute;dico-hospitalar
											<br />
											<input $chkd_dom onclick='$java_ea_ramos_aten' class='chk_ea_ramos_aten' type='checkbox' id='ea_ramos_aten5' value='Uso domestico' /> Uso dom&eacute;stico
											<br />
											<input size='50' type='text' readonly='readonly' id='ea_ramos_aten' name='ea_ramos_aten' value='$ea_ramos_aten' />
										</td>";*/
		$html .= "    </tr>";

		if($ea_atab_avanc == 1){
			$opt0 = "";
			$opt1 = " selected ";
		}
		else{
			$opt0 = " selected ";
			$opt1 = "";
		}
		$html .= "    <tr>";
		$html .= "      <th><label for='ea_atab_avanc'>ATAB Avan&ccedil;ado?</label></th>";
		$html .= "      <td>
											<select name='ea_atab_avanc' id='ea_atab_avanc'>
												<option $opt0 value='0'>N&atilde;o</option>
												<option $opt1 value='1'>Sim</option>
											</select>
										</td>";
		$html .= "    </tr>";

		if($ea_especialista == 1){
			$opt0 = "";
			$opt1 = " selected ";
		}
		else{
			$opt0 = " selected ";
			$opt1 = "";
		}
		$html .= "    <tr>";
		$html .= "      <th><label for='ea_atab_avanc'>Especialista?</label></th>";
		$html .= "      <td>
											<select name='ea_especialista' id='ea_especialista'>
												<option $opt0 value='0'>N&atilde;o</option>
												<option $opt1 value='1'>Sim</option>
											</select>
										</td>";
		$html .= "    </tr>";

		$html .= "  </tbody>";
		$html .= "</table>";

		$nome_tabela = nix_encontre_atab::$nome_tabela;
		$java = "
		  var hddn_atrib_pagina = jQuery(\"#hddn_atrib_pagina\").val();
			jQuery(\"#dv_$nome_tabela\").parent().parent().remove();
			processa_cadastro_customizado( hddn_atrib_pagina );
		";
		$java_salvar = "
			var hddn_atrib_pagina = jQuery(\"#hddn_atrib_pagina\").val();

			var variaveis = jQuery(\"#dv_$nome_tabela :input\").serialize();
			variaveis = \"atrib_pagina=\" + hddn_atrib_pagina + \"&acao=salvar&id=$_ID&\" + variaveis;

			processa_ajax(variaveis);
		";

		$html .= "<p>
								<input name='save_$nome_tabela' class='button button-primary button-large' id='save_$nome_tabela' value='Salvar' type='button' onclick='$java_salvar' />
								&nbsp;
								<input name='cancel_$nome_tabela' class='button button-large' id='cancel_$nome_tabela' value='Cancelar' type='button' onclick='$java' />
							</p>";
		return $html;
	}

	public static function salvaDados($arr_dados){
		// respostas
		$resp = array();
		$resp["alerta"] = "";
		$resp["conteudo"] = "";
		$resp["objeto"] = "";
		// =========

		// validacoes
		$alertas = "";

		if( strlen($arr_dados["ea_nome_empresa"]) < 5 ){
			$alertas .= "- Nome\n";
		}
		if( !is_numeric($arr_dados["ea_rating"]) ){
			$alertas .= "- Rating\n";
		}
		if( strlen($arr_dados["ea_endereco"]) < 5 ){
			$alertas .= "- Endereço\n";
		}
		if( strlen($arr_dados["ea_numero"]) < 1 ){
			$alertas .= "- Número\n";
		}
		if( strlen($arr_dados["ea_cidade"]) < 3 ){
			$alertas .= "- Cidade\n";
		}
		if( strlen($arr_dados["ea_estado"]) < 3 ){
			$alertas .= "- Estado\n";
		}
		if( strlen($arr_dados["ea_ramos_aten"]) < 3 ){
			$alertas .= "- Ramos Atendimento\n";
		}
		if( !is_numeric($arr_dados["ea_atab_avanc"]) ){
			$alertas .= "- ATAB Avançado\n";
		}
		if( !is_numeric($arr_dados["ea_especialista"]) ){
			$alertas .= "- Especialista\n";
		}

		if($alertas != ""){
			$resp["alerta"] = "Preencha corretamente as seguintes informações:\n\n" . $alertas;
			return $resp;
			exit;
		}
		// ==========

		// ok, grava
		$v_nome_tabela = nix_encontre_atab::$nome_tabela;
		$arr_dados = array_map("utf8_decode", $arr_dados);

		if(is_numeric($arr_dados["id"])){
			$sql = "UPDATE $v_nome_tabela SET ea_nome_empresa = '".mysql_real_escape_string($arr_dados["ea_nome_empresa"])."',
																				ea_rating = ".$arr_dados["ea_rating"].",
																				ea_endereco = '".mysql_real_escape_string($arr_dados["ea_endereco"])."',
																				ea_numero = '".mysql_real_escape_string($arr_dados["ea_numero"])."',
																				ea_bairro = '".mysql_real_escape_string($arr_dados["ea_bairro"])."',
																				ea_cidade = '".mysql_real_escape_string($arr_dados["ea_cidade"])."',
																				ea_estado = '".mysql_real_escape_string($arr_dados["ea_estado"])."',
																				ea_cep = '".mysql_real_escape_string($arr_dados["ea_cep"])."',
																				ea_telefone1 = '".mysql_real_escape_string($arr_dados["ea_telefone1"])."',
																				ea_telefone2 = '".mysql_real_escape_string($arr_dados["ea_telefone2"])."',
																				ea_telefone3 = '".mysql_real_escape_string($arr_dados["ea_telefone3"])."',
																				ea_email = '".mysql_real_escape_string($arr_dados["ea_email"])."',
																				ea_ramos_aten = '".mysql_real_escape_string($arr_dados["ea_ramos_aten"])."',
																				ea_atab_avanc = ".$arr_dados["ea_atab_avanc"].",
																				ea_especialista = ".$arr_dados["ea_especialista"]."
							WHERE ea_id = " . $arr_dados["id"];
		}
		else{
			$sql = "INSERT INTO $v_nome_tabela(ea_nome_empresa, ea_rating, ea_endereco, ea_numero, ea_bairro, ea_cidade, ea_estado, ea_cep, ea_telefone1, ea_telefone2, ea_telefone3, ea_email, ea_ramos_aten, ea_atab_avanc, ea_especialista) VALUES ('".mysql_real_escape_string($arr_dados["ea_nome_empresa"])."', ".$arr_dados["ea_rating"].", '".mysql_real_escape_string($arr_dados["ea_endereco"])."', '".mysql_real_escape_string($arr_dados["ea_numero"])."', '".mysql_real_escape_string($arr_dados["ea_bairro"])."', '".mysql_real_escape_string($arr_dados["ea_cidade"])."', '".mysql_real_escape_string($arr_dados["ea_estado"])."', '".mysql_real_escape_string($arr_dados["ea_cep"])."', '".mysql_real_escape_string($arr_dados["ea_telefone1"])."', '".mysql_real_escape_string($arr_dados["ea_telefone2"])."', '".mysql_real_escape_string($arr_dados["ea_telefone3"])."', '".mysql_real_escape_string($arr_dados["ea_email"])."', '".mysql_real_escape_string($arr_dados["ea_ramos_aten"])."', ".$arr_dados["ea_atab_avanc"].", ".$arr_dados["ea_especialista"].")";
		}

		$result = mysql_query($sql);

		if (!$result) {
			$resp["alerta"] = "Erro ao salvar.\n\n" . mysql_error();
			return $resp;
			exit;
		}
		else{
			$resp["objeto"] = "#" . nix_encontre_atab::$nome_id_dv;
			$resp["conteudo"] = nix_encontre_atab::pegaHtmlTable($arr_dados["atrib_pagina"], false, true);

			return $resp;
			exit;
		}
		// =========
	}

	public static function deleta($id, $atrib_pagina){
		// respostas
		$resp = array();
		$resp["alerta"] = "";
		$resp["conteudo"] = "";
		$resp["objeto"] = "";
		// =========

		if( !is_numeric($id) ){
			$resp["alerta"] = "Erro ao deletar (id inválido)";
			return $resp;
			exit;
		}

		$v_nome_tabela = nix_encontre_atab::$nome_tabela;
		$sql = "DELETE FROM $v_nome_tabela WHERE ea_id = $id";
		$result = mysql_query($sql);

		if (!$result) {
			$resp["alerta"] = "Erro ao deletar.\n\n" . mysql_error();
			return $resp;
			exit;
		}
		else{
			$resp["objeto"] = "#" . nix_encontre_atab::$nome_id_dv;
			$resp["conteudo"] = nix_encontre_atab::pegaHtmlTable($atrib_pagina);

			return $resp;
			exit;
		}
	}

	public static function pegaHtmlTable($atrib_pagina, $decode=false, $encode=false){
		$nome_tabela = nix_encontre_atab::$nome_tabela;

		$html = "<div id='dv_$nome_tabela'>";
		$html .= "<input name='btn_novo_$nome_tabela' class='button button-primary button-large' id='btn_novo_$nome_tabela' value='INCLUIR' type='button' onClick='processa_ajax(\"atrib_pagina=$atrib_pagina&acao=novo\")' />";
		$html .= "<div style='margin-bottom:40px;'></div>";

		$sql = "SELECT ea_id
										,ea_nome_empresa
										,ea_cidade
										,ea_estado
										,ea_email
										,ea_ramos_aten
						FROM $nome_tabela
						ORDER BY ea_nome_empresa";
		$result = mysql_query($sql);
		$num_rows = mysql_num_rows($result);

		if (!$result || $num_rows <=0) {
			$html .= "<p>Nenhum registro cadastrado ...</p>";
		}
		else{
			$html .= "<table id='example' class='display compact data_tables' cellspacing='0' width='100%'>
									<thead>
										<tr>
											<th align='left'>ID</th>
											<th align='left'>Nome</th>
											<th align='left'>Cidade</th>
											<th align='left'>Email</th>
											<th align='left'>Ramos</th>
											<th>&nbsp;</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th align='left'>ID</th>
											<th align='left'>Nome</th>
											<th align='left'>Cidade</th>
											<th align='left'>Email</th>
											<th align='left'>Ramos</th>
											<th>&nbsp;</th>
										</tr>
									</tfoot>
									<tbody>";

			while($row = mysql_fetch_assoc($result)) {
				$_ID     = $row["ea_id"];
				$_NOME   = $row["ea_nome_empresa"];
				$_CIDADE = $row["ea_cidade"];
				$_ESTADO = $row["ea_estado"];
				$_EMAIL  = $row["ea_email"];
				$_RAMOS  = $row["ea_ramos_aten"];

				$java_del = "
					if( confirm(\"Deseja deletar esse registro?\") ){
						var hddn_atrib_pagina = jQuery(\"#hddn_atrib_pagina\").val();
						variaveis = \"atrib_pagina=\" + hddn_atrib_pagina + \"&acao=deletar&id=$_ID\";

						processa_ajax(variaveis);
					}
				";
				$java_alt = "
					var hddn_atrib_pagina = jQuery(\"#hddn_atrib_pagina\").val();
					variaveis = \"atrib_pagina=\" + hddn_atrib_pagina + \"&acao=alterar&id=$_ID\";

					processa_ajax(variaveis);
				";

				$html .= "  <tr>
											<td>$_ID</td>
											<td>$_NOME</td>
											<td>$_CIDADE / $_ESTADO</td>
											<td>$_EMAIL</td>
											<td>$_RAMOS</td>
											<td>
												<a title='ALTERAR' onclick='$java_alt' href='javascript:;'><img src='../wp-content/themes/balmak/cadastro_customizado/icons/edit.png' /></a>
												&nbsp;
												<a title='DELETAR' onclick='$java_del' href='javascript:;'><img src='../wp-content/themes/balmak/cadastro_customizado/icons/trash.png' /></a>
											</td>
										</tr>";
			}

			$html .= "  </tbody>
								</table>";
		}

		$html .= "</div>";
		$html .= "<input type='hidden' id='hddn_atrib_pagina' value='$atrib_pagina' />";

		if($decode){
			$html = utf8_decode($html);
		} else if ($encode){
			$html = utf8_encode($html);
		}

		return $html;
	}
}
// =============================

if( isset($acao) && ($acao == "novo" || $acao == "alterar") ){
	// respostas
	$resp = array();
	$resp["alerta"] = "";
	$resp["conteudo"] = "";
	$resp["objeto"] = "";
	// =========

	$V_ID = (isset($id) && is_numeric($id)) ? $id: "";
	$resp["conteudo"] = utf8_encode( nix_encontre_atab::pegaHtmlCadastro($V_ID) );
	$resp["objeto"] = "#" . nix_encontre_atab::$nome_id_dv;
	echo json_encode($resp);
}
else if( isset($acao) && $acao == "salvar" ){
	// respostas
	$resp = array();
	$resp["alerta"] = "";
	$resp["conteudo"] = "";
	$resp["objeto"] = "";
	// =========

	$arr_valores = array();
	$arr_valores["atrib_pagina"] = $atrib_pagina;
	$arr_valores["id"] = (isset($id)) ? $id: "";
	$arr_valores["ea_nome_empresa"] = $ea_nome_empresa;
	$arr_valores["ea_rating"] = $ea_rating;
	$arr_valores["ea_cep"] = $ea_cep;
	$arr_valores["ea_endereco"] = $ea_endereco;
	$arr_valores["ea_numero"] = $ea_numero;
	$arr_valores["ea_bairro"] = $ea_bairro;
	$arr_valores["ea_cidade"] = $ea_cidade;
	$arr_valores["ea_estado"] = $ea_estado;
	$arr_valores["ea_telefone1"] = $ea_telefone1;
	$arr_valores["ea_telefone2"] = $ea_telefone2;
	$arr_valores["ea_telefone3"] = $ea_telefone3;
	$arr_valores["ea_email"] = $ea_email;
	$arr_valores["ea_ramos_aten"] = $ea_ramos_aten;
	$arr_valores["ea_atab_avanc"] = $ea_atab_avanc;
	$arr_valores["ea_especialista"] = $ea_especialista;

	$resp = nix_encontre_atab::salvaDados($arr_valores);
	echo json_encode($resp);
}
else if( isset($acao) && $acao == "deletar" ){
	// respostas
	$resp = array();
	$resp["alerta"] = "";
	$resp["conteudo"] = "";
	$resp["objeto"] = "";
	// =========

	$resp = nix_encontre_atab::deleta($id, $atrib_pagina);
	echo json_encode($resp);
}
else{
	nix_encontre_atab::checaCreateTable();
	$_HTML = nix_encontre_atab::pegaHtmlTable($atrib_pagina, false, false);
	$nome_tabela = nix_encontre_atab::$nome_tabela;

	$janAtab = new janelaWp("Cadastro - Assistente T&eacute;cnico Autorizado");
	$janAtab->setConteudo("$_HTML");
	$html = $janAtab->getHtml();

	$arr_resp["esconde_editor"] = true;
	$arr_resp["conteudo"] = utf8_encode($html);
	echo json_encode($arr_resp);
}
?>
