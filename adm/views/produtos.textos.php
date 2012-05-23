	<div id="textos">
		<?
		// busca imagens em ordem
		$textos = Doctrine_Query::create()
				->from('ProdutoTexto t')
				->where('t.idproduto = ?', $i->id)
				->orderby('t.ordem ASC')
				->execute();

		if(count($textos->toArray())):
		?>
			<div class="txt">
				<table>
					<? foreach($textos as $t): 
						$img = bwUtil::resizeImage("[image src='{$t->bwImagem->getUrl()}' width='75' height='75' ]");
						$nome = empty($t->titulo) ? "[Texto sem título]" : $t->titulo;
					?>
					<tr class="tbtr">
						<td class="tac" style="width: 90px;"><span class="bdr1 move" style="background: #FFF url(<?= $img; ?>) no-repeat center center; width: 75px; height: 75px; display: inline-block; padding: 5px;"></span></td>
						<td style="width: 100%">
							<?= '<a href="' .bwRouter::_('adm.php?com=produtos&sub=textos&view=cadastro&id='.$t->id). '">' .$nome. '</a>'; ?>
							<input type="hidden" value="<?= $t->id ?>" name="ordem-textos[]" />
						</td>
						<td class="tac status" style="width: 25px;"><?= bwAdm::getImgStatus($t->status); ?></td>
					</tr>
					<? endforeach; ?>
				</table>
				<fieldset>
					<legend>Dica</legend>
					<p>Arraste as imagens para configurar a ordem dos textos.</p>
				</fieldset>
			</div>
			<br />
		<? endif; ?>
		<?= bwButton::redirect('Criar novo texto', "adm.php?com=produtos&sub=textos&view=cadastro&idproduto={$i->id}"); ?>
	</div>
