<?php 
define("HOST","localhost:3306");
define("DATABASE","sales_manager");
define("USERNAME","root");
define("PASSWORD","mysql");

class DataProvider
{    
    public static $connection;
    public static function excuteQuery($sql){
        self::$connection = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE) or
            die("Could not connect");
        
        mysqli_query(self::$connection,"set names 'utf8'");
        $result = mysqli_query(self::$connection,$sql);         
        return $result;
    }
    public static function close() {
        if (self::$connection != null) {
            mysqli_close(self::$connection);
        }
        
    }
}
?>