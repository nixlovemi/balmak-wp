<!DOCTYPE html>
<html lang="pt-br">
	<head>
  	<?php
		session_start();
		
		// se o user quiser, mesmo mobile, forcar visualizar versao WEB
		if( isset($_GET["fvw"]) && $_GET["fvw"] != "" ){
			if($_GET["fvw"] == 0){
				$_SESSION["forcaVersaoWeb"] = false;
			} else if($_GET["fvw"] == 1) {
				$_SESSION["forcaVersaoWeb"] = true;
			}
		}
		// ============================================================
		?>
  
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <?php
		if( $_SESSION["forcaVersaoWeb"] == false ){
			?>
      <meta name="viewport" content="width=device-width,initial-scale=1" />
      <?php
		}
		?>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <title><?php bloginfo( 'blogname' ); ?><?php wp_title(' | '); ?></title>
    <link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/favicon.ico" type="image/x-icon">

    <link rel='stylesheet' href='<?php echo esc_url( get_template_directory_uri() ); ?>/reset.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery-ui-1.11.4/jquery-ui.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.powertip-1.2.0/css/jquery.powertip-light.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo esc_url( get_template_directory_uri() ); ?>/js/fresco-2.2.1-light/css/fresco/fresco.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo esc_url( get_template_directory_uri() ); ?>/js/magnific-popup/magnific-popup.css' type='text/css' media='all' />

    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.sldr-master/css/styles.css" rel="stylesheet">
    <style>
			div.skew{
				border-left: solid 8px #FFF;
				border-right: solid 8px #fff;
			}
			#powerTip {
				-webkit-box-shadow: none !important;
				-moz-box-shadow: none !important;
				box-shadow: none !important;
				border-radius: 0px !important;
			}
		</style>
    <!--[if lt IE 9]><link href="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.sldr-master/css/ie8.css" rel="stylesheet"><![endif]-->
    <!--[if lt IE 8]><link href="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.sldr-master/css/ie7.css" rel="stylesheet"><![endif]-->

    <link rel='stylesheet' href='<?php echo esc_url( get_template_directory_uri() ); ?>/master.css' type='text/css' media='all' />

    <script type='text/javascript' src='<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery-latest.js'></script>
    <script type='text/javascript' src='<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery-ui-1.11.4/jquery-ui.min.js'></script>
    <script type='text/javascript' src='<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.powertip-1.2.0/jquery.powertip.min.js'></script>
    <script type='text/javascript' src='<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.sldr-master/js/jquery.sldr.js'></script>
    <script type='text/javascript' src='<?php echo esc_url( get_template_directory_uri() ); ?>/js/fresco-2.2.1-light/js/fresco/fresco.js'></script>
    <script type='text/javascript' src='<?php echo esc_url( get_template_directory_uri() ); ?>/js/magnific-popup/jquery.magnific-popup.js'></script>
    <script type='text/javascript' src='<?php echo esc_url( get_template_directory_uri() ); ?>/master.js'></script>
    <?php wp_head(); ?>
  </head>
  <body>
  	<?php
		if( isset($_POST["action"]) && $_POST["action"] == "indicar-site" ){
			$seu_nome = $_POST["seu_nome"];
			$email = $_POST["email_para"];

			// envia o email
			$body = "";
			$body .= "<h2>Indicação de site</h2><br />";
			$body .= "Olá.<br />";
			$body .= "Seu amigo $seu_nome indicou o site da Balmak para você conhecer mais sobre a empresa.<br />";
			$body .= "Para acessar o site da Balmak basta <a href='http://www.balmak.com.br' target='_blank' data-saferedirecturl='https://www.google.com/url?hl=pt-BR&amp;q=http://www.balmak.com.br&amp;source=gmail&amp;ust=1485259498885000&amp;usg=AFQjCNEcKej0tcsaGlHRX9qUhPKT-lNURQ'>clicar aqui</a>.<br />";

			$to_addr = $email;
			$subject = "Indicação - Balmak";
			$ret = send_mail($to_addr, $subject, $body);
			$msg = ($ret) ? "Formulário enviado com sucesso!": "Erro ao enviar formulário. Tente novamente em breve!";
			?>

      <script>
				alert("<?php echo $msg; ?>");
			</script>

      <?php
			// =============
		} elseif ( isset($_POST["action"]) && $_POST["action"] == "receber-noticias" ) {
			$seu_nome = $_POST["seu_nome"];
			$email = $_POST["email_para"];

			// envia o email
			$body = "";
			$body .= "<h2>Receber Notícias</h2><br />";
			$body .= "<strong>Nome:</strong> $seu_nome<br />";
			$body .= "<strong>Email:</strong> $email<br />";

			$to_addr = "dpv@balmak.com.br";
			$subject = "Receber Notícias - Balmak";
			$ret = send_mail($to_addr, $subject, $body);
			$msg = ($ret) ? "Formulário enviado com sucesso!": "Erro ao enviar formulário. Tente novamente em breve!";
			?>

      <script>
				alert("<?php echo $msg; ?>");
			</script>

      <?php
		}
		?>

  	<div id="fb-root"></div>
		<script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.7&appId=127005697408649";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <script>window.twttr = (function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0],
				t = window.twttr || {};
			if (d.getElementById(id)) return t;
			js = d.createElement(s);
			js.id = id;
			js.src = "https://platform.twitter.com/widgets.js";
			fjs.parentNode.insertBefore(js, fjs);

			t._e = [];
			t.ready = function(f) {
				t._e.push(f);
			};

			return t;
		}(document, "script", "twitter-wjs"));</script>

  	<div id="topo" class="balmak-border-bottom-red">
    	<div class="main-width">
      	<div class="section group">
  				<div id="logo-holder" class="col span_1_of_4 mt0 mb0">
          	<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            	<img alt="Balmak Logo" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.png" style="max-width: 176px;" />
            </a>
          </div>

          <div id="menus-holder" class="col span_3_of_4 mt0 mb0 ml0">
          	<?php homeMainMenu(); ?>
          </div>
          <div id="menus-hidden">
          	<div id="mh-holder">
              <a id="mh-opener" href="javascript:;">MENU - NAVEGAR <span class="arrow-down arrow-mh-menu"></span></a>
              <ul id="mh-menu">
              	<li><a href="<?php echo esc_url( home_url( '/' ) . 'institucional' ); ?>">Institucional</a></li>
								<?php
								$subMenuInst = getSubMenuHidden("Sub_Institucional");
								if($subMenuInst !== false){
									echo $subMenuInst;
								}
								?>

                <li><a href="<?php echo esc_url( home_url( '/' ) . 'produtos' ); ?>">Produtos</a></li>
								<?php
								$subMenuProdutos = getSubMenuHidden("Sub_Produtos");
								if($subMenuProdutos !== false){
									echo $subMenuProdutos;
								}
								?>

                <li>Suporte</li>
								<?php
								$subMenuSuporte = getSubMenuHidden("Sub_Suporte");
								if($subMenuSuporte !== false){
									echo $subMenuSuporte;
								}
								?>

                <li>Sala de Imprensa</li>
								<?php
								$subMenuSalaImprensa = getSubMenuHidden("Sub_SalaImprensa");
								if($subMenuSalaImprensa !== false){
									echo $subMenuSalaImprensa;
								}
								?>

                <li>Representantes</li>
								<?php
								$subMenuRepresent = getSubMenuHidden("Sub_Representantes");
								if($subMenuRepresent !== false){
									echo $subMenuRepresent;
								}
								?>

                <li><a href="<?php echo esc_url( home_url( '/' ) . 'fale-conosco/' ); ?>">Fale Conosco</a></li>
								<?php
								$subMenuFaleC = getSubMenuHidden("Sub_FaleConosco");
								if($subMenuFaleC !== false){
									echo $subMenuFaleC;
								}
								?>

                <li>Ao Cliente</li>
								<?php
								$subMenuAoCliente = getSubMenuHidden("Sub_AoCliente");
								if($subMenuAoCliente !== false){
									echo $subMenuAoCliente;
								}
								?>

                <li><a href="<?php echo esc_url( home_url( '/' ) . 'onde-comprar/revendedor/' ); ?>">Onde Comprar</a></li>
								<?php
								$subMenuOndeComprar = getSubMenuHidden("Sub_OndeComprar");
								if($subMenuOndeComprar !== false){
									echo $subMenuOndeComprar;
								}
								?>

                <li class="txt-align-center">
                	<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                		<input style="width:100%;" class="inpt-search-home-topo" type="text" placeholder="Pesquisar" name="s" />
                 </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
