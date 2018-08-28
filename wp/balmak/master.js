var objSlider;

// validacoes ================
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
// ===========================

$(document).ready(function(e) {
  $('.popup-modal-inline').magnificPopup({type:'inline'});
	
  $(document).on("click", "#btn-nossos-produtos", function(){
    document.location.href = '/produtos/';
  });

  $(document).on("click", "#btn-atab-proximo", function(){
    document.location.href = '/suporte/encontre-um-assistente-tecnico-autorizado/';
  });

  $(document).on("click", "#btn-sou-revendedor, #btn-representante-proximo", function(){
    document.location.href = '/representantes/localize-no-brasil/';
  });

  $(document).on("click", "#btn-nao-sou-revendedor", function(){
    document.location.href = '/fale-conosco/';
  });

	$(document).on("click", "a#mh-opener", function(){
		$('#mh-menu').toggle(700);

		var span_seta = $(this).find("span.arrow-mh-menu");
		if ( span_seta.hasClass("arrow-down") ) {
			span_seta.removeClass("arrow-down");
			span_seta.addClass("arrow-up");
			span_seta.css({'top':'-17px'});
		} else {
			span_seta.removeClass("arrow-up");
			span_seta.addClass("arrow-down");
			span_seta.css({'top':'17px'});
		}
	});

	$(document).on("click", "a#lnk-esqueci-senha-download", function(){
		var email = $('#login-email').val();

		var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
		if (email == '' || !re.test(email)){
			$('#login-email').focus();
			alert('Informe um email válido para resetar a senha.');
    	return false;
		}

		$('#reset-mail').val( email );
		$('form#frm-esqueci-senha').submit();
	});

	// check se tem div pra colocar BG
	if( $("div.chamada-topo").length > 0 ){
		var img_url = $("div.chamada-topo").data("img");
		$("div.chamada-topo").css("background-image", "url("+img_url+")");
	}
	// ===============================

	// checa alert msg
	if( $("div#dv-alert-jquery").length > 0 ){
		var msg = $("div#dv-alert-jquery").html();
		var scroll_to = $("div#dv-alert-jquery").data("scroll");

		alert(msg);
		$("div#dv-alert-jquery").remove();

		if(scroll_to != ""){
			scroll_to_element(scroll_to, 900);
		}
	}
	// ===============

	// submenus
	$('.sub-menu-tooltip').data('powertip', function() {
		var id_dv_html = $(this).data('dv-id');
		return $(id_dv_html).html();
	});
	$('.sub-menu-tooltip').powerTip({
			placement: 's',
			mouseOnToPopup: true
	});
	// ========

	// acerto tabela produto
	/*
	var dv_detalhe_produto = $('#div-content-produtos');
	if(dv_detalhe_produto.length > 0){
		dv_detalhe_produto.find("td").each(function() {
				// var id = $(this).attr("id");
				// compare id to what you want
				$(this).css({"vertical-align":"middle"});
		});
	}
	*/
	// =====================
});

function scroll_to_element(element_selector, time_ms){
	$('html, body').animate({
			scrollTop: $(element_selector).offset().top
	}, time_ms);
}

// funções do slider
function initSlider(){
	var ul = $("#slider-topo");
  var slide_count = ul.children().length;
  var slide_width_pc = 100.0 / slide_count;
  var slide_index = 0;

  ul.find("li").each(function(indx) {
    // var left_percent = (slide_width_pc * indx) + "%";
		var left_percent = (-17) + (indx * 21) + "%";

    $(this).css({
      "left": left_percent
    });

    $(this).css({
      width: (100 / slide_count) + "%"
    });
  });
}

function reOrderSlider(){
	var ul = $("#slider-topo");
	var li = ul.children('li');
	var arr_li_img = new Array();

	li.each(function(indx) {
		var img_src = $(this).find("img").attr("src");
		arr_li_img.push(img_src);
	});

	var new_ul_html = "";
	new_ul_html += "<ul id='slider-topo'>";

	for(i=1; i<arr_li_img.length; i++){
		new_ul_html += "<li><img src='"+arr_li_img[i]+"' /></li>";
	}
	new_ul_html += "  <li><img src='"+arr_li_img[0]+"' /></li>";
	new_ul_html += "</ul>";

	ul.animate({
    left: "-63%",
  }, 1800, function() {
    ul.remove();
		$("#slider-holder").append(new_ul_html);

		initSlider();
  });

	// ul.append(li).toggle("slide", {direction: "left"}, 105).toggle("slide", {direction: "right"}, 85).fadeIn();
	// ul.append(li).fadeOut(400).fadeIn(800);

}
// =================

$(function() {

  initSlider();
	setInterval(" reOrderSlider(); ", 8000);

  /*
	// Listen for click of prev button
  $(".btn-prev").click(function() {
    console.log("prev button clicked");
    slide(slide_index - 1);
  });

  // Listen for click of next button
  $(".btn-next").click(function() {
    console.log("next button clicked");
    slide(slide_index + 1);
  });

  function slide(new_slide_index) {
    if (new_slide_index < 0 || new_slide_index >= slide_count) return;

    var margin_left_pc = (new_slide_index * (-100)) + "%";

    ul.animate({
      "margin-left": margin_left_pc
    }, 400, function() {

      slide_index = new_slide_index

    });
  }
	*/

});

function fnc_frm_click_mapa(estado){
	$("#frm-click-mapa #estado_filtro").val(estado);
	$("#frm-click-mapa").submit();
}

function fncIndicarSite(){
	var seu_nome = $("#fis_seu_nome").val();
	var email = $("#fis_email_para").val();

	if(seu_nome.length < 3){
		alert("Informe o seu nome!");
		return;
	}

	if(!isEmail(email)){
		alert("Informe um email válido!!!");
		return;
	}

	$("#frm-indique-site").submit();
}

function fncReceberNoticias(){
	var seu_nome = $("#frn_seu_nome").val();
	var email = $("#frn_email_para").val();

	if(seu_nome.length < 3){
		alert("Informe o seu nome!");
		return;
	}

	if(!isEmail(email)){
		alert("Informe um email válido!!!");
		return;
	}

	$("#frm-receba-noticias").submit();
}

jQuery(document).ready(function($) {
  $('#bookmark-this').click(function(e) {
    var bookmarkURL = window.location.href;
    var bookmarkTitle = document.title;

    if ('addToHomescreen' in window && window.addToHomescreen.isCompatible) {
      // Mobile browsers
      addToHomescreen({ autostart: false, startDelay: 0 }).show(true);
    } else if (window.sidebar && window.sidebar.addPanel) {
      // Firefox version < 23
      window.sidebar.addPanel(bookmarkTitle, bookmarkURL, '');
    } else if ((window.sidebar && /Firefox/i.test(navigator.userAgent)) || (window.opera && window.print)) {
      // Firefox version >= 23 and Opera Hotlist
      $(this).attr({
        href: bookmarkURL,
        title: bookmarkTitle,
        rel: 'sidebar'
      }).off(e);
      return true;
    } else if (window.external && ('AddFavorite' in window.external)) {
      // IE Favorite
      window.external.AddFavorite(bookmarkURL, bookmarkTitle);
    } else {
      // Other browsers (mainly WebKit - Chrome/Safari)
      alert('Press ' + (/Mac/i.test(navigator.userAgent) ? 'Cmd' : 'Ctrl') + '+D to bookmark this page.');
    }

    return false;
  });
});
