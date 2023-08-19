<?php
    include_once("./backend/routes/routes.php");
    echo $connRoute;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        if(isset($_SESSION["msg"])){
            echo $_SESSION["msg"];
            unset($_SESSION["msg"]);
        }

        if(isset($_SESSION["insertConfirmation"])){
            echo $_SESSION["insertConfirmation"];
            unset($_SESSION["insertConfirmation"]);
        }
    ?>
    
    <form action="<?php echo $insertAudioRoute; ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="audio" id="audio">
        <button type="submit">Enviar</button>
    </form>
    
    <!-- <audio controls>
        <source src="./audio/18-de-agosto-de-2023-final.mp3" type="audio/mpeg">
    </audio> -->
</body>
</html>