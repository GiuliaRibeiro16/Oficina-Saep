<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Login - Oficina Mecânica</title>
    </head>
    <body>
        <h1>Login - Oficina Mecânica</h1>

        <form action="<?= base_url('login/autenticar') ?>" method="POST">
            <label>Email:</label><br>
            <input type="email" id="email" name="email" placeholder="Email..." required>

            <br><br>

            <label>Senha:</label><br>
            <input type="password" id="senha" name="senha" placeholder="Senha..." required>

            <br>
            
            <span style="color: red">
                <?php if(session()->getFlashdata('erro_login')): ?>
                    <?= session()->getFlashdata('erro_login') ?>
                <?php endif; ?>
            </span>

            <br>

            <input type="submit" id="login" name="login" value="Acessar">
        </form>
    </body>
</html>