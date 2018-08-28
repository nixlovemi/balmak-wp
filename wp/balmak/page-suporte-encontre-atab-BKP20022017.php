<?php
if($_SERVER["REMOTE_ADDR"] == "200.170.148.99"){
  include "page-suporte-encontre-atab-DEV.php";
	return;
}



/* Template Name: Balmak - Encontre ATAB */
get_header();
?>

<?php
// verifica se veio variavel de filtro por estado
$V_FILTER_ESTADO = ( isset($_POST["estado_filtro"]) ) ? $_POST["estado_filtro"]: "São Paulo";
?>

<?php
function filtra_atab_cidade($arr_info, $estado){
	if($estado == ""){
		return $arr_info;
	}

	$arr_resp = array();
	foreach($arr_info as $key => $emp_atab){
		$v_estado = $emp_atab["estado"];
		if($v_estado == $estado){
			array_push($arr_resp, $arr_info[$key]);
		}
	}

	return $arr_resp;
}
?>

<?php
global $wpdb;
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
				FROM tb_nix_encontre_atab
				ORDER BY ea_nome_empresa";
$conn = $wpdb->get_results($sql);
$arr_info_atab = array();

foreach ($conn as $rs){
	$v_nome = $rs->ea_nome_empresa;
	$v_rating = $rs->ea_rating;
	$v_endereco = $rs->ea_endereco;
	$v_numero = $rs->ea_numero;
	$v_bairro = $rs->ea_bairro;
	$v_cidade = $rs->ea_cidade;
	$v_estado = $rs->ea_estado;
	$v_cep = $rs->ea_cep;
	$v_telefone1 = $rs->ea_telefone1;
	$v_telefone2 = $rs->ea_telefone2;
	$v_telefone3 = $rs->ea_telefone3;
	$v_email = $rs->ea_email;
	$v_ramos = $rs->ea_ramos_aten;
	$v_atab_avanc = $rs->ea_atab_avanc;

	array_push($arr_info_atab, array(
		"nome"=>$v_nome,
		"rating"=>$v_rating,
		"endereco"=>$v_endereco,
		"numero"=>$v_numero,
		"bairro"=>$v_bairro,
		"cidade"=>$v_cidade,
		"estado"=>$v_estado,
		"cep"=>$v_cep,
		"telefone1"=>$v_telefone1,
		"telefone2"=>$v_telefone2,
		"telefone3"=>$v_telefone3,
		"email"=>$v_email,
		"ramos"=>$v_ramos,
		"atab_avanc"=>$v_atab_avanc,
	));
}

/*
USANDO SIMPLE FIELDS
====================

$eatab_nome = simple_fields_values("page_encontre_atab_1_nome");
$eatab_rating = simple_fields_values("page_encontre_atab_1_rating", NULL, "extended_return=1");
$eatab_endereco = simple_fields_values("page_encontre_atab_1_endereco");
$eatab_numero = simple_fields_values("page_encontre_atab_1_numero");
$eatab_bairro = simple_fields_values("page_encontre_atab_1_bairro");
$eatab_cidade = simple_fields_values("page_encontre_atab_1_cidade");
$eatab_estado = simple_fields_values("page_encontre_atab_1_estado", NULL, "extended_return=1");
$eatab_cep = simple_fields_values("page_encontre_atab_1_cep");
$eatab_telefone1 = simple_fields_values("page_encontre_atab_1_telefone_1");
$eatab_telefone2 = simple_fields_values("page_encontre_atab_1_telefone_2");
$eatab_telefone3 = simple_fields_values("page_encontre_atab_1_telefone_3");
$eatab_email = simple_fields_values("page_encontre_atab_1_email");
$eatab_ramos = simple_fields_values("page_encontre_atab_1_ramos_atend", NULL, "extended_return=1");
$eatab_atab_avanc = simple_fields_values("page_encontre_atab_1_atab_avanc");

// monta array com infos
$arr_info_atab = array();
for($i=0; $i<count($eatab_nome); $i++){
	$v_nome = (isset($eatab_nome[$i])) ? $eatab_nome[$i]: "";
	$v_rating = (isset($eatab_rating[$i]["selected_value"])) ? $eatab_rating[$i]["selected_value"]: "";
	$v_endereco = (isset($eatab_endereco[$i])) ? $eatab_endereco[$i]: "";
	$v_numero = (isset($eatab_numero[$i])) ? $eatab_numero[$i]: "";
	$v_bairro = (isset($eatab_bairro[$i])) ? $eatab_bairro[$i]: "";
	$v_cidade = (isset($eatab_cidade[$i])) ? $eatab_cidade[$i]: "";
	$v_estado = (isset($eatab_estado[$i]["selected_value"])) ? $eatab_estado[$i]["selected_value"]: "";
	$v_cep = (isset($eatab_cep[$i])) ? $eatab_cep[$i]: "";
	$v_telefone1 = (isset($eatab_telefone1[$i])) ? $eatab_telefone1[$i]: "";
	$v_telefone2 = (isset($eatab_telefone2[$i])) ? $eatab_telefone2[$i]: "";
	$v_telefone3 = (isset($eatab_telefone3[$i])) ? $eatab_telefone3[$i]: "";
	$v_email = (isset($eatab_email[$i])) ? $eatab_email[$i]: "";
	$v_ramos = (isset($eatab_ramos[$i]["selected_values"])) ? $eatab_ramos[$i]["selected_values"]: "";
	$v_atab_avanc = (isset($eatab_atab_avanc[$i])) ? $eatab_atab_avanc[$i]: "";

	array_push($arr_info_atab, array(
		"nome"=>$v_nome,
		"rating"=>$v_rating,
		"endereco"=>$v_endereco,
		"numero"=>$v_numero,
		"bairro"=>$v_bairro,
		"cidade"=>$v_cidade,
		"estado"=>$v_estado,
		"cep"=>$v_cep,
		"telefone1"=>$v_telefone1,
		"telefone2"=>$v_telefone2,
		"telefone3"=>$v_telefone3,
		"email"=>$v_email,
		"ramos"=>$v_ramos,
		"atab_avanc"=>$v_atab_avanc,
	));
}
*/
?>

<div class="chamada-topo balmak-border-bottom-red" data-img="<?php echo esc_url( get_template_directory_uri() ); ?>/images/chamada-suporte-ctt.jpg">
	<div class="chamada-topo-txt"><span>Encontre um ATAB</span></div>
</div>
<div class="content">
  <div class="main-width">
		<?php
		// ARRAY COM OS TEXTOS
		$atab_titulo = simple_fields_values("page_encontre_atab_2_titulo");
		$atab_texto = simple_fields_values("page_encontre_atab_2_texto");

		for($i=0; $i<count($atab_titulo); $i++){
			$titulo = $atab_titulo[$i];
			$texto = $atab_texto[$i];

			echo "<h3 class='balmak-title'>$titulo</h3>";
			echo "$texto<br /><br />";
		}
		?>

		<!--
  	<h3 class="balmak-title">Encontre um ATAB (Assistente Técnico Autorizado BALMAK)</h3>
    <p>A BALMAK conta com uma ampla Rede de Suporte Técnico com mais de 400 ATABs (Assistentes Técnicos Autorizados BALMAK) para atender às demandas de seus clientes localizados em todo o território nacional.</p>
    <p>Ao selecionar um assistente técnico, dê preferência ao grupo de ATABs AVANÇADOS. Estas empresas apresentam técnicos que foram recentemente treinados por nosso CTT (Centro de Treinamento e Tecnologia) e atualizados com nossas mais novas tecnologias, encontrando-se assim, melhor preparados para atendê-lo. Caso não encontre um perto de você, utilize um ATAB, normalmente. Toda a rede está capacitada para o atendimento, e pode oferecer serviços de alto padrão, e peças originais de reposição da marca BALMAK.</p>
		-->

		<p align="center" class="balmak-title-red">Clique no estado, e localize o Assistente Técnico Autorizado BALMAK (ATAB ou ATAB AVANÇADO) mais perto de você!</p>
    <div class="txt-align-center">
      <img id="mapa-encontre-atab" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-encontre-atab-1.jpg" usemap="#Map" />

      <form id="frm-click-mapa" name="frm-click-mapa" action="" method="post">
      	<input type="hidden" id="estado_filtro" name="estado_filtro" value="" />
      </form>

      <map name="Map" id="Map">
        <area alt="AM" title="Amazonas" onclick="fnc_frm_click_mapa('Amazonas');" href="javascript:;" shape="poly" coords="141,52,148,90,162,98,196,80,203,95,223,105,205,153,199,182,164,183,151,174,137,174,121,188,106,193,92,198,19,173,28,150,56,140,67,112,67,86,59,79,91,66,112,73" />

        <area alt="AC" title="Acre" onclick="fnc_frm_click_mapa('Acre');" href="javascript:;" shape="poly" coords="13,178,11,183,24,198,37,207,51,202,55,218,77,219,95,205" />

        <area alt="RR" title="Roraima" onclick="fnc_frm_click_mapa('Roraima');" href="javascript:;" shape="poly" coords="136,42,145,44,156,62,156,82,169,78,182,70,195,68,192,60,181,45,181,32,179,18" />

        <area alt="RO" title="Rondônia" onclick="fnc_frm_click_mapa('Rondônia');" href="javascript:;" shape="poly" coords="121,199,122,211,123,224,134,233,147,235,159,240,166,246,179,246,183,236,184,228,179,220,165,208,165,191,148,183" />

        <area alt="AP" title="Amapá" onclick="fnc_frm_click_mapa('Amapá');" href="javascript:;" shape="poly" coords="261,50,271,56,276,63,283,75,289,84,304,68,309,56,301,49,297,28,283,46,277,52" />

        <area alt="PA" title="Pará" onclick="fnc_frm_click_mapa('Pará');" href="javascript:;" shape="poly" coords="203,62,223,56,239,56,254,54,270,66,275,80,285,96,299,98,305,104,322,104,343,88,359,93,355,108,344,127,329,140,324,158,319,170,311,190,307,198,231,194,217,178,208,162,233,104,221,94,211,93,202,80" />

        <area alt="MT" title="Mato Grosso" onclick="fnc_frm_click_mapa('Mato Grosso');" href="javascript:;" shape="poly" coords="181,251,186,265,190,281,211,283,214,295,226,297,237,293,252,296,265,295,272,291,279,279,287,271,297,261,302,240,301,226,302,204,265,201,241,202,227,201,216,193,212,185,205,191,171,192,170,209,183,215,190,218,191,235" />

        <area alt="MA" title="Maranhão" onclick="fnc_frm_click_mapa('Maranhão');" href="javascript:;" shape="poly" coords="367,95,365,108,361,120,355,130,345,139,350,145,351,161,353,170,361,176,359,194,365,185,371,170,386,162,401,160,402,144,402,133,404,122,413,117,398,111,386,118" />

        <area alt="TO" title="Tocantins" onclick="fnc_frm_click_mapa('Tocantins');" href="javascript:;" shape="poly" coords="308,236,307,218,313,196,322,186,327,178,325,169,332,164,341,149,344,159,341,167,348,178,349,188,354,201,361,210,355,218,357,230,359,248,346,250,318,243" />

        <area alt="GO" title="Goiás" onclick="fnc_frm_click_mapa('Goiás');" href="javascript:;" shape="poly" coords="323,278,346,276,355,261,355,255,335,256,307,248,303,264,293,276,284,287,278,300,283,305,288,310" />

        <area alt="DF" title="Distrito Federal" onclick="fnc_frm_click_mapa('Distrito Federal');" href="javascript:;" shape="poly" coords="320,283,339,283,339,305,307,311,303,307" />

        <area alt="MS" title="Mato Grosso do Sul" onclick="fnc_frm_click_mapa('Mato Grosso do Sul');" href="javascript:;" shape="poly" coords="221,308,217,326,217,336,221,353,235,355,246,361,250,376,263,373,267,363,280,354,286,344,291,332,293,324,275,316,263,300,250,302,239,301,234,300" />

        <area alt="PI" title="Piauí" onclick="fnc_frm_click_mapa('Piauí');" href="javascript:;" shape="poly" coords="368,193,373,182,382,175,394,170,404,167,411,162,408,154,409,142,411,131,421,123,426,132,426,147,429,160,431,167,430,179,422,187,413,195,391,196,388,208,377,213,371,205" />

        <area alt="CE" title="Ceará" onclick="fnc_frm_click_mapa('Ceará');" href="javascript:;" shape="poly" coords="430,118,432,137,435,155,439,169,455,171,458,155,469,143,451,127" />

        <area alt="RN" title="Rio Grande do Norte" onclick="fnc_frm_click_mapa('Rio Grande do Norte');" href="javascript:;" shape="poly" coords="475,144,469,156,488,160,504,163,527,164,527,151" />

        <area alt="PB" title="Paraíba" onclick="fnc_frm_click_mapa('Paraíba');" href="javascript:;" shape="poly" coords="527,169,490,169,463,168,462,178,492,180,528,179" />

        <area alt="PE" title="Pernambuco" onclick="fnc_frm_click_mapa('Pernambuco');" href="javascript:;" shape="poly" coords="529,182,529,195,493,195,462,192,449,188,437,183,451,181,473,185,478,187,481,190,491,184,504,182" />

        <area alt="AL" title="Alagoas" onclick="fnc_frm_click_mapa('Alagoas');" href="javascript:;" shape="poly" coords="511,201,496,198,484,202,472,200,473,204,485,212,513,217" />

        <area alt="SE" title="Sergipe" onclick="fnc_frm_click_mapa('Sergipe');" href="javascript:;" shape="poly" coords="499,222,481,217,473,211,469,218,469,224,477,231,484,238,497,238" />

        <area alt="BA" title="Bahia" onclick="fnc_frm_click_mapa('Bahia');" href="javascript:;" shape="poly" coords="463,236,452,220,455,205,435,203,416,204,395,212,377,221,368,230,367,245,369,260,401,260,416,269,429,276,439,281,437,296,447,287,446,260,451,243" />

        <area alt="MG" title="Minas Gerais" onclick="fnc_frm_click_mapa('Minas Gerais');" href="javascript:;" shape="poly" coords="351,294,353,282,362,274,379,269,390,270,403,276,415,283,427,291,425,303,418,310,415,323,411,333,405,342,397,354,381,358,357,364,354,348,351,340,347,333,333,330,322,328,306,324,317,317,331,317,340,313,346,310" />

        <area alt="ES" title="Espírito Santo" onclick="fnc_frm_click_mapa('Espírito Santo');" href="javascript:;" shape="poly" coords="459,329,433,317,427,315,423,330,417,342,417,349,440,350,459,350" />

        <area alt="RJ" title="Rio de Janeiro" onclick="fnc_frm_click_mapa('Rio de Janeiro');" href="javascript:;" shape="poly" coords="439,362,419,357,411,355,401,362,386,365,381,370,435,376" />

        <area alt="SP" title="São Paulo" onclick="fnc_frm_click_mapa('São Paulo');" href="javascript:;" shape="poly" coords="317,335,301,336,293,345,285,360,303,365,313,365,319,377,322,387,331,392,345,386,368,377,353,371,345,361,341,348,340,337" />

        <area alt="PR" title="Paraná" onclick="fnc_frm_click_mapa('Paraná');" href="javascript:;" shape="poly" coords="262,390,269,375,281,367,298,370,310,379,316,390,323,399,317,405,306,407,293,413,279,410,269,407,263,399" />

        <area alt="SC" title="Santa Catarina" onclick="fnc_frm_click_mapa('Santa Catarina');" href="javascript:;" shape="poly" coords="267,412,280,415,296,418,304,414,321,413,324,426,319,441,307,437,282,424,269,421" />

        <area alt="RS" title="Rio Grande do Sul" onclick="fnc_frm_click_mapa('Rio Grande do Sul');" href="javascript:;" shape="poly" coords="268,425,255,434,244,441,233,456,241,464,250,470,266,481,275,493,280,479,289,467,293,461,303,459,303,453,303,446,289,432" />
    </div>
    <p class="mt20 mb20 txt-align-center">
      <select onchange="var estado = $('#slc-mapa-encontre-atab').val(); fnc_frm_click_mapa(estado);" id="slc-mapa-encontre-atab">
      	<option value="">-- Escolha</option>
        <option value="Acre">Acre</option>
        <option value="Alagoas">Alagoas</option>
        <option value="Amapá">Amapá</option>
        <option value="Amazonas">Amazonas</option>
        <option value="Bahia">Bahia</option>
        <option value="Ceará">Ceará</option>
        <option value="Distrito Federal">Distrito Federal</option>
        <option value="Espírito Santo">Espírito Santo</option>
        <option value="Goiás">Goiás</option>
        <option value="Maranhão">Maranhão</option>
        <option value="Mato Grosso">Mato Grosso</option>
        <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
        <option value="Minas Gerais">Minas Gerais</option>
        <option value="Pará">Pará</option>
        <option value="Paraíba">Paraíba</option>
        <option value="Pernambuco">Pernambuco</option>
        <option value="Piauí">Piauí</option>
        <option value="Rio de Janeiro">Rio de Janeiro</option>
        <option value="Rio Grande do Norte">Rio Grande do Norte</option>
        <option value="Rio Grande do Sul">Rio Grande do Sul</option>
        <option value="Rondônia">Rondônia</option>
        <option value="Roraima">Roraima</option>
        <option value="Santa Catarina">Santa Catarina</option>
        <option value="São Paulo">São Paulo</option>
        <option value="Sergipe">Sergipe</option>
        <option value="Tocantins">Tocantins</option>
      </select>
    </p>

    <p class="mb30" style="margin-bottom: 15px !important;"><strong><?php echo $V_FILTER_ESTADO; ?></strong></p>

    <?php
		$arr_loop = filtra_atab_cidade($arr_info_atab, $V_FILTER_ESTADO);
		// $arr_loop = $arr_info_atab; //dpois tem que filtrar por estado

		if( count($arr_loop) <= 0 ){
			?>
      <p>Nenhum resultado encontrado ...</p>
      <?php
		}
		else{
			foreach($arr_loop as $key => $emp_atab){
				$v_nome = $emp_atab["nome"];
				$v_rating = str_replace(",", ".", $emp_atab["rating"]);
				$v_endereco = $emp_atab["endereco"];
				$v_numero = $emp_atab["numero"];
				$v_bairro = $emp_atab["bairro"];
				$v_cidade = $emp_atab["cidade"];
				$v_estado = $emp_atab["estado"];
				$v_cep = $emp_atab["cep"];

				$v_arr_tel = array();
				if($emp_atab["telefone1"] != ""){
					array_push($v_arr_tel, $emp_atab["telefone1"]);
				}
				if($emp_atab["telefone2"] != ""){
					array_push($v_arr_tel, $emp_atab["telefone2"]);
				}
				if($emp_atab["telefone3"] != ""){
					array_push($v_arr_tel, $emp_atab["telefone3"]);
				}
				$v_str_tels = implode(" / ", $v_arr_tel);

				$v_email = $emp_atab["email"];
				// $v_str_ramos = implode(", ", $emp_atab["ramos"]);
				$v_str_ramos = $emp_atab["ramos"];
				$v_img_avancado = ($emp_atab["atab_avanc"] == 1) ? "<img width='100' src='".esc_url( get_template_directory_uri() )."/images/img-ctt-selo.jpg' class='certificado' />": "";

				echo "<div class='item-lista-encontre-atab'>
								<div class='title'>$v_nome</div>
								<div style='position: relative; top: 63px; left: 44px;' class='rating mb5'><img src='". esc_url( get_template_directory_uri() )."/images/stars-$v_rating.jpg' /></div>
								<p class='mb5'>$v_endereco, $v_numero - $v_bairro</p>
								<p class='mb5'>$v_cidade ($v_estado) - CEP $v_cep</p>
								<p class='mb5'>FONE: $v_str_tels</p>
								<p class='mb5'>$v_email</p>
								<p class='mb5'><strong>PRODUTOS ATENDIDOS:</strong>
								<br />
								<span class='ramos-atendidos'>$v_str_ramos</span></p>

								$v_img_avancado
							</div>";
			}
		}
		?>

    <?php
		/*

    <div class="item-lista-encontre-atab">
      <div class="title">ATHOS AUTOMAÇÃO</div>
      <div class="rating mb5"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/stars-3.jpg" /></div>
      <p class="mb5">QNM Q 3 CJ 0 LT 37, SALA 104/105, CEILANDIA</p>
      <p class="mb5">BRASÍLIA - CEP 72215-045</p>
      <p class="mb5">FONE: (61) 3021-9213 / 8456-20112 / 9631-8655</p>
      <p class="mb5">ronaldgeovanne@hotmail.com</p>
      <p class="mb5"><strong>RAMOS ATENDIDOS:</strong> <span class="ramos-atendidos">Comercial, Automação, Industrial</span></p>

      <img width="100" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-ctt-selo.jpg" class="certificado" />
    </div>

    <div class="item-lista-encontre-atab">
      <div class="title">CONFITECH ASSISTÊNCIA TÉCNICA HOSP. LTDA</div>
      <div class="rating mb5"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/stars-1.5.jpg" /></div>
      <p class="mb5">QR 302, CONJUNTO L, LOTE 28, SAL 01 - SANTA MARIA</p>
      <p class="mb5">CEP 72502-512</p>
      <p class="mb5">FONE: (61) 3392-3531/ 8545-9766</p>
      <p class="mb5">confitech.vendas@terra.com.br</p>
      <p class="mb5"><strong>RAMOS ATENDIDOS:</strong> <span class="ramos-atendidos">Comercial, Industrial</span></p>

      <img width="100" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-ctt-selo.jpg" class="certificado" />
    </div>

    <div class="item-lista-encontre-atab">
      <div class="title">MARCIMAQ EQUIPAMENTOS E SERVIÇOS EIRELI </div>
      <div class="rating mb5"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/stars-4.5.jpg" /></div>
      <p class="mb5">AV TERCEIRA, SN, BC 990, LT 1078-, SALA 102</p>
      <p class="mb5">CEP 71720-590</p>
      <p class="mb5">FONE: (61) 3022-0035</p>
      <p class="mb5">marcimaq01@gmail.com</p>
      <p class="mb5"><strong>RAMOS ATENDIDOS:</strong> <span class="ramos-atendidos">Industrial</span></p>
    </div>
		*/
		?>
  </div>
</div>

<?php
get_footer();
?>
