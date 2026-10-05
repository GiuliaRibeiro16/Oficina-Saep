<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Página Inicial</title>
    </head>
    <body>
        <h1>Página Inicial</h1>
        <h2>Oficina Mecânica</h2>
        <h3>Bem vindo, <?= session()->get('usuario')['USU_NOME'] ?>!</h3>
        <a href="<?= base_url('clientes') ?>"><button>Gestão de Clientes</button></a>
        <a href="<?= base_url('veiculos') ?>"><button>Gestão de Veículos</button></a>
        <a href="<?= base_url('agendamentos') ?>"><button>Gestão de Agendamentos</button></a>
        <a href="<?= base_url('logout') ?>"><button>Logout</button></a>
    </body>
</html>