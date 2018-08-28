<?php
/* Template Name: Balmak - Produtos Link Home */
get_header();
?>

<?php
$url_banner_produto = simple_fields_value("page_produtos_3_url_banner");
$txt_banner_produto = simple_fields_value("page_produtos_3_texto_banner");

if($url_banner_produto == ""){
	$url_banner_produto = "http://balmak.com.br/wp-content/themes/balmak/images/chamada-institucional.jpg";
	$txt_banner_produto = get_the_title();
}
?>

<div class="chamada-topo balmak-border-bottom-red" data-img="<?php echo $url_banner_produto; ?>" style="background-image: url('<?php echo $url_banner_produto; ?>';);">
	<div class="chamada-topo-txt"><span><?php echo $txt_banner_produto; ?></span></div>
</div>

<?php
$arrTitulo = simple_fields_values("page_links_home_1_titulo");
$arrUrlImagem = simple_fields_values("page_links_home_1_url_imagem");
$arrUrlPagina = simple_fields_values("page_links_home_1_url_pagina");
$arrAgrupamento = simple_fields_values("page_links_home_1_agrupamento");
$arrSubAgrupamento = simple_fields_values("page_links_home_1_subagrupamento");

$arrProdutos = array();
for( $i=0; $i<count($arrTitulo); $i++){
	$vTitulo = $arrTitulo[$i];
	$vUrlImagem = $arrUrlImagem[$i];
	$vUrlPagina = $arrUrlPagina[$i];
	$vAgrupamento = $arrAgrupamento[$i];
	$vSubAgrupamento = $arrSubAgrupamento[$i];
	
	if( !array_key_exists($vAgrupamento, $arrProdutos) ){
		$arrProdutos[$vAgrupamento] = array();
	}
	
	if( !array_key_exists($vSubAgrupamento, $arrProdutos[$vAgrupamento]) ){
		$arrProdutos[$vAgrupamento][$vSubAgrupamento] = array();
	}
	
	$arrProdutos[$vAgrupamento][$vSubAgrupamento][] = array(
		"titulo"=>$vTitulo,
		"urlImagem"=>$vUrlImagem,
		"urlPagina"=>$vUrlPagina,
	);
}
?>

<div class="content">
  <div class="main-width">

		<?php
		foreach($arrProdutos as $agrupamento => $agrupamentoItens){
			echo "<div class='mb20'>";
			echo "  <p><strong>$agrupamento</strong></p>";
			
			foreach($agrupamentoItens as $subAgrupamento => $subAgrupamentoItens){
				if($subAgrupamento != ""){
					echo "<p class='ml10 mt20'><strong>- $subAgrupamento</strong></p>";
				}
				
				$i=1;
				foreach($subAgrupamentoItens as $produtos){
					$titulo = $produtos["titulo"];
					$urlImagem = $produtos["urlImagem"];
					$urlPagina = $produtos["urlPagina"];
					
					// se for primeiro item
					if($i==1){
						echo "<div class='section group'>";
					}
					// ====================
					
					// printa o item ======
					echo "<div id='linha1_col1' class='col span_1_of_4' style='text-align:center;'>";
					echo "  <a href='$urlPagina' target='_blank'><img class='aligncenter size-full wp-image-555' src='$urlImagem' alt='' width='160' height='160'></a>";
					echo "<p><strong>$titulo</strong></p>";
					echo "</div>";
					
					$i++;
					// ====================
					
					// se for o quarto item
					if($i > 4){
						echo "</div>";
						$i=1;
					}
					// ====================
				}
				
				// se acabou o loop ANTES de fechar a div, verifica aqui
				if($i != 1){
					echo "</div>";
				}
				// =====================================================
			}
			echo "</div>";
		}
		?>

  </div>
</div>

<?php
get_footer();
?>