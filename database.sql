use logocontest;
DROP TABLE IF EXISTS `matchups`;
DROP VIEW IF EXISTS `output`;
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
						 `ollieburn` int default 0 not null comment 'Votes for the OllieBurn award',
						 `paint` int default 0 not null comment 'Votes for the paint.exe award',
						 `animal` int default 0 not null comment 'Votes for the Animal award',
						 `staff` int default 0 not null comment 'Votes for the Staff Choice award',
                         PRIMARY KEY (`id`),
                         UNIQUE KEY `logos_name_uindex` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Replace with local file
LOAD DATA INFILE '/var/lib/mysql-files/GGS8 Teams.csv'
    into table logos
    fields terminated by ';'
    enclosed by '"'
    lines terminated by '\n'
    (`name`,region,division,active);




DROP TABLE IF EXISTS `matchups`;
CREATE TABLE `matchups` (
                            `id` varchar(20) NOT NULL,
                            `winner` int(11) NOT NULL,
                            `loser` int(11) NOT NULL,
                            `ip_hash` varchar(40) NOT NULL,
                            `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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

DROP TABLE IF EXISTS `ivoted`;
create table logocontest.ivoted(
   sessionid varchar(32) not null,
   timestamp int(10) not null,
   constraint ivoted_pk
       primary key (sessionid)
)
