CREATE TABLE IF NOT EXISTS `smetter`.`prizes`
(
    `id`                    INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `year`                  YEAR            NOT NULL,
    `category`              VARCHAR(100)    NULL,
    `share`                 INT             NOT NULL,
    `motivation`            TEXT            NULL,
    `laureate_id`           INT             NOT NULL,
    `laureate_prize_number` INT             NOT NULL,
    FOREIGN KEY (`laureate_id`) REFERENCES `smetter`.`laureates` (`id`)
);