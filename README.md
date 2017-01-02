# UKMid_admin

## Setup
### 1. Legg til i UKMconfig
```
if(!defined('UKM_DELTA_DB_NAME')) {
    define('UKM_DELTA_DB_NAME', 'ukmdelta_db');
    define('UKM_DELTA_DB_USER', 'root');
    define('UKM_DELTA_DB_PASSWORD', 'dev');
    define('UKM_DELTA_DB_HOST', '127.0.0.1');
}
```
### 2. Opprett database-tabeller
```
CREATE TABLE `API_Keys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `api_key` varchar(50) NOT NULL DEFAULT '',
  `secret` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
CREATE TABLE `API_Permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `system` varchar(50) NOT NULL DEFAULT '',
  `permission` varchar(50) NOT NULL DEFAULT '',
  `api_key` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
```
