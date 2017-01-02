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
SSH UKMdelta:
bin/console doctrine:schema:update --force
