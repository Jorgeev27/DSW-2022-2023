DROP DATABASE IF EXISTS cds;
CREATE DATABASE cds DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
CREATE USER IF NOT EXISTS cds@localhost IDENTIFIED BY 'cds2022';
GRANT ALL ON cds.* TO 'cds'@'localhost';

use cds;

CREATE TABLE albums (
    id int(6) auto_increment,
    titulo varchar(40) NOT NULL,
    año int(4) NOT NULL,
    PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE canciones (
    id int(6) auto_increment,
    idAlbum int(6) NOT NULL,
    titulo VARCHAR(40) NOT NULL,
    duracion TIME NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(idAlbum) REFERENCES albums(id)
) ENGINE=InnoDB;

INSERT INTO albums VALUES
(1,"Nevermind",1991),
(2,"Demon Days",2005),
(3,"Goblin",2011),
(4,"Madvillainy",2004),
(5,"My Beautiful Dark Twisted Fantasy",2010),
(6,"Random Access Memories",2013),
(7,"Good Kid, M.A.A.d City",2012),
(8,"XX",2009),
(9,"The Suburbs",2010),
(10,"In Rainbows",2008);

INSERT INTO canciones VALUES
(null,1,"Smells Like Teen Spirit","00:05:01"),
(null,1,"In Bloom","00:04:14"),
(null,1,"Come As You Are","00:03:39"),
(null,1,"Breed","00:03:03"),
(null,1,"Lithium","00:04:17"),

(null,2,'Intro','00:01:03'),
(null,2,'Last Living Souls','00:03:10'),
(null,2,'Kids With Guns','00:04:31'),
(null,2,'O Green World','00:03:43'),
(null,2,'Dirty Harry','00:04:53'),

(null,3,'Goblin','00:04:11'),
(null,3,'Yonkers','00:07:18'),
(null,3,'Radicals','00:04:13'),
(null,3,'She','00:03:12'),
(null,3,'Transylvania','00:05:22'),

(null,4,'The Illest Villains','00:01:55'),
(null,4,'Accordion','00:01:58'),
(null,4,'Meat Grinder','00:02:11'),
(null,4,'Bistro','00:02:35'),
(null,4,'Raid','00:03:54'),

(null,5,'Dark Fantasy','00:04:40'),
(null,5,'Gorgeous','00:05:57'),
(null,5,'Power','00:04:52'),
(null,5,'All Of The Lights (Interlude)','00:01:02'),
(null,5,'All Of The Lights','00:04:59'),

(null,6,'Give Life Back To Music','00:04:35'),
(null,6,'The Game Of Love','00:05:22'),
(null,6,'Giorgio By Moroder','00:09:04'),
(null,6,'Within','00:03:48'),
(null,6,'Instant Crush','00:05:37'),

(null,7,'Sherane a.k.a Master Splinter’s Daughter','00:03:48'),
(null,7,'Bitch, Don’t Kill My Vibe','00:05:37'),
(null,7,'Backseat Freestyle','00:05:53'),
(null,7,'The Art Of Peer Pressure','00:08:18'),
(null,7,'Money Trees','00:06:09'),

(null,8,'Intro','00:02:08'),
(null,8,'VCR','00:02:57'),
(null,8,'Crystalised','00:02:41'),
(null,8,'Islands','00:04:02'),
(null,8,'Heart Skipped A Beat','00:03:34'),

(null,9,'The Suburbs','00:05:15'),
(null,9,'Ready To Start','00:04:16'),
(null,9,'Modern Man','00:04:40'),
(null,9,'Rococo','00:03:57'),
(null,9,'Empty Room','00:02:52'),

(null,10,'15 Step','00:03:57'),
(null,10,'Bodysnatchers','00:04:02'),
(null,10,'Nude','00:04:15'),
(null,10,'Weird Fishes/Arpeggi','00:05:18'),
(null,10,'All I Need','00:03:49');
