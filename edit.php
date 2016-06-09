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
            
            update($_POST["submit"], $content, $author, $title);
    
            
        }
        else{
            $message = "<ul>" . $message . "</ul>";
            
        }
    
    }
    if(isset($_POST['edit'])){
        $data = get_data($_POST['edit']);
    }
    else{
        $data['title']= $_POST['title'];
        $data['content']= $_POST['content'];
        $data['author']= $_POST['author'];
        $data['id']= $_POST['submit'];
        
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
            <a href="admin.php"><button class="btn">Gå tillbaka</button></a>

            
            <form action="" method="POST">
                <input id="title" name="title" placeholder="Title" value="<?= $data['title'];?>"><br>
                <textarea id="content" name="content" placeholder="Content"> <?= $data['content'];?> </textarea><br>
                <input id="author" name="author" placeholder="Author" value="<?= $data['author'];?>">
                <a><button class="btn" name="submit"  value="<?= $data['id'];?>" type="submit">Uppdatera</button></a>
                
            </form>
            
            <div id="Message">
                <?= $message ?>
            
            </div>

        </div>
    </body>
</html>