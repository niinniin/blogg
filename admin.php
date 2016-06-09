<?php
    require "functions.php";

    $row = get_all();

   
?>
<html>
    
    <head>
        <title>Blogg</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <nav>
        <ul id="menu">
            <li><a href="index.php">Public</a></li>        
            <li class="active"><a href="#" >Admin</a></li>        
        </ul>
        </nav>
        <div id="wrapper">
            <a href="skapa.php"><button class="btn">Skapa inlägg</button></a>
            
        <?php foreach($row as $array=>$value): ?>
                
          
            <div class="blogginlägg">
                <h1 class="title"><?= $value['title'];?></h1>
                <p class="content"><?= $value['content'];?></p>
                <div class="info">
                    <span class="author"><?= $value['author'];?></span>
                    <span class="date"><?= $value['published_date'];?></span>
                </div>
            </div>
            <form class="editmenu" action="edit.php" method="post">
                <button class="btn" name="edit" value="<?= $value['id'];?>">Ändra</button>
            </form>
            <form class="editmenu" action="delete.php" method="post">
                <button class="btn" name="delete" value="<?= $value['id'];?>">Radera</button>
            </form>
            
            <div class="line"></div>

        <?php endforeach; ?>
            
        </div>
    </body>
</html>