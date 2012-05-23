<?
defined('BW') or die("Acesso negado!");

?>


<?= bwAdm::createHtmlSubMenu(0); ?>
<?= bwButton::redirect('Criar novo produto', 'adm.php?com=produtos&view=cadastro'); ?>

<table id="dataTable01">
	<thead>
		<tr>
			<th class="tac" style="width: 50px;">ID</th>
			<th class="tac" style="width: 90px;">Imagem</th>
			<th>Nome</th>
			<th class="tac" style="width: 85px;" nowrap="nowrap">Preço</th>
			<th class="tac" style="width: 80px;">Quantidade</th>
			<th class="tac" style="width: 120px;">Fabricante</th>
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
			sClass: "tac", aTargets: [0, 3, 4, 5, 6] 
		}],
			sAjaxSource: "<?= bwRouter::_('adm.php?com=produtos&task=produtoLista&' .bwRequest::getToken(). '=1') ?>"
		}));

	});
</script>
