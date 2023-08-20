<?php
    session_start();

    $mainRoute = "http://" . $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . "/Projetos/Armazenamento_de_audio/";

    // Rota para primeiras pastas do diretório principal
    $backendRoute = $mainRoute . "backend/";
    $audioFolder = $mainRoute . "audio/";
    $frontendRoute = $mainRoute . "frontend/";

    // Rotas para as pastas do backend
    $dbFolderRoute = $backendRoute . "database/";
    $phpFolderRoute = $backendRoute . "php/";

    // Rotas para pastas do frontend
    $jsRoute = $frontendRoute . "js/";

    // Rotas para pastas do JS
    $apiFolderRoute = $jsRoute . "api/";

    //Rota para o arquivo de conexão
    $connRoute = $dbFolderRoute . "connect.php";

    // Rotas para arquivos PHP
    $insertAudioRoute = $phpFolderRoute . "insertAudio.php";
    $viewAudioRoute = $phpFolderRoute . "viewAudio.php";

    // Rotas para arquivos JS
    $rightHourRoute = $apiFolderRoute . "rightHour.js";
    $fileNameRoute = $jsRoute . "fileName.js";
    
    // Rota para páginas
    $indexRoute = $mainRoute . "index.php";
?>