<div id="dv-receba-noticias" class="mfp-hide white-popup-block">
	<h2 class="mb20">Cadastre-se e Receba Notícias</h2>

  <style>
	  table#tbl-receba-noticias tr td{
			padding-bottom:8px;
		}
	</style>

	<!--
	<form target="_blank" method="post" action="http://www.enviaemail.com/email/form.php?form=3" id="formCadastro" onsubmit="return CheckForm3(this);">
  	<input type="hidden" name="action" value="receber-noticias" />
		<input name="format" value="h" type="hidden">

    <table cellspacing="3" id="tbl-receba-noticias" width="100%">
      <tr>
        <td width="20%">Seu Nome:</td>
        <td><input style="display:inherit; width:95%;" class="inpt-search-home-topo" type="text" name="CustomFields[4]" id="CustomFields_4_3" value="" /></td>
      </tr>

      <tr>
        <td width="20%">Seu Email:</td>
        <td><input style="display:inherit; width:95%;" class="inpt-search-home-topo" type="text" id="email" name="email" value="" /></td>
      </tr>

      <tr>
        <td colspan="2" align="right">
        	<input style="margin-right: 24px; background-color:#c4161c; color:#FFFFFF;" value=" CADASTRAR " class="btn-enviar-branco" onclick="this.form.submit();" type="button">
        </td>
      </tr>
    </table>
  </form>
	-->

	<!--
  <form id="frm-receba-noticias" name="frm-receba-noticias" method="post" action="">
  	<input type="hidden" name="action" value="receber-noticias" />

    <table cellspacing="3" id="tbl-receba-noticias" width="100%">
      <tr>
        <td width="20%">Seu Nome:</td>
        <td><input style="display:inherit; width:95%;" class="inpt-search-home-topo" type="text" id="frn_seu_nome" name="seu_nome" value="" /></td>
      </tr>

      <tr>
        <td width="20%">Seu Email:</td>
        <td><input style="display:inherit; width:95%;" class="inpt-search-home-topo" type="text" id="frn_email_para" name="email_para" value="" /></td>
      </tr>

      <tr>
        <td colspan="2" align="right">
        	<input style="margin-right: 24px; background-color:#c4161c; color:#FFFFFF;" value=" CADASTRAR " class="btn-enviar-branco" onclick="fncReceberNoticias();" type="button">
        </td>
      </tr>
    </table>
  </form>
  -->
  
  <?php
	if(isset($_GET["k"]) && is_numeric($_GET["k"])){
		$msg = "";
		
		switch($_GET["k"]){
			case 1:
				$msg = "Cadastro efetuado com sucesso!";
				break;
			case 2:
				$msg = "Erro ao finalizar cadastro. Tente novamente em breve.";
				break;
			case 3:
				$msg = "E-mail já cadastrado!";
				break;
		}
		
		if($msg != ""){
			?>
      
      <script>
			alert("<?php echo $msg; ?>");
			</script>
      
      <?php
		}
	}
	?>
  
  <form target="_blank" id="frm-receba-noticias" name="frm-receba-noticias" method="post" action="http://www.m4all.com.br/system/functions/m4allform.php">
  	<input type="hidden" name="uid" value="847cc55b7032108eee6dd897f3bca8a5">
		<input type="hidden" name="gid" value="14974204a325b2efc0c7ccad81770b26">
		<input type="hidden" name="url_ok"   value="http://balmak.com.br/?k=1">
		<input type="hidden" name="url_falha" value="http://balmak.com.br/?k=2">
		<input type="hidden" name="url_existente" value="http://balmak.com.br/?k=3">

    <table cellspacing="3" id="tbl-receba-noticias" width="100%">
      <tr>
        <td width="20%">Seu Nome:</td>
        <td><input style="display:inherit; width:95%;" class="inpt-search-home-topo" type="text" id="frn_seu_nome" name="nome" value="" /></td>
      </tr>

      <tr>
        <td width="20%">Seu Email:</td>
        <td><input style="display:inherit; width:95%;" class="inpt-search-home-topo" type="text" id="frn_email_para" name="email" value="" /></td>
      </tr>

      <tr>
        <td colspan="2" align="right">
        	<input style="margin-right: 24px; background-color:#c4161c; color:#FFFFFF;" value=" CADASTRAR " class="btn-enviar-branco" onclick="fncReceberNoticias();" type="button">
        </td>
      </tr>
    </table>
  </form>
</div>
