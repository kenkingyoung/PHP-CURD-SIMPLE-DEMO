<?php
    class Sqliconnect{
        private static $host = "localhost";
        private static $port = "3306";
        private static $dbName = "student";
        private static $username = "root";
        private static $password = "";

        private $mySQLi;

        function __construct(){
            $this->mySQLi = new MySQLi(self::$host, self::$username, self::$password, self::$dbName, self::$port);

            if($this->mySQLi->connect_errno){
                die("数据库连接失败!".$this->mySQLi->connect_error);
            }

            // 设置字符集
            $this->mySQLi->set_charset("utf8");
        }

        //查询操作
        public function excuteQuery($sql){
            $res = $this->mySQLi->query($sql) or die("数据查询失败!".$this->mySQLi->error);
            
            return $res;
        }

        //增删改操作
        public function excuteCUD($sql){
            $res = $this->mySQLi->query($sql) or die("数据操作失败!".$this->mySQLi->error);

            if(!$res){
                return -1;
            }
            else{
                if($this->mySQLi->affected_rows > 0){
                    return 0;
                }
                else{
                    return -1;
                }
            }
        }

        //关闭数据库
        public function close(){
            $this->mySQLi->close();
        }
    }
?>