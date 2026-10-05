<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Editar Agendamento</title>
    </head>
    <body>
        <h1>Editar Agendamento</h1>

        <form action="<?= base_url('agendamentos/atualizar/'.$agendamento['AGE_ID']) ?>" method="POST">
            <label>Data e Hora:</label><br>
            <input type="datetime-local" id="data_hora" name="data_hora" value="<?= date('Y-m-d\TH:i', strtotime($agendamento['AGE_DATA_HORA'])) ?>" required>
            <br><br>

            <label>Serviço:</label><br>
            <input type="text" id="servico" name="servico" value="<?= $agendamento['AGE_SERVICO'] ?>" required>
            <br><br>

            <label>Status:</label><br>
            <input type="text" id="status" name="status" value="<?= $agendamento['AGE_STATUS'] ?>" required>
            <br><br>

            <label>Cliente:</label><br>
            <select id="cliente" name="cliente" required>
                <?php foreach($clientes as $cliente): ?>
                    <option value="<?= $cliente['CLI_ID'] ?>"
                        <?= $cliente['CLI_ID'] == $agendamento['FK_CLI_ID'] ? 'selected' : '' ?>>
                        <?= $cliente['CLI_NOME'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br><br>

            <label>Veículo:</label><br>
            <select id="veiculo" name="veiculo" required>
                <?php foreach($veiculos as $veiculo): ?>
                    <option value="<?= $veiculo['VEI_ID'] ?>"
                        <?= $veiculo['VEI_ID'] == $agendamento['FK_VEI_ID'] ? 'selected' : '' ?>>
                        <?= $veiculo['VEI_PLACA'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br><br>

            <input type="submit" id="editar_agendamento" name="editar_agendamento" value="Salvar Alterações">
        </form>
        <br>
        <a href="<?= base_url('agendamentos') ?>"><button>Voltar</button></a>
    </body>
</html>