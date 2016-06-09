<?php
    require "functions.php";

    $title ="";
    $content ="";
    $author ="";

    $message ="";

    if(isset($_POST["submit"])){
                
        $title = trim($_POST["title"]);
        $content = trim($_POST["content"]);
        $author = trim($_POST["author"]);
                
        if(!$title){
            
            $message .= "<li> Du har inte angett någon titel </li>";


        }
        if(!$content){
            
            $message .= "<li> Inlägget saknar text </li>";

        }
        if(!$author){
            
            $message .= "<li> Inlägget kan inte sparas utan författare </li>";


        }
        
        if(empty($message)){
            $message = "";
            
            add($title, $content,$author);
    
            
        }
        else{
            $message = "<ul>" . $message . "</ul>";
        }
  
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Blogg</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <nav>
        <ul id="menu">
            <li><a href="index.php">Public</a></li>        
            <li><a href="admin.php">Admin</a></li>        
        </ul>
        </nav>
        <div id="wrapper">
            <a href="admin.php"><button class="btn" >Gå tillbaka</button></a>
        
            
            <form action="" method="POST">
                <input id="title" name="title" placeholder="Title"><br>
                <textarea id="content" name="content" placeholder="Content"></textarea><br>
                <input id="author" name="author" placeholder="Author">
                <a><button class="btn" name="submit" type="submit">Lägg till</button></a>
            </form>
            
            <div id="Message">
                <?= $message ?>
            
            </div>

        </div>
    </body>
</html>