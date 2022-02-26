
<?php

// Inclui arquivo de configuração
require_once $_SERVER['DOCUMENT_ROOT'] . "/_config.php";

// Define o titilo dessa pagina
$page_title = 'Midias';

// Inclui o cbeçalho da página
require_once $_SERVER['DOCUMENT_ROOT'] . "/_header.php";

?>


<main>
        <h2>Pagina De Midias</h2>

        <article>
            <h2>Programing</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, eum atque deleniti repudiandae ipsa, consequuntur praesentium aspernatur labore modi explicabo totam, illo voluptatibus aperiam quasi temporibus cumque. Cumque, illum maxime.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Architecto, repellendus. Laboriosam porro, magnam libero odio corporis fugiat et quae voluptatum perspiciatis, molestias consequuntur ratione nihil maiores nam dolor rem deserunt.</p>
            <h2>Web developer</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum libero voluptas est inventore, mollitia veritatis iusto illo iure vitae praesentium tenetur molestiae dolore ullam hic placeat officia fugiat velit id.</p>
        </article>
        <article>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil obcaecati id recusandae minus porro
            laudantium rem. Similique repellendus incidunt ad labore unde voluptates, recusandae at, expedita magnam
            iure facere quia?</p>

        <h3>Links:</h3>

        <ul>
            <?php // O atributo 'target="_blank"' do link força a abertura em outra guia do navegador ?>
            <li><a href="http://catabits.com.br" target="_blank">Site do Fessô</a></li>
            <li><a href="https://americanas.com" target="_blank">Site Hackeado</a></li>
            <li><a href="https://www.rj.senac.br" target="_blank">Senac RJ</a></li>
        </ul>

        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque quod suscipit ratione commodi,
            corrupti tempore mollitia accusantium in eligendi dolores dicta dolore, accusamus tenetur omnis, dolor
            ducimus! Iure, ad ea!</p>

        <div>
            <img src="https://picsum.photos/400/200" alt="Imagem aleatória">
        </div>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam maxime a saepe voluptatum laborum
            magnam, temporibus blanditiis aspernatur, nihil vero consequuntur quidem perferendis aliquam. Rem
            voluptatibus consequuntur neque ex explicabo!</p>

        </article>

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