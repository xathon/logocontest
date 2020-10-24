DROP TABLE IF EXISTS `logos`;
CREATE TABLE `logos` (
                         `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'EHE Unique ID',
                         `name` varchar(64) NOT NULL COMMENT 'teamname for logo',
                         `matchups` int(11) NOT NULL DEFAULT 0 COMMENT 'How many times has this logo been up for voting?',
                         `won_matchups` int(11) NOT NULL DEFAULT 0 COMMENT 'How many votes has this logo won?',
                         `region` varchar(2) NOT NULL DEFAULT 'EU' COMMENT 'Team Region (EU or NA)',
                         `division` varchar(15) NOT NULL DEFAULT 'Unlimited' COMMENT 'Team Division',
                         `active` boolean NOT NULL DEFAULT TRUE COMMENT 'Do we want to show this logo?',
                         `updated` int(9) NOT NULL DEFAULT 0 COMMENT 'handy bit to know if we have changed this value at any time',
                         PRIMARY KEY (`id`),
                         UNIQUE KEY `logos_name_uindex` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Replace with local file
LOAD DATA INFILE 'c:\Production\GG S6 Teams.csv'
    into table logos
    fields terminated by ';'
    enclosed by '"'
    lines terminated by '\n';




DROP TABLE IF EXISTS `matchups`;
CREATE TABLE `matchups` (
                            `id` varchar(20) NOT NULL,
                            `winner` int(11) NOT NULL,
                            `loser` int(11) NOT NULL,
                            `ip_hash` varchar(40) NOT NULL,
                            `time` int(10) NOT NULL DEFAULT UNIX_TIMESTAMP(),
                            PRIMARY KEY (`id`),
                            KEY `matchups_logos_id_fk` (`winner`),
                            KEY `matchups___fk2` (`loser`),
                            CONSTRAINT `matchups___fk` FOREIGN KEY (`winner`) REFERENCES `logos` (`id`) ON DELETE CASCADE,
                            CONSTRAINT `matchups___fk2` FOREIGN KEY (`loser`) REFERENCES `logos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `output`;
DROP VIEW IF EXISTS `output`;
create view output as
select *,(won_matchups/matchups) as won_ratio from logos where active > 0 order by won_ratio DESC,matchups DESC;
