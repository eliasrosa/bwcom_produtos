-- <? defined('BW') or die("Acesso negado!"); ?>


-- 
ALTER TABLE `bw_versao` ADD `com_produtos_1` INT(1) NOT NULL;


--
CREATE TABLE `bw_produtos` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`nome` varchar(255) NOT NULL,
`referencia` varchar(255) NULL,
`descricao` longtext,
`destaque` int(1) NOT NULL,  
`status` int(1) NOT NULL,
`metatagalias` varchar(255) NULL,
`metatagkeywords` varchar(255) NULL,
`metatagdescription` varchar(180) NULL,  
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


--
CREATE TABLE `bw_produtos_categorias` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`idpai` int(11) NOT NULL,
`ordem` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`descricao` longtext,
`status` int(1) NOT NULL,
`metatagalias` varchar(255) DEFAULT NULL,
`metatagkeywords` varchar(255) DEFAULT NULL,
`metatagdescription` varchar(180) DEFAULT NULL,
PRIMARY KEY (`id`),
KEY `index_idpai` (`idpai`,`ordem`,`nome`(10))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
CREATE TABLE `bw_produtos_categorias_rel` (
`idproduto` int(11) NOT NULL,
`idcategoria` int(11) NOT NULL,
UNIQUE KEY `indice` (`idproduto`,`idcategoria`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


--
CREATE TABLE `bw_produtos_imagens` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`idproduto` int(11) NOT NULL,
`alt` varchar(255) NOT NULL,
`title` varchar(255) NOT NULL,
`longdesc` longtext,
`ordem` int(1) NOT NULL,
`status` int(1) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


--
CREATE TABLE `bw_produtos_textos` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`idproduto` int(11) NOT NULL,
`titulo` varchar(255) NOT NULL,
`html` longtext,
`ordem` int(1) NOT NULL,
`status` int(1) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

