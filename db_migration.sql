alter table logocontest.logos
    add ollieburn int default 0 not null comment 'Votes for the OllieBurn award',
    add paint int default 0 not null comment 'Votes for the paint.exe award',
    add animal int default 0 not null comment 'Votes for the Animal award',
    add staff int default 0 not null comment 'Votes for the Staff Choice award';

create table logocontest.ivoted(
   sessionid varchar(32) not null,
   timestamp int(10) not null,
   constraint ivoted_pk
       primary key (sessionid)
)
