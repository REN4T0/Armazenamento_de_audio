<?php
    session_start();

    $mainRoute = "http://" . $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . "/Projetos/'Armazenamento_de_audio/";
    $backendRoute = $mainRoute . "backend/";

    // Rotas para as pastas do backend
    $dbFolderRoute = $backendRoute . "database/";
    $phpFolderRoute = $backendRoute . "php/";

    //Rota para o arquivo de conexão
    $connRoute = $dbFolderRoute . "connect.php";

    // Rota para páginas
    $indexRoute = $mainRoute . "index.php";
    
    // Rotas para arquivos de armazenamento
    $insertAudioRoute = $phpFolderRoute . "insertAudio.php";

?>