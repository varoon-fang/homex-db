#
# TABLE STRUCTURE FOR: admin
#

DROP TABLE IF EXISTS admin;

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `admin_status` enum('yes','no') NOT NULL DEFAULT 'no',
  `admin_type` enum('admin','user') NOT NULL DEFAULT 'user',
  `product` enum('yes','no') DEFAULT 'no',
  `promotion` enum('yes','no') DEFAULT 'no',
  `news` enum('yes','no') DEFAULT 'no',
  `jobs` enum('yes','no') DEFAULT 'no',
  `knowledge` enum('yes','no') DEFAULT 'no',
  `banner` enum('yes','no') DEFAULT 'no',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO admin (`admin_id`, `admin_user`, `admin_pass`, `admin_email`, `admin_status`, `admin_type`, `product`, `promotion`, `news`, `jobs`, `knowledge`, `banner`) VALUES (1, 'fang', '827ccb0eea8a706c4c34a16891f84e7b', 'fang@rgb7.com', 'yes', 'admin', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes');
INSERT INTO admin (`admin_id`, `admin_user`, `admin_pass`, `admin_email`, `admin_status`, `admin_type`, `product`, `promotion`, `news`, `jobs`, `knowledge`, `banner`) VALUES (6, 'varoon', '827ccb0eea8a706c4c34a16891f84e7b', 'fang@rgb7.com', 'yes', 'user', 'no', 'no', 'yes', 'yes', 'yes', 'no');
INSERT INTO admin (`admin_id`, `admin_user`, `admin_pass`, `admin_email`, `admin_status`, `admin_type`, `product`, `promotion`, `news`, `jobs`, `knowledge`, `banner`) VALUES (7, 'admin1', '827ccb0eea8a706c4c34a16891f84e7b', 'admin1@mail.com', 'yes', 'user', 'no', 'yes', 'no', 'no', 'yes', 'no');


#
# TABLE STRUCTURE FOR: banner
#

DROP TABLE IF EXISTS banner;

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_name` varchar(255) NOT NULL,
  `banner_num` int(5) NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO banner (`banner_id`, `banner_name`, `banner_num`) VALUES (12, '11379916923.jpg', 1);
INSERT INTO banner (`banner_id`, `banner_name`, `banner_num`) VALUES (13, '21379916923.jpg', 2);
INSERT INTO banner (`banner_id`, `banner_name`, `banner_num`) VALUES (14, '31379916923.jpg', 3);


#
# TABLE STRUCTURE FOR: jobs
#

DROP TABLE IF EXISTS jobs;

CREATE TABLE `jobs` (
  `jobs_id` int(11) NOT NULL AUTO_INCREMENT,
  `jobs_name` varchar(255) NOT NULL,
  `jobs_detail` text NOT NULL,
  `jobs_ability` text NOT NULL,
  `jobs_expert` varchar(150) DEFAULT NULL,
  `jobs_education` varchar(150) DEFAULT NULL,
  `jobs_amount` varchar(150) DEFAULT NULL,
  `jobs_date_end` varchar(150) DEFAULT NULL,
  `jobs_date` datetime NOT NULL,
  PRIMARY KEY (`jobs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO jobs (`jobs_id`, `jobs_name`, `jobs_detail`, `jobs_ability`, `jobs_expert`, `jobs_education`, `jobs_amount`, `jobs_date_end`, `jobs_date`) VALUES (1, 'ช่างสำรวจ', '<p>Nulla vitae elit libero, a pharetra augue. Etiam porta sem malesuada magna mollis euismod. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Etiam porta sem malesuada magna mollis euismod. Sed posuere consectetur est at lobortis.</p>\n', '<p>Nulla vitae elit libero, a pharetra augue. Etiam porta sem malesuada magna mollis euismod. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Etiam porta sem malesuada magna mollis euismod. Sed posuere consectetur est at lobortis.</p>\n', '2 ปี', 'ปริญญาตรี', '2', '2013-09-11', '2013-09-07 16:38:03');
INSERT INTO jobs (`jobs_id`, `jobs_name`, `jobs_detail`, `jobs_ability`, `jobs_expert`, `jobs_education`, `jobs_amount`, `jobs_date_end`, `jobs_date`) VALUES (2, 'พนักงานทั่วไป', '<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas sed diam eget risus varius blandit sit amet non magna. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>\n\n<p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue. Donec sed odio dui. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum. Maecenas faucibus mollis interdum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>\n', '<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Nulla vitae elit libero, a pharetra augue. Maecenas faucibus mollis interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>\n', 'ไม่จำกัด', 'ไม่ระบุ', '3', '2013-09-30', '2013-09-26 23:24:29');


#
# TABLE STRUCTURE FOR: knowledge
#

DROP TABLE IF EXISTS knowledge;

CREATE TABLE `knowledge` (
  `knowledge_id` int(11) NOT NULL AUTO_INCREMENT,
  `knowledge_title` varchar(255) DEFAULT NULL,
  `knowledge_detail` text,
  `knowledge_img` varchar(255) DEFAULT NULL,
  `knowledge_date` datetime DEFAULT NULL,
  PRIMARY KEY (`knowledge_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO knowledge (`knowledge_id`, `knowledge_title`, `knowledge_detail`, `knowledge_img`, `knowledge_date`) VALUES (6, 'Commodo Egestas Tellus', '<p>Maecenas sed diam eget risus varius blandit sit amet non magna. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Curabitur blandit tempus porttitor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>\n', '1380218508.JPG', '2013-09-09 16:56:12');
INSERT INTO knowledge (`knowledge_id`, `knowledge_title`, `knowledge_detail`, `knowledge_img`, `knowledge_date`) VALUES (7, 'Morbi leo', '<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus.</p>\n', '1380005636.jpg', '2013-09-23 13:31:03');


#
# TABLE STRUCTURE FOR: logfile
#

DROP TABLE IF EXISTS logfile;

CREATE TABLE `logfile` (
  `log_activity` varchar(255) NOT NULL,
  `log_detail` text NOT NULL,
  `log_ip` varchar(150) NOT NULL,
  `log_date` datetime NOT NULL,
  `log_member` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378195405', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-03 15:03:25', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378195603', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-03 15:06:43', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378196255', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-03 15:17:35', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378196417', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-03 15:20:17', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378196485', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-03 15:21:25', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378196526', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-03 15:22:06', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378196577', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-03 15:22:57', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378262984', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-04 09:49:44', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378275442', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-04 13:17:22', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378286912', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-04 16:28:32', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378286935', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-04 16:28:55', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378536594', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-07 13:49:54', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378719559', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-09 16:39:19', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378722832', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-09 17:33:52', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378722877', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-09 17:34:37', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378725536', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.62 Safari/537.36', '::1', '2013-09-09 18:18:56', 'varoon');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378725638', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.62 Safari/537.36', '::1', '2013-09-09 18:20:38', 'varoon');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378725747', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.62 Safari/537.36', '::1', '2013-09-09 18:22:27', 'varoon');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378740896', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-09 22:34:56', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378744352', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-09 23:32:32', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378786889', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-10 11:21:29', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378786921', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-10 11:22:01', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378787869', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-10 11:37:49', 'varoon');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378788101', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-10 11:41:41', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378788153', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.62 Safari/537.36', '::1', '2013-09-10 11:42:33', 'admin1');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378788176', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.62 Safari/537.36', '::1', '2013-09-10 11:42:56', 'admin1');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378788661', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.62 Safari/537.36', '::1', '2013-09-10 11:51:01', 'admin1');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378788677', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.62 Safari/537.36', '::1', '2013-09-10 11:51:17', 'admin1');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378788708', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.62 Safari/537.36', '::1', '2013-09-10 11:51:48', 'admin1');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378904241', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-11 19:57:21', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378977112', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-12 16:11:52', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378978492', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-12 16:34:52', 'admin1');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378978712', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-12 16:38:32', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1379059865', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-13 15:11:05', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1379150491', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-14 16:21:31', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1379151333', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-14 16:35:33', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1379251426', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-15 20:23:46', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1379911020', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-23 11:37:00', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1380005483', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-24 13:51:23', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1380036587', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-24 22:29:47', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1380179692', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-26 14:14:52', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1380212612', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-26 23:23:32', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1380274382', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-27 16:33:02', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1380361784', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-28 16:49:44', 'fang');


#
# TABLE STRUCTURE FOR: news
#

DROP TABLE IF EXISTS news;

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) NOT NULL,
  `news_detail` text NOT NULL,
  `news_date` datetime NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO news (`news_id`, `news_title`, `news_detail`, `news_date`) VALUES (1, 'Etiam porta sem malesuada magna mollis euismod. ', '<p>Etiam porta sem malesuada magna mollis euismod. Vestibulum id ligula porta felis euismod semper. Donec sed odio dui. Cras mattis consectetur purus sit amet fermentum. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>\n\n<p>Donec ullamcorper nulla non metus auctor fringilla. Donec sed odio dui. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Maecenas faucibus mollis interdum. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>\n', '2013-09-23 13:50:50');
INSERT INTO news (`news_id`, `news_title`, `news_detail`, `news_date`) VALUES (2, 'Fringilla Justo', '<p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Etiam porta sem malesuada magna mollis euismod. Nullam quis risus eget urna mollis ornare vel eu leo. Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>\n', '2013-09-23 15:05:41');
INSERT INTO news (`news_id`, `news_title`, `news_detail`, `news_date`) VALUES (3, 'Ornare Parturient', '<p>Etiam porta sem malesuada magna mollis euismod. Donec ullamcorper nulla non metus auctor fringilla. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras mattis consectetur purus sit amet fermentum. Nulla vitae elit libero, a pharetra augue.</p>\n', '2013-09-24 22:30:12');
INSERT INTO news (`news_id`, `news_title`, `news_detail`, `news_date`) VALUES (4, 'Tristique Ultricies Etiam', '<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nullam id dolor id nibh ultricies vehicula ut id elit. Vestibulum id ligula porta felis euismod semper. Donec id elit non mi porta gravida at eget metus. Cras mattis consectetur purus sit amet fermentum.</p>\n\n<p>Donec id elit non mi porta gravida at eget metus. Donec id elit non mi porta gravida at eget metus. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Etiam porta sem malesuada magna mollis euismod. Sed posuere consectetur est at lobortis.</p>\n', '2013-09-26 14:45:38');


#
# TABLE STRUCTURE FOR: news_album
#

DROP TABLE IF EXISTS news_album;

CREATE TABLE `news_album` (
  `news_album_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `news_album_name` varchar(255) NOT NULL,
  `news_album_num` int(5) NOT NULL,
  PRIMARY KEY (`news_album_id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (62, 2, '01380179772.jpg', 1);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (63, 2, '11380179773.jpg', 2);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (64, 2, '21380179773.jpg', 3);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (65, 2, '31380179774.jpg', 4);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (66, 2, '41380179774.jpg', 5);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (67, 3, '01380179809.jpg', 1);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (68, 3, '11380179810.jpg', 2);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (69, 3, '21380179811.JPG', 3);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (70, 3, '31380179811.jpg', 4);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (71, 3, '41380179811.jpg', 5);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (72, 4, '11380181538.jpg', 2);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (73, 4, '31380181538.jpg', 4);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (74, 4, '51380181539.jpg', 6);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (75, 4, '71380181540.jpg', 8);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (76, 4, '91380181540.jpg', 10);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (77, 4, '111380181541.jpg', 12);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (78, 4, '131380181541.jpg', 14);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (79, 4, '151380181542.jpg', 16);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (80, 4, '171380181543.jpg', 18);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (81, 4, '191380181543.jpg', 20);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (82, 4, '211380181544.jpg', 22);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (83, 1, '01380217830.jpg', 1);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (84, 1, '11380217830.jpg', 2);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (85, 1, '21380217831.jpg', 3);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (86, 1, '31380217831.jpg', 4);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (87, 1, '41380217832.jpg', 5);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (88, 1, '51380217833.JPG', 6);
INSERT INTO news_album (`news_album_id`, `news_id`, `news_album_name`, `news_album_num`) VALUES (89, 1, '61380217833.jpg', 7);


#
# TABLE STRUCTURE FOR: product
#

DROP TABLE IF EXISTS product;

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_group` int(8) NOT NULL,
  `product_sub` int(8) NOT NULL,
  `product_codename` varchar(150) DEFAULT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_detail` text NOT NULL,
  `product_price` varchar(150) DEFAULT NULL,
  `product_type` varchar(150) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_date` datetime DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

INSERT INTO product (`product_id`, `product_group`, `product_sub`, `product_codename`, `product_title`, `product_detail`, `product_price`, `product_type`, `product_img`, `product_date`) VALUES (4, 1, 1, 'T-1000', 'อ่างจากูดซี่', '<p>Sed posuere consectetur est at lobortis. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>\n', '35,000', 'สินค้าใหม่', '1379911605.jpg', '2013-09-15 23:22:31');
INSERT INTO product (`product_id`, `product_group`, `product_sub`, `product_codename`, `product_title`, `product_detail`, `product_price`, `product_type`, `product_img`, `product_date`) VALUES (5, 1, 1, 'T-1001', 'Mattis', '<p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nullam id dolor id nibh ultricies vehicula ut id elit. Donec sed odio dui.</p>\n', '27,000', 'สินค้าใหม่', '1379933812.jpg', '2013-09-23 13:04:08');
INSERT INTO product (`product_id`, `product_group`, `product_sub`, `product_codename`, `product_title`, `product_detail`, `product_price`, `product_type`, `product_img`, `product_date`) VALUES (6, 1, 1, 'T-1002', 'Ridiculus', '<p>Cras mattis consectetur purus sit amet fermentum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur blandit tempus porttitor.</p>\n', '45,000', 'สินค้าแนะนำ', '1379916300.jpg', '2013-09-23 13:05:00');
INSERT INTO product (`product_id`, `product_group`, `product_sub`, `product_codename`, `product_title`, `product_detail`, `product_price`, `product_type`, `product_img`, `product_date`) VALUES (7, 24, 7, 'K-1000', 'Duis', '<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Aenean lacinia bibendum nulla sed consectetur. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\n', '35', 'สินค้าใหม่', '1379916348.jpg', '2013-09-23 13:05:48');
INSERT INTO product (`product_id`, `product_group`, `product_sub`, `product_codename`, `product_title`, `product_detail`, `product_price`, `product_type`, `product_img`, `product_date`) VALUES (8, 24, 7, 'K-1001', 'Tristique Bibendum', '<p>Nullam quis risus eget urna mollis ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit. Nulla vitae elit libero, a pharetra augue. Donec sed odio dui.</p>\n', '35', 'สินค้าขายดี', '1379916380.jpg', '2013-09-23 13:06:20');
INSERT INTO product (`product_id`, `product_group`, `product_sub`, `product_codename`, `product_title`, `product_detail`, `product_price`, `product_type`, `product_img`, `product_date`) VALUES (9, 24, 8, 'K-1002', 'Morbi leo risus', '<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nullam quis risus eget urna mollis ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit. Aenean lacinia bibendum nulla sed consectetur.</p>\n', '45', 'สินค้าใหม่', '1379916422.jpg', '2013-09-23 13:07:03');
INSERT INTO product (`product_id`, `product_group`, `product_sub`, `product_codename`, `product_title`, `product_detail`, `product_price`, `product_type`, `product_img`, `product_date`) VALUES (10, 24, 8, 'K-1003', 'Dapibus posuere', '<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Sed posuere consectetur est at lobortis. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>\n', '45', 'สินค้าใหม่', '1379916465.jpg', '2013-09-23 13:07:45');
INSERT INTO product (`product_id`, `product_group`, `product_sub`, `product_codename`, `product_title`, `product_detail`, `product_price`, `product_type`, `product_img`, `product_date`) VALUES (11, 1, 5, 'C-1000', 'Maecenas sed diam eget risus varius', '<p>Maecenas sed diam eget risus varius blandit sit amet non magna. Sed posuere consectetur est at lobortis. Maecenas faucibus mollis interdum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur blandit tempus porttitor.</p>\n', '14,555', 'สินค้าขายดี', '1379930884.jpg', '2013-09-23 17:08:04');
INSERT INTO product (`product_id`, `product_group`, `product_sub`, `product_codename`, `product_title`, `product_detail`, `product_price`, `product_type`, `product_img`, `product_date`) VALUES (12, 1, 5, 'C-1001', 'Cras justo odio', '<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula ut id elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>\n', '23,455', 'สินค้าขายดี', '1379930916.jpg', '2013-09-23 17:08:36');
INSERT INTO product (`product_id`, `product_group`, `product_sub`, `product_codename`, `product_title`, `product_detail`, `product_price`, `product_type`, `product_img`, `product_date`) VALUES (13, 1, 5, 'C-1002', 'Morbi leo risus porta ac consectetur', '<p>Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Nullam quis risus eget urna mollis ornare vel eu leo. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\n\n<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Nulla vitae elit libero, a pharetra augue. Maecenas sed diam eget risus varius blandit sit amet non magna. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>\n', '32,455', 'สินค้าขายดี', '1379930945.jpg', '2013-09-23 17:09:05');
INSERT INTO product (`product_id`, `product_group`, `product_sub`, `product_codename`, `product_title`, `product_detail`, `product_price`, `product_type`, `product_img`, `product_date`) VALUES (14, 1, 6, 'F-1000', 'Vivamus sagittis lacus', '<p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec sed odio dui. Curabitur blandit tempus porttitor. Vestibulum id ligula porta felis euismod semper. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>\n', '3,500', 'สินค้าขายดี', '1379930980.jpg', '2013-09-23 17:09:41');
INSERT INTO product (`product_id`, `product_group`, `product_sub`, `product_codename`, `product_title`, `product_detail`, `product_price`, `product_type`, `product_img`, `product_date`) VALUES (15, 1, 6, 'F-1001', 'Pharetra augue', '<p>Nulla vitae elit libero, a pharetra augue. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>\n\n<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Maecenas faucibus mollis interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>\n', '4,599', 'สินค้าขายดี', '1379931015.jpg', '2013-09-23 17:10:15');
INSERT INTO product (`product_id`, `product_group`, `product_sub`, `product_codename`, `product_title`, `product_detail`, `product_price`, `product_type`, `product_img`, `product_date`) VALUES (16, 1, 6, 'F-1002', 'Tortor Quam Condimentum', '<p>Etiam porta sem malesuada magna mollis euismod. Cras mattis consectetur purus sit amet fermentum. Curabitur blandit tempus porttitor. Vestibulum id ligula porta felis euismod semper.</p>\n', '5,900', 'สินค้าขายดี', '1379931197.jpg', '2013-09-23 17:13:17');
INSERT INTO product (`product_id`, `product_group`, `product_sub`, `product_codename`, `product_title`, `product_detail`, `product_price`, `product_type`, `product_img`, `product_date`) VALUES (17, 1, 6, 'F-1003', 'Dapibus Egestas', '<p>Etiam porta sem malesuada magna mollis euismod. Cras mattis consectetur purus sit amet fermentum. Curabitur blandit tempus porttitor. Vestibulum id ligula porta felis euismod semper. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>\n', '5,900', 'สินค้าขายดี', '1379931454.jpg', '2013-09-23 17:14:23');
INSERT INTO product (`product_id`, `product_group`, `product_sub`, `product_codename`, `product_title`, `product_detail`, `product_price`, `product_type`, `product_img`, `product_date`) VALUES (18, 1, 6, 'F-1004', 'Duis mollis, est non commodo', '<p>Donec id elit non mi porta gravida at eget metus. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Etiam porta sem malesuada magna mollis euismod. Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit sit amet non magna. Aenean lacinia bibendum nulla sed consectetur.</p>\n\n<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Maecenas sed diam eget risus varius blandit sit amet non magna. Nullam quis risus eget urna mollis ornare vel eu leo. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>\n', '6,700', 'สินค้าใหม่', '1379931583.jpg', '2013-09-23 17:19:43');
INSERT INTO product (`product_id`, `product_group`, `product_sub`, `product_codename`, `product_title`, `product_detail`, `product_price`, `product_type`, `product_img`, `product_date`) VALUES (19, 1, 1, 'T-1003', 'Vestibulum', '<p>Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id ligula porta felis euismod semper. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>\n', '123,500', '0', '1380009298.jpg', '2013-09-23 17:22:04');
INSERT INTO product (`product_id`, `product_group`, `product_sub`, `product_codename`, `product_title`, `product_detail`, `product_price`, `product_type`, `product_img`, `product_date`) VALUES (20, 1, 1, 'T-1004', 'Vestibulum', '<p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla. Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Maecenas sed diam eget risus varius blandit sit amet non magna. Nullam quis risus eget urna mollis ornare vel eu leo.</p>\n\n<p>Maecenas sed diam eget risus varius blandit sit amet non magna. Nullam quis risus eget urna mollis ornare vel eu leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur blandit tempus porttitor.</p>\n', '123,500', '0', '1379931854.jpg', '2013-09-23 17:24:14');
INSERT INTO product (`product_id`, `product_group`, `product_sub`, `product_codename`, `product_title`, `product_detail`, `product_price`, `product_type`, `product_img`, `product_date`) VALUES (21, 1, 5, 'C-1005', 'Aenean lacinia bibendum', '<p>Aenean lacinia bibendum nulla sed consectetur. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>\n', '45,999', '0', '1380010303.jpg', '2013-09-24 15:11:43');
INSERT INTO product (`product_id`, `product_group`, `product_sub`, `product_codename`, `product_title`, `product_detail`, `product_price`, `product_type`, `product_img`, `product_date`) VALUES (22, 1, 5, 'C-1004', 'Maecenas sed diam', '<p>Donec sed odio dui. Donec id elit non mi porta gravida at eget metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras mattis consectetur purus sit amet fermentum. Etiam porta sem malesuada magna mollis euismod. Donec id elit non mi porta gravida at eget metus.</p>\n\n<p>Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas sed diam eget risus varius blandit sit amet non magna. Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>\n', '23,555', 'สินค้าขายดี', '1380010382.jpg', '2013-09-24 15:13:03');
INSERT INTO product (`product_id`, `product_group`, `product_sub`, `product_codename`, `product_title`, `product_detail`, `product_price`, `product_type`, `product_img`, `product_date`) VALUES (23, 1, 5, 'C-1006', 'Pharetra augue', '<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Nullam quis risus eget urna mollis ornare vel eu leo. Nulla vitae elit libero, a pharetra augue. Maecenas faucibus mollis interdum. Maecenas sed diam eget risus varius blandit sit amet non magna. Aenean lacinia bibendum nulla sed consectetur.</p>\n\n<p>Vestibulum id ligula porta felis euismod semper. Nullam quis risus eget urna mollis ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit. Donec sed odio dui. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\n', '29,000', '0', '1380010420.jpg', '2013-09-24 15:13:40');
INSERT INTO product (`product_id`, `product_group`, `product_sub`, `product_codename`, `product_title`, `product_detail`, `product_price`, `product_type`, `product_img`, `product_date`) VALUES (24, 1, 5, 'C-1003', 'Integer posuere', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed diam eget risus varius blandit sit amet non magna. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>\n\n<p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ullamcorper nulla non metus auctor fringilla. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>\n\n<p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Maecenas faucibus mollis interdum. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna. Nullam quis risus eget urna mollis ornare vel eu leo. Nullam quis risus eget urna mollis ornare vel eu leo.</p>\n', '9,000', 'สินค้าแนะนำ', '1380010502.jpg', '2013-09-24 15:15:02');
INSERT INTO product (`product_id`, `product_group`, `product_sub`, `product_codename`, `product_title`, `product_detail`, `product_price`, `product_type`, `product_img`, `product_date`) VALUES (25, 1, 5, 'C-1007', 'Sed posuere', '<p>Vestibulum id ligula porta felis euismod semper. Nullam id dolor id nibh ultricies vehicula ut id elit. Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>\n\n<p>Nulla vitae elit libero, a pharetra augue. Maecenas faucibus mollis interdum. Cras mattis consectetur purus sit amet fermentum. Curabitur blandit tempus porttitor.</p>\n\n<p>Nullam id dolor id nibh ultricies vehicula ut id elit. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nullam id dolor id nibh ultricies vehicula ut id elit. Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>\n', '13,450', 'สินค้าขายดี', '1380010564.jpg', '2013-09-24 15:16:04');


#
# TABLE STRUCTURE FOR: product_group
#

DROP TABLE IF EXISTS product_group;

CREATE TABLE `product_group` (
  `product_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_group_name` varchar(255) NOT NULL,
  PRIMARY KEY (`product_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

INSERT INTO product_group (`product_group_id`, `product_group_name`) VALUES (1, 'สุขภัณฑ์และอุปกรณ์ห้องน้ำ');
INSERT INTO product_group (`product_group_id`, `product_group_name`) VALUES (24, 'ผลิตภัณฑ์กระเบื้องและหลังคา');


#
# TABLE STRUCTURE FOR: product_sub
#

DROP TABLE IF EXISTS product_sub;

CREATE TABLE `product_sub` (
  `product_sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_group` int(11) DEFAULT NULL,
  `product_sub_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`product_sub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO product_sub (`product_sub_id`, `product_group`, `product_sub_name`) VALUES (1, 1, 'อ่างอาบน้ำ');
INSERT INTO product_sub (`product_sub_id`, `product_group`, `product_sub_name`) VALUES (5, 1, 'โถสุขภัณฑ์');
INSERT INTO product_sub (`product_sub_id`, `product_group`, `product_sub_name`) VALUES (6, 1, 'อ่างล้างหน้า');
INSERT INTO product_sub (`product_sub_id`, `product_group`, `product_sub_name`) VALUES (7, 24, 'กระเบื้องหลังคา แบบลอน');
INSERT INTO product_sub (`product_sub_id`, `product_group`, `product_sub_name`) VALUES (8, 24, 'กระเบื้องหลังคา แบบเรียบ');


#
# TABLE STRUCTURE FOR: promotion
#

DROP TABLE IF EXISTS promotion;

CREATE TABLE `promotion` (
  `promotion_id` int(11) NOT NULL AUTO_INCREMENT,
  `promotion_title` varchar(255) NOT NULL,
  `promotion_detail` text NOT NULL,
  `promotion_img` varchar(255) DEFAULT NULL,
  `promotion_pdf` varchar(255) NOT NULL,
  `promotion_date` datetime NOT NULL,
  PRIMARY KEY (`promotion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO promotion (`promotion_id`, `promotion_title`, `promotion_detail`, `promotion_img`, `promotion_pdf`, `promotion_date`) VALUES (1, 'Vestibulum Dolor', '<p>Donec ullamcorper nulla non metus auctor fringilla. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\n', 'c365ffeb117286a0d809b58c36f54a0e.png', '161a3eeadd2a6aff2a3d5609c07e6afd.pdf', '2013-09-23 16:15:22');


#
# TABLE STRUCTURE FOR: textmove
#

DROP TABLE IF EXISTS textmove;

CREATE TABLE `textmove` (
  `text_id` int(11) NOT NULL AUTO_INCREMENT,
  `text_title` text NOT NULL,
  `text_date` datetime NOT NULL,
  PRIMARY KEY (`text_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

