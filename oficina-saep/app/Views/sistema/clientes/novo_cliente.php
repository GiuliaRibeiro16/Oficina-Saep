<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Novo Cliente</title>
    </head>
    <body>
        <h1>Novo Cliente</h1>
        <form action="<?= base_url('clientes/inserir') ?>" method="POST">
            <label>Nome:</label><br>
            <input type="text" id="nome" name="nome" placeholder="Nome..." required>

            <br><br>
            
            <label>CPF:</label><br>
            <input type="text" id="cpf" name="cpf" placeholder="CPF..." required>

            <br><br>

            <label>Telefone:</label><br>
            <input type="tel" id="telefone" name="telefone" placeholder="Telefone..." required>

            <br><br>

            <input type="submit" id="cadastrar_cliente" name="cadastrar_cliente" value="Cadastrar">
        </form>
        <br>
        <a href="<?= base_url('clientes') ?>"><button>Voltar</button></a>
    </body>
</html>