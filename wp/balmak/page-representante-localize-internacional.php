<?php
/* Template Name: Balmak - Localize Internacional */
get_header();
?>

<div class="chamada-topo balmak-border-bottom-red" data-img="<?php echo esc_url( get_template_directory_uri() ); ?>/images/chamada-representante-internacional.jpg">
	<div class="chamada-topo-txt"><span>Exportação</span></div>
</div>
<div class="content">
  <div class="main-width">
    <p class="mt20 mb20 txt-align-center">
    	<img id="mapa-encontre-atab" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-representante-internacional-1.jpg" />
      <select id="slc-mapa-encontre-atab">
      	<option value="">-- Escolha</option>
      </select>
    </p>

		<?php
		$texto_inicial = simple_fields_value("page_representantes_internacionais_1_texto");
		?>

    <p class="mb30"><strong>EXPORTAÇÃO</strong></p>
    <p class="mb30"><?php echo $texto_inicial; ?></p>

		<?php
		$revendedor_nome = simple_fields_values("page_representantes_internacionais_1_nome");
		$revendedor_email = simple_fields_values("page_representantes_internacionais_1_email");
		$revendedor_telefone = simple_fields_values("page_representantes_internacionais_1_telefone");
		$revendedor_celular = simple_fields_values("page_representantes_internacionais_1_celular");
		$revendedor_obs = simple_fields_values("page_representantes_internacionais_1_observacao");

		$arr_info_intern = array();
		for($i=0; $i<count($revendedor_nome); $i++){
			$v_nome = (isset($revendedor_nome[$i])) ? $revendedor_nome[$i]: "";
			$v_email = (isset($revendedor_email[$i])) ? $revendedor_email[$i]: "";
			$v_telefone = (isset($revendedor_telefone[$i])) ? $revendedor_telefone[$i]: "";
			$v_celular = (isset($revendedor_celular[$i])) ? $revendedor_celular[$i]: "";
			$v_obs = (isset($revendedor_obs[$i])) ? $revendedor_obs[$i]: "";

			array_push($arr_info_intern, array(
				"nome"=>$v_nome,
				"email"=>$v_email,
				"telefone"=>$v_telefone,
				"celular"=>$v_celular,
				"obs"=>$v_obs,
			));
		}

		foreach($arr_info_intern as $key => $info_intern){
			$v_nome = (isset($info_intern["nome"])) ? $info_intern["nome"]: "";
			$v_email = (isset($info_intern["email"])) ? $info_intern["email"]: "";
			$v_telefone = (isset($info_intern["telefone"])) ? $info_intern["telefone"]: "";
			$v_celular = (isset($info_intern["celular"])) ? $info_intern["celular"]: "";
			$v_obs = (isset($info_intern["obs"])) ? $info_intern["obs"]: "";

			?>

			<p class="balmak-title-red"><?php echo $v_nome;?></p>
	    <p class="mb5">E-mail: <?php echo $v_email;?></p>
	    <p class="mb5">Phone: <?php echo $v_telefone;?></p>
	    <p class="mb5">Mobile: <?php echo $v_celular;?></p>
	    <p class="mb5"><?php echo $v_obs;?></p>
	    <br /><br />

			<?php
		}
		?>
</div>

<?php
get_footer();
?>
