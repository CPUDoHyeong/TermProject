<?php
namespace App\Http\Controllers;
use \PDO;

    class boardDao{
        private $db;
        function __construct(){
            try{
                $this->db = new PDO("mysql:host=localhost;dbname=phpA", "root", "1111");
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function insertMsg($title, $writer, $content){
            try{
                $sql = "insert into boards(writer, title, content) values(:writer, :title, :content)";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":title", $title, PDO::PARAM_STR);
                $pstmt->bindValue(":writer", $writer, PDO::PARAM_STR);
                $pstmt->bindValue(":content", $content, PDO::PARAM_STR);

                $pstmt->execute();

            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }


    function getMsg($num){
            try {              
                $pstmt = $this->db->prepare("select * from boards where id=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
                $result = $pstmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e) {
                exit($e->getMessage());
            }   
            return $result;
    }

    function increaseHits($num) {
             try {              
                $pstmt = $this->db->prepare("update boards set hits=hits+1 where id=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e) {
                exit($e->getMessage());
            }   
    }              
    

    function getManyMsgs() {
        // sql : "select * from board";
        $sql = "select * from boards";
        try {
            $pstmt = $this->db->prepare($sql);
            $pstmt->execute();
            $msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e) {
            exit($e->getMessage());
        }
        return $msgs;
    }

    function updateMsg($num, $title, $writer, $content) {
        try{
                $sql = "update boards set title=:title, writer=:writer, content=:content where id = :num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":title", $title, PDO::PARAM_STR);
                $pstmt->bindValue(":writer", $writer, PDO::PARAM_STR);
                $pstmt->bindValue(":content", $content, PDO::PARAM_STR);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);

                $pstmt->execute();

            }catch(PDOException $e){
                exit($e->getMessage());
            }
    }

     function getTotalCount() {
        $sql = "select count(*) from boards";
        try {
            $pstmt = $this->db->prepare($sql);
            $pstmt->execute();
            $num = $pstmt->fetchColumn();
        }catch(PDOException $e) {
            exit($e->getMessage());
        }
        return $num;
    }

    function getMsgs4Page($startRecord, $count) {
          $sql = "select * from boards order by id desc limit :s, :c";
        try {
            $pstmt = $this->db->prepare($sql);
            $pstmt->bindValue(":s", $startRecord, PDO::PARAM_INT);
            $pstmt->bindValue(":c", $count, PDO::PARAM_INT);
            $pstmt->execute();
            $msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e) {
            exit($e->getMessage());
        }
        return $msgs;
    }


    function deleteMsg($num) {
        $sql = "delete from boards where id = :num";
        try {
            $pstmt = $this->db->prepare($sql);
            $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
            $pstmt->execute();
        }catch(PDOException $e) {
            exit($e->getMessage());
        }
    }
  }  

?>