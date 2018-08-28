<?php
/* Template Name: Balmak - Guia Procedimentos */
get_header();
?>

<div class="chamada-topo balmak-border-bottom-red" data-img="<?php echo esc_url( get_template_directory_uri() ); ?>/images/chamada-suporte-procedimentos.jpg">
	<div class="chamada-topo-txt"><span>Guia de Procedimentos</span></div>
</div>
<div class="content">
  <div class="main-width">
  	<div class="section group">
      <div class="col span_2_of_5 images-div-center">
      	<img src="http://balmak.com.br/wp-content/uploads/2017/01/guia.png" />
      </div>
      <div class="col span_3_of_5">
      	<?php
				/*
      	<p>A <span class="balmak-title-red">BALMAK</span> oferece muito mais aos seus clientes, revedendores, instaladores e Assistentes Técnicos Autorizados (ATABs), balizando o atendimento técnico dos seus parceiros através de um criterioso Guia de Procedimentos.</p>
        <p>Este documento tem por finalidade definir e amparar os critérios adotados pela BALMAK, na escolha e credenciamento de empresas especializadas em serviços de assistência técnica, que possam bem representá-la junto aos clientes, usuários de seus produtos, bem como definir os procedimentos a serem adotados por essas empresas, no dia-a-dia junto a BALMAK.</p>
				*/
				?>

        <?php
				$guia_texto = simple_fields_value("page_guia_procedimento_1_texto");
				echo $guia_texto;
				?>

        <p align="center">
        	<?php
					$guia_url_pdf = simple_fields_value("page_guia_procedimento_1_url_pdf");
					$guia_url_pdf = ($guia_url_pdf != "") ? $guia_url_pdf: "javascript:;";
					?>

          <a href="<?php echo $guia_url_pdf; ?>" class="btn-enviar-vermelho mt30" style="color:#FFF; display:inline-block;" target="_blank">CLIQUE AQUI</a>
          <br /><br />
          para baixar o Guia de Procedimentos em arquivo PDF
        </p>
      </div>
    </div>
  </div>
</div>

<?php
get_footer();
?>
