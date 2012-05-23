<?
defined('BW') or die("Acesso negado!");

// menu
echo bwAdm::createHtmlSubMenu(1);

?>

<?= bwButton::redirect('Enviar nova imagem', 'adm.php?com=produtos&sub=imagens&view=cadastro'); ?>

<table id="dataTable01">
	<thead>
		<tr>
			<th class="tac" style="width: 50px;">ID</th>
			<th class="tac" style="width: 90px;">Imagem</th>
			<th>Nome</th>
			<th>Produto</th>
			<th class="tac" style="width: 25px;">Status</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>

<script type="text/javascript">
	$(document).ready(function() {

		oTable = $('#dataTable01').dataTable($.extend($.dataTableSettings, {
			
		// Fixbug
		aoColumnDefs: [{
			sClass: "tac", aTargets: [0, 4] 
		}],
			sAjaxSource: "<?= bwRouter::_('adm.php?com=produtos&task=imagemLista&' .bwRequest::getToken(). '=1') ?>"
		}));

	});
</script>
