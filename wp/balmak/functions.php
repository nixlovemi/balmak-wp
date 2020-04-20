<?php
add_theme_support( 'post-thumbnails' );
add_image_size( 'balmak-thumb', 350, 350, true ); // Hard Crop Mode

function isMobile(){
  require_once("mobile-detect-2.8.24/Mobile_Detect.php");
  $detect = new Mobile_Detect;
  return $detect->isMobile();
}

function send_mail($to_addr, $subject, $body){
  $headers = "MIME-Version: 1.1\r\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
  $headers .= "From: nao-responda@balmak.com.br\r\n"; // remetente
  $headers .= "Return-Path: nao-responda@balmak.com.br\r\n"; // return-path

  $envio = mail($to_addr, $subject, $body, $headers);
  return $envio;
}

function randomPassword() {
  $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
  $pass = array(); //remember to declare $pass as an array
  $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
  for ($i = 0; $i < 8; $i++) {
      $n = rand(0, $alphaLength);
      $pass[] = $alphabet[$n];
  }
  return implode($pass); //turn the array into a string
}

// custom JS no wp admin
function custom_admin_js() {
    $url = get_bloginfo('template_directory') . '/admin-scripts.js';
    echo '"<script charset="UTF-8" type="text/javascript" src="'. $url . '"></script>"';
}
add_action('admin_footer', 'custom_admin_js');

add_action('admin_enqueue_scripts','wptuts53021_load_admin_script');
function wptuts53021_load_admin_script( $hook ){
  /*wp_enqueue_script(
    'wptuts53021_script', //unique handle
    get_template_directory_uri().'/admin-scripts.js', //location
    array('jquery')  //dependencies
  );*/
  wp_enqueue_script(
    'wptuts53021_script2', //unique handle
    get_template_directory_uri().'/cadastro_customizado/jquery.dataTables.min.js', //location
    array('jquery')  //dependencies
  );
}

function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/admin-scripts.css');
  wp_enqueue_style('admin-styles2', get_template_directory_uri().'/cadastro_customizado/jquery.dataTables.min.css');
}
add_action('admin_enqueue_scripts', 'admin_style');
// =====================

function acerta_data_hora($dt){

  if( strpos($dt, " ") !== false ){
    $arr_dt = explode(" ", $dt);
    $data = $arr_dt[0];
    $hora = $arr_dt[1];

    $arr_dt = explode("/", $data);
    $data = $arr_dt[2] . "-" . $arr_dt[1] . "-" . $arr_dt[0] . " " . $hora;
  }
  else{
    $arr_dt = explode("/", $data);
    $data = $arr_dt[2] . "-" . $arr_dt[1] . "-" . $arr_dt[0];
  }

  return $data;

}

function fnc_dia_semana_to_str( $nr_dia_semana ){
  switch( $nr_dia_semana ){
    case 0:
      return 'Domingo';
      break;

    case 1:
      return 'Segunda-Feira';
      break;

    case 2:
      return 'Terça-Feira';
      break;

    case 3:
      return 'Quarta-Feira';
      break;

    case 4:
      return 'Quinta-Feira';
      break;

    case 5:
      return 'Sexta-Feira';
      break;

    case 6:
      return 'Sábado';
      break;
  }
}

function fnc_mes_int_to_str( $nr_mes ){
  switch( $nr_mes ){
    case 1:
      return 'Janeiro';
      break;

    case 2:
      return 'Fevereiro';
      break;

    case 3:
      return 'Março';
      break;

    case 4:
      return 'Abril';
      break;

    case 5:
      return 'Maio';
      break;

    case 6:
      return 'Junho';
      break;

    case 7:
      return 'Julho';
      break;

    case 8:
      return 'Agosto';
      break;

    case 9:
      return 'Setembro';
      break;

    case 10:
      return 'Outubro';
      break;

    case 11:
      return 'Novembro';
      break;

    case 12:
      return 'Dezembro';
      break;
  }
}

class Produto_Side_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        #$parents = get_post_ancestors( $page->ID );
        #$depth = count($parents);

        #if ( $depth )
            #$indent = str_repeat("--", $depth);
        #else
            #$indent = '';

        #extract($args, EXTR_SKIP);
        #$css_class = array('page_item', 'page-item-'.$page->ID);

        #if ( !empty($current_page) ) {
            #$_current_page = get_page( $current_page );
            #_get_post_ancestors($_current_page);
            #if ( isset($_current_page->ancestors) && in_array($page->ID, (array) $_current_page->ancestors) )
                #$css_class[] = 'current_page_ancestor';
            #if ( $page->ID == $current_page )
                #$css_class[] = 'current_page_item';
            #elseif ( $_current_page && $page->ID == $_current_page->post_parent )
                #$css_class[] = 'current_page_parent';
        #} elseif ( $page->ID == get_option('page_for_posts') ) {
            #$css_class[] = 'current_page_parent';
        #}

        #$css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );
        // $output .=  '<li class="'.$css_class.'"><a href="' . get_permalink($page->ID) . '">' . apply_filters( 'the_title', '' ) . "$indent" . $page->post_title .'</a>';

        $vPermalink = get_permalink($item->ID);
        $vTitle = $item->post_title;

        $output .= "<li><a href='$vPermalink'>$vTitle</a></li>";
    }
}

function fncPrintSideProdutos(){
  /*
  $args = array(
      'sort_column'  => 'menu_order, post_title',
      'post_type'    => 'balmak-produtos',
      'post_status'  => 'publish',
      'title_li'  => '',
      // 'walker' => new Produto_Side_Walker(),
      // 'wp_list_pages' => 'menu_order'
      //'author' => $idutente, // must be comma separated list of IDs
  );

  wp_list_pages($args);
  */
  ?>

  <?php
  $args = array(
      'numberposts' => -1,
      'orderby'     => 'menu_order',
      'order'       => 'ASC',
      'post_type'   => 'balmak-produtos',
      'post_status' => 'publish',
      'post_parent' => 0
  );
  $lstProdutos = get_posts($args);

  foreach($lstProdutos as $post) : setup_postdata($post);
    $vPostId = $post->ID;
    $escondeLink = (string) simple_fields_value("page_produtos_1_esconde_link", $vPostId);

    $args = array(
      'post_parent' => $vPostId,
      'post_type'   => 'balmak-produtos',
      'numberposts' => -1,
      'post_status' => 'publish',
      'orderby'     => 'menu_order',
      'order'       => 'ASC',
    );
    $children = get_children( $args );

    $vTitle = $post->post_title;
    $vTemChild = count($children) > 0;
    $vCss = ($vTemChild) ? "page_item page-item-$vPostId page_item_has_children": "page_item page-item-$vPostId";
    $vStrLink = ($escondeLink == 1) ? "<b>" . $vTitle . "</b>": "<a href='".get_permalink($page->ID)."'>" . $vTitle . "</a>";

    echo "<li class='$vCss'>";
    echo "  <span style='font-size: 16px; color:#c4161c;'>$vStrLink</span>";

    if($vTemChild){
      // level 01 ===========================
      echo "  <ul class='children'>";

      foreach($children as $post1) : setup_postdata($post1);
        $vPostId = $post1->ID;
        $escondeLink = (string) simple_fields_value("page_produtos_1_esconde_link", $vPostId);

        $args = array(
          'post_parent' => $vPostId,
          'post_type'   => 'balmak-produtos',
          'numberposts' => -1,
          'post_status' => 'publish',
          'orderby'     => 'menu_order',
          'order'       => 'ASC',
        );
        $children1 = get_children( $args );

        $vTitle = $post1->post_title;
        $vTemChild = count($children1) > 0;
        $vCss = ($vTemChild) ? "page_item page-item-$vPostId": "page_item page-item-$vPostId";
        $vStrLink = ($escondeLink == 1) ? "<b>" . $vTitle . "</b>": "<a href='".get_permalink($post1->ID)."'>" . $vTitle . "</a>";

        echo "<li class='$vCss'>";
        echo "  <span style='position:relative; left: 10px;'>$vStrLink</span>";

        if($vTemChild){
          // level 02 ===========================
          echo "  <ul class='children'>";

          foreach($children1 as $post2) : setup_postdata($post2);
            $vPostId = $post2->ID;
            $escondeLink = (string) simple_fields_value("page_produtos_1_esconde_link", $vPostId);

            $args = array(
              'post_parent' => $vPostId,
              'post_type'   => 'balmak-produtos',
              'numberposts' => -1,
              'orderby'     => 'menu_order',
              'order'       => 'ASC',
            );
            $children2 = get_children( $args );

            $vTitle = $post2->post_title;
            $vTemChild = count($children2) > 0;
            $vCss = ($vTemChild) ? "page_item page-item-$vPostId": "page_item page-item-$vPostId";
            $vStrLink = ($escondeLink == 1) ? "<b>" . $vTitle . "</b>": "<a href='".get_permalink($post2->ID)."'>" . $vTitle . "</a>";

            echo "<li class='$vCss'>";
            echo "  <span style='position:relative; left: 20px;'>$vStrLink</span>";

            if($vTemChild){
              // level 03 ===========================
              echo "  <ul class='children'>";

              foreach($children2 as $post3) : setup_postdata($post3);
                $vPostId = $post3->ID;
                $escondeLink = (string) simple_fields_value("page_produtos_1_esconde_link", $vPostId);

                $vTemChild = false;
                $vCss = ($vTemChild) ? "page_item page-item-$vPostId": "page_item page-item-$vPostId";
                $vLink = ($escondeLink == 1) ? "javascript:;": get_permalink($post3->ID);
                $vTitle = $post3->post_title;

                echo "<li class='$vCss'>";
                echo "  <span style='position:relative; left: 30px;'><a href='$vLink'>$vTitle</a></span>";
                echo "</li>";

              endforeach;
              // ====================================

              echo "  </ul>";
            }
            // ====================================

            echo "</li>";

          endforeach;
          // ====================================

          echo "  </ul>";
        }

        echo "</li>";

      endforeach;
      // ====================================

      echo "  </ul>";
    }

    echo "</li>";
  endforeach;

  wp_reset_query();
}

function getSubMenu($menuName){
  $primaryNav = wp_get_nav_menu_items($menuName);
  $qtdeMenus = count($primaryNav);
  if($qtdeMenus == 0){
    return false;
  }

  $htmlReturn = "";
  $htmlReturn .= "<div class='dv-submenu-padding'>";

  $idx = 1;
  foreach ( $primaryNav as $navItem ) {
    $titulo = $navItem->title;
    $link = $navItem->url;

    $htmlDiv = ($idx < $qtdeMenus) ? "<div style='height:12px;'></div>": "";
    $idx++;

    $htmlReturn .= "
      <a href='$link'>$titulo</a>
      $htmlDiv
    ";
  }

  $htmlReturn .= "</div>";
  return $htmlReturn;
}

function getSubMenuHidden($menuName){
  $primaryNav = wp_get_nav_menu_items($menuName);
  $qtdeMenus = count($primaryNav);
  if($qtdeMenus == 0){
    return false;
  }

  $htmlReturn = "";
  foreach ( $primaryNav as $navItem ) {
    $titulo = $navItem->title;
    $link = $navItem->url;

    $htmlReturn .= "
      <li class='pl15'><a href='$link'>$titulo</a></li>
    ";
  }

  return $htmlReturn;
}

function homeMainMenu(){
  ?>

  <ul id="menu-topo-1">
    <li>
      <a data-dv-id="#dv-submenu-institucional" class="sub-menu-tooltip" href="<?php echo esc_url( home_url( '/' ) . 'institucional' ); ?>">Institucional</a>
      <?php
      $subMenuInst = getSubMenu("Sub_Institucional");
      if($subMenuInst !== false){
        echo "<div class='dv-submenu' id='dv-submenu-institucional'>";
        echo $subMenuInst;
        echo "</div>";
      }
      ?>
    </li>

    <li>
      <a data-dv-id="#dv-submenu-produtos" class="sub-menu-tooltip" href="<?php echo esc_url( home_url( '/' ) . 'produtos' ); ?>">Produtos</a>
      <?php
      $subMenuProdutos = getSubMenu("Sub_Produtos");
      if($subMenuProdutos !== false){
        echo "<div class='dv-submenu' id='dv-submenu-produtos'>";
        echo $subMenuProdutos;
        echo "</div>";
      }
      ?>
    </li>

    <li>
      <a data-dv-id="#dv-submenu-suporte" class="sub-menu-tooltip" href="javascript:;">Suporte</a>
      <?php
      $subMenuSuporte = getSubMenu("Sub_Suporte");
      if($subMenuSuporte !== false){
        echo "<div class='dv-submenu' id='dv-submenu-suporte'>";
        echo $subMenuSuporte;
        echo "</div>";
      }
      ?>
    </li>
  </ul>
  <span id="menu-separator"></span>
  <ul id="menu-topo-2">
    <li>
      <a data-dv-id="#dv-submenu-sala-imprensa" class="sub-menu-tooltip" href="javascript:;">Sala de Imprensa</a>
      <?php
      $subMenuSalaImprensa = getSubMenu("Sub_SalaImprensa");
      if($subMenuSalaImprensa !== false){
        echo "<div class='dv-submenu' id='dv-submenu-sala-imprensa'>";
        echo $subMenuSalaImprensa;
        echo "</div>";
      }
      ?>
    </li>

    <li>
      <a data-dv-id="#dv-submenu-representantes" class="sub-menu-tooltip" href="javascript:;">Representantes</a>
      <?php
      $subMenuRepresent = getSubMenu("Sub_Representantes");
      if($subMenuRepresent !== false){
        echo "<div class='dv-submenu' id='dv-submenu-representantes'>";
        echo $subMenuRepresent;
        echo "</div>";
      }
      ?>
    </li>

    <li>
      <a data-dv-id="#dv-submenu-faleconosco" class="sub-menu-tooltip" href="<?php echo esc_url( home_url( '/' ) . 'fale-conosco/' ); ?>">Fale Conosco</a>
      <?php
      $subMenuFaleC = getSubMenu("Sub_FaleConosco");
      if($subMenuFaleC !== false){
        echo "<div class='dv-submenu' id='dv-submenu-faleconosco'>";
        echo $subMenuFaleC;
        echo "</div>";
      }
      ?>
    </li>
  </ul>
  <ul id="menu-topo-3">
    <li>
      <a data-dv-id="#dv-submenu-ao-cliente" class="sub-menu-tooltip" href="javascript:;">Ao Cliente</a>
      <?php
      $subMenuAoCliente = getSubMenu("Sub_AoCliente");
      if($subMenuAoCliente !== false){
        echo "<div class='dv-submenu' id='dv-submenu-ao-cliente'>";
        echo $subMenuAoCliente;
        echo "</div>";
      }
      ?>
    </li>

    <li>
      <a data-dv-id="#dv-submenu-onde-comprar" class="sub-menu-tooltip" href="<?php echo esc_url( home_url( '/' ) . 'onde-comprar/revendedor/' ); ?>">Onde Comprar</a>
      <?php
      $subMenuOndeComprar = getSubMenu("Sub_OndeComprar");
      if($subMenuOndeComprar !== false){
        echo "<div class='dv-submenu' id='dv-submenu-onde-comprar'>";
        echo $subMenuOndeComprar;
        echo "</div>";
      }
      ?>
    </li>

    <li data-dv-id="#dv-submenu-pesquisar" class="sub-menu-tooltip">
      <a href="javascript:;">
        <img id="lupa-topo" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/lupa-topo.png" />
     </a>
     <div class="dv-submenu" id="dv-submenu-pesquisar">
        <div class="dv-submenu-padding">
          <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input class="inpt-search-home-topo" type="text" placeholder="Pesquisar" name="s" />
          </form>
        </div>
      </div>
    </li>
  </ul>

  <?php
}