CREATE TABLE `prefix_topic_view` (
  `topic_id` int(11) unsigned NOT NULL,
  `topic_count_read` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
