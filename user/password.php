<?php

// Inclui arquivo de configuração
require_once $_SERVER['DOCUMENT_ROOT'] . "/_config.php";

/*******************************************
 * Seu código PHP desta página entra aqui! *
 *******************************************/

/*********************************************
 * Seu código PHP desta página termina aqui! *
 *********************************************/

 // Variáveis do script
$form['feedback'] = '';
$show_form = true;

// Se não estiver logado, vai para a 'index'.
if (!isset($_COOKIE['user'])) header('Location: /');

if (isset($_POST['send-password'])) :

    // debug($_POST);

    // Obtém os valores dos campos, sanitiza e armazena nas variáveis.
    $form['user_passwordold'] = sanitize('passwordold', 'string');
    $form['user_passwordnew'] = sanitize('passwordnew', 'string');
    $form['user_passwordnew2'] = sanitize('passwordnew2', 'string');

    // Verifica se todos os campos form preenchidos
    if ($form['user_passwordold'] === '' or $form['user_passwordnew'] === '' or $form['user_passwordnew2'] === '') :
        $form['feedback'] = '<h3 style="color:red">Erro: por favor, preencha todos os campos!</h3>';

    // Verifica se as senhas digitadas coincidem
    elseif ($form['passwordnew'] !== $form['passwordnew2']) :
        $form['feedback'] = '<h3 style="color:red">Erro: as senhas não coincidem!</h3>';
        $form['passwordnew'] = $form['passwordnew2'] = '';

    else :

        // String de atualização
        $sql = <<<SQL

UPDATE users 
SET 
    user_password = SHA2('{$form['user_passwordnew']}',512)
WHERE user_id = '{$user['user_id']}' 
AND user_password = SHA2('{$form['user_passwordold']}', 512);


SQL;

        // Executa a query
        $res = $conn->query($sql);

        // Testa o resultado da atualização
        $result = $conn->affected_rows;

        // Se não atualizou...
        if ($result == 0) :
            $form['feedback'] = '<h3 style="color:red">Erro: a senha está incorreta!</h3>';

        // Se deu erro no SQL...
        elseif ($result == -1) :
            $form['feedback'] = '<h3 style="color:red">Erro: falha no acesso ao banco de dados!</h3>';

        // Se deu tudo certo...
        else :

            // Cria mensagem de confirmação.
            $form['feedback'] = <<<OUT
                    
                <h3>Olá </h3>
                <p>Sua atualizado foi enviado.</p>
                <p><em>Obrigado...</em></p>
                
OUT;

            // Oculto o formulário.
            $show_form = false;

        endif;

    endif;

else :

    // Obtendo dados do usuário direto do banco de dados.
    $sql = <<<SQL

SELECT * FROM `users`
WHERE user_id = '{$user['user_id']}'
AND user_status = 'on';

SQL;

    // Executa a consulta
    $res = $conn->query($sql);

    // Se não retornar nada, volta para profile.
    if ($res->num_rows !== 1) header('Location: /user/profile.php');

    // Associa os dados ao formulário
    $form = $res->fetch_assoc();

    // Variáveis do script
    $form['feedback'] = '';

endif;

// Define o título DESTA página.
$page_title = "";

// Opção ativa no menu
$page_menu = "password";

// Inclui o cabeçalho da página
require_once $_SERVER['DOCUMENT_ROOT'] . "/_header.php";

?>

<?php // Conteúdo 
?>
<article>

<h2>Editar Senha</h2>

    <?php echo $form['feedback']; ?>

    <?php if ($show_form) : ?>

        <p>Altere os dados no formulário abaixo:</p>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="edit-profile">

            <input type="hidden" name="send-password" value="true">

            <p>
                <label for="passwordold">Senha atual:</label>
                <input type="password" name="passwordold" id="passwordold" placeholder="Senha atual." value="">
            </p>
            <p>
                <label for="passwordnew">Nova Senha:</label>
                <input type="password" name="passwordnew" id="passwordnew" placeholder="Nova Senha." value="">
            </p>
            <p>
                <label for="passwordnew2">Confirmar senha:</label>
                <input type="password" name="passwordnew2" id="passwordnew2" placeholder="Confirmar senha." value="">
            </p>

            <p>
                <label></label>
                <button type="submit">Salvar</button>
            </p>

        </form>

    <?php endif; ?>


</article>

<?php // Barra lateral 
?>
<aside>

    <h3>Seções:</h3>

    <ul>
        <li><a href="/sections/front.php">Front-end</a></li>
        <li><a href="/sections/back.php">Back-end</a></li>
        <li><a href="/sections/full.php">Full-stack</a></li>
    </ul>

</aside>

<?php

// Inclui o rodapé da página
require_once $_SERVER['DOCUMENT_ROOT'] . "/_footer.php";

?>