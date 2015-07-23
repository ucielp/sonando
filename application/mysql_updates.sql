--~ ALTER TABLE jugadores ADD deslinde INT NOT NULL AFTER certificado

--~ ALTER TABLE `partidos` ADD `team1_pen` INT NULL DEFAULT NULL AFTER `team2_res`, ADD `team2_pen` INT NULL DEFAULT NULL AFTER `team1_pen`;

ALTER TABLE `reglamento` ADD `group` INT NOT NULL AFTER `id`;

UPDATE `jforte_sonando_db`.`reglamento` SET `group` = '2' WHERE `reglamento`.`id` = 1; UPDATE `jforte_sonando_db`.`reglamento` SET `group` = '2' WHERE `reglamento`.`id` = 3; UPDATE `jforte_sonando_db`.`reglamento` SET `group` = '1' WHERE `reglamento`.`id` = 4; UPDATE `jforte_sonando_db`.`reglamento` SET `group` = '1' WHERE `reglamento`.`id` = 5; UPDATE `jforte_sonando_db`.`reglamento` SET `group` = '1' WHERE `reglamento`.`id` = 6;

--Category 'Por la C' modified as 'nodo'
UPDATE `jforte_sonando_db`.`category` SET `tipo` = 'nodo' WHERE `category`.`id` = 40;

--Agrego newsletter
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
