

    <footer>
        <div>

            <a href="/" title="Página inicial">Início</a>

            <div>&copy; Copyright 2022 <?php if (date('Y') > '2022') echo ' - ' . date('Y') ?> <?php echo $site['owner'] ?>.</div>

            <a href="#top" title="Topo da página">Topo</a>

        </div>

        <div>

            <div>
                <h3>Redes sociais:</h3>
                <?php echo $social_list; ?>
            </div>

            <div>

                <h3>Links úteis:</h3>
                <ul>
                    <li><a href="/">Sua privacidade</a></li>
                    <li><a href="/page/contacts.php">Faça contato</a></li>
                    <li><a href="/">Site o site</a></li>
                    <li><a href="/">Sobre o autor</a></li>
                </ul>

            </div>

        </div>
    </footer>
    
</body>
</html>