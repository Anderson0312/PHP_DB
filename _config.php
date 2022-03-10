<?php 
    // Configura a página de caracteres do PHP para UTF-8
    header("Content-type: text/html; charset=utf-8");

    // Faz conexão com MySQL/MariaDB
    // Os dados da conexão estão em "_config.ini"
    $i = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/_confg.ini', true);

    /*
    // Debug do MySQL
    echo '<pre>';
    print_r($i);
    echo '</pre>';
    exit;
    */

    foreach ($i as $key => $value) :
        if ($_SERVER['SERVER_NAME'] == $key) :

            // Conexão com MySQL/MariaDB usando "mysqli" (orientada a objetos)
            @$conn = new mysqli($v['server'], $value['user'], $value['password'], $value['database']);

            // Trata possíveis exceções
            if ($conn->connect_error) die("Falha de conexão com o banco e dados: " . $conn->connect_error);
        endif;
    endforeach;

    
    
    // Seta transações com MySQL/MariaDB para UTF-8
    $conn->query("SET NAMES 'utf8'");
    $conn->query('SET character_set_connection=utf8');
    $conn->query('SET character_set_client=utf8');
    $conn->query('SET character_set_results=utf8');
    
    // Seta dias da semana e meses do MySQL/MariaDB para "português do Brasil"
    $conn->query('SET GLOBAL lc_time_names = pt_BR');
    $conn->query('SET lc_time_names = pt_BR');
    
    
    /*

    // Consulta de teste. Apague depois de testar.
    $result = $conn->query("SELECT * FROM articles");

    while ($row = $result->fetch_assoc()) :
        echo '<pre>';
        echo $row['article_title'] . ' - ' . $row['article_intro'];
        echo '</pre>';
    endwhile;
    

    
    // Teste de INSERT. Apague depois de testar.
    $conn->query("INSERT INTO contacts (contact_name, contact_email, contact_subject, contact_message ) VALUES ('Joca', 'joca@email', 'Teste', 'Mensagem do joca')");

    echo '<hr><hr>';

    */

    /******************************************************
     * Gera variáveis do tema à partir do banco de dados. *
     ******************************************************/

    $sql = "SELECT * FROM config;";
    $res = $conn->query($sql);
    while ($x = $res->fetch_assoc()) :

        $p = explode('_', $x['var']);
        $var = $p[0];
        $key = $p[1];

        $$var[$key] = $x['val'];

    endwhile;

    // echo '<pre>';
    // print_r($site);
    // print_r($social);
    // print_r($tema);
    // echo '</pre>';

    /*
    * Dica: No futuro, essas variáveis poderiam ser obtidas do banco de dados.
    */

    /*
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



    /********************
     * Funções globais. *
     ********************/

    // Função que sanitiza campos de formulário.
    function sanitize($field_name, $field_type)
    {

        // Variável com valor do campo filtrado.
        $field_value = '';

        // Aplica o filtro adequado ao tipo de campo.
        switch ($field_type):

                // Se é um campo 'string', remove caracteres perigosos.
            case 'string':
                $field_value = htmlspecialchars($_POST[$field_name]);
                break;

                // Se é um campo 'email', remove caracteres inválidos.
            case 'email':
                $field_value = filter_input(INPUT_POST, $field_name, FILTER_SANITIZE_EMAIL);
                break;

        endswitch;

        // Remove espaços antes e depois da string.
        $field_value = trim($field_value);

        // Remove espaços duplicados no meio da string.
        $field_value = preg_replace('/\\s\\s+/', ' ', $field_value);

        // Retorna o valor do campo já sanitizado.
        return $field_value;
    }