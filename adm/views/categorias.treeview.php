<?
defined('BW') or die("Acesso negado!");

require(dirname(__FILE__) .DS. 'categorias.lista.helper.php');

?>

<? bwHtml::js2css('/treeview/jquery.treeview', true); ?>
<? bwHtml::js('/cookie/cookie.js', true); ?>

<script>
	$(document).ready(function(){
		$(".menu").treeview({
			control: "#treecontrol",
			persist: "cookie",
			cookieId: "treeview-catMenu"
		});
	});
</script>

<div id="treecontrol">
	<a href="javascript:void(0);">Recolher todas</a> | <a href="javascript:void(0);">Exbir todas</a>
</div>

<? new helperTreeCategorias(); ?>



