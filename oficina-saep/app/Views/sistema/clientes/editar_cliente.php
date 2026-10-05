<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Editar Cliente</title>
    </head>
    <body>
        <h1>Editar Cliente</h1>

        <form action="<?= base_url('clientes/atualizar/'.$clientes['CLI_ID']) ?>" method="POST">
            <label>Nome:</label><br>
            <input type="text" id="nome" name="nome" value="<?= $clientes['CLI_NOME'] ?>" required>
            <br><br>
            <label>CPF:</label><br>
            <input type="text" id="cpf" name="cpf" value="<?= $clientes['CLI_CPF'] ?>" required>
            <br><br>
            <label>Telefone:</label><br>
            <input type="tel" id="telefone" name="telefone" value="<?= $clientes['CLI_TELEFONE'] ?>" required>
            <br><br>
            <input type="submit" id="editar_cliente" name="editar_cliente" value="Salvar Alterações">
        </form>

        <br>
        <a href="<?= base_url('clientes') ?>"><button>Voltar</button></a>
    </body>
</html>