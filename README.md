# Belgotex-Assessement

On localhost, used WAMP server. Link for installation: (https://www.wampserver.com/en/)

Database:
CREATE DATABASE todo;

hostname = "localhost";
username = "root";
password = "";
dbname = "todo"

Database Table:

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_name` longtext NOT NULL,
  `task_status` varchar(25) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


