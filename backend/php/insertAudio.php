<?php
include_once("../../routes/routes.php");
include_once("../database/connect.php");

function verifyNameHaveMP3($name){
    $audioNameToVerify = $name;

    // Verificando se o áudio tem o .MP3 e, caso não tenha, será inserido.
    if(!preg_match("/.mp3/i", $audioNameToVerify)){
        $audioNameVerifyed = $audioNameToVerify . ".mp3";
    }else{
        $audioNameVerifyed = $audioNameToVerify;
    }

    return($audioNameVerifyed); 
}



function storagingAudio($audioNameReceived, $audioReceived, $audioFolderRoute){
    // Estabelecendo o caminho da pasta para qual esse arquivo vai e inserindo o nome dele nesse exato momento
    $targetPath = "../../audio/" . $audioNameReceived;

    // Criando outro caminho com a URL para armazenar no banco. Se usar o caminho acima, irá dar erro em outras telas
    $pathToStorage = $audioFolderRoute . $audioNameReceived;

    // Armazenando o arquivo no diretório "audio"
    if(move_uploaded_file($audioReceived, $targetPath)){
        $response = $pathToStorage;
    }else{
        $response = "Error";
    }

    return($response);
}



function storagingInfoInDB($name, $path, $storageDate, $size, $conn){
    $insertInfo = "INSERT INTO audios (`name`, `path`, `storageDate`, `size`) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insertInfo);
    $stmt->bind_param('ssss', $name, $path, $storageDate, $size);

    if($stmt->execute()){
        $result = true;
    }else{
        $result = false;
    }

    return($result);

}



// O princípio - Recebendo os dados
if(($_SERVER['REQUEST_METHOD'] == "POST") && (isset($_FILES["audioFile"]))){
    $audioName = htmlspecialchars($_POST["fileName"]);
    $audio = $_FILES["audioFile"]["tmp_name"];
    $datetime = htmlspecialchars($_POST["dateTime"]); //Não dá para confiar no horário do próprio hardware
    $audioSize = round(htmlspecialchars($_FILES["audioFile"]["size"]) / 1048576, 2) . "MB"; // Recebendo o tamanho do áudio em bytes e convertendo-o em megabytes de imediato
}else{
    echo "Erro";
}


// Chamando as funções e verificando se ocorreram com sucesso
$audioNameResult = verifyNameHaveMP3($audioName);
$audioStorageResult = storagingAudio($audioNameResult, $audio, $audioFolder); //Junto com os demais dados, enviei a rota de pasta "audio" nesta função, afim de juntar a URL como nome do áudio para armazenar no banco de dados

if($audioStorageResult === "Error"){
    $_SESSION['msg'] = "Não foi possível armazenar o áudio";
    header("location:" . $indexRoute);
}else{
    $storageResult = storagingInfoInDB($audioNameResult, $audioStorageResult, $datetime, $audioSize, $conn); //Além dos dados armazenados no banco, enviei a variável de conexão para executar a inserção das informações no banco de dados
    
    if($storageResult){
        // $_SESSION['msg'] = "Áudio armazenado com sucesso!";
        // header("location:" . $indexRoute);
        header("location:" . $viewAudioRoute);
    }else{
        $_SESSION['msg'] = "Não foi possível armazenar o áudio";
        header("location:" . $indexRoute);
    }
}
?>