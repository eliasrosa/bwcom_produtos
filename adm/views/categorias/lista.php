<?
defined('BW') or die("Acesso negado!");

echo bwAdm::createHtmlSubMenu(1);
?>

<table class="painel">
	<tr>
		<td class="lateral">
			<? require('treeview.php'); ?>
		</td>
		<td>
			<h2 class="header">Categorias</h2>
			<div class="conteudo">
				Selecione uma categoria ao lado ou 
				<?= bwButton::redirect('Crie uma nova categoria', '/produtos/categorias/cadastro/0'); ?>
			</div>
		</td>
	</tr>
</table>






