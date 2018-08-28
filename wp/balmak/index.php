<?php include("header.php"); ?>

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
	$img_body_home_url = simple_fields_values("page_home_links_body_url_imagem");
	$img_body_home_link = simple_fields_values("page_home_links_body_link_imagem");
	$img_body_home_text = simple_fields_values("page_home_links_body_texto_imagem");

	$arr_imagens_body = array();

	for($ii=0; $ii<count($videos_titulo);$ii++){
		$arr_item = array();
		$arr_item["url_imagem"] = $img_body_home_url[$ii];
		$arr_item["link_imagem"] = $img_body_home_link[$ii];
		$arr_item["texto_imagem"] = $img_body_home_text[$ii];

		$arr_imagens_body[] = $arr_item;
	}
?>
<div class="content">
  <div class="main-width">

    <?php
		while (have_posts()) :
      the_post();
      the_content();
   	endwhile;
		?>

  </div>
</div>
<?php include("footer.php"); ?>
