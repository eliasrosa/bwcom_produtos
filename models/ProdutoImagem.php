<?php

class ProdutoImagem extends bwRecord
{
    var $labels = array(
        'idproduto' => 'Produto',
        'titulo' => 'Título da imagem',
        'alt' => 'Texto alternativo (Alt)',
        'longdesc' => 'Descrição',
        'ordem' => 'Ordem',
    );
    public function setTableDefinition()
    {
        $this->setTableName('bw_produtos_imagens');
        $this->hasColumn('id', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => true,
            'autoincrement' => true,
        ));
        $this->hasColumn('idproduto', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
        ));
        $this->hasColumn('titulo', 'string', 255, array(
            'type' => 'string',
            'length' => 255,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
        ));
        $this->hasColumn('alt', 'string', 255, array(
            'type' => 'string',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
        ));
        $this->hasColumn('longdesc', 'string', 180, array(
            'type' => 'string',
            'length' => 255,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
        ));        
        $this->hasColumn('ordem', 'integer', 11, array(
            'type' => 'integer',
            'length' => 11,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
        ));
        $this->hasColumn('status', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
        ));
    }

    public function setUp()
    {
        parent::setUp();

        $this->hasOne('Produto', array(
            'local' => 'idproduto',
            'foreign' => 'id'
        ));

        $this->setBwImagem('produtos', 'imagens');
    }

}
