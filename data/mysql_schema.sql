CREATE TABLE IF NOT EXISTS `content_category` (
  `content_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`content_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `content_post` (
  `content_post_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_category_id` int(11) NOT NULL,
  `post_title` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `post_body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`content_post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `content_post`
  ADD CONSTRAINT `fk_content_category` FOREIGN KEY (`content_category_id`) REFERENCES `content_category` (`content_category_id`);
