<?php
function fncGetAreaRestrUsers(){
	$arrUsers = array();
	
	$usersEmail = simple_fields_values("page_area_restrita_usuarios_1_email");
	$usersPass = simple_fields_values("page_area_restrita_usuarios_1_senha");
	
	for($i=0; $i < count($usersEmail); $i++){
		$email = $usersEmail[$i];
		$pass = $usersPass[$i];
		
		$arrUsers[$email] = $pass;
	}
	
	return $arrUsers;
}

$mostra_downloads = false;
$nome_usuario = "";
$msg = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if(isset($_POST["action"]) && $_POST["action"] == "login"){
		$arrUsuariosLiberados = fncGetAreaRestrUsers();
		
		$loginEmail = $_POST["login-email"];
		$loginSenha = $_POST["login-senha"];
		
		$temEmail = array_key_exists($loginEmail, $arrUsuariosLiberados);
		if(!$temEmail){
			$msg = "Email ou Senha inválidos!";
			echo "<div data-scroll='#formulario-suporte-atab' id='dv-alert-jquery'>$msg</div>";
		}
		else{
			$senhaCorreta = ($loginSenha == $arrUsuariosLiberados[$loginEmail]);
			
			if(!$senhaCorreta){
				$msg = "Email ou Senha inválidos!";
				echo "<div data-scroll='#formulario-suporte-atab' id='dv-alert-jquery'>$msg</div>";
			}
			else{
				$mostra_downloads = true;
				$nome_usuario = $loginEmail;
			}
		}
	}
}



/*$nome = "";
$email = "";
$senha = "";
$senha_rep = "";
$mostra_downloads = false;
$nome_usuario = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if(isset($_POST["action"]) && $_POST["action"] == "send"){
		$nome = $_POST["cad-download-nome"];
		$email = $_POST["cad-download-email"];
		$senha = $_POST["cad-download-senha"];
		$senha_rep = $_POST["cad-download-senha-rep"];
		
		$msg_validacao = "";
		$js_line_break = "\n";
		
		if(strlen($nome) < 3){
			$msg_validacao .= " * Nome;$js_line_break";
			$nome = "";
		}
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$msg_validacao .= " * Email;$js_line_break";
			$email = "";
		}
		if( username_exists( $email ) > 0 ) {
			$msg_validacao .= " * Email já cadastrado;$js_line_break";
			$email = "";
		}
		if(strlen($senha) < 6){
			$msg_validacao .= " * Senha (pelo menos 6 caracteres);$js_line_break";
		}
		if($senha != $senha_rep){
			$msg_validacao .= " * Senhas não conferem;$js_line_break";
		}
		
		if($msg_validacao != ""){
			$senha = "";
			$senha_rep = "";
			
			$msg_validacao = "Antes de prosseguir com o formulário, preencha as seguintes informações:$js_line_break$js_line_break" . $msg_validacao;
			echo "<div data-scroll='#formulario-cad-download' id='dv-alert-jquery'>$msg_validacao</div>";
		}
		else{
			// cria o user
			$user_id = wp_create_user ( $email, $senha_rep, $email );
			// ===========
			
			if(is_a($user_id, "WP_Error")){
				$erro_msg = $user_id->get_error_message();
				
				$msg = "Erro ao criar usuário! Tente novamente mais tarde!".$js_line_break."[$erro_msg]";
				echo "<div data-scroll='#formulario-cad-download' id='dv-alert-jquery'>$msg</div>";
			}
			else{
				// atualiza algumas info
				wp_update_user(
					array(
						'ID'       => $user_id,
						'nickname' => $nome,
						'user_nicename ' => $nome,
						'display_name  ' => $nome,
					)
				);
				// =====================
				
				$user = new WP_User( $user_id );
				$user->set_role( 'subscriber' );
				
				// envia o email
				$body = "";
				$body .= "<strong>Nome</strong>: $nome<br />";
				$body .= "<strong>Email:</strong>: $email<br />";
				$body .= "<strong>Senha</strong>: $senha_rep<br />";
				
				# include("functions.php");
				$to_addr = $email;
				$subject = "Usuário Download - BALMAK";
				$ret = send_mail($to_addr, $subject, $body);
				// =============
				
				// limpa as variaveis
				$nome = "";
				$email = "";
				$senha = "";
				$senha_rep = "";
				// ==================
				
				$msg = ($ret) ? "Usuário registrado com sucesso!": "Erro ao registrar usuário. Tente novamente em breve!";
				echo "<div data-scroll='#formulario-suporte-atab' id='dv-alert-jquery'>$msg</div>";
			}
		}
	}
	else if(isset($_POST["action"]) && $_POST["action"] == "esqueci-senha"){
		$email = $_POST["mail"];
		$user_id = username_exists( $email );
		
		if( !$user_id > 0 ) {
			$msg = "Não foi possível resetar a senha. Motivo: email não cadastrado.";
			echo "<div data-scroll='#formulario-suporte-atab' id='dv-alert-jquery'>$msg</div>";
		}
		else{
			// gera uma nova senha
			$novo_pass = randomPassword();
			wp_set_password( $novo_pass, $user_id );
			// ===================
			
			// envia o email
			$body = "";
			$body .= "<p>Aqui está a sua nova senha que foir gerado pelo nosso sistema para você acessar a área de downloads.</p><br />";
			$body .= "<strong>Email:</strong>: $email<br />";
			$body .= "<strong>NOVA SENHA</strong>: $novo_pass<br />";
			
			# include("functions.php");
			$to_addr = $email;
			$subject = "Esqueci minha Senha - BALMAK";
			$ret = send_mail($to_addr, $subject, $body);
			// =============
			
			$msg = "Senha resetada com sucesso. Você receberá um email em breve com as instruções a seguir.";
			echo "<div data-scroll='#formulario-suporte-atab' id='dv-alert-jquery'>$msg</div>";
		}
	}
	else if(isset($_POST["action"]) && $_POST["action"] == "login"){
		$email = $_POST["login-email"];
		$senha = $_POST["login-senha"];
		
		$user = get_user_by( 'login', $email );
		if ( $user && wp_check_password( $senha, $user->data->user_pass, $user->ID) ){
			$mostra_downloads = true;
			$nome_usuario = $user->display_name;
		}
		else{
			$msg = "Email ou Senha inválidos!";
			echo "<div data-scroll='#formulario-suporte-atab' id='dv-alert-jquery'>$msg</div>";
		}
	}
}
*/

/* Template Name: Balmak - Area Restrita */
get_header();
?>

<div class="chamada-topo balmak-border-bottom-red" data-img="<?php echo esc_url( get_template_directory_uri() ); ?>/images/chamada-suporte-procedimentos.jpg">
	<div class="chamada-topo-txt"><span>Área Restrita ao ATAB</span></div>
</div>

<?php
if( $mostra_downloads ){
	?>
  
  <div class="content">
    <div class="main-width">
    	<p class="mb30">Bem Vindo <i><?php echo $nome_usuario; ?></i> - <a href="<?php echo esc_url( home_url( '/' ) ); ?>suporte/area-restrita/">Sair</a></p>
    	
    	<?php			
			$downloads_titulo = simple_fields_values("page_cliente_downloads_1_titulo");
			$downloads_url_arquivo = simple_fields_values("page_cliente_downloads_1_url_arquivo");
			$downloads_agrupamento = simple_fields_values("page_cliente_downloads_1_agrupamento");

			$arr_download_loop = array();
			for($ii=0; $ii<count($downloads_titulo);$ii++){
				$vTitulo = $downloads_titulo[$ii];
				$vUrlArquivo = $downloads_url_arquivo[$ii];
				$vAgrupamento = $downloads_agrupamento[$ii];

				if(!array_key_exists($vAgrupamento, $arr_download_loop)){
					$arr_download_loop[$vAgrupamento] = array();
				}

				$arr_download_loop[$vAgrupamento][] = array(
					"titulo" => $vTitulo,
					"url_arquivo" => $vUrlArquivo,
				);
			}

			ksort($arr_download_loop);
			foreach ($arr_download_loop as $agrupamento => $itens) {
				echo "<h3 class='balmak-title'>$agrupamento</h3>";
				echo "<table id='tb-downloads' width='100%'>";
				echo "  <tr class='title'>";
				echo "    <td>Arquivo</td>";
				echo "    <td align='right' width='20%'>Download</td>";
				echo "  </tr>";

				foreach ($itens as $item) {
					$titulo = $item["titulo"];
					$arquivo = $item["url_arquivo"];

					echo "  <tr class='itens'>";
					echo "    <td>$titulo</td>";
					echo "    <td align='right' width='20%'><a href='$arquivo'><img style='width:26px; height: 26px; float:right;' src='" . esc_url( get_template_directory_uri() ) ."/images/download.png'></a></td>";
					echo "  </tr>";
				}

				echo "</table><br /><br />";
			}
			
			
			/*
			$css_dv = "mt30";
			foreach($arr_download_loop as $key => $arr_download){
				echo "<div class='section group'>";
				$css_dv = "";
				
				foreach($arr_download as $kkey => $download){
					echo "<div class='col span_1_of_4 images-div-center'>
									<div class='download-item txt-align-center'>
										<div class='title'>".$download["titulo"]."</div>
										<img width='128' class='images-div-center' src='".esc_url( get_template_directory_uri() )."/images/files.ico' />
										<br />
										<a target='_blank' href='".$download["url_arquivo"]."' class='btn-enviar-vermelho lnk-baixar'>BAIXAR</a>
									</div>
								</div>";
				}
				
				echo "</div>
							<br /><br />";
			}
			*/
			?>
    </div>
  </div>
  <?php
}
else{
	?>
	
	<div class="content">
    <div class="main-width">
      <div class="section group">
        <div class="col span_2_of_4 images-div-center">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-clientes-download-1.jpg" />
        </div>
        <div class="col span_2_of_4">
          <p class="balmak-title">Login</p>
          <form name="login-downloads" method="post" action="">
            <table width="100%">
              <tr>
                <td width="14%">Email: </td>
                <td>
                  <input type="text" name="login-email" id="login-email" placeholder="Email" />
                </td>
              </tr>
              <tr>
                <td width="14%">Senha: </td>
                <td>
                  <input type="password" name="login-senha" placeholder="Senha" />
                </td>
              </tr>
              <tr>
                <td colspan="2" align="center">
                  <!--<a id="lnk-esqueci-senha-download" class="mr30" href="javascript:;"><small>Esqueci minha senha</small></a>-->
                  <input type="button" value=" Acessar " class="btn-enviar-vermelho" onclick="this.form.submit();" />
                </td>
              </tr>
            </table>
            <input type="hidden" name="action" value="login" />
          </form>
          
          <form id="frm-esqueci-senha" action="" method="post">
            <input type="hidden" name="action" value="esqueci-senha" />
            <input type="hidden" name="mail" id="reset-mail" value="" />
          </form>
        </div>
      </div>
    </div>
  </div>
	<?php
}

get_footer();
?>