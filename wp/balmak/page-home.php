<?php
/* Template Name: Balmak - Home */
get_header();
include("include-slider.php");
?>

<?php
	$img_body_home_url = simple_fields_values("page_home_links_body_url_imagem");
	$img_body_home_link = simple_fields_values("page_home_links_body_link_imagem");
	$img_body_home_text = simple_fields_values("page_home_links_body_texto_imagem");
	
	$arr_imagens_body = array();
	$cnt_item = 0;
	$cnt_idx = 0;
	
	for($ii=0; $ii<count($img_body_home_url);$ii++){
		if( !array_key_exists($cnt_idx, $arr_imagens_body) ){
			$arr_imagens_body[$cnt_idx] = array();
		}
		
		$arr_item = array();
		$arr_item["url_imagem"] = $img_body_home_url[$ii];
		$arr_item["link_imagem"] = $img_body_home_link[$ii];
		$arr_item["texto_imagem"] = $img_body_home_text[$ii];
		
		$arr_imagens_body[$cnt_idx][] = $arr_item;
		
		$cnt_item++;
		if($cnt_item >= 4){
			$cnt_idx++;
			$cnt_item = 0;
		}
	}
?>

<div class="content">
  <div class="main-width">
    <?php
		for($ii=0; $ii<count($arr_imagens_body); $ii++){
			$arr_imagens = $arr_imagens_body[$ii];
			$cnt_itens = count($arr_imagens);
			
			switch($cnt_itens){
				case 1:
					$class_col = "span_5_of_5";
					$style_col = "text-align:center;";
					break;
				case 2:
					$class_col = "span_2_of_4";
					$style_col = "text-align:center;";
					break;
				case 3:
					$class_col = "span_1_of_3";
					$style_col = "text-align:center;";
					break;
				case 4:
					$class_col = "span_1_of_4";
					$style_col = "text-align:center;";
					break;
				case 5:
					$class_col = "span_1_of_5";
					$style_col = "";
					break;
			}
			
			echo "<div class='section group home-chamada-imagens'>";
			foreach($arr_imagens as $item){
				$v_url_img = $item["url_imagem"];
				$v_lnk_img = $item["link_imagem"];
				$v_txt_img = $item["texto_imagem"];
				
				echo "<div id='linha1_col1' class='col $class_col' style='$style_col'>
								<a href='$v_lnk_img'>
									<img class='img-home-chamada' width='240' src='$v_url_img' />
								</a>
								<center style='font-size:12px;'>$v_txt_img</center>
							</div>";
			}
			echo "</div>";
		}
		?>
  </div>
</div>

<?php
get_footer();
?>