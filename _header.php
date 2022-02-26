<?php

// Formata o título da página
if ($page_title == '') {
    $page_title = $site_name;
} else {
    $page_title = $site_name . ' - ' . $page_title;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $page_title; ?> </title>

    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="ônix.png" type="image/png">

</head>
<body>

    
    <header>
        <a href="index.php"><img src="<?php echo $site_logo?>" alt="<?php echo $site_name?>"></a>
        <h1>Programing</h1>
    </header>

    <nav>
        <a href="_modelo.php">Inicio</a>
         <a href="noticias.php">Noticias</a>
         <a href="midia.php">Midias</a>
         <a href="sobre.php">Sobre</a>
    </nav>



    