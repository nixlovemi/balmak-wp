<?php
// TESTAR O ESQUEMA RESPONSIVO DOS YOUTUBE EMBED!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

/* Template Name: Balmak - Vídeos */
get_header();
?>


<div class="chamada-topo balmak-border-bottom-red" data-img="<?php echo esc_url( get_template_directory_uri() ); ?>/images/chamada-clientes-videos.jpg">
	<div class="chamada-topo-txt"><span>V&iacute;deos</span></div>
</div>
<div class="content">
  <div class="main-width">
  	<?php


		$downloads_titulo = simple_fields_values("page_cliente_videos_1_titulo");
		$downloads_url_arquivo = simple_fields_values("page_cliente_videos_1_embed");
		$downloads_agrupamento = simple_fields_values("page_cliente_videos_1_agrupamento");

		$i=0;
		$arr_download_loop = array();

		for($ii=0; $ii<count($downloads_titulo);$ii++){
			$vTitulo = $downloads_titulo[$ii];
			$vUrlArquivo = $downloads_url_arquivo[$ii];
			$vAgrupamento = $downloads_agrupamento[$ii];

			if(!array_key_exists($vAgrupamento, $arr_download_loop)){
				$arr_download_loop[$vAgrupamento] = array();
			}

			$v_key = (count(array_keys($arr_download_loop[$vAgrupamento])) == 0) ? 0 : max(array_keys($arr_download_loop[$vAgrupamento]));

			if(!array_key_exists($v_key, $arr_download_loop[$vAgrupamento])){
				$arr_download_loop[$vAgrupamento][$v_key] = array();
			} else {
				$qtItens = count($arr_download_loop[$vAgrupamento][$v_key]);

				if($qtItens >= 2){
					$v_key++;
					$arr_download_loop[$vAgrupamento][$v_key] = array();
				}
			}

			array_push($arr_download_loop[$vAgrupamento][$v_key],
				array("titulo" => $vTitulo, "url_arquivo" => $vUrlArquivo)
			);
		}

		// fazer loop
		$css_dv = "mt30";
		foreach($arr_download_loop as $grupo => $arr_download){
			echo "<h3 class='balmak-title'>$grupo</h3>";

			foreach($arr_download as $keyy){
				echo "<div class='section group'>";

				foreach($keyy as $download){
					echo "<div class='col span_2_of_4 images-div-center'>
									<div class='videoWrapper'>
										".$download["url_arquivo"]."
									</div>
									<p class='balmak-title-red'>".$download["titulo"]."</p>
								</div>";
				}

				echo "</div><br /><br />";
			}
		}

		/*
		$videos_titulo = simple_fields_values("page_cliente_videos_1_titulo");
		$videos_embed = simple_fields_values("page_cliente_videos_1_embed");
		$arr_videos_loop = array();

		$i=0;
		$v_key=0;
		for($ii=0; $ii<count($videos_titulo);$ii++){
			if(!array_key_exists($v_key, $arr_videos_loop)){
				$arr_videos_loop[$v_key] = array();
			}

			array_push($arr_videos_loop[$v_key], array(
				"titulo"=>$videos_titulo[$ii],
				"embed"=>$videos_embed[$ii],
			));
			$i++;

			if($i==2){
				$i=0;
				$v_key++;
			}
		}
		*/

		/*
		// fazer loop
		$css_dv = "mt30";
		foreach($arr_videos_loop as $key => $arr_videos){
			echo "<div class='section group'>";
			$css_dv = "";

			foreach($arr_videos as $kkey => $video){
				echo "<div class='col span_2_of_4 images-div-center'>
								<div class='videoWrapper'>
									".$video["embed"]."
								</div>
								<p class='balmak-title-red'>".$video["titulo"]."</p>
							</div>";
			}

			echo "</div>";
		}
		*/
		?>

  	<?php
		/*
    <div class="section group">
      <div class="col span_2_of_4 images-div-center">
      	<div class="videoWrapper">
          <iframe width="560" height="349" src="http://www.youtube.com/embed/n_dZNLr2cME?rel=0&hd=1" frameborder="0" allowfullscreen></iframe>
        </div>
        <p class="balmak-title-red">Video intitucional Balmak 1</p>
      </div>
      <div class="col span_2_of_4 images-div-center">
      	<div class="videoWrapper">
          <iframe width="560" height="349" src="http://www.youtube.com/embed/n_dZNLr2cME?rel=0&hd=1" frameborder="0" allowfullscreen></iframe>
        </div>
        <p class="balmak-title-red">Video intitucional Balmak 2</p>
      </div>
    </div>

    <div class="section group">
      <div class="col span_2_of_4 images-div-center">
      	<div class="videoWrapper">
          <iframe width="560" height="349" src="http://www.youtube.com/embed/n_dZNLr2cME?rel=0&hd=1" frameborder="0" allowfullscreen></iframe>
        </div>
        <p class="balmak-title-red">Video intitucional ORION</p>
      </div>
      <div class="col span_2_of_4 images-div-center">
      	<div class="videoWrapper">
          <iframe width="560" height="349" src="http://www.youtube.com/embed/n_dZNLr2cME?rel=0&hd=1" frameborder="0" allowfullscreen></iframe>
        </div>
        <p class="balmak-title-red">Video Brasil Next</p>
      </div>
    </div>

    <div class="section group">
      <div class="col span_2_of_4 images-div-center">
      	<div class="videoWrapper">
          <iframe width="560" height="349" src="http://www.youtube.com/embed/n_dZNLr2cME?rel=0&hd=1" frameborder="0" allowfullscreen></iframe>
        </div>
        <p class="balmak-title-red">Video Farma Médico Hospitalar</p>
      </div>
      <div class="col span_2_of_4 images-div-center">
      </div>
    </div>
		*/
		?>
  </div>
</div>

<?php
get_footer();
?>
