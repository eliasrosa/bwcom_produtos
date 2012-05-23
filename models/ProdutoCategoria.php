<?php

class ProdutoCategoria extends bwRecord
{
    var $labels = array(
        'idpai' => 'Categoria pai',
        'nome' => 'Nome da categoira',
        'descricao' => 'Descrição',
        'ordem' => 'Ordem',
    );
    public function setTableDefinition()
    {
        $this->setTableName('bw_produtos_categorias');
        $this->hasColumn('id', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => true,
            'autoincrement' => true,
        ));
        $this->hasColumn('idpai', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'autoincrement' => false,
        ));
        $this->hasColumn('nome', 'string', 255, array(
            'type' => 'string',
            'length' => 255,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => true,
            'notblank' => true,
            'autoincrement' => false,
        ));
        $this->hasColumn('descricao', 'string', NULL, array(
            'type' => 'string',
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
        $this->hasColumn('ordem', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
        ));
        $this->hasColumn('metatagalias', 'string', 255, array(
            'type' => 'string',
            'length' => 255,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
        ));
        $this->hasColumn('metatagkey', 'string', 255, array(
            'type' => 'string',
            'length' => 255,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
        ));
        $this->hasColumn('metatagdescription', 'string', 180, array(
            'type' => 'string',
            'length' => 255,
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

        $this->hasMany('Produto as Produtos', array(
            'local' => 'idcategoria',
            'foreign' => 'idproduto',
            'refClass' => 'ProdutoCategoriaRel'
        ));

        $this->hasMany('ProdutoCategoria as Subcategorias', array(
            'local' => 'id',
            'foreign' => 'idpai'
        ));

        $this->hasOne('ProdutoCategoria as CategoriaPai', array(
            'local' => 'idpai',
            'foreign' => 'id'
        ));
    }
}