


CREATE TABLE `access_log` (
  `count` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `activity` varchar(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`count`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;


INSERT INTO access_log VALUES
("1","era","login error","2019-09-06 11:49:18"),
("2","admin","login","2019-09-06 11:49:50"),
("3","omar","login error","2019-09-06 11:59:16"),
("4","admin","no logout","2019-09-06 12:01:43"),
("5","admin","clear user","2019-09-06 12:01:52"),
("6","admin","login","2019-09-06 12:02:03"),
("7","admin","clear user","2019-09-06 12:02:03"),
("8","admin","logout","2019-09-06 13:38:40"),
("9","admin","login","2019-09-06 13:38:46"),
("10","admin","logout","2019-09-06 13:41:17"),
("11","admin","login","2019-09-06 13:41:40"),
("12","admin","logout","2019-09-06 13:42:44"),
("13","admin","login","2019-09-06 13:42:48"),
("14","admin","logout","2019-09-06 13:43:18"),
("15","admin","login","2019-09-06 13:43:29"),
("16","admin","logout","2019-09-06 14:12:40"),
("17","admin","login","2019-09-06 14:14:25"),
("18","admin","logout","2019-09-06 14:43:05"),
("19","omar","login","2019-09-06 14:43:10"),
("20","omar","logout","2019-09-06 14:56:57"),
("21","omar","login","2019-09-06 14:57:02"),
("22","omar","logout","2019-09-06 15:06:35"),
("23","omar","login","2019-09-06 15:06:38"),
("24","omar","logout","2019-09-06 15:27:54"),
("25","omar","login","2019-09-06 15:27:59"),
("26","omar","logout","2019-09-06 17:22:19"),
("27","omar","login","2019-09-07 09:01:00"),
("28","omar","logout","2019-09-07 09:01:33"),
("29","omar","login","2019-09-07 09:01:43"),
("30","omar","logout","2019-09-07 09:03:05"),
("31","omar","login","2019-09-07 09:03:10"),
("32","omar","logout","2019-09-07 10:29:19"),
("33","omar","login","2019-09-07 10:38:55"),
("34","omar","logout","2019-09-07 17:34:41"),
("35","omar","login","2019-09-09 08:41:35"),
("36","omar","logout","2019-09-09 08:41:54"),
("37","omar","login","2019-09-09 08:43:44"),
("38","omar","logout","2019-09-09 09:02:22"),
("39","omar","login","2019-09-09 09:02:26"),
("40","omar","logout","2019-09-09 09:04:22"),
("41","omar","login","2019-09-09 09:10:04"),
("42","omar","logout","2019-09-09 09:14:15"),
("43","omar","login","2019-09-09 09:14:35"),
("44","omar","logout","2019-09-09 09:21:22"),
("45","omar","login","2019-09-09 09:31:10"),
("46","omar","logout","2019-09-09 10:30:35"),
("47","omar","login","2019-09-09 10:30:40"),
("48","omar","logout","2019-09-09 11:59:52"),
("49","omar","login","2019-09-09 11:59:57"),
("50","omar","logout","2019-09-09 12:40:11"),
("51","omar","login","2019-09-09 13:06:28"),
("52","omar","logout","2019-09-09 17:34:37"),
("53","omar","login","2019-09-10 09:09:17");




CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(5) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_address` varchar(200) NOT NULL,
  `company_tin` varchar(50) NOT NULL,
  `company_email` varchar(50) NOT NULL,
  `company_tel` varchar(20) NOT NULL,
  `company_mobile` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


INSERT INTO company VALUES
("1","YC","YOUR COMPANY","Somewhere on Earth","000-000-000","email@email.com","000-000-0000","09990000000"),
("2","MC","MY COMPANY","Underworld","111-111-111","under@world.net","0000000000","0000000000");




CREATE TABLE `departments` (
  `dept_code` int(11) NOT NULL AUTO_INCREMENT,
  `dept_company` varchar(10) NOT NULL,
  `dept_name` varchar(30) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`dept_code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


INSERT INTO departments VALUES
("1","YC","Systems Admin","admin","2019-09-03"),
("2","YC","Finance","omar","2019-09-06"),
("3","YC","Human Resource","omar","2019-09-06");




CREATE TABLE `logbook` (
  `count` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `username` varchar(50) NOT NULL,
  `transaction` varchar(500) NOT NULL,
  PRIMARY KEY (`count`)
) ENGINE=InnoDB AUTO_INCREMENT=414 DEFAULT CHARSET=latin1;


INSERT INTO logbook VALUES
("1","2019-09-06","14:33:24","admin","disable user omar"),
("2","2019-09-06","14:33:41","admin","enable user omar"),
("3","2019-09-06","14:40:34","admin","disable user omar"),
("4","2019-09-06","14:41:49","admin","enable user omar"),
("5","2019-09-06","14:42:53","admin","clear user admin"),
("6","2019-09-06","14:42:58","admin","reset password user admin"),
("7","2019-09-06","14:43:03","admin","reset password user omar"),
("8","2019-09-06","14:47:43","omar","update password user omar"),
("9","2019-09-06","14:49:49","omar","update password user omar"),
("10","2019-09-06","14:51:06","omar","update password user omar"),
("11","2019-09-06","14:51:26","omar","update password user omar"),
("12","2019-09-06","14:55:10","omar","create system user oliver 1"),
("13","2019-09-06","14:55:19","omar","disable user oliver"),
("14","2019-09-06","14:55:22","omar","enable user oliver"),
("15","2019-09-06","14:55:27","omar","clear user omar"),
("16","2019-09-06","14:59:17","omar","create system user aldrin 1"),
("17","2019-09-06","14:59:44","omar","disable user aldrin"),
("18","2019-09-06","15:01:47","omar","update password user omar"),
("19","2019-09-06","15:02:20","omar","reset password user aldrin"),
("20","2019-09-06","15:02:27","omar","enable user aldrin"),
("21","2019-09-06","15:02:30","omar","reset password user aldrin"),
("22","2019-09-06","15:03:55","omar","reset password user aldrin"),
("23","2019-09-06","15:04:05","omar","reset password user aldrin"),
("24","2019-09-06","15:05:06","omar","reset password user oliver"),
("25","2019-09-06","15:05:42","omar","reset password user aldrin"),
("26","2019-09-06","15:06:11","omar","disable user aldrin"),
("27","2019-09-06","15:06:17","omar","disable user oliver"),
("28","2019-09-06","15:06:20","omar","enable user oliver"),
("29","2019-09-06","15:06:28","omar","clear user omar"),
("30","2019-09-06","15:09:24","omar","create position Manager"),
("31","2019-09-06","15:10:44","omar","create department Finance"),
("32","2019-09-06","15:17:26","omar","backup databaase"),
("33","2019-09-06","15:25:58","omar","account access_level update for oliver"),
("34","2019-09-06","15:28:05","omar","enable user aldrin"),
("35","2019-09-06","15:29:20","omar","create position Finance Billing Assistant"),
("36","2019-09-06","15:29:28","omar","create position Disbursement Officer"),
("37","2019-09-06","15:29:35","omar","create position Loans Processor"),
("38","2019-09-06","15:29:50","omar","create department Human Resource"),
("39","2019-09-06","16:33:14","omar","add new company MY COMPANY"),
("40","2019-09-06","17:22:14","omar","backup databaase"),
("41","2019-09-07","09:04:39","omar","disable user aldrin"),
("42","2019-09-07","10:18:09","omar","account access_level update for omar"),
("43","2019-09-07","14:47:35","omar","cis_no: 1, change member type to Associate"),
("44","2019-09-07","14:48:04","omar","cis_no: 1, change member type to Regular"),
("45","2019-09-07","14:52:52","omar","cis_no: 1, change title to Engr"),
("46","2019-09-07","14:53:10","omar","cis_no: 1, change title to Mr"),
("47","2019-09-07","14:53:19","omar","cis_no: 1, change first name to to Omarr"),
("48","2019-09-07","14:53:29","omar","cis_no: 1, change first name to to Omar"),
("49","2019-09-07","14:53:36","omar","cis_no: 1, change middle name to Fabrigass"),
("50","2019-09-07","14:53:50","omar","cis_no: 1, change middle name to Fabrigas"),
("51","2019-09-07","14:54:02","omar","cis_no: 1, change last name to Rabangg"),
("52","2019-09-07","14:54:11","omar","cis_no: 1, change last name to Rabang"),
("53","2019-09-07","14:54:19","omar","cis_no: 1, change gender to Female"),
("54","2019-09-07","14:54:33","omar","cis_no: 1, change gender to Male"),
("55","2019-09-07","14:54:45","omar","cis_no: 1, change civil status to Single"),
("56","2019-09-07","14:54:52","omar","cis_no: 1, change civil status to Married"),
("57","2019-09-07","14:55:05","omar","cis_no: 1, change birth date to 1983-08-11"),
("58","2019-09-07","14:55:18","omar","cis_no: 1, change birth date to 1983-08-13"),
("59","2019-09-07","14:55:28","omar","cis_no: 1, change birth place to Dumaran Palawan1"),
("60","2019-09-07","14:55:37","omar","cis_no: 1, change birth place to Dumaran Palawan"),
("61","2019-09-07","14:55:47","omar","cis_no: 1, change present_address_street to 399 RIzal Avenue Dagomboy Village1"),
("62","2019-09-07","14:55:56","omar","cis_no: 1, change present_address_street to 399 RIzal Avenue Dagomboy Village"),
("63","2019-09-07","14:56:06","omar","cis_no: 1, change present_address_barangay to Bancao Bancao1"),
("64","2019-09-07","14:56:14","omar","cis_no: 1, change present_address_barangay to Bancao Bancao"),
("65","2019-09-07","14:56:22","omar","cis_no: 1, change present_address_city to Puerto Princesa City1"),
("66","2019-09-07","14:56:32","omar","cis_no: 1, change present_address_city to Puerto Princesa City"),
("67","2019-09-07","14:56:56","omar","cis_no: 1, change present_address_province to Palawan1"),
("68","2019-09-07","14:57:07","omar","cis_no: 1, change present_address_province to Palawan"),
("69","2019-09-07","14:57:18","omar","cis_no: 1, change present_address_zipcode to 1111"),
("70","2019-09-07","14:57:27","omar","cis_no: 1, change present_address_zipcode to 5300"),
("71","2019-09-07","14:57:40","omar","cis_no: 1, change permanent_address_street to 399 RIzal Avenue Dagomboy Village1"),
("72","2019-09-07","14:58:04","omar","cis_no: 1, change permanent_address_street to 399 RIzal Avenue Dagomboy Village"),
("73","2019-09-07","14:59:33","omar","cis_no: 1, change permanent_address_barangay to Bancao Bancao1"),
("74","2019-09-07","14:59:45","omar","cis_no: 1, change permanent_address_barangay to Bancao Bancao"),
("75","2019-09-07","14:59:58","omar","cis_no: 1, change permanent_address_city to Puerto Princesa City1"),
("76","2019-09-07","15:00:07","omar","cis_no: 1, change permanent_address_city to Puerto Princesa City"),
("77","2019-09-07","15:00:24","omar","cis_no: 1, change permanent_address_province to Palawan1"),
("78","2019-09-07","15:00:33","omar","cis_no: 1, change permanent_address_province to Palawan"),
("79","2019-09-07","15:00:49","omar","cis_no: 1, change permanent_address_zipcode to 1111"),
("80","2019-09-07","15:01:01","omar","cis_no: 1, change permanent_address_zipcode to 5300"),
("81","2019-09-07","15:01:13","omar","cis_no: 1, home_number to 1111"),
("82","2019-09-07","15:01:24","omar","cis_no: 1, home_number to 4349830"),
("83","2019-09-07","15:01:36","omar","cis_no: 1, mobile_number to 1111"),
("84","2019-09-07","15:01:51","omar","cis_no: 1, mobile_number to 09359141800"),
("85","2019-09-07","15:02:11","omar","cis_no: 1, email to likelylike07@gmail.com"),
("86","2019-09-07","15:02:24","omar","cis_no: 1, email to omarrabang@yahoo.com"),
("87","2019-09-07","15:02:32","omar","cis_no: 1, id_presented to 1111"),
("88","2019-09-07","15:02:40","omar","cis_no: 1, id_presented to Drivers Lic. D-111"),
("89","2019-09-07","15:02:59","omar","cis_no: 1, tin to 929212319111"),
("90","2019-09-07","15:03:35","omar","cis_no: 1, tin to 09209739439"),
("91","2019-09-07","15:05:26","omar","cis_no: 1, tin to 929212319"),
("92","2019-09-07","15:06:07","omar","cis_no: 1, f_name_spouse to Charlene1"),
("93","2019-09-07","15:06:16","omar","cis_no: 1, f_name_spouse to Charlene"),
("94","2019-09-07","15:06:24","omar","cis_no: 1, m_name_spouse to Eguia1"),
("95","2019-09-07","15:06:33","omar","cis_no: 1, m_name_spouse to Eguia"),
("96","2019-09-07","15:06:43","omar","cis_no: 1, l_name_spouse to Rabang"),
("97","2019-09-07","15:06:54","omar","cis_no: 1, l_name_spouse to Rabang1"),
("98","2019-09-07","15:07:03","omar","cis_no: 1, l_name_spouse to Rabang"),
("99","2019-09-07","15:07:11","omar","cis_no: 1, no_of_children to 2"),
("100","2019-09-07","15:07:20","omar","cis_no: 1, no_of_children to 1");
INSERT INTO logbook VALUES
("101","2019-09-07","16:01:34","omar","account access_level update for omar"),
("102","2019-09-07","17:04:42","omar","create new loan:TEST101 amount:10000 date:2019-09-07 loan sched:mon for member code 1"),
("103","2019-09-07","17:06:36","omar","create new loan:TEST102 amount:20000 date:2019-09-07 loan sched:semi for member code 1"),
("104","2019-09-07","17:21:12","omar","create new loan:TEST103 amount:15000 release:2019-09-07 loan sched:semi loantype:str for member code 1"),
("105","2019-09-07","17:26:03","omar","create new loan:TEST103 amount:100000 release:2019-09-07 loan sched:mon loantype:str for member code 1"),
("106","2019-09-07","17:26:52","omar","create new loan:TEST103 amount:100000 release:2019-09-07 loan sched:mon loantype:str for member code 1"),
("107","2019-09-07","17:29:08","omar","create new loan:TEST101 amount:100000 release:2019-09-07 loan sched:mon loantype:str for member code 1"),
("108","2019-09-07","17:30:58","omar","create new loan:TEST102 amount:100000 release:2019-09-07 loan sched:mon loantype:str for member code 1"),
("109","2019-09-09","10:05:43","omar","Add New Regular : Mr Arenas Aren Oliver John"),
("110","2019-09-09","11:53:44","omar","account access_level update for omar"),
("111","2019-09-09","11:53:52","omar","account access_level update for admin"),
("112","2019-09-09","15:40:34","omar","Add New Regular : Ms Rabang Eguia Charlene"),
("113","2019-09-09","17:07:56","omar","cash_receipts capital_shares 25000 member_code:1 capital buildup share"),
("114","2019-09-09","17:10:00","omar","cash_receipts deposit 5000 member_code:1 "),
("116","2019-09-09","17:15:02","omar","cash_disbursement withdrawal_of_deposit 1500 member_code:1 xxx"),
("117","2019-09-10","09:09:55","omar","backup databaase"),
("118","2019-09-10","10:21:01","omar","account access_level update for omar"),
("119","2019-09-10","10:37:25","omar","account access_level update for omar"),
("120","2019-09-10","10:37:40","omar","account access_level update for omar"),
("121","2019-09-10","11:00:00","omar","add interest rate: .99 0.99 %"),
("122","2019-09-10","11:00:16","omar","add loan term: 12 12 Months"),
("123","2019-09-10","11:00:25","omar","add loan term: 8 8 Months"),
("124","2019-09-10","11:02:10","omar","add loan term: 24 Months"),
("125","2019-09-10","12:07:58","omar","account access_level update for omar"),
("126","2019-09-10","13:40:35","omar","account access_level update for omar"),
("127","2019-09-10","13:45:53","omar","account access_level update for omar"),
("128","2019-09-10","14:57:22","omar","access_level update for omar a1=1"),
("129","2019-09-10","14:57:22","omar","access_level update for omar b1=1"),
("130","2019-09-10","14:57:22","omar","access_level update for omar b2=1"),
("131","2019-09-10","14:57:22","omar","access_level update for omar c1=1"),
("132","2019-09-10","14:57:22","omar","access_level update for omar c2=0"),
("133","2019-09-10","14:57:22","omar","access_level update for omar d1=1"),
("134","2019-09-10","14:57:22","omar","access_level update for omar d2=0"),
("135","2019-09-10","14:57:22","omar","access_level update for omar z1=1"),
("136","2019-09-10","14:57:22","omar","access_level update for omar z2=1"),
("137","2019-09-10","14:57:22","omar","access_level update for omar z3=1"),
("138","2019-09-10","14:57:22","omar","access_level update for omar z4=1"),
("139","2019-09-10","14:57:22","omar","access_level update for omar z5=1"),
("140","2019-09-10","14:57:22","omar","access_level update for omar z6=1"),
("141","2019-09-10","14:57:22","omar","access_level update for omar z7=1"),
("142","2019-09-10","14:57:22","omar","access_level update for omar z8=1"),
("143","2019-09-10","14:57:22","omar","access_level update for omar z9=1"),
("144","2019-09-10","14:57:22","omar","access_level update for omar z10=1"),
("145","2019-09-10","14:57:22","omar","access_level update for omar z11=1"),
("146","2019-09-10","15:06:05","omar","access_level update for omar a1=1"),
("147","2019-09-10","15:06:05","omar","access_level update for omar b1=1"),
("148","2019-09-10","15:06:05","omar","access_level update for omar b2=1"),
("149","2019-09-10","15:06:05","omar","access_level update for omar b3=1"),
("150","2019-09-10","15:06:05","omar","access_level update for omar c1=1"),
("151","2019-09-10","15:06:05","omar","access_level update for omar c2=1"),
("152","2019-09-10","15:06:05","omar","access_level update for omar d1=1"),
("153","2019-09-10","15:06:05","omar","access_level update for omar d2=1"),
("154","2019-09-10","15:06:05","omar","access_level update for omar z1=1"),
("155","2019-09-10","15:06:05","omar","access_level update for omar z2=1"),
("156","2019-09-10","15:06:05","omar","access_level update for omar z3=1"),
("157","2019-09-10","15:06:05","omar","access_level update for omar z4=1"),
("158","2019-09-10","15:06:05","omar","access_level update for omar z5=1"),
("159","2019-09-10","15:06:05","omar","access_level update for omar z6=1"),
("160","2019-09-10","15:06:05","omar","access_level update for omar z7=1"),
("161","2019-09-10","15:06:05","omar","access_level update for omar z8=1"),
("162","2019-09-10","15:06:05","omar","access_level update for omar z9=1"),
("163","2019-09-10","15:06:05","omar","access_level update for omar z10=1"),
("164","2019-09-10","15:06:05","omar","access_level update for omar z11=1"),
("165","2019-09-10","15:09:51","omar","access_level update for omar a1=1"),
("166","2019-09-10","15:09:51","omar","access_level update for omar b1=1"),
("167","2019-09-10","15:09:51","omar","access_level update for omar b2=1"),
("168","2019-09-10","15:09:51","omar","access_level update for omar b3=1"),
("169","2019-09-10","15:09:51","omar","access_level update for omar b4=0"),
("170","2019-09-10","15:09:51","omar","access_level update for omar c1=1"),
("171","2019-09-10","15:09:51","omar","access_level update for omar c2=1"),
("172","2019-09-10","15:09:51","omar","access_level update for omar d1=1"),
("173","2019-09-10","15:09:51","omar","access_level update for omar d2=1"),
("174","2019-09-10","15:09:51","omar","access_level update for omar z1=1"),
("175","2019-09-10","15:09:51","omar","access_level update for omar z2=1"),
("176","2019-09-10","15:09:51","omar","access_level update for omar z3=1"),
("177","2019-09-10","15:09:51","omar","access_level update for omar z4=1"),
("178","2019-09-10","15:09:51","omar","access_level update for omar z5=1"),
("179","2019-09-10","15:09:51","omar","access_level update for omar z6=1"),
("180","2019-09-10","15:09:51","omar","access_level update for omar z7=1"),
("181","2019-09-10","15:09:51","omar","access_level update for omar z8=1"),
("182","2019-09-10","15:09:51","omar","access_level update for omar z9=1"),
("183","2019-09-10","15:09:51","omar","access_level update for omar z10=1"),
("184","2019-09-10","15:09:51","omar","access_level update for omar z11=1"),
("185","2019-09-10","15:11:07","omar","access_level update for omar a1=1"),
("186","2019-09-10","15:11:07","omar","access_level update for omar b1=1"),
("187","2019-09-10","15:11:07","omar","access_level update for omar b2=1"),
("188","2019-09-10","15:11:07","omar","access_level update for omar b3=1"),
("189","2019-09-10","15:11:07","omar","access_level update for omar b4=1"),
("190","2019-09-10","15:11:07","omar","access_level update for omar c1=1"),
("191","2019-09-10","15:11:07","omar","access_level update for omar c2=1"),
("192","2019-09-10","15:11:07","omar","access_level update for omar d1=1"),
("193","2019-09-10","15:11:07","omar","access_level update for omar d2=1"),
("194","2019-09-10","15:11:07","omar","access_level update for omar z1=1"),
("195","2019-09-10","15:11:07","omar","access_level update for omar z2=1"),
("196","2019-09-10","15:11:07","omar","access_level update for omar z3=1"),
("197","2019-09-10","15:11:07","omar","access_level update for omar z4=1"),
("198","2019-09-10","15:11:07","omar","access_level update for omar z5=1"),
("199","2019-09-10","15:11:07","omar","access_level update for omar z6=1"),
("200","2019-09-10","15:11:07","omar","access_level update for omar z7=1"),
("201","2019-09-10","15:11:07","omar","access_level update for omar z8=1");
INSERT INTO logbook VALUES
("202","2019-09-10","15:11:07","omar","access_level update for omar z9=1"),
("203","2019-09-10","15:11:07","omar","access_level update for omar z10=1"),
("204","2019-09-10","15:11:07","omar","access_level update for omar z11=1"),
("205","2019-09-10","15:11:27","omar","access_level update for omar a1=1"),
("206","2019-09-10","15:11:27","omar","access_level update for omar b1=1"),
("207","2019-09-10","15:11:27","omar","access_level update for omar b2=1"),
("208","2019-09-10","15:11:27","omar","access_level update for omar b3=1"),
("209","2019-09-10","15:11:27","omar","access_level update for omar b4=0"),
("210","2019-09-10","15:11:27","omar","access_level update for omar c1=1"),
("211","2019-09-10","15:11:27","omar","access_level update for omar c2=1"),
("212","2019-09-10","15:11:27","omar","access_level update for omar d1=1"),
("213","2019-09-10","15:11:27","omar","access_level update for omar d2=1"),
("214","2019-09-10","15:11:27","omar","access_level update for omar z1=1"),
("215","2019-09-10","15:11:27","omar","access_level update for omar z2=1"),
("216","2019-09-10","15:11:27","omar","access_level update for omar z3=1"),
("217","2019-09-10","15:11:27","omar","access_level update for omar z4=1"),
("218","2019-09-10","15:11:27","omar","access_level update for omar z5=1"),
("219","2019-09-10","15:11:27","omar","access_level update for omar z6=1"),
("220","2019-09-10","15:11:27","omar","access_level update for omar z7=1"),
("221","2019-09-10","15:11:27","omar","access_level update for omar z8=1"),
("222","2019-09-10","15:11:27","omar","access_level update for omar z9=1"),
("223","2019-09-10","15:11:27","omar","access_level update for omar z10=1"),
("224","2019-09-10","15:11:27","omar","access_level update for omar z11=1"),
("225","2019-09-10","15:13:02","omar","access_level update for omar a1=1"),
("226","2019-09-10","15:13:02","omar","access_level update for omar b1=1"),
("227","2019-09-10","15:13:02","omar","access_level update for omar b2=1"),
("228","2019-09-10","15:13:02","omar","access_level update for omar b3=0"),
("229","2019-09-10","15:13:02","omar","access_level update for omar b4=0"),
("230","2019-09-10","15:13:02","omar","access_level update for omar c1=1"),
("231","2019-09-10","15:13:02","omar","access_level update for omar c2=1"),
("232","2019-09-10","15:13:02","omar","access_level update for omar d1=1"),
("233","2019-09-10","15:13:02","omar","access_level update for omar d2=1"),
("234","2019-09-10","15:13:02","omar","access_level update for omar z1=1"),
("235","2019-09-10","15:13:02","omar","access_level update for omar z2=1"),
("236","2019-09-10","15:13:02","omar","access_level update for omar z3=1"),
("237","2019-09-10","15:13:02","omar","access_level update for omar z4=1"),
("238","2019-09-10","15:13:02","omar","access_level update for omar z5=1"),
("239","2019-09-10","15:13:02","omar","access_level update for omar z6=1"),
("240","2019-09-10","15:13:02","omar","access_level update for omar z7=1"),
("241","2019-09-10","15:13:02","omar","access_level update for omar z8=1"),
("242","2019-09-10","15:13:02","omar","access_level update for omar z9=1"),
("243","2019-09-10","15:13:02","omar","access_level update for omar z10=1"),
("244","2019-09-10","15:13:02","omar","access_level update for omar z11=1"),
("245","2019-09-10","15:13:38","omar","access_level update for omar a1=1"),
("246","2019-09-10","15:13:38","omar","access_level update for omar b1=1"),
("247","2019-09-10","15:13:38","omar","access_level update for omar b2=0"),
("248","2019-09-10","15:13:38","omar","access_level update for omar b3=0"),
("249","2019-09-10","15:13:38","omar","access_level update for omar b4=0"),
("250","2019-09-10","15:13:38","omar","access_level update for omar c1=1"),
("251","2019-09-10","15:13:38","omar","access_level update for omar c2=0"),
("252","2019-09-10","15:13:38","omar","access_level update for omar d1=1"),
("253","2019-09-10","15:13:38","omar","access_level update for omar d2=0"),
("254","2019-09-10","15:13:38","omar","access_level update for omar z1=1"),
("255","2019-09-10","15:13:38","omar","access_level update for omar z2=1"),
("256","2019-09-10","15:13:38","omar","access_level update for omar z3=1"),
("257","2019-09-10","15:13:38","omar","access_level update for omar z4=1"),
("258","2019-09-10","15:13:38","omar","access_level update for omar z5=1"),
("259","2019-09-10","15:13:38","omar","access_level update for omar z6=1"),
("260","2019-09-10","15:13:38","omar","access_level update for omar z7=1"),
("261","2019-09-10","15:13:38","omar","access_level update for omar z8=1"),
("262","2019-09-10","15:13:38","omar","access_level update for omar z9=1"),
("263","2019-09-10","15:13:38","omar","access_level update for omar z10=1"),
("264","2019-09-10","15:13:38","omar","access_level update for omar z11=1"),
("265","2019-09-10","15:20:16","omar","access_level update for omar a1=1"),
("266","2019-09-10","15:20:16","omar","access_level update for omar b1=1"),
("267","2019-09-10","15:20:16","omar","access_level update for omar b2=0"),
("268","2019-09-10","15:20:16","omar","access_level update for omar b3=0"),
("269","2019-09-10","15:20:16","omar","access_level update for omar b4=1"),
("270","2019-09-10","15:20:16","omar","access_level update for omar c1=1"),
("271","2019-09-10","15:20:16","omar","access_level update for omar c2=0"),
("272","2019-09-10","15:20:16","omar","access_level update for omar c3=1"),
("273","2019-09-10","15:20:16","omar","access_level update for omar d1=1"),
("274","2019-09-10","15:20:16","omar","access_level update for omar d2=0"),
("275","2019-09-10","15:20:16","omar","access_level update for omar d3=1"),
("276","2019-09-10","15:20:16","omar","access_level update for omar z1=1"),
("277","2019-09-10","15:20:16","omar","access_level update for omar z2=1"),
("278","2019-09-10","15:20:16","omar","access_level update for omar z3=1"),
("279","2019-09-10","15:20:16","omar","access_level update for omar z4=1"),
("280","2019-09-10","15:20:16","omar","access_level update for omar z5=1"),
("281","2019-09-10","15:20:16","omar","access_level update for omar z6=1"),
("282","2019-09-10","15:20:16","omar","access_level update for omar z7=1"),
("283","2019-09-10","15:20:16","omar","access_level update for omar z8=1"),
("284","2019-09-10","15:20:16","omar","access_level update for omar z9=1"),
("285","2019-09-10","15:20:16","omar","access_level update for omar z10=1"),
("286","2019-09-10","15:20:16","omar","access_level update for omar z11=1"),
("287","2019-09-10","15:21:49","omar","access_level update for omar a1=1"),
("288","2019-09-10","15:21:49","omar","access_level update for omar b1=1"),
("289","2019-09-10","15:21:49","omar","access_level update for omar b2=1"),
("290","2019-09-10","15:21:49","omar","access_level update for omar b3=1"),
("291","2019-09-10","15:21:49","omar","access_level update for omar b4=1"),
("292","2019-09-10","15:21:49","omar","access_level update for omar c1=1"),
("293","2019-09-10","15:21:49","omar","access_level update for omar c2=1"),
("294","2019-09-10","15:21:49","omar","access_level update for omar c3=1"),
("295","2019-09-10","15:21:49","omar","access_level update for omar d1=1"),
("296","2019-09-10","15:21:49","omar","access_level update for omar d2=1"),
("297","2019-09-10","15:21:49","omar","access_level update for omar d3=1"),
("298","2019-09-10","15:21:49","omar","access_level update for omar z1=1"),
("299","2019-09-10","15:21:49","omar","access_level update for omar z2=1"),
("300","2019-09-10","15:21:49","omar","access_level update for omar z3=1"),
("301","2019-09-10","15:21:49","omar","access_level update for omar z4=1");
INSERT INTO logbook VALUES
("302","2019-09-10","15:21:49","omar","access_level update for omar z5=1"),
("303","2019-09-10","15:21:49","omar","access_level update for omar z6=1"),
("304","2019-09-10","15:21:49","omar","access_level update for omar z7=1"),
("305","2019-09-10","15:21:49","omar","access_level update for omar z8=1"),
("306","2019-09-10","15:21:49","omar","access_level update for omar z9=1"),
("307","2019-09-10","15:21:49","omar","access_level update for omar z10=1"),
("308","2019-09-10","15:21:49","omar","access_level update for omar z11=1"),
("309","2019-09-10","15:28:36","omar","access_level update for omar a1=1"),
("310","2019-09-10","15:28:36","omar","access_level update for omar b1=1"),
("311","2019-09-10","15:28:36","omar","access_level update for omar b2=1"),
("312","2019-09-10","15:28:36","omar","access_level update for omar b3=1"),
("313","2019-09-10","15:28:36","omar","access_level update for omar b4=1"),
("314","2019-09-10","15:28:36","omar","access_level update for omar b5=1"),
("315","2019-09-10","15:28:36","omar","access_level update for omar c1=1"),
("316","2019-09-10","15:28:36","omar","access_level update for omar c2=1"),
("317","2019-09-10","15:28:36","omar","access_level update for omar c3=1"),
("318","2019-09-10","15:28:36","omar","access_level update for omar d1=1"),
("319","2019-09-10","15:28:36","omar","access_level update for omar d2=1"),
("320","2019-09-10","15:28:36","omar","access_level update for omar d3=1"),
("321","2019-09-10","15:28:36","omar","access_level update for omar z1=1"),
("322","2019-09-10","15:28:36","omar","access_level update for omar z2=1"),
("323","2019-09-10","15:28:36","omar","access_level update for omar z3=1"),
("324","2019-09-10","15:28:36","omar","access_level update for omar z4=1"),
("325","2019-09-10","15:28:36","omar","access_level update for omar z5=1"),
("326","2019-09-10","15:28:36","omar","access_level update for omar z6=1"),
("327","2019-09-10","15:28:36","omar","access_level update for omar z7=1"),
("328","2019-09-10","15:28:36","omar","access_level update for omar z8=1"),
("329","2019-09-10","15:28:36","omar","access_level update for omar z9=1"),
("330","2019-09-10","15:28:36","omar","access_level update for omar z10=1"),
("331","2019-09-10","15:28:36","omar","access_level update for omar z11=1"),
("332","2019-09-10","15:37:04","omar","access_level update for omar a1=1"),
("333","2019-09-10","15:37:04","omar","access_level update for omar a2=0"),
("334","2019-09-10","15:37:04","omar","access_level update for omar a3=0"),
("335","2019-09-10","15:37:04","omar","access_level update for omar b1=1"),
("336","2019-09-10","15:37:04","omar","access_level update for omar b2=0"),
("337","2019-09-10","15:37:05","omar","access_level update for omar b3=0"),
("338","2019-09-10","15:37:05","omar","access_level update for omar b4=0"),
("339","2019-09-10","15:37:05","omar","access_level update for omar b5=0"),
("340","2019-09-10","15:37:05","omar","access_level update for omar c1=1"),
("341","2019-09-10","15:37:05","omar","access_level update for omar c2=0"),
("342","2019-09-10","15:37:05","omar","access_level update for omar c3=0"),
("343","2019-09-10","15:37:05","omar","access_level update for omar d1=1"),
("344","2019-09-10","15:37:05","omar","access_level update for omar d2=0"),
("345","2019-09-10","15:37:05","omar","access_level update for omar d3=0"),
("346","2019-09-10","15:37:05","omar","access_level update for omar z1=1"),
("347","2019-09-10","15:37:05","omar","access_level update for omar z2=1"),
("348","2019-09-10","15:37:05","omar","access_level update for omar z3=1"),
("349","2019-09-10","15:37:05","omar","access_level update for omar z4=1"),
("350","2019-09-10","15:37:05","omar","access_level update for omar z5=1"),
("351","2019-09-10","15:37:05","omar","access_level update for omar z6=1"),
("352","2019-09-10","15:37:05","omar","access_level update for omar z7=1"),
("353","2019-09-10","15:37:05","omar","access_level update for omar z8=1"),
("354","2019-09-10","15:37:05","omar","access_level update for omar z9=1"),
("355","2019-09-10","15:37:05","omar","access_level update for omar z10=1"),
("356","2019-09-10","15:37:05","omar","access_level update for omar z11=1"),
("357","2019-09-10","15:37:50","omar","access_level update for omar a1=1"),
("358","2019-09-10","15:37:51","omar","access_level update for omar a2=1"),
("359","2019-09-10","15:37:51","omar","access_level update for omar a3=1"),
("360","2019-09-10","15:37:51","omar","access_level update for omar b1=1"),
("361","2019-09-10","15:37:51","omar","access_level update for omar b2=1"),
("362","2019-09-10","15:37:51","omar","access_level update for omar b3=1"),
("363","2019-09-10","15:37:51","omar","access_level update for omar b4=1"),
("364","2019-09-10","15:37:51","omar","access_level update for omar b5=1"),
("365","2019-09-10","15:37:51","omar","access_level update for omar c1=1"),
("366","2019-09-10","15:37:51","omar","access_level update for omar c2=1"),
("367","2019-09-10","15:37:51","omar","access_level update for omar c3=1"),
("368","2019-09-10","15:37:51","omar","access_level update for omar d1=1"),
("369","2019-09-10","15:37:51","omar","access_level update for omar d2=1"),
("370","2019-09-10","15:37:51","omar","access_level update for omar d3=1"),
("371","2019-09-10","15:37:51","omar","access_level update for omar z1=1"),
("372","2019-09-10","15:37:51","omar","access_level update for omar z2=1"),
("373","2019-09-10","15:37:51","omar","access_level update for omar z3=1"),
("374","2019-09-10","15:37:51","omar","access_level update for omar z4=1"),
("375","2019-09-10","15:37:51","omar","access_level update for omar z5=1"),
("376","2019-09-10","15:37:51","omar","access_level update for omar z6=1"),
("377","2019-09-10","15:37:51","omar","access_level update for omar z7=1"),
("378","2019-09-10","15:37:51","omar","access_level update for omar z8=1"),
("379","2019-09-10","15:37:51","omar","access_level update for omar z9=1"),
("380","2019-09-10","15:37:51","omar","access_level update for omar z10=1"),
("381","2019-09-10","15:37:51","omar","access_level update for omar z11=1"),
("382","2019-09-10","16:13:08","omar","cash_receipts capital_shares 25000 member_code:1 TestShare"),
("383","2019-09-10","16:19:18","omar","Applied Payment for LoanNo TEST102 tx_no=37, Amounting to 6166.67 paid by omar time: 09/10/2019 10:19 AM "),
("384","2019-09-10","16:25:45","omar","Applied Remarks for LoanNo TEST102 tx_no=37, msg(test remarks by omar time: 09/10/2019 10:25 AM "),
("385","2019-09-10","16:29:40","omar","backup databaase"),
("386","2019-09-10","16:37:45","omar","backup databaase"),
("387","2019-09-10","17:13:19","omar","access_level update for omar a1=1"),
("388","2019-09-10","17:13:19","omar","access_level update for omar a2=1"),
("389","2019-09-10","17:13:19","omar","access_level update for omar a3=1"),
("390","2019-09-10","17:13:19","omar","access_level update for omar b1=1"),
("391","2019-09-10","17:13:19","omar","access_level update for omar b2=1"),
("392","2019-09-10","17:13:19","omar","access_level update for omar b3=1"),
("393","2019-09-10","17:13:19","omar","access_level update for omar b4=1"),
("394","2019-09-10","17:13:19","omar","access_level update for omar b5=1"),
("395","2019-09-10","17:13:19","omar","access_level update for omar c1=1"),
("396","2019-09-10","17:13:19","omar","access_level update for omar c2=1"),
("397","2019-09-10","17:13:19","omar","access_level update for omar c3=1"),
("398","2019-09-10","17:13:19","omar","access_level update for omar d1=1"),
("399","2019-09-10","17:13:19","omar","access_level update for omar d2=1"),
("400","2019-09-10","17:13:19","omar","access_level update for omar d3=1"),
("401","2019-09-10","17:13:19","omar","access_level update for omar e1=1");
INSERT INTO logbook VALUES
("402","2019-09-10","17:13:19","omar","access_level update for omar z1=1"),
("403","2019-09-10","17:13:19","omar","access_level update for omar z2=1"),
("404","2019-09-10","17:13:19","omar","access_level update for omar z3=1"),
("405","2019-09-10","17:13:19","omar","access_level update for omar z4=1"),
("406","2019-09-10","17:13:19","omar","access_level update for omar z5=1"),
("407","2019-09-10","17:13:19","omar","access_level update for omar z6=1"),
("408","2019-09-10","17:13:19","omar","access_level update for omar z7=1"),
("409","2019-09-10","17:13:19","omar","access_level update for omar z8=1"),
("410","2019-09-10","17:13:19","omar","access_level update for omar z9=1"),
("411","2019-09-10","17:13:19","omar","access_level update for omar z10=1"),
("412","2019-09-10","17:13:19","omar","access_level update for omar z11=1"),
("413","2019-09-10","17:34:49","omar","backup databaase");




CREATE TABLE `m_cashflow_balance` (
  `cf_balanceID` int(11) NOT NULL AUTO_INCREMENT,
  `cf_beginning_balance_oh` double NOT NULL,
  `cf_beginning_balance_ob` double NOT NULL,
  `cf_balance_date` date NOT NULL,
  `date_encoded` datetime NOT NULL,
  `user_encoded` varchar(15) NOT NULL,
  PRIMARY KEY (`cf_balanceID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


INSERT INTO m_cashflow_balance VALUES
("1","5000","5000","2019-09-10","2019-09-10 17:16:09","");




CREATE TABLE `m_cashflow_daily` (
  `cf_dailyID` int(11) NOT NULL AUTO_INCREMENT,
  `cf_type` int(10) NOT NULL,
  `cf_refnum` varchar(100) NOT NULL,
  `cf_amount` double NOT NULL,
  `cf_transaction` varchar(150) NOT NULL,
  `cf_transaction_datetime` datetime NOT NULL,
  `cf_user_transacted` varchar(10) NOT NULL,
  PRIMARY KEY (`cf_dailyID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


INSERT INTO m_cashflow_daily VALUES
("1","1","11111","15000","sam ple deposit","2019-09-10 17:19:38",""),
("2","1","11111","15000","sam ple deposit","2019-09-10 17:20:29",""),
("3","5","8888","5000","meryenda","2019-09-10 17:21:14","");




CREATE TABLE `m_loans` (
  `tx_no` int(11) NOT NULL AUTO_INCREMENT,
  `member_code` int(10) NOT NULL,
  `loan_no` varchar(30) NOT NULL,
  `loan_amount` double NOT NULL,
  `loan_schedule` varchar(5) NOT NULL,
  `service_charge` double NOT NULL,
  `other_charge` double NOT NULL,
  `other_charge_remarks` varchar(50) NOT NULL,
  `insurance` double NOT NULL,
  `notarial_fee` double NOT NULL,
  `effective_interest_rate` double NOT NULL,
  `loan_term` int(3) NOT NULL,
  `loan_type` varchar(5) NOT NULL,
  `date_approve` date NOT NULL,
  `date_mature` date NOT NULL,
  `posted_by` varchar(20) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time NOT NULL,
  `loan_status` int(1) NOT NULL,
  PRIMARY KEY (`tx_no`),
  UNIQUE KEY `loan_no` (`loan_no`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


INSERT INTO m_loans VALUES
("1","1","TEST101","100000","mon","100","10","transportation","100","100","0.015","36","str","2019-09-07","2022-09-07","omar","2019-09-07","17:29:08","0"),
("2","1","TEST102","100000","mon","100","10","transportation","100","100","0.02","24","str","2019-09-07","2021-09-07","omar","2019-09-07","17:30:57","0");




CREATE TABLE `m_loans_data_details` (
  `tx_no` int(11) NOT NULL AUTO_INCREMENT,
  `member_code` int(10) NOT NULL,
  `loan_no` varchar(30) NOT NULL,
  `loan_amount` double NOT NULL,
  `effective_interest_rate` double NOT NULL,
  `loan_term` int(3) NOT NULL,
  `amort_number` int(3) NOT NULL,
  `amort_date_sched` date NOT NULL,
  `amort_principal` double NOT NULL,
  `amort_interest` double NOT NULL,
  `amort_due` double NOT NULL,
  `principal_balance` double NOT NULL,
  `payment` double NOT NULL,
  `posted_by` varchar(20) NOT NULL,
  `posting_date` date NOT NULL,
  `posting_time` time NOT NULL,
  `post_remarks` varchar(100) NOT NULL,
  `remarks_posted_by` varchar(20) NOT NULL,
  `loan_status` int(1) NOT NULL,
  PRIMARY KEY (`tx_no`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;


INSERT INTO m_loans_data_details VALUES
("1","1","TEST101","100000","0.015","36","1","2019-10-07","2777.7777777778","1500","4277.7777777778","149722.22222222","0","","0000-00-00","00:00:00","","","0"),
("2","1","TEST101","100000","0.015","36","2","2019-11-07","2777.7777777778","1500","4277.7777777778","145444.44444444","0","","0000-00-00","00:00:00","","","0"),
("3","1","TEST101","100000","0.015","36","3","2019-12-07","2777.7777777778","1500","4277.7777777778","141166.66666667","0","","0000-00-00","00:00:00","","","0"),
("4","1","TEST101","100000","0.015","36","4","2020-01-07","2777.7777777778","1500","4277.7777777778","136888.88888889","0","","0000-00-00","00:00:00","","","0"),
("5","1","TEST101","100000","0.015","36","5","2020-02-07","2777.7777777778","1500","4277.7777777778","132611.11111111","0","","0000-00-00","00:00:00","","","0"),
("6","1","TEST101","100000","0.015","36","6","2020-03-07","2777.7777777778","1500","4277.7777777778","128333.33333333","0","","0000-00-00","00:00:00","","","0"),
("7","1","TEST101","100000","0.015","36","7","2020-04-07","2777.7777777778","1500","4277.7777777778","124055.55555556","0","","0000-00-00","00:00:00","","","0"),
("8","1","TEST101","100000","0.015","36","8","2020-05-07","2777.7777777778","1500","4277.7777777778","119777.77777778","0","","0000-00-00","00:00:00","","","0"),
("9","1","TEST101","100000","0.015","36","9","2020-06-07","2777.7777777778","1500","4277.7777777778","115500","0","","0000-00-00","00:00:00","","","0"),
("10","1","TEST101","100000","0.015","36","10","2020-07-07","2777.7777777778","1500","4277.7777777778","111222.22222222","0","","0000-00-00","00:00:00","","","0"),
("11","1","TEST101","100000","0.015","36","11","2020-08-07","2777.7777777778","1500","4277.7777777778","106944.44444444","0","","0000-00-00","00:00:00","","","0"),
("12","1","TEST101","100000","0.015","36","12","2020-09-07","2777.7777777778","1500","4277.7777777778","102666.66666667","0","","0000-00-00","00:00:00","","","0"),
("13","1","TEST101","100000","0.015","36","13","2020-10-07","2777.7777777778","1500","4277.7777777778","98388.888888889","0","","0000-00-00","00:00:00","","","0"),
("14","1","TEST101","100000","0.015","36","14","2020-11-07","2777.7777777778","1500","4277.7777777778","94111.111111111","0","","0000-00-00","00:00:00","","","0"),
("15","1","TEST101","100000","0.015","36","15","2020-12-07","2777.7777777778","1500","4277.7777777778","89833.333333333","0","","0000-00-00","00:00:00","","","0"),
("16","1","TEST101","100000","0.015","36","16","2021-01-07","2777.7777777778","1500","4277.7777777778","85555.555555556","0","","0000-00-00","00:00:00","","","0"),
("17","1","TEST101","100000","0.015","36","17","2021-02-07","2777.7777777778","1500","4277.7777777778","81277.777777778","0","","0000-00-00","00:00:00","","","0"),
("18","1","TEST101","100000","0.015","36","18","2021-03-07","2777.7777777778","1500","4277.7777777778","77000","0","","0000-00-00","00:00:00","","","0"),
("19","1","TEST101","100000","0.015","36","19","2021-04-07","2777.7777777778","1500","4277.7777777778","72722.222222222","0","","0000-00-00","00:00:00","","","0"),
("20","1","TEST101","100000","0.015","36","20","2021-05-07","2777.7777777778","1500","4277.7777777778","68444.444444444","0","","0000-00-00","00:00:00","","","0"),
("21","1","TEST101","100000","0.015","36","21","2021-06-07","2777.7777777778","1500","4277.7777777778","64166.666666667","0","","0000-00-00","00:00:00","","","0"),
("22","1","TEST101","100000","0.015","36","22","2021-07-07","2777.7777777778","1500","4277.7777777778","59888.888888889","0","","0000-00-00","00:00:00","","","0"),
("23","1","TEST101","100000","0.015","36","23","2021-08-07","2777.7777777778","1500","4277.7777777778","55611.111111111","0","","0000-00-00","00:00:00","","","0"),
("24","1","TEST101","100000","0.015","36","24","2021-09-07","2777.7777777778","1500","4277.7777777778","51333.333333333","0","","0000-00-00","00:00:00","","","0"),
("25","1","TEST101","100000","0.015","36","25","2021-10-07","2777.7777777778","1500","4277.7777777778","47055.555555555","0","","0000-00-00","00:00:00","","","0"),
("26","1","TEST101","100000","0.015","36","26","2021-11-07","2777.7777777778","1500","4277.7777777778","42777.777777778","0","","0000-00-00","00:00:00","","","0"),
("27","1","TEST101","100000","0.015","36","27","2021-12-07","2777.7777777778","1500","4277.7777777778","38500","0","","0000-00-00","00:00:00","","","0"),
("28","1","TEST101","100000","0.015","36","28","2022-01-07","2777.7777777778","1500","4277.7777777778","34222.222222222","0","","0000-00-00","00:00:00","","","0"),
("29","1","TEST101","100000","0.015","36","29","2022-02-07","2777.7777777778","1500","4277.7777777778","29944.444444444","0","","0000-00-00","00:00:00","","","0"),
("30","1","TEST101","100000","0.015","36","30","2022-03-07","2777.7777777778","1500","4277.7777777778","25666.666666667","0","","0000-00-00","00:00:00","","","0"),
("31","1","TEST101","100000","0.015","36","31","2022-04-07","2777.7777777778","1500","4277.7777777778","21388.888888889","0","","0000-00-00","00:00:00","","","0"),
("32","1","TEST101","100000","0.015","36","32","2022-05-07","2777.7777777778","1500","4277.7777777778","17111.111111111","0","","0000-00-00","00:00:00","","","0"),
("33","1","TEST101","100000","0.015","36","33","2022-06-07","2777.7777777778","1500","4277.7777777778","12833.333333333","0","","0000-00-00","00:00:00","","","0"),
("34","1","TEST101","100000","0.015","36","34","2022-07-07","2777.7777777778","1500","4277.7777777778","8555.5555555555","0","","0000-00-00","00:00:00","","","0"),
("35","1","TEST101","100000","0.015","36","35","2022-08-07","2777.7777777778","1500","4277.7777777778","4277.7777777777","0","","0000-00-00","00:00:00","","","0"),
("36","1","TEST101","100000","0.015","36","36","2022-09-07","2777.7777777778","1500","4277.7777777778","-0.000000000087311491370201","0","","0000-00-00","00:00:00","","","0"),
("37","1","TEST102","100000","0.02","24","1","2019-10-07","4166.6666666667","2000","6166.6666666667","141833.33333333","6166.67","omar","2019-09-10","16:19:18","test remarks","omar","0"),
("38","1","TEST102","100000","0.02","24","2","2019-11-07","4166.6666666667","2000","6166.6666666667","135666.66666667","0","","0000-00-00","00:00:00","","","0"),
("39","1","TEST102","100000","0.02","24","3","2019-12-07","4166.6666666667","2000","6166.6666666667","129500","0","","0000-00-00","00:00:00","","","0"),
("40","1","TEST102","100000","0.02","24","4","2020-01-07","4166.6666666667","2000","6166.6666666667","123333.33333333","0","","0000-00-00","00:00:00","","","0"),
("41","1","TEST102","100000","0.02","24","5","2020-02-07","4166.6666666667","2000","6166.6666666667","117166.66666667","0","","0000-00-00","00:00:00","","","0"),
("42","1","TEST102","100000","0.02","24","6","2020-03-07","4166.6666666667","2000","6166.6666666667","111000","0","","0000-00-00","00:00:00","","","0"),
("43","1","TEST102","100000","0.02","24","7","2020-04-07","4166.6666666667","2000","6166.6666666667","104833.33333333","0","","0000-00-00","00:00:00","","","0"),
("44","1","TEST102","100000","0.02","24","8","2020-05-07","4166.6666666667","2000","6166.6666666667","98666.666666667","0","","0000-00-00","00:00:00","","","0"),
("45","1","TEST102","100000","0.02","24","9","2020-06-07","4166.6666666667","2000","6166.6666666667","92500","0","","0000-00-00","00:00:00","","","0"),
("46","1","TEST102","100000","0.02","24","10","2020-07-07","4166.6666666667","2000","6166.6666666667","86333.333333333","0","","0000-00-00","00:00:00","","","0"),
("47","1","TEST102","100000","0.02","24","11","2020-08-07","4166.6666666667","2000","6166.6666666667","80166.666666667","0","","0000-00-00","00:00:00","","","0"),
("48","1","TEST102","100000","0.02","24","12","2020-09-07","4166.6666666667","2000","6166.6666666667","74000","0","","0000-00-00","00:00:00","","","0"),
("49","1","TEST102","100000","0.02","24","13","2020-10-07","4166.6666666667","2000","6166.6666666667","67833.333333333","0","","0000-00-00","00:00:00","","","0"),
("50","1","TEST102","100000","0.02","24","14","2020-11-07","4166.6666666667","2000","6166.6666666667","61666.666666667","0","","0000-00-00","00:00:00","","","0"),
("51","1","TEST102","100000","0.02","24","15","2020-12-07","4166.6666666667","2000","6166.6666666667","55500","0","","0000-00-00","00:00:00","","","0"),
("52","1","TEST102","100000","0.02","24","16","2021-01-07","4166.6666666667","2000","6166.6666666667","49333.333333333","0","","0000-00-00","00:00:00","","","0"),
("53","1","TEST102","100000","0.02","24","17","2021-02-07","4166.6666666667","2000","6166.6666666667","43166.666666667","0","","0000-00-00","00:00:00","","","0"),
("54","1","TEST102","100000","0.02","24","18","2021-03-07","4166.6666666667","2000","6166.6666666667","37000","0","","0000-00-00","00:00:00","","","0"),
("55","1","TEST102","100000","0.02","24","19","2021-04-07","4166.6666666667","2000","6166.6666666667","30833.333333333","0","","0000-00-00","00:00:00","","","0"),
("56","1","TEST102","100000","0.02","24","20","2021-05-07","4166.6666666667","2000","6166.6666666667","24666.666666667","0","","0000-00-00","00:00:00","","","0"),
("57","1","TEST102","100000","0.02","24","21","2021-06-07","4166.6666666667","2000","6166.6666666667","18500","0","","0000-00-00","00:00:00","","","0"),
("58","1","TEST102","100000","0.02","24","22","2021-07-07","4166.6666666667","2000","6166.6666666667","12333.333333333","0","","0000-00-00","00:00:00","","","0"),
("59","1","TEST102","100000","0.02","24","23","2021-08-07","4166.6666666667","2000","6166.6666666667","6166.6666666666","0","","0000-00-00","00:00:00","","","0"),
("60","1","TEST102","100000","0.02","24","24","2021-09-07","4166.6666666667","2000","6166.6666666667","-0.000000000027284841053188","0","","0000-00-00","00:00:00","","","0");




CREATE TABLE `m_loans_data_temp` (
  `tx_no` int(11) NOT NULL,
  `member_code` int(10) NOT NULL,
  `loan_no` varchar(30) NOT NULL,
  `loan_amount` double NOT NULL,
  `service_charge` double NOT NULL,
  `other_charge` double NOT NULL,
  `other_charge_remarks` varchar(50) NOT NULL,
  `insurance` double NOT NULL,
  `notarial_fee` double NOT NULL,
  `effective_interest_rate` double NOT NULL,
  `loan_term` int(3) NOT NULL,
  `loan_type` varchar(5) NOT NULL,
  `date_approve` date NOT NULL,
  `date_mature` date NOT NULL,
  `posted_by` varchar(20) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time NOT NULL,
  `loan_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `m_loans_rates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `interest_rate` double NOT NULL,
  `rate_desc` varchar(10) NOT NULL,
  `add_by` varchar(20) NOT NULL,
  `add_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;


INSERT INTO m_loans_rates VALUES
("1","0.01","1 %","admin","0000-00-00 00:00:00"),
("2","0.015","1.5 %","admin","0000-00-00 00:00:00"),
("3","0.02","2 %","admin","0000-00-00 00:00:00"),
("4","0.025","2.5 %","admin","0000-00-00 00:00:00"),
("5","0.03","3 %","admin","0000-00-00 00:00:00"),
("6","0.99","0.99 %","omar","2019-09-10 11:00:00");




CREATE TABLE `m_loans_terms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loan_terms` int(11) NOT NULL,
  `terms_desc` varchar(15) NOT NULL,
  `add_by` varchar(20) NOT NULL,
  `add_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


INSERT INTO m_loans_terms VALUES
("1","6","6 Months","","0000-00-00 00:00:00"),
("2","12","12 Months","omar","2019-09-10 11:00:16"),
("3","8","8 Months","omar","2019-09-10 11:00:25"),
("4","24","24 Months","omar","2019-09-10 11:02:10");




CREATE TABLE `m_members` (
  `member_code` int(11) NOT NULL AUTO_INCREMENT,
  `member_type` varchar(20) NOT NULL,
  `title` varchar(10) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `m_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `civil_status` varchar(10) NOT NULL,
  `birth_date` date NOT NULL,
  `birth_place` varchar(50) NOT NULL,
  `present_address_street` varchar(50) NOT NULL,
  `present_address_bgy` varchar(50) NOT NULL,
  `present_address_city` varchar(50) NOT NULL,
  `present_address_province` varchar(50) NOT NULL,
  `present_zipcode` int(6) NOT NULL,
  `permanent_address_street` varchar(50) NOT NULL,
  `permanent_address_bgy` varchar(50) NOT NULL,
  `permanent_address_city` varchar(50) NOT NULL,
  `permanent_address_province` varchar(50) NOT NULL,
  `permanent_zipcode` int(11) NOT NULL,
  `home_number` varchar(15) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `email` varchar(70) NOT NULL,
  `id_presented` varchar(20) NOT NULL,
  `tin` int(15) NOT NULL,
  `f_name_spouse` varchar(50) NOT NULL,
  `m_name_spouse` varchar(50) NOT NULL,
  `l_name_spouse` varchar(50) NOT NULL,
  `no_of_children` int(2) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`member_code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


INSERT INTO m_members VALUES
("1","Regular","Mr","Omar","Fabrigas","Rabang","Male","Married","1983-08-13","Dumaran Palawan","399 RIzal Avenue Dagomboy Village","Bancao Bancao","Puerto Princesa City","Palawan","5300","399 RIzal Avenue Dagomboy Village","Bancao Bancao","Puerto Princesa City","Palawan","5300","4349830","09359141800","omarrabang@yahoo.com","Drivers Lic. D-111","929212319","Charlene","Eguia","Rabang","1","omar","2019-09-07"),
("2","Regular","Mr","Oliver John","Aren","Arenas","Male","Single","2000-01-01","Puerto Princesa City","123 Wescom Road","San Miguel","Puerto Princesa City","Palawan","5300","123 Wescom Road","San Miguel","Puerto Princesa City","Palawan","5300","4340000","9170000000","oliver@arenas.com","Drivers","0","NA","NA","NA","0","omar","2019-09-09"),
("3","Regular","Ms","Charlene","Eguia","Rabang","Female","Married","1986-10-22","TUkuran Zamboanga Del Sur","399 RIzal Avenue Dagomboy Village","Bancao Bancao","Puerto Princesa City","Palawan","5300","399 RIzal Avenue Dagomboy Village","Bancao Bancao","Puerto Princesa City","Palawan","5300","1111","0","none@none.com","Drivers","0","Omar","Fabrigas","Rabang","1","omar","2019-09-09");




CREATE TABLE `m_savings` (
  `tx_no` int(11) NOT NULL AUTO_INCREMENT,
  `member_code` int(10) NOT NULL,
  `amount` double NOT NULL,
  `account_tag` varchar(20) NOT NULL,
  `transaction` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `remarks` varchar(300) NOT NULL,
  `update_by` varchar(20) NOT NULL,
  PRIMARY KEY (`tx_no`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


INSERT INTO m_savings VALUES
("1","1","25000","cash_receipts","capital_shares","2019-09-09","17:07:56","capital buildup share","omar"),
("2","1","5000","cash_receipts","deposit","2019-09-09","17:10:00","","omar"),
("3","1","1000","cash_disbursement","withdrawal_of_deposit","2019-09-09","17:10:21","","omar"),
("4","1","1500","cash_disbursement","withdrawal_of_deposit","2019-09-09","17:15:02","xxx","omar");




CREATE TABLE `m_shares` (
  `tx_no` int(11) NOT NULL,
  `member_code` int(10) NOT NULL,
  `amount` double NOT NULL,
  `account_tag` varchar(20) NOT NULL,
  `transaction` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `remarks` varchar(300) NOT NULL,
  `update_by` varchar(20) NOT NULL,
  PRIMARY KEY (`tx_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO m_shares VALUES
("0","1","25000","cash_receipts","capital_shares","2019-09-10","16:13:08","TestShare","omar");




CREATE TABLE `user_access` (
  `count` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `a1` tinyint(1) NOT NULL,
  `a2` tinyint(1) NOT NULL,
  `a3` tinyint(1) NOT NULL,
  `b1` int(1) NOT NULL,
  `b2` tinyint(1) NOT NULL,
  `b3` tinyint(1) NOT NULL,
  `b4` tinyint(1) NOT NULL,
  `b5` tinyint(1) NOT NULL,
  `c1` tinyint(1) NOT NULL,
  `c2` tinyint(1) NOT NULL,
  `c3` tinyint(1) NOT NULL,
  `d1` tinyint(1) NOT NULL,
  `d2` tinyint(1) NOT NULL,
  `d3` tinyint(1) NOT NULL,
  `e1` tinyint(1) NOT NULL,
  `z1` tinyint(1) NOT NULL,
  `z2` tinyint(1) NOT NULL,
  `z3` tinyint(1) NOT NULL,
  `z4` tinyint(1) NOT NULL,
  `z5` tinyint(1) NOT NULL,
  `z6` tinyint(1) NOT NULL,
  `z7` tinyint(1) NOT NULL,
  `z8` tinyint(1) NOT NULL,
  `z9` tinyint(1) NOT NULL,
  `z10` tinyint(1) NOT NULL,
  `z11` tinyint(1) NOT NULL,
  PRIMARY KEY (`count`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


INSERT INTO user_access VALUES
("1","admin","1","0","0","1","0","0","0","0","1","0","0","0","0","0","0","1","1","1","1","1","1","1","1","1","1","1"),
("2","omar","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1"),
("3","oliver","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","1","1","1","0","0","0","0","0","0","0","0"),
("4","aldrin","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0");




CREATE TABLE `user_positions` (
  `position` int(11) NOT NULL AUTO_INCREMENT,
  `pos_description` varchar(50) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`position`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


INSERT INTO user_positions VALUES
("1","System Administrator","omaryeah","1970-01-01"),
("2","Manager","omar","2019-09-06"),
("3","Finance Billing Assistant","omar","2019-09-06"),
("4","Disbursement Officer","omar","2019-09-06"),
("5","Loans Processor","omar","2019-09-06");




CREATE TABLE `users` (
  `user_count` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `position` int(2) NOT NULL,
  `department` varchar(30) NOT NULL,
  `company` varchar(5) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `user_disable` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_count`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


INSERT INTO users VALUES
("1","admin","e10adc3949ba59abbe56e057f20f883e","Admin","Admin","Admin","1","","","0000-00-00","00:00:00","","0","0"),
("2","omar","355a3754534e8c26d2faa7d99b845846","Omar","Fabrigas","Rabang","1","Systems Admin","YC","2019-09-03","16:45:12","admin","1","0"),
("3","oliver","e10adc3949ba59abbe56e057f20f883e","Oliver","Arenas","Arenas","1","Systems Admin","YC","2019-09-06","14:55:10","omar","0","0"),
("4","aldrin","e10adc3949ba59abbe56e057f20f883e","Aldrin","Rodriguez","Rodriguez","1","Systems Admin","YC","2019-09-06","14:59:17","omar","0","1");


