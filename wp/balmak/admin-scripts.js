jQuery( document ).ready(function() {
  // console.log('verifica');
  // verifica se é página
  var eh_pagina = fnc_verif_eh_pagina();
  if(eh_pagina){
    // console.log('eh pagina');
    var atrib_pagina = jQuery("#poststuff #page_template").val();
    processa_cadastro_customizado(atrib_pagina);
  }
  // ====================
});

function fnc_verif_eh_pagina(){
  return jQuery("form#post #post_type").val() == "page";
}

function processa_cadastro_customizado(atrib_pagina){
  var url = document.location.href;
  var novo = "";
  if(url.indexOf("/novo", 0) > 0){
    novo = "/novo";
  }
  
  console.log('processa_cadastro_customizado>', novo, atrib_pagina);
  
  jQuery.ajax({
    type : "POST",
    url : novo + '/wp-content/themes/balmak/cadastro_customizado/loader.php',
    data : { 'atrib_pagina' : atrib_pagina },
    beforeSend : function(response) {
      // document.getElementById('gif_carregando_endereco_AP').style.visibility = 'visible';
    },
    error : function(a, b, c) {
      console.log('processa_cadastro_customizado erro>', a, b, c);
      // document.getElementById('gif_carregando_endereco_AP').style.visibility = 'hidden';
    },
    dataType: "json",
    success : function(response) {
      if(response.conteudo != ""){
        jQuery("#post-body-content").append(response.conteudo);
      }
      
      if(response.esconde_editor){
        jQuery("#postdivrich").hide();
      }
      
      setTimeout("obj_jquery()", 250);
    }
  });
}

function processa_ajax(variaveis){
  var url = document.location.href;
  var novo = "";
  if(url.indexOf("/novo", 0) > 0){
    novo = "/novo";
  }
  
  console.log('processa_ajax>', novo, variaveis);
  
  jQuery.ajax({
    type : "POST",
    url : novo + '/wp-content/themes/balmak/cadastro_customizado/loader.php',
    data : variaveis,
    beforeSend : function(response) {
      // document.getElementById('gif_carregando_endereco_AP').style.visibility = 'visible';
    },
    error : function(a, b, c) {
      console.log('processa_ajax erro>', a, b, c);
      // document.getElementById('gif_carregando_endereco_AP').style.visibility = 'hidden';
    },
    dataType: "json",
    success : function(response) {
      console.log('processa_ajax success');
      if(response.alerta != ""){
        alert(response.alerta);
      }
      else if(response.conteudo != "" && response.objeto){
        jQuery(response.objeto).html(response.conteudo);
      }
      
      setTimeout("obj_jquery()", 250);
    }
  });
}

function obj_jquery(){
  jQuery('.data_tables').DataTable();
}
