<?php
/* Template Name: Balmak - Revendedor */
get_header();
?>

<div class="chamada-topo balmak-border-bottom-red" data-img="<?php echo esc_url( get_template_directory_uri() ); ?>/images/chamada-clientes-catalogo.jpg">
	<div class="chamada-topo-txt"><span>Onde Comprar</span></div>
</div>
<div class="content">
  <div class="main-width">
  	<?php
		$revendedor_titulo = simple_fields_values("page_onde_comprar_revendedor_1_titulo");
		$revendedor_conteudo = simple_fields_values("page_onde_comprar_revendedor_1_conteudo");
		
		// monta array com infos
		$arr_info_atab = array();
		for($i=0; $i<count($revendedor_titulo); $i++){
			$v_titulo = (isset($revendedor_titulo[$i])) ? $revendedor_titulo[$i]: "";
			$v_conteudo = (isset($revendedor_conteudo[$i])) ? $revendedor_conteudo[$i]: "";
			
			array_push($arr_info_atab, array(
				"titulo"=>$v_titulo,
				"conteudo"=>$v_conteudo,
			));
		}
		
		foreach($arr_info_atab as $key => $info_atab){
			$v_titulo = (isset($info_atab["titulo"])) ? $info_atab["titulo"]: "";
			$v_conteudo = (isset($info_atab["conteudo"])) ? $info_atab["conteudo"]: "";
			
			echo "<h3 class='balmak-title'>$v_titulo</h3>
						$v_conteudo
						<br />";
		}
		?>
  
  	<?php
		/*
  	<p><strong>Revendedor</strong></p>
    
    <div class="mt40">
    	<table width="100%">
      	<tr>
        	<td width="50%" align="center">
          	<input class="btn-enviar-vermelho" type="button" value="JÁ SOU REVENDOR BALMAK" />
          </td>
          <td width="50%" align="center">
          	<input class="btn-enviar-vermelho" type="button" value="AINDA NÃO SOU REVENDEDOR BALMAK" />
          </td>
        </tr>
      </table>
    </div>
    
    <div class="mt40">
    	<p><strong>Consumidor</strong></p>
      <p>Seja um Cliente</p>
      <p>O objetivo da BALMAK é ser a melhor indústria brasileira de pesagem, levando até pessoas e empresas produtos que fazem a diferença e agregam valor ao seu cotidiano. Vantagens Balmak:</p>
      <ul>
      	<li>Um dos mais modernos e completos portfólios de produtos de pesagem do mundo;</li>
        <li>O melhor serviço pós-venda do Brasil;</li>
        <li>A Balmak é um fabricante, e, especializada em soluções na área de pesagem;</li>
        <li>O atendimento comercial é pessoal, e preseva as necessidades e prioridades do cliente;</li>
        <li>Estar com a Balmak é ter a garantia de crescimento, ética e as melhores políticas de gestão.</li>
        <li>Faça parte desta revolução.</li>
      </ul>
      <p>Para atendimento do consumidor, a Balmak possui canal de distribuição definido através de revendedores. Fale conosco para que possamos melhor atendê-lo!</p>
      <p>Ligue grátis para nossa CENTRAL DE ATENDIMENTO AO CLIENTE 0800 771 79 81 ou envie e-mail para... VENDAS: vendas@balmak.com.br</p>
    </div>
		*/
		?>
  </div>
</div>

<?php
get_footer();
?>