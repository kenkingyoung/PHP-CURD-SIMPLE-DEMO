<?php
    require_once "Sqliconnect.class.php";
    
    class Pagination{

        const PAGE_SIZE = 5;

        public function getPaginationData($page, $tableName, $condition){

            if(isset($page) && is_numeric($page)){
                $page = intval($page);
            }
            else{
                $page = 1;
            }

            if(!isset($tableName) || $tableName == ""){
                return;
            }

            $sql = "select * from ".$tableName;

            if(isset($condition) && $condition != ""){
                $sql .= " where ".$condition;
            }

            // 总记录数
            $totalCount = $this->getTotalCountInQuery($tableName, $condition);

            // 总页数
            $totalPage = ceil($totalCount / Pagination::PAGE_SIZE);

            if($totalPage > 0 && $page > $totalPage) {
                $page = $totalPage;
            }

            $sql .= (" order by id desc limit ".(($page - 1) * Pagination::PAGE_SIZE).", ".Pagination::PAGE_SIZE);

            $sqliConnect = new Sqliconnect();
            $result = $sqliConnect->excuteQuery($sql);
            
            return $result;
        }

        public function getPaginationFooter($page, $url, $tableName, $condition){

            if(isset($page) && is_numeric($page)){
                $page = intval($page);
            }
            else{
                $page = 1;
            }

            // 总行数
            $totalCount = $this->getTotalCountInQuery($tableName, $condition);

            // 总页数
            $totalPage = ceil($totalCount / Pagination::PAGE_SIZE);

            if($page > $totalPage) {
                $page = $totalPage;
            }

            $paginationFooter = "<div style='height: 30px; line-height: 30px; margin: 20px 0;'>";

            if($totalPage > 1){
                $paginationFooter .= "<span style='margin: 0 5px;'><a href='".$url."'>首页</a></span>";
            }

            for($i = 1; $i <= $totalPage; $i++){
                $paginationFooter .= "<span style='margin: 0 5px;'><a href='".$url.((stripos($url, "?")?"&":"?"))."page=".$i."'".($i==$page?" style='color:red;'":"").">".$i."</a></span>";
            }

            if($totalPage > 1){
                $paginationFooter .= "<span style='margin: 0 5px;'><a href='".$url.((stripos($url, "?")?"&":"?"))."page=".$totalPage."'>末页</a></span>";
            }

            $paginationFooter .= "</div>";

            return $paginationFooter;
        }

        private function getTotalCountInQuery($tableName, $condition){
            $sqliConnect = new Sqliconnect();        

            if(!isset($tableName) || $tableName == ""){
                return 0;
            }

            $sql = "select count(*) from ".$tableName;

            if(isset($condition) && $condition != ""){
                $sql .= " where ".$condition;
            }

            $result = $sqliConnect->excuteQuery($sql);

            $array = $result->fetch_array();

            $totalCount = $array[0];

            return $totalCount;
        }
    }
?>