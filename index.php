<?php
    require "functions.php";

    $row = get_all();
    
       
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
            <li class="active"><a href="#" >Public</a></li>        
            <li><a href="admin.php">Admin</a></li>        
        </ul>
        </nav>
        <div id="wrapper">
        <?php foreach($row as $array=>$value): ?>
                
          
            <div class="blogginlägg">
                <h1 class="title"><?= $value['title'];?></h1>
                <p class="content"><?= $value['content'];?></p>
                <div class="info">
                    <span class="author"><?= $value['author']?></span>
                    <span class="date"><?= $value['published_date']?></span>
                </div>
            </div>
            <div class="line"></div>

        <?php endforeach; ?>
        </div>
    
    </body>
</html>