<?php
    // mysql://b67c152aeaac5f:83f37c56@us-cdbr-east-05.cleardb.net/heroku_9df67b0d10f3a8d?reconnect=true
    class config{
        public static $DB_HOST = 'us-cdbr-east-05.cleardb.net';
        public static $DB_USERNAME = 'b67c152aeaac5f';
        public static $DB_PASSWORD = '83f37c56';
        public static $DB_DATABASE = 'heroku_9df67b0d10f3a8d';
        public static $DB_PORT = '3306';
        
        public function database(){
            return ( mysqli_connect(self::$DB_HOST, self::$DB_USERNAME, self::$DB_PASSWORD, self::$DB_DATABASE));
        }
    }
?>