-- <? defined('BW') or die("Acesso negado!"); ?>


-- 
ALTER TABLE `bw_versao` CHANGE `com_produtos_1` `com_produtos_2` INT NOT NULL;


--
DROP TABLE `bw_produtos_imagens`, `bw_produtos_textos`;


--
