<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Lista de Clientes</title>
    </head>
    <body>
        <h1>Lista de Clientes</h1>

        <form method="POST" action="<?= base_url('clientes') ?>">
            <input type="search" id="pesquisar" name="pesquisar" placeholder="Pesquisar...">
            <input type="submit" id="botao_pesquisar" name="botao_pesquisar" value="Filtrar">
        </form>

        <br>

        <table border="1">
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>

            <?php foreach($clientes as $cliente): ?>
                <tr>
                    <td><?= $cliente['CLI_NOME'] ?></td>
                    <td><?= $cliente['CLI_CPF'] ?></td>
                    <td><?= $cliente['CLI_TELEFONE'] ?></td>
                    <td><a href="<?= base_url('clientes/editar/'.$cliente['CLI_ID']) ?>">Editar</a></td>
                    <td><a href="<?= base_url('clientes/excluir/'.$cliente['CLI_ID']) ?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <br>
        <a href="<?= base_url('clientes/novo') ?>"><button>Cadastrar Cliente</button></a>
        <br><br>
        <a href="<?= base_url('inicio') ?>"><button>Voltar</button></a>
    </body>
</html>