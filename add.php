<?php 
    require("functions.php");

    if(isset($_POST['title'])){
      $title = trim($_POST['title']);

      if(!empty($title)){
        try{
          $stmt = $db->prepare("
            INSERT INTO blog_tbl (title)
            VALUES (:title);
          ");
          $stmt->bindValue(":title", $title);
          $stmt->execute();
        } catch(PDOexception $e) {
            die($e->getMessage());
            
        }
      }
    }
   
    header("Location: skapa.php");
exit;

?>