<?
defined('BW') or die("Acesso negado!");

// menu
echo bwAdm::createHtmlSubMenu(3);


$id = bwRequest::getVar('id', 0, 'get');
$i = bwComponent::openById('ProdutoCategoria', $id);

?>

<table class="painel">
	<tr>
		<td class="lateral">
			<? require('categorias.treeview.php'); ?>
		</td>
		<td>
			<h2 class="header">Dados da categoria</h2>
			<div class="conteudo">
			<?
				$form = new bwForm($i);

				$form->addInputID();
				$form->addCustonFile('categorias.select.php');
				$form->addInput('nome');
				$form->addInput('alias');
				$form->addInputInteger('ordem');
				$form->addStatus();

				$form->addBottonSalvar('categoriaSave');
				$form->addBottonRemover('categoriaRemover');
				$form->show();
			?>		
			</div>
		</td>
	</tr>
</table>
