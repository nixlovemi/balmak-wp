<div class="side-item">
  <div class="title">
    Categorias
  </div>
  <div class="special">
  	<form method="post" action="">
    	<input name="search" type="text" placeholder="Procurar" onkeypress=" if( event.keyCode == 13 ){ jQuery('#eventos-search').val( this.value ); jQuery('#frm-agenda-evento').submit(); event.preventDefault(); } " value="<?php echo $V_FORM_PESQUISA; ?>" />
    </form>
  </div>
  <div class="body">
    <ul>
      <li>
        <a style="color:inherit !important;" href="<?php echo esc_url( home_url( '/' ) . "sala-de-imprensa/agenda/" ); ?>">Agenda</a>
      </li>
      <!--<li>
      	<a style="color:inherit !important;" href="<?php echo esc_url( home_url( '/' ) . "sala-de-imprensa/eventos/" ); ?>">Eventos</a>
      </li>-->
      <li>
      	<a style="color:inherit !important;" href="<?php echo esc_url( home_url( '/' ) . "sala-de-imprensa/noticias/" ); ?>">Notícias</a>
      </li>
      <?php // <li>Postagem Antiga</li> ?>
    </ul>
  </div>
</div>

<div class="side-item">
  <div class="title">
    Social
  </div>
  <div class="body images-div-center">
    <?php
		/*
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img-imprensa-agenda-2.jpg" />
		*/
		?>
    
    <div class="fb-page" data-href="https://www.facebook.com/BalmakBalancas" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
      <blockquote cite="https://www.facebook.com/BalmakBalancas" class="fb-xfbml-parse-ignore">
        <a href="https://www.facebook.com/BalmakBalancas">Balmak Balanças</a>
      </blockquote>
    </div>
  </div>
</div>