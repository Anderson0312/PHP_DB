
<?php

// Inclui arquivo de configuração
require_once $_SERVER['DOCUMENT_ROOT'] . "/_config.php";

/*******************************************
 * Seu código PHP desta página entra aqui! *
 *******************************************/

// Variável que contém a lista de artigos (string).
$art_list = '';

/*
 * Query que obtém so artigos:
 *    Ordenados pelo mais recente.
 *    Somente com o status 'on'.
 *    Somente da data atual e anteriores.
 */
$sql = <<<SQL

SELECT article_id, article_title, article_image, article_intro 
FROM articles 
WHERE article_status = 'on' AND article_date <= NOW() 
ORDER BY article_date DESC;

SQL;

$res = $conn->query($sql);
while ($art = $res->fetch_assoc()) {

    $art_list .= <<<HTML

<div class="article-item">

    <div class="article-item-img">
        <a href="/page/view.php?id={$art['article_id']}"><img src="{$art['article_image']}" alt="{$art['article_title']}"></a>
    </div>

    <div class="article-item-intro">
        <h3><a href="/page/view.php?id={$art['article_id']}">{$art['article_title']}</a></h3>
        {$art['article_intro']}
    </div>

</div>

HTML;
}

/*********************************************
 * Seu código PHP desta página termina aqui! *
 *********************************************/

// Define o titilo dessa pagina
$page_title = 'Noticias';

// Inclui o cbeçalho da página
require_once $_SERVER['DOCUMENT_ROOT'] . "/_header.php";

?>

<main>
        <h2>Noticias mais relevantes</h2>

        <?php echo $art_list ?>
        
        <aside>

    <h3>Seções:</h3>

    <ul>
        <li><a href="/sections/front.php">Front-end</a></li>
        <li><a href="/sections/back.php">Back-end</a></li>
        <li><a href="/sections/full.php">Full-stack</a></li>
    </ul>

    </aside>
    </main>

<?php

// Inclui o rodapé da página
require_once $_SERVER['DOCUMENT_ROOT'] . "/_footer.php";

?>