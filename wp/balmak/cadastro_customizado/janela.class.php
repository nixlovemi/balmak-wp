<?php
class janelaWp{
	private $_titulo;
	private $_conteudo;
	
	function __construct($titulo){
		$this->_titulo = $titulo;
	}
	
	private function generateId(){
		return md5(date("YmdHis"));
	}
	
	public function setConteudo($conteudo){
		$this->_conteudo = $conteudo;
		return $this;
	}
	
	public function getHtml(){
		$id = $this->generateId();
		$titulo = $this->_titulo;
		$conteudo = $this->_conteudo;
		
		$html = "<div id='nix_fields_$id' class='postbox nix_fields'>
							<button type='button' class='handlediv button-link toggle-indicator' aria-expanded='true'>
								<span class='screen-reader-text'>Alternar painel: $titulo</span>
								<span class='toggle-indicator' aria-hidden='true'></span>
							</button>
							<h2 class='hndle ui-sortable-handle'><span>$titulo</span></h2>
							<div class='inside'>
								$conteudo
							</div>
						</div>";
		return $html;
	}
}
?>