<?

defined('BW') or die("Acesso negado!");
require('helper.php');

bwHtml::js2css('/treeview/jquery.treeview', true);
bwHtml::js('/cookie/cookie.js', true);
?>

<script>
    $(document).ready(function(){
        $(".menu").treeview({
            persist: "cookie",
            cookieId: "treeview-catMenu"
        });
    });
</script>

<?

echo bwButton::redirect('Criar nova categoria', '/produtos/categorias/cadastro/0');

new helperTreeCategorias();
