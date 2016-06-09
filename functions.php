<?php
        function db_connect(){
            $dns = "mysql:unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock;dbname=blog_db;";
            $user = "root";
            $password = "root";

            $db = new PDO($dns, $user, $password);
            $db->exec("set names utf8");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        }

        function add($title,$content,$author){
            $db = db_connect();
            
            if(!empty($title)){        
            try{
              $stmt = $db->prepare("
                INSERT INTO blog_tbl (title, content, author)
                VALUES (:title, :content, :author);
              ");
              $stmt->bindValue(":title", $title);
              $stmt->bindValue(":content", $content);
              $stmt->bindValue(":author", $author);
              $stmt->execute();
              
            } catch(PDOexception $e) {
                die($e->getMessage());

            }
              
            header("Location: success.php");
            exit;
            }
        }
        function get_all(){
            $db = db_connect();
            $stmt = $db->query("SELECT * FROM blog_tbl");
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
           
            return $row;
        }
        function get_data($id){
            $db = db_connect();
            
     
            $stmt = $db->query("SELECT * FROM blog_tbl WHERE id=$id");
            //$stmt->bindValue(":id", $id);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $row;
                
         
            
            
        }
            
        function delete($id){
            $db = db_connect();
            
            $stmt = $db->prepare("DELETE FROM blog_tbl WHERE id=:id ");
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            
            header("Location: admin.php");
            exit;
        }

        function update($id, $content, $author, $title){
            $db = db_connect();
            
            try{
            $stmt = $db->prepare("UPDATE blog_tbl SET title=:title, content=:content, author=:author WHERE id=:id");
            $stmt->bindValue(":id", $id);
            $stmt->bindValue(":content", $content);
            $stmt->bindValue(":title", $title);
            $stmt->bindValue(":author", $author);
            
            $stmt->execute();
             } catch(PDOexception $e) {
                die($e->getMessage());

            }
            
            header("Location: admin.php");
            exit;
            
            
        }
?>