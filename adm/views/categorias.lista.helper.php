<?

defined('BW') or die("Acesso negado!");

class helperTreeCategorias
{

    private $base = array();

    public function __construct()
    {
        $this->base = ProdutoCategoria::getAllIndexIdpai();
        $html = $this->montaMenu();

        echo $html;
    }

    public function montaMenu($idpai = 0)
    {
        $categorias = isset($this->base[$idpai]) ? $this->base[$idpai] : array();

        $m = '';
        if (count($categorias)) {
            $class = ($idpai == 0) ? ' class="menu"' : '';
            $m .= "<ul{$class}>";


            foreach ($categorias as $c) {
                $s = $this->montaMenu($c['id']);
                $class = ($s == '') ? '' : ' pai';

                $href = bwRouter::_("adm.php?com=produtos&sub=categorias&view=cadastro&id={$c['id']}");

                $class = ($c['status']) ? '' : ' class="red"';
                $c['nome'] = ($c['status']) ? $c['nome'] : "{$c['nome']} (Desativado)";

                $m .= "<li class=\"categoria_{$c['id']}{$class}\"><a href=\"{$href}\"{$class}>{$c['nome']}</a>{$s}</li>";
            }

            $m .= "</ul>";
        }

        return $m;
    }

}
?>


