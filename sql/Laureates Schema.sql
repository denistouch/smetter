CREATE TABLE IF NOT EXISTS `smetter`.`laureates`
(
    `id`              INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `firstname`       VARCHAR(100)    NOT NULL,
    `surname`         VARCHAR(100)    NOT NULL,
    `born`            DATE            NOT NULL,
    `died`            DATE            NOT NULL,
    `bornCountry`     VARCHAR(100)    NULL,
    `bornCountryCode` VARCHAR(10)     NULL,
    `bornCity`        VARCHAR(100)    NULL,
    `diedCountry`     VARCHAR(100)    NULL,
    `diedCountryCode` VARCHAR(10)     NULL,
    `diedCity`        VARCHAR(100)    NULL,
    `gender`          VARCHAR(100)    NULL
);