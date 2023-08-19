<?php
include_once("../routes/routes.php");
include_once("../database/connect.php");

if(($_SERVER["REQUEST_METHOD"] === "POST") && (isset($_FILES["audio"]))){
    $audioFile = file_get_contents($_FILES["audio"]["tmp_name"]);

    $insertFile = "INSERT INTO audioFile (audioFile) VALUES (?)";
    $stmt = $conn->prepare($insertFile);
    $stmt->bind_param("d", $audioFile);

    if($stmt->execute()){
        $_SESSION["insertConfirmation"] = "Sucesso";
        header("location:" . $indexRoute);
    }else{
        $_SESSION["insertConfirmation"] = "A operação falhou";
        header("location:" . $indexRoute);
    }

    $stmt->close();
}else{
    $_SESSION["msg"] = "Escolha um áudio";
    header("location:" . $indexRoute);
}
?>