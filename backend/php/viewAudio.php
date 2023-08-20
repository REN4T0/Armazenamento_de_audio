<?php
include_once("../../routes/routes.php");
include_once("../database/connect.php");



// Função que consulta a quantidade de registros no banco de dados
function getNumberOfRegisters($conn){
    // Contando a quantidade de registros
    $registerCount = "SELECT COUNT(*) as totalRegisters FROM audios";
    $executeCount = $conn->query($registerCount);

    // Verificando se existe algum registro
    if($executeCount->num_rows > 0){
        $getCountArray = $executeCount->fetch_assoc();
        $response = $getCountArray['totalRegisters'];
    }else{
        $response = 0;
    }

    // Retornando a quantidade de registros
    return($response);
}



function consultAudioPaths($quantity, $conn){
    // Variável que vai receber os elementos em HTML com o áudio
    $audioElements = "";

    // Looping que vai consultar os aúdios existentes no banco de dados
    for($counter = 1; $counter <= $quantity; $counter++){
        $consultPath = "SELECT `name`,`path` FROM audios WHERE id = ?";
        $stmt = $conn->prepare($consultPath);
        $stmt->bind_param('i', $counter);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $path = $row["path"];
        $name = $row["name"];

        $audioElements .= "<p>$name</p><br><audio controls><source src='$path' type='audio/mp3'></audio><br>";
    }

    return($audioElements);
}



$registerCountResult = getNumberOfRegisters($conn);

// Validando se há algum registro no banco de dados
if($registerCountResult == 0){
    $_SESSION['exposeElement'] = "Nenhum registro encontrado";
    header("location:" . $indexRoute);
}else{
    $consultAudioResult = consultAudioPaths($registerCountResult, $conn);
    
    // Enviando a mensagem de confirmação de arquivamento e os elementos HTML gerados
    $_SESSION['msg'] = "Áudio armazenado com sucesso!";
    $_SESSION['exposeElement'] = $consultAudioResult;
    header("location:" . $indexRoute);
}

?>