alter table artist add column (picture varchar(100));
alter table campaign add column (picture varchar(100));
alter table campaign add column (round int);
alter table campaign add column (active int);
alter table campaign add column (campaign_id int);


CREATE TABLE IF NOT EXISTS `vote` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `artist_id` int(100) NOT NULL,
  `campaign_id` int(100) NOT NULL,
  `round` int(1),
  `ip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;