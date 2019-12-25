CREATE TABLE IF NOT EXISTS `smetter`.`affiliations`
(
    `id`                    INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name`                  VARCHAR(100)    NULL,
    `city`                  VARCHAR(100)    NULL,
    `country`               VARCHAR(100)    NULL,
    `laureate_id`           INT             NOT NULL,
    `laureate_prize_number` INT             NOT NULL,
    FOREIGN KEY (`laureate_id`) REFERENCES `smetter`.`laureates` (`id`)
);