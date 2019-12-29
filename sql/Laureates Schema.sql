CREATE TABLE IF NOT EXISTS `smetter`.`laureates`
(
    `id`              INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `firstname`       VARCHAR(200)    NOT NULL,
    `surname`         VARCHAR(200)    NOT NULL,
    `born`            DATE            NOT NULL,
    `died`            DATE            NOT NULL,
    `bornCountry`     VARCHAR(200)    NULL,
    `bornCountryCode` VARCHAR(10)     NULL,
    `bornCity`        VARCHAR(200)    NULL,
    `diedCountry`     VARCHAR(200)    NULL,
    `diedCountryCode` VARCHAR(10)     NULL,
    `diedCity`        VARCHAR(200)    NULL,
    `gender`          VARCHAR(200)    NULL
);