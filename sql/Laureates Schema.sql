CREATE TABLE IF NOT EXISTS `smetter`.`laureates`
(
    `id`              INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `firstname`       TEXT            NOT NULL,
    `surname`         TEXT            NULL,
    `born`            DATE            NOT NULL,
    `died`            DATE            NOT NULL,
    `bornCountry`     TEXT            NULL,
    `bornCountryCode` TEXT            NULL,
    `bornCity`        TEXT            NULL,
    `diedCountry`     TEXT            NULL,
    `diedCountryCode` TEXT            NULL,
    `diedCity`        TEXT            NULL,
    `gender`          TEXT            NULL,
    `deleted`         BOOLEAN         NOT NULL
);