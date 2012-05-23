<? 
$categorias = bwProdutos::getInstance()->findCategoriaByIdpai(0);
?>
<div class="campo block idpai">
	<span>Categoria pai:</span>
	<select class="w100" name="dados[idpai]">
		<option value="0"<?= ($i->idpai == 0) ? ' selected="selected"' : ''; ?>>-- Raíz --</option>
		<? foreach($categorias as $c): 
			if($i->id != $c['id']):
			?>
				<option value="<?= $c['id']; ?>"<?= ($i->idpai == $c['id']) ? ' selected="selected"' : ''; ?>><?= str_repeat('&nbsp;&nbsp;&nbsp;', $c['nivel']); ?><?= $c['nome']; ?></option>
			<? endif; ?>
		<? endforeach; ?>
	</select>		
	<br class="clearfix"/>
</div>

