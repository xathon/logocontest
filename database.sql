DROP TABLE IF EXISTS `logos`;
CREATE TABLE `logos` (
                         `id` int(11) NOT NULL AUTO_INCREMENT,
                         `name` varchar(64) NOT NULL,
                         `matchups` int(11) NOT NULL DEFAULT 0,
                         `won_matchups` int(11) NOT NULL DEFAULT 0,
                         `logo` mediumblob NOT NULL,
                         `region` varchar(2) NOT NULL DEFAULT 'EU',
                         `division` varchar(15) NOT NULL DEFAULT 'Unlimited',
                         PRIMARY KEY (`id`),
                         UNIQUE KEY `logos_name_uindex` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `matchups`;
CREATE TABLE `matchups` (
                            `id` varchar(20) NOT NULL,
                            `winner` int(11) NOT NULL,
                            `loser` int(11) NOT NULL,
                            `user` varchar(30) NOT NULL,
                            `time` datetime NOT NULL DEFAULT current_timestamp(),
                            PRIMARY KEY (`id`),
                            KEY `matchups_logos_id_fk` (`winner`),
                            KEY `matchups___fk2` (`loser`),
                            CONSTRAINT `matchups___fk` FOREIGN KEY (`winner`) REFERENCES `logos` (`id`) ON DELETE CASCADE,
                            CONSTRAINT `matchups___fk2` FOREIGN KEY (`loser`) REFERENCES `logos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `output`;
DROP VIEW IF EXISTS `output`;
create view output as
select *, (won_matchups/matchups) as won_ratio from logos order by won_ratio DESC;
