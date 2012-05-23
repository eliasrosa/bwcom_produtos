<?
defined('BW') or die("Acesso negado!");

echo bwAdm::createHtmlSubMenu(3);
?>

<table class="painel">
	<tr>
		<td class="lateral">
			<? require('categorias.treeview.php'); ?>
		</td>
		<td>
			<h2 class="header">Categorias</h2>
			<div class="conteudo">
				Selecione uma categoria ao lado ou 
				<?= bwButton::redirect('Crie uma nova categoria', 'adm.php?com=produtos&sub=categorias&view=cadastro'); ?>
			</div>
		</td>
	</tr>
</table>






