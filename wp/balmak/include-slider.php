<style>
div.move-lr-holder{
	width:100%;
	position:relative;
	z-index:250;
}
div.move{
	background-color:#c4151c;
	color:#fff;
	font-size:18px;
	position:absolute;
	cursor:pointer;
	padding:1.25em 0.4em;
	margin-top: 9%;
}
div.move-lr-holder div.dv-move-left{
	float:left;
	left:0;
}
div.move-lr-holder div.dv-move-right{
	float: right;
	right:0;
}
#SLDR-ONE ul li .skew{
	cursor:pointer;
}
</style>

<script>
/*$(document).on("click", "#SLDR-ONE ul li", function(){
	var link = $(this).find("a");
	var pagina = link.attr("href");
	console.log(pagina);
	document.location.href = pagina;
	console.log(123);
});*/

var clickHandler = "click";

if('ontouchstart' in document.documentElement){
    clickHandler = "touchstart";
}

$(document).on(clickHandler, "#SLDR-ONE ul li .skew", function(){
	var pagina = $(this).data("url");
	document.location.href = pagina;
});
</script>

<?php
$ID_PG_HOME = 5;

$homeBanner_url_imagem = simple_fields_values("page_home_banner_1_url_imagem", $ID_PG_HOME);
$homeBanner_url_link = simple_fields_values("page_home_banner_1_url_link", $ID_PG_HOME);

// monta array com infos
$arr_homeBanner = array();
for($i=0; $i<count($homeBanner_url_imagem); $i++){
	$v_url_imagem = (isset($homeBanner_url_imagem[$i])) ? $homeBanner_url_imagem[$i]: "";
	$v_url_link = (isset($homeBanner_url_link[$i])) ? $homeBanner_url_link[$i]: "";
	
	array_push($arr_homeBanner, array(
		"url_imagem"=>$v_url_imagem,
		"url_link"=>$v_url_link,
	));
}    

if( count($arr_homeBanner) >= 3 ){
	echo "<div class='move-lr-holder sldr-nav'>";
	echo "  <div class='move dv-move-left previousSlide prev'> < </div>";
	echo "  <div class='move dv-move-right nextSlide next'> > </div>";
	echo "</div>";
	
	echo "<div class='stage balmak-border-bottom-red' style='width: 100%; max-heigth: 482px;'>";
	echo "  <div id='SLDR-ONE' class='sldr'>";
	echo "    <ul class='wrp animate'>";
	
	$i = 1;
	$numbermappings = array("zero", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen", "twenty");
	
	foreach($arr_homeBanner as $key => $info_homeBanner){
		$v_url_imagem = (isset($info_homeBanner["url_imagem"])) ? $info_homeBanner["url_imagem"]: "";
		$v_url_link = (isset($info_homeBanner["url_link"])) ? $info_homeBanner["url_link"]: "javascript:;";
		$v_element_name = (isset($numbermappings[$i])) ? $numbermappings[$i]: $i;
		
		echo "<li class='$v_element_name'>";
		echo "  <div data-url='$v_url_link' class='skew'>";
		echo "    <div class='wrap'>";
		//echo "      <a style='display:block: width: 100%; height: 100%;' href='$v_url_link'><img src='$v_url_imagem' width='1267' height='482'></a>";
		echo "      <img src='$v_url_imagem' width='1267' height='482'>";
		echo "    </div>";
		echo "  </div>";
		echo "</li>";
		
		$i++;
	}
	
	echo "    </ul>";
	echo "  </div>";
	echo "</div>";
}
?>