CREATE TABLE IF NOT EXISTS `smetter`.`affiliations`
(
    `id`                    INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name`                  TEXT            NULL,
    `city`                  TEXT            NULL,
    `country`               TEXT            NULL,
    `laureate_id`           INT             NOT NULL,
    `laureate_prize_number` INT             NOT NULL,
    `deleted`               BOOLEAN         NOT NULL ,
    FOREIGN KEY (`laureate_id`) REFERENCES `smetter`.`laureates` (`id`)
);