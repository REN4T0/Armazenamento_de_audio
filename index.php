<?php
include_once("./routes/routes.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?php echo $fileNameRoute ?>" defer></script>
    <script src="<?php echo $rightHourRoute; ?>"></script>
    <title>Dailys</title>
</head>
<body>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <form action="<?php echo $insertAudioRoute; ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="dateTime" id="dateTimeInput" readonly>
        <input type="text" name="fileName" id="fileNameInput">
        <input type="file" name="audioFile" id="audioFileInput" onchange="updateFileName()">
        <button type="submit">Enviar áudio</button>
    </form>
</body>
</html>