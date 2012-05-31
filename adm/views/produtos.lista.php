<?

defined('BW') or die("Acesso negado!");

class bwGridProdutos extends bwGrid
{

    function col0($i)
    {
        return sprintf('<a href="%s">%s</a>', bwRouter::_('adm.php?com=produtos&view=cadastro&id=' . $i->id), $i->id);
    }

    function col1($i)
    {
        return sprintf('<img src="%s" width="100" height="100" fit="outside" />', $i->bwImagem->getUrl());
    }

    function col2($i)
    {
        return sprintf('<a href="%s">%s</a>', bwRouter::_('adm.php?com=produtos&view=cadastro&id=' . $i->id), $i->nome);
    }

    function col3($i)
    {
        return $i->referencia;
    }

    function __construct()
    {
        //
        $this->orderColDefault = 1;

        //
        $sql = Doctrine_Query::create()
            ->from('Produto');

        //
        parent::__construct($sql);

        //
        $this->addCol('ID', 'id', 'tac', 50);
        $this->addCol('Imagem', NULL, 'tac', 100);
        $this->addCol('Nome', 'nome');
        $this->addCol('Referência', 'referencia');

        //
        $this->show();
    }

}

echo bwAdm::createHtmlSubMenu(0);
echo bwButton::redirect('Criar novo produto', 'adm.php?com=produtos&view=cadastro');

new bwGridProdutos();