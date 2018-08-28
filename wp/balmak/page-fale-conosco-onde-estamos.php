<?php
/* Template Name: Balmak - Onde Estamos */
get_header();
?>

<div class="chamada-topo balmak-border-bottom-red" data-img="<?php echo esc_url( get_template_directory_uri() ); ?>/images/chamada-fale-conosco-onde-estamos.jpg">
	<div class="chamada-topo-txt"><span>Onde Estamos</span></div>
</div>
<div class="content">
  <div class="main-width">
		<?php
		$onde_estamos_imagem = simple_fields_values("page_onde_estamos_1_imagem");
		$onde_estamos_titulo = simple_fields_values("page_onde_estamos_1_titulo");
		$onde_estamos_nome = simple_fields_values("page_onde_estamos_1_nome");
		$onde_estamos_endereco = simple_fields_values("page_onde_estamos_1_endereco");
		$onde_estamos_bairro = simple_fields_values("page_onde_estamos_1_bairro");
		$onde_estamos_cidade = simple_fields_values("page_onde_estamos_1_cidade");
		$onde_estamos_cep = simple_fields_values("page_onde_estamos_1_cep");

		for($i=0; $i<count($onde_estamos_imagem); $i++){
			$v_imagem = (isset($onde_estamos_imagem[$i])) ? $onde_estamos_imagem[$i]: "";
			$v_titulo = (isset($onde_estamos_titulo[$i])) ? $onde_estamos_titulo[$i]: "";
			$v_nome = (isset($onde_estamos_nome[$i])) ? $onde_estamos_nome[$i]: "";
			$v_endereco = (isset($onde_estamos_endereco[$i])) ? $onde_estamos_endereco[$i]: "";
			$v_bairro = (isset($onde_estamos_bairro[$i])) ? $onde_estamos_bairro[$i]: "";
			$v_cidade = (isset($onde_estamos_cidade[$i])) ? $onde_estamos_cidade[$i]: "";
			$v_cep = (isset($onde_estamos_cep[$i])) ? $onde_estamos_cep[$i]: "";
			?>

			<div class="section group mb30">
	    	<div class="col span_2_of_4 images-div-center">
	      	<img src="<?php echo $v_imagem; ?>" />
	      </div>
	      <div class="col span_2_of_4 onde-estamos-endereco-topo">
	      	<p class="balmak-title-red"><?php echo $v_titulo; ?></p>
	        <p><strong><?php echo $v_nome; ?></strong></p>
	        <p><?php echo $v_endereco; ?></p>
	        <p><?php echo $v_bairro; ?></p>
	        <p><?php echo $v_cidade; ?></p>
	        <p>CEP. <?php echo $v_cep; ?></p>
	      </div>
	    </div>

			<?php
		}
		?>

		<!--
  	<div class="section group mb30">
    	<div class="col span_2_of_4 images-div-center">
      	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-fale-conosco-estamos-1.jpg" />
      </div>
      <div class="col span_2_of_4 onde-estamos-endereco-topo">
      	<p class="balmak-title-red">Matriz</p>
        <p><strong>Balmak Indústria e Comércio Ltda</strong></p>
        <p>Rua Antônio João Abdalla, 97 </p>
        <p>Cidade Industrial</p>
        <p>Santa Bárbara d’Oeste – SP</p>
        <p>CEP. 13456-168</p>
      </div>
    </div>
		-->

		<?php
		$onde_estamos_titulo = simple_fields_values("page_onde_estamos_2_titulo");
		$onde_estamos_conteudo = simple_fields_values("page_onde_estamos_2_conteudo");
		
		for($i=0; $i<count($onde_estamos_titulo); $i++){
			$v_titulo = (isset($onde_estamos_titulo[$i])) ? $onde_estamos_titulo[$i]: "";
			$v_conteudo = (isset($onde_estamos_conteudo[$i])) ? $onde_estamos_conteudo[$i]: "";
			
			/*
			<div class='box-onde-estamos mb40'>
				<p><strong>A BALMAK está onde o cliente precisa!</strong></p>
				<br />
				<p>A BALMAK é uma organização completa e com forte presença de mercado. Os produtos e serviços podem ser encontrados em todos os estados do Brasil e também no exterior, através dos mais de 4000 revendedores e distribuidores da marca. Além disso, a BALMAK dispõe de uma rede autorizada com mais de 400 assistentes técnicos autorizados (ATAB´s).</p>
			</div>
			*/
				
			echo "
				<div class='mb40'>
					<h3 class='balmak-title'>$v_titulo</h3>
					<p>$v_conteudo</p>
				</div>
			";
		}
		?>

		<?php
		$onde_estamos_texto = simple_fields_values("page_onde_estamos_3_texto");
		$onde_estamos_url = simple_fields_values("page_onde_estamos_3_url");
		
		if(count($onde_estamos_texto) > 0){
			echo "<div class='mt40'>";
			echo   "<table width='100%'>";
			
			for($i=0; $i<count($onde_estamos_texto); $i++){
				$v_texto = (isset($onde_estamos_texto[$i])) ? $onde_estamos_texto[$i]: "";
				$v_url = (isset($onde_estamos_url[$i])) ? $onde_estamos_url[$i]: "";
				
				echo   "<tr>
									<td>$v_texto</td>
									<td align='right'><input type='button' class='btn-enviar-vermelho mb10' value='CLIQUE AQUI' onClick=\"document.location.href = '$v_url';\" /></td>
							 </tr>";
			}
			
			echo   "</table>";
			echo "</div>";
		}
		
		/*
		<div class="mt40">
      <table width="100%">
        <tr>
          <td>Para saber mais sobre nossos produtos</td>
          <td align="right"><input type="button" class="btn-enviar-vermelho mb10" id="btn-nossos-produtos" value="CLIQUE AQUI" /></td>
        </tr>
        <tr>
          <td>Para encontrar o representante de vendas mais próximo</td>
          <td align="right"><input type="button" class="btn-enviar-vermelho mb10" id="btn-representante-proximo" value="CLIQUE AQUI" /></td>
        </tr>
        <tr>
          <td>Para encontrar o assistente técnico autorizado (ATAB) mais próximo</td>
          <td align="right"><input type="button" class="btn-enviar-vermelho mb10" id="btn-atab-proximo" value="CLIQUE AQUI" /></td>
        </tr>
      </table>
    </div>
		*/
		?>
    
  </div>
</div>

<?php
get_footer();
?>
