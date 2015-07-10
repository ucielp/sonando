--~ ALTER TABLE jugadores ADD deslinde INT NOT NULL AFTER certificado

--~ ALTER TABLE `partidos` ADD `team1_pen` INT NULL DEFAULT NULL AFTER `team2_res`, ADD `team2_pen` INT NULL DEFAULT NULL AFTER `team1_pen`;

ALTER TABLE `reglamento` ADD `group` INT NOT NULL AFTER `id`;

UPDATE `sonando_db`.`reglamento` SET `group` = '2' WHERE `reglamento`.`id` = 1; UPDATE `sonando_db`.`reglamento` SET `group` = '2' WHERE `reglamento`.`id` = 3; UPDATE `sonando_db`.`reglamento` SET `group` = '1' WHERE `reglamento`.`id` = 4; UPDATE `sonando_db`.`reglamento` SET `group` = '1' WHERE `reglamento`.`id` = 5; UPDATE `sonando_db`.`reglamento` SET `group` = '1' WHERE `reglamento`.`id` = 6;

--Category 'Por la C' modified as 'nodo'
UPDATE `sonando_db`.`category` SET `tipo` = 'nodo' WHERE `category`.`id` = 40;