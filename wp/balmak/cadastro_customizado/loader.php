<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function acertaPOST($arr_post){
  $arr_aux = array();

  foreach($arr_post as $key=>$value){
    if( is_array($value) ){
      $str_value = implode(',', $value);
    }
    else{
      $str_value = $value;
    }
    
    // $arr_aux[$key] = ($key != 'controller' && $key != 'action' ) ?  utf8_decode($str_value) : $str_value;
    $arr_aux[$key] = $str_value;
  }

  return $arr_aux;
}

$_REQUEST = acertaPOST($_REQUEST);
extract($_REQUEST);

$atrib_pagina = $atrib_pagina;
$nome_arquivo_custom = "includes/custom-$atrib_pagina";

// padroes
$arr_resp["esconde_editor"] = false;
$arr_resp["conteudo"] = "";
// =======

if( file_exists($nome_arquivo_custom) ){
  // inicializa a conn
  include("../../../../wp-load.php");
  // $dbc = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
  // $db = mysql_select_db(DB_NAME);
  // =================
  
  require_once("janela.class.php");
  include($nome_arquivo_custom);
}
else{
  echo json_encode($arr_resp);
}
?>
