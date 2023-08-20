<?php
include_once("../../routes/routes.php");
include_once($connRoute);

function verifyNameHaveMP3($name){
    $audioNameToVerify = $name;

    // Verificando se o áudio tem o .MP3 e, caso não tenha, será inserido.
    if(!preg_match("/.mp3/i", $audioNameToVerify)){
        $audioNameVerifyed = $audioNameToVerify . ".mp3";
    }

    return($audioNameVerifyed); 
}

function storagingAudio($audioNameReceived, $audioReceived){
    // Estabelecendo o caminho da pasta para qual esse arquivo vai e inserindo o nome dele
    $targetPath = "../../audio/" . $audioNameReceived;
    
    // Movendo o arquivo
    if(move_uploaded_file($audioReceived, $targetPath)){
        $response = "Success";
    }else{
        $response = "Error";
    }

    return array($response, $targetPath);
}

if(($_SERVER['REQUEST_METHOD'] == "POST") && (isset($_FILES["audioFile"]))){
    $audioName = htmlspecialchars($_POST["fileName"]);
    $audio = $_FILES["audioFile"]["tmp_name"];

    // Recebendo o tamanho do áudio em bytes e convertendo-o em megabytes de imediato
    $audioSize = round(htmlspecialchars($_FILES["audioFile"]["size"]) / 1048576, 2);
}else{
    echo "Erro";
}

echo "$audioName, $audioSize";

// $audioNameResult = verifyNameHaveMP3($audioName);
// $audioStorageResult = storagingAudio($audioNameResult, $audio);

// print_r($audioStorageResult);

?>