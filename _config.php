<?php 
    // Configura a página de caracteres do PHP para UTF-8
    header("Content-type: text/html; charset=utf-8");

    // Conexão com o banco de dados MySQL (endereço do servidor MySQL, nome de usuário, senha do db, nome do banco de dados)
    $conn = new mysqli('localhost', 'root', '', 'php_app');

    // Testa se conexão foi bem sucedida.
    if ($conn->connect_error) {
        die("Falha de conexão com banco de dados: " . $conn->connect_error);
    }

    // Consulta de teste. Apague depois de testar.
    $result = $conn->query("SELECT * FROM articles");

    while ($row = $result->fetch_assoc()) {
        echo '<pre>';
        echo $row['article_title'] . ' - ' . $row['article_intro'];
        echo '</pre>';
    }

    // Teste de INSERT. Apague depois de testar.
    $conn->query("INSERT INTO contacts (contact_name, contact_email, contact_subject, contact_message ) VALUES ('Joca', 'joca@email', 'Teste', 'Mensagem do joca')");

    echo '<hr><hr>';

    /**
     * Variáveis do tema
     */

    //Variaveis do Tema
    $site_name = 'Progamming';

     // Define o título <title>...</title> de cada página
     $page_title = '';


     // logo do site
    $site_logo = '/img/nvlogo.png"';

    // rodapé do site 
    $site_rodap = 'Progamming';

    // Define o fuso horário (opcional).
    date_default_timezone_set('America/Sao_Paulo');