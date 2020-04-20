<?php
// header('Content-Type: text/html; charset=utf-8');

// classe pra gerenciar a tabela
class nix_representante_br{
  public static $nome_tabela = 'tb_nix_representante_br';
  public static $nome_id_dv = 'dv_tb_nix_representante_br';

  public static function checaCreateTable(){
    global $wpdb;

    $v_nome_tabela = nix_representante_br::$nome_tabela;
    $sql = "SELECT COUNT(*) AS result
            FROM information_schema.TABLES
            WHERE (TABLE_SCHEMA = '".DB_NAME."') AND (TABLE_NAME = '".$v_nome_tabela."')";
    $myrows = $wpdb->get_results( $sql );
    $count  = $myrows[0]->result ?? 0;

    if($count <= 0){
      $sql = "CREATE TABLE $v_nome_tabela (
                rb_id               int(11)       AUTO_INCREMENT,
                rb_nome             varchar(80)   NOT NULL,
                rb_telefone1        varchar(50)    NOT NULL,
                rb_telefone2        varchar(50),
                rb_telefone3        varchar(50),
                rb_email            varchar(100)  NOT NULL,
                rb_contato           varchar(80)    NOT NULL,
                rb_area_de_atuacao   text,
                rb_area_atua         varchar(80)   NOT NULL,
                rb_estado            varchar(80)    NOT NULL,
                PRIMARY KEY  (rb_id)
              )";
      $wpdb->query( $sql );
    }
  }

  public static function pegaInfoCad($_ID){
    if(!is_numeric($_ID)){
      return array();
      exit;
    }

    global $wpdb;
    $v_nome_tabela = nix_representante_br::$nome_tabela;
    $sql = "SELECT rb_id
                    ,rb_nome
                    ,rb_telefone1
                    ,rb_telefone2
                    ,rb_telefone3
                    ,rb_email
                    ,rb_contato
                    ,rb_area_de_atuacao
                    ,rb_area_atua
                    ,rb_estado
            FROM $v_nome_tabela
            WHERE rb_id = $_ID";
    $myrows = $wpdb->get_results( $sql );

    if (!isset($myrows) || count($myrows) <=0) {
      return array();
      exit;
    }
    else{
      $arr_info = array();
      foreach($myrows as $row){
        $aRow = (array) $row;
        array_push($arr_info, $aRow);
      }

      return $arr_info[0];
    }
  }

  public static function pegaHtmlCadastro($_ID=""){
    if( is_numeric($_ID) ){
      $arr_info = nix_representante_br::pegaInfoCad($_ID);

      $rb_id              = utf8_decode($arr_info["rb_id"]);
      $rb_nome            = utf8_decode($arr_info["rb_nome"]);
      $rb_telefone1       = utf8_decode($arr_info["rb_telefone1"]);
      $rb_telefone2       = utf8_decode($arr_info["rb_telefone2"]);
      $rb_telefone3       = utf8_decode($arr_info["rb_telefone3"]);
      $rb_email           = utf8_decode($arr_info["rb_email"]);
      $rb_contato         = utf8_decode($arr_info["rb_contato"]);
      $rb_area_de_atuacao = utf8_decode($arr_info["rb_area_de_atuacao"]);
      $rb_area_atua       = utf8_decode($arr_info["rb_area_atua"]);
      $rb_estado          = utf8_decode($arr_info["rb_estado"]);
    }
    else{
      $rb_id = "";
      $rb_nome = "";
      $rb_telefone1 = "";
      $rb_telefone2 = "";
      $rb_telefone3 = "";
      $rb_email = "";
      $rb_contato = "";
      $rb_area_de_atuacao = "";
      $rb_area_atua = "";
      $rb_estado = "";
    }

    $html = "";
    $html .= "<table class='form-table'>";
    $html .= "  <tbody>";

    $html .= "    <tr>";
    $html .= "      <th><label for='rb_nome'>Nome</label></th>";
    $html .= "      <td><input maxlength='80' size='80%' name='rb_nome' id='rb_nome' class='' value='$rb_nome' required='' autofocus='' type='text' /></td>";
    $html .= "    </tr>";

    $html .= "    <tr>";
    $html .= "      <th><label for=''>Telefones</label></th>";
    $html .= "      <td>
                      #1 <input maxlength='50' size='30' name='rb_telefone1' id='rb_telefone1' class='' value='$rb_telefone1' required='' autofocus='' type='text' />
                      <br />
                      #2 <input maxlength='50' size='30' name='rb_telefone2' id='rb_telefone2' class='' value='$rb_telefone2' required='' autofocus='' type='text' />
                      <br />
                      #3 <input maxlength='50' size='30' name='rb_telefone3' id='rb_telefone3' class='' value='$rb_telefone3' required='' autofocus='' type='text' />
                    </td>";
    $html .= "    </tr>";

    $html .= "    <tr>";
    $html .= "      <th><label for='rb_email'>Email</label></th>";
    $html .= "      <td><input maxlength='100' size='90' name='rb_email' id='rb_email' class='' value='$rb_email' required='' autofocus='' type='text' /></td>";
    $html .= "    </tr>";

    $html .= "    <tr>";
    $html .= "      <th><label for='rb_contato'>Contato</label></th>";
    $html .= "      <td><input maxlength='80' size='70' name='rb_contato' id='rb_contato' class='' value='$rb_contato' required='' autofocus='' type='text' /></td>";
    $html .= "    </tr>";

    $html .= "    <tr>";
    $html .= "      <th><label for='rb_contato'>&Aacute;rea de Atua&ccedil;&atilde;o Descri&ccedil;&atilde;o</label></th>";
    $html .= "      <td><textarea style='width: 68%;' name='rb_area_de_atuacao' id='rb_area_de_atuacao'>$rb_area_de_atuacao</textarea></td>";
    $html .= "    </tr>";



    $arr_rb_area_atua = array('Food-Service', 'Balanceiros', 'Varejo', 'Automação Comercial', 'Indústria', 'Atacado', 'Farma', 'Médico-Hospitalar', 'Fitness', 'Bem Estar', 'Pet/Veterinário');
    $arr_rb_area_atua = array_map("utf8_decode", $arr_rb_area_atua);
    $html_rb_area_atua = "<select name='rb_area_atua' id='rb_area_atua'>";
    $html_rb_area_atua .= "  <option value=''>--Escolha</option>";
    foreach($arr_rb_area_atua as $key => $value){
      $sel = ($value == $rb_area_atua) ? " selected ": "";
      $html_rb_area_atua .= "<option $sel value='$value'>$value</option>";
    }
    $html_rb_area_atua .= "</select>";

    $html .= "    <tr>";
    $html .= "      <th><label for='rb_area_atua'>&Aacute;rea de Atua&ccedil;&atilde;o 2</label></th>";
    $html .= "      <td>
                      $html_rb_area_atua
                    </td>";
    $html .= "    </tr>";

    $arr_rb_estado = array('Acre', 'Alagoas', 'Amapá', 'Amazonas', 'Bahia', 'Ceará', 'Distrito Federal', 'Espírito Santo', 'Goiás', 'Maranhão', 'Mato Grosso', 'Mato Grosso do Sul', 'Minas Gerais', 'Pará', 'Paraíba', 'Paraná', 'Pernambuco', 'Piauí', 'Rio de Janeiro', 'Rio Grande do Norte', 'Rio Grande do Sul', 'Rondônia', 'Roraima', 'Santa Catarina', 'São Paulo', 'Sergipe', 'Tocantins');
    $arr_rb_estado = array_map("utf8_decode", $arr_rb_estado);
                $html_rb_estado = "<select name='rb_estado' id='rb_estado'>";
    $html_rb_estado .= "  <option value=''>--Escolha</option>";
    foreach($arr_rb_estado as $key => $value){
      $sel = ($value == $rb_estado) ? " selected ": "";
      $html_rb_estado .= "<option $sel value='$value'>$value</option>";
    }
    $html_rb_estado .= "</select>";

    $html .= "    <tr>";
    $html .= "      <th><label for='rb_estado'>Estado</label></th>";
    $html .= "      <td>
                      $html_rb_estado
                    </td>";
    $html .= "    </tr>";

    $html .= "  </tbody>";
    $html .= "</table>";

    $nome_tabela = nix_representante_br::$nome_tabela;
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

    if( strlen($arr_dados["rb_nome"]) < 5 ){
      $alertas .= "- Nome\n";
    }
    if( strlen($arr_dados["rb_telefone1"]) < 5 ){
      $alertas .= "- Telefone 1\n";
    }
    if( !filter_var($arr_dados["rb_email"], FILTER_VALIDATE_EMAIL) ){
      $alertas .= "- Email\n";
    }
    if( strlen($arr_dados["rb_contato"]) < 5 ){
      $alertas .= "- Contato\n";
    }
    if( strlen($arr_dados["rb_area_atua"]) < 3 ){
      $alertas .= "- &Aacute;rea Atua&ccedil;&atilde;o\n";
    }
    if( strlen($arr_dados["rb_estado"]) < 3 ){
      $alertas .= "- Estado\n";
    }

    if($alertas != ""){
      $resp["alerta"] = "Preencha corretamente as seguintes informações:\n\n" . $alertas;
      return $resp;
      exit;
    }
    // ==========

    // ok, grava
    global $wpdb;
    $v_nome_tabela = nix_representante_br::$nome_tabela;
    $arr_dados = array_map("utf8_decode", $arr_dados);
    if(is_numeric($arr_dados["id"])){
      $sql = "UPDATE $v_nome_tabela SET rb_nome = '".esc_sql(utf8_encode($arr_dados["rb_nome"]))."',
                                        rb_telefone1 = '".esc_sql(utf8_encode($arr_dados["rb_telefone1"]))."',
                                        rb_telefone2 = '".esc_sql(utf8_encode($arr_dados["rb_telefone2"]))."',
                                        rb_telefone3 = '".esc_sql(utf8_encode($arr_dados["rb_telefone3"]))."',
                                        rb_email = '".esc_sql(utf8_encode($arr_dados["rb_email"]))."',
                                        rb_contato = '".esc_sql(utf8_encode($arr_dados["rb_contato"]))."',
                                        rb_area_de_atuacao = '".esc_sql(utf8_encode($arr_dados["rb_area_de_atuacao"]))."',
                                        rb_area_atua = '".esc_sql(utf8_encode($arr_dados["rb_area_atua"]))."',
                                        rb_estado = '".esc_sql(utf8_encode($arr_dados["rb_estado"]))."'
              WHERE rb_id = " . $arr_dados["id"];
    }
    else{
      $sql = "INSERT INTO $v_nome_tabela(rb_nome, rb_telefone1, rb_telefone2, rb_telefone3, rb_email, rb_contato, rb_area_de_atuacao, rb_area_atua, rb_estado) VALUES ('".esc_sql(utf8_encode($arr_dados["rb_nome"]))."', '".esc_sql(utf8_encode($arr_dados["rb_telefone1"]))."', '".esc_sql(utf8_encode($arr_dados["rb_telefone2"]))."', '".esc_sql(utf8_encode($arr_dados["rb_telefone3"]))."', '".esc_sql(utf8_encode($arr_dados["rb_email"]))."', '".esc_sql(utf8_encode($arr_dados["rb_contato"]))."', '".esc_sql(utf8_encode($arr_dados["rb_area_de_atuacao"]))."', '".esc_sql(utf8_encode($arr_dados["rb_area_atua"]))."', '".esc_sql(utf8_encode($arr_dados["rb_estado"]))."')";
    }

    $wpdb->query( $sql );

    if ($wpdb->last_error !== '') {
      $resp["alerta"] = "Erro ao salvar.\n\n" . $wpdb->last_error;
      return $resp;
      exit;
    }
    else{
      $resp["objeto"] = "#" . nix_representante_br::$nome_id_dv;
      $resp["conteudo"] = nix_representante_br::pegaHtmlTable($arr_dados["atrib_pagina"], false, false);

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

    global $wpdb;
    $v_nome_tabela = nix_representante_br::$nome_tabela;
    $sql = "DELETE FROM $v_nome_tabela WHERE rb_id = $id";
    $wpdb->query( $sql );

    if ($wpdb->last_error !== '') {
      $resp["alerta"] = "Erro ao deletar.\n\n" . $wpdb->last_error;
      return $resp;
      exit;
    }
    else{
      $resp["objeto"] = "#" . nix_representante_br::$nome_id_dv;
      $resp["conteudo"] = nix_representante_br::pegaHtmlTable($atrib_pagina);

      return $resp;
      exit;
    }
  }

  public static function pegaHtmlTable($atrib_pagina, $decode=false, $encode=false){
    global $wpdb;
    $nome_tabela = nix_representante_br::$nome_tabela;

    $html = "<div id='dv_$nome_tabela'>";
    $html .= "<input name='btn_novo_$nome_tabela' class='button button-primary button-large' id='btn_novo_$nome_tabela' value='INCLUIR' type='button' onClick='processa_ajax(\"atrib_pagina=$atrib_pagina&acao=novo\")' />";
    $html .= "<div style='margin-bottom:40px;'></div>";

    $sql = "SELECT rb_id
                    ,rb_nome
                    ,rb_telefone1
                    ,rb_contato
                    ,rb_area_atua
                    ,rb_estado
            FROM $nome_tabela
            ORDER BY rb_nome";
    $myrows = $wpdb->get_results( $sql );

    if (!isset($myrows) || count($myrows) <= 0) {
      $html .= "<p>Nenhum registro cadastrado ...</p>";
    }
    else{
      $html .= "<table id='example' class='display compact data_tables' cellspacing='0' width='100%'>
                  <thead>
                    <tr>
                      <th align='left'>ID</th>
                      <th align='left'>Nome</th>
                      <th align='left'>Telefone</th>
                      <th align='left'>Contato</th>
                      <th align='left'>&Aacute;rea Atua&ccedil;&atilde;o</th>
                      <th align='left'>Estado</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th align='left'>ID</th>
                      <th align='left'>Nome</th>
                      <th align='left'>Telefone</th>
                      <th align='left'>Contato</th>
                      <th align='left'>&Aacute;rea Atua&ccedil;&atilde;o</th>
                      <th align='left'>Estado</th>
                      <th>&nbsp;</th>
                    </tr>
                  </tfoot>
                  <tbody>";

    foreach($myrows as $oRow) {
        $row = (array) $oRow;
        $_ID = $row["rb_id"];
        $_NOME = $row["rb_nome"];
        $_TELEFONE = $row["rb_telefone1"];
        $_CONTATO = $row["rb_contato"];
        $_AREA_ATUA = $row["rb_area_atua"];
        $_ESTADO = $row["rb_estado"];

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
                      <td>$_TELEFONE</td>
                      <td>$_CONTATO</td>
                      <td>$_AREA_ATUA</td>
                      <td>$_ESTADO</td>
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
  $resp["conteudo"] = utf8_encode(nix_representante_br::pegaHtmlCadastro($V_ID));
  $resp["objeto"] = "#" . nix_representante_br::$nome_id_dv;
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
  $arr_valores["rb_nome"] = $rb_nome;
  $arr_valores["rb_telefone1"] = $rb_telefone1;
  $arr_valores["rb_telefone2"] = $rb_telefone2;
  $arr_valores["rb_telefone3"] = $rb_telefone3;
  $arr_valores["rb_email"] = $rb_email;
  $arr_valores["rb_contato"] = $rb_contato;
  $arr_valores["rb_area_de_atuacao"] = $rb_area_de_atuacao;
  $arr_valores["rb_area_atua"] = $rb_area_atua;
  $arr_valores["rb_estado"] = $rb_estado;

  $resp = nix_representante_br::salvaDados($arr_valores);
  echo json_encode($resp);
}
else if( isset($acao) && $acao == "deletar" ){
  // respostas
  $resp = array();
  $resp["alerta"] = "";
  $resp["conteudo"] = "";
  $resp["objeto"] = "";
  // =========

  $resp = nix_representante_br::deleta($id, $atrib_pagina);
  echo json_encode($resp);
}
else{
  nix_representante_br::checaCreateTable();
  $_HTML = nix_representante_br::pegaHtmlTable($atrib_pagina, false, false);
  $nome_tabela = nix_representante_br::$nome_tabela;

  $janAtab = new janelaWp("Cadastro - Representante BR");
  $janAtab->setConteudo("$_HTML");
  $html = $janAtab->getHtml();

  $arr_resp["esconde_editor"] = true;
  $arr_resp["conteudo"] = $html;
  echo json_encode($arr_resp);
}
?>
