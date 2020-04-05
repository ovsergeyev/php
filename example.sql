CREATE TABLE `gbphp`.`users` (
 `id` INT(11) NOT NULL AUTO_INCREMENT ,
 `fio` VARCHAR(150) NOT NULL DEFAULT 'N/O' ,
 `login` VARCHAR(20) NOT NULL ,
 `password` VARCHAR(64) NOT NULL ,
 `date` DATE NOT NULL ,
 PRIMARY KEY (`id`),
 INDEX (`login`)
 ) ENGINE = InnoDB;

INSERT INTO `users`
(`login`, `password`, `date`)
VALUES
('adminLog', '1123', '2020-03-24'),
('adminLog', '1123', '2020-03-24'),
('adminLog', '1123', '2020-03-24')
;

UPDATE
	`users`
SET
	`fio` = 'Светлана',
	`login` = 'admin',
	`password` = '123456',
	`date` = '2020-03-30'
WHERE `users`.`id` = 3;

DELETE FROM `users` WHERE `users`.`id` = 2