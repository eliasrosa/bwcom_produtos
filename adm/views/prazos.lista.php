<?
defined('BW') or die("Acesso negado!");

// menu
echo bwAdm::createHtmlSubMenu(6);

?>

<?= bwButton::redirect('Criar novo prazo', 'adm.php?com=produtos&sub=prazos&view=cadastro'); ?>
	
<table id="dataTable01">
	<thead>
		<tr>
			<th class="tac" style="width: 50px;">ID</th>
			<th>Nome</th>
			<th class="tac" style="width: 200px;">Dias</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>

<script type="text/javascript">
	$(document).ready(function() {

		oTable = $('#dataTable01').dataTable($.extend($.dataTableSettings, {
		
			"aaSorting": [[ 2, 'asc' ]],
			
			// Fixbug
			aoColumnDefs: [{
				sClass: "tac", aTargets: [0, 2] 
			}],
			
			sAjaxSource: "<?= bwRouter::_('adm.php?com=produtos&task=prazoLista&' .bwRequest::getToken(). '=1') ?>"
			
		}));
		
	});
</script>
	
