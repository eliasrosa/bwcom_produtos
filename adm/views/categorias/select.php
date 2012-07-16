<?

function montaMenu($idpai = 0, $categorias = array(), $i = NULL, $nivel = -1)
{
    $nivel++;
    foreach ($categorias[$idpai] as $c) {
        $sel = ($i->idpai == $c->id) ? ' selected="selected"' : '';
        $nome = str_repeat('&nbsp;&nbsp;&nbsp;', $nivel) . $c->nome;

        if ($i->id != $c->id) {
            echo sprintf('<option value="%s"%s>%s</option>', $c->id, $sel, $nome);
            montaMenu($c->id, $categorias, $i, $nivel);
        }
    }
}


?>
<div class="campo block idpai">
    <span>Categoria pai:</span>
    <select class="w100" name="dados[idpai]">
        <option value="0"<?= ($i->idpai == 0) ? ' selected="selected"' : ''; ?>>-- Raíz --</option>
        <? montaMenu(0, ProdutoCategoria::getAllIndexIdpai(), $i); ?>
    </select>		
    <br class="clearfix"/>
</div>

