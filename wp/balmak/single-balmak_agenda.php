<?php
global $wpdb;
get_header();
define("META_KEY_AGENDA_DATA", "_simple_fields_fieldGroupID_20_fieldID_3_numInSet_0");
define("BALMAK_POST_TYPE", "balmak_agenda");

$V_FORM_MES_ANO_ESCOLHIDO = (isset($_POST["blog_mes"]) && $_POST["blog_mes"] != "") ? $_POST["blog_mes"]: "";
$V_FORM_PESQUISA = (isset($_POST["search"]) && $_POST["search"] != "") ? $_POST["search"]: "";

function walk_acerta_data(&$item1){
  $item1 = acerta_data_hora($item1);
}
function sortArrDate( $a, $b ) {
  return strtotime($b[0]) - strtotime($a[0]);
}
?>

<div class="chamada-topo balmak-border-bottom-red" data-img="<?php echo esc_url( get_template_directory_uri() ); ?>/images/chamada-imprensa-agenda.jpg">
	<div class="chamada-topo-txt"><span>Agenda</span></div>
</div>
<div class="content">
  <div class="main-width">
    <form id="frm-agenda-evento" class="mb40" method="post" action="">
    	<input name="search" id="eventos-search" type="hidden" value="<?php echo $V_FORM_PESQUISA; ?>" />
      <table width="100%" align="center" class="txt-align-center">
        <tr>
          <td align="left">
          	<?php
						$sql = "SELECT DISTINCT $wpdb->postmeta.meta_value
										FROM $wpdb->posts, $wpdb->postmeta
										WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id
										AND $wpdb->postmeta.meta_key='".META_KEY_AGENDA_DATA."'
										AND ($wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = '".BALMAK_POST_TYPE."')
										ORDER BY $wpdb->posts.post_date DESC";
						$dates = $wpdb->get_col($sql);
						array_walk($dates, 'walk_acerta_data');
						usort($dates, "sortArrDate");

						$option = "";
						for($i = count($dates) - 1; $i >= 0; $i--){
							$V_STR_MES = fnc_mes_int_to_str( date("n", strtotime($dates[$i])) );
							$V_ANO = date("Y", strtotime($dates[$i]));

							$V_STR_DATA = "$V_STR_MES/$V_ANO";
							$V_STR_KEY = date("m/Y", strtotime($dates[$i]));
							$V_SEL = ( $V_FORM_MES_ANO_ESCOLHIDO == $V_STR_KEY ) ? " selected ": "";

							$option .= "<option $V_SEL value='$V_STR_KEY'>$V_STR_DATA</option>";
						}
						?>

            <select onchange="this.form.submit();" name="blog_mes" style="width:50%;">
              <option value="">--Escolha o mês/ano</option>
              <?php echo $option; ?>
            </select>
          </td>
        </tr>
      </table>
    </form>

    <div class="section group">
      <div class="col span_3_of_4">
      	<?php
				$ARR_FILTER = array(
												'p' => get_queried_object_id(),
												'post_type' => BALMAK_POST_TYPE,
												'posts_per_page' => -1,
												'meta_query' => array(
														array(
															'key'     => META_KEY_AGENDA_DATA,
															'value'   => $V_FORM_MES_ANO_ESCOLHIDO,
															'compare' => 'LIKE',
														),
												),
												's' => $V_FORM_PESQUISA,
											);
				?>

      	<?php $loop = new WP_Query($ARR_FILTER); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

        	<?php
					// variaveis ==================
					$V_ID = get_the_ID();

					$agenda_titulos = get_the_title();
					$agenda_conteudos = get_the_content();
					$agenda_datas = simple_fields_value("page_balmak_agenda_1_data", $V_ID);
					$agenda_datas = acerta_data_hora($agenda_datas);

					$V_STR_DIA = date("d", strtotime($agenda_datas));
					$V_STR_MES = fnc_mes_int_to_str( date("n", strtotime($agenda_datas)) );
					$V_STR_SEMANA = fnc_dia_semana_to_str( date("w", strtotime($agenda_datas)) );
					$V_STR_HORA = date("H:i", strtotime($agenda_datas));
					// ============================
					?>

          <div style="border-bottom:none;" class="blog-item">
            <?php
            /*
            <div class="meta-top">
              <div class="dia"><?php echo $V_STR_DIA; ?></div>
              <div class="data">
                <span class="balmak-title-red">de <?php echo $V_STR_MES; ?></span>
                <br />
                <?php echo $V_STR_SEMANA; ?>, <?php echo $V_STR_HORA; ?>
              </div>
            </div>
            */
            ?>
            <h3 class="title"><?php echo $agenda_titulos; ?></h3>
            <div class="body">
              <?php echo wpautop( $agenda_conteudos, true ); ?>
            </div>
            <div class="social">
              <?php
							// PASSAR VARIAVEL $V_ID
							include( "include-like-buttons.php" );
							?>
            </div>
          </div>

        <?php endwhile; wp_reset_query(); ?>
      </div>
      <div class="col span_1_of_4">
      	<?php
				include("page-imprensa-agenda-eventos-side.php");
				?>
      </div>
    </div>
  </div>
</div>

<?php
get_footer();
?>
