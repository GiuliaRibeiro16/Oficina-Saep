<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ClientesModel;
use App\Models\VeiculosModel;

// Vincula o Paciente com seu respectivo Responsavel (FK_RES_ID)
class VeiculosController extends BaseController
{
    // Exibe a listagem de paciente
    public function index()
    {
        // Instancia o Model de paciente
        $model = new VeiculosModel();

        // Verifica se o formulário de pesquisa foi enviado
        if ($this->request->getPost('botao_pesquisar')) {

            // Recupera o texto digitado pelo usuário
            $pesquisar = $this->request->getPost('pesquisar');

            // Busca os pacientes juntamente com o nome do responsavel
            // responsável por cada paciente
            $dados['veiculos'] = $model
                ->select('VEICULOS.*, CLIENTES.CLI_NOME')

                // Relaciona PACIENTE com RESPONSAVEL pela chave estrangeira
                ->join(
                    'CLIENTES',
                    'CLIENTES.CLI_ID = VEICULOS.FK_CLI_ID'
                )

                // Agrupa as condições da pesquisa
                ->groupStart()

                    // Pesquisa pela PLACA
                    ->like('VEI_PLACA', $pesquisar)

                    // Pesquisa pela MARCA
                    ->orLike('VEI_MARCA', $pesquisar)

                    // Pesquisa pela MARCA
                    ->orLike('VEI_MODELO', $pesquisar)

                    // Pesquisa pelo ANO
                    ->orLike('VEI_ANO', $pesquisar)

                    // Também permite pesquisar pelo nome do responsavel
                    ->orLike('CLIENTES.CLI_NOME', $pesquisar)

                ->groupEnd()

                // Executa a consulta
                ->findAll();
        }
        else {

            // Caso não exista pesquisa, busca todos os pacientes
            // juntamente com o nome dos respectivos responsaveis
            $dados['veiculos'] = $model
                ->select('VEICULOS.*, CLIENTES.CLI_NOME')
                ->join(
                    'CLIENTES',
                    'CLIENTES.CLI_ID = VEICULOS.FK_CLI_ID'
                )
                ->findAll();
        }

        // Carrega a View de paciente
        return view('sistema/veiculos/index', $dados);
    }


    // Exibe o formulário para cadastrar um novo paciente
    public function novo()
    {
        // Instancia o Model de responsavel
        $clientesModel = new ClientesModel();

        // Busca todos os responsavel cadastrados
        // Esses dados serão utilizados em um campo SELECT
        $dados['clientes'] = $clientesModel->findAll();

        // Carrega o formulário de cadastro do veículo
        return view('sistema/veiculos/novo_veiculo', $dados);
    }


    // Insere um novo paciente
    public function inserir()
    {
        // Instancia o Model de paciente
        $model = new VeiculosModel();

        // Recupera os dados enviados pelo formulário
        $dados = [
            'VEI_PLACA' => $this->request->getPost('placa'),
            'VEI_MARCA' => $this->request->getPost('marca'),
            'VEI_MODELO' => $this->request->getPost('modelo'),
            'VEI_ANO' => $this->request->getPost('ano'),

            // Guarda o ID do responsavel escolhido no formulário
            // como chave estrangeira do paciente
            'FK_CLI_ID' => $this->request->getPost('clientes')
        ];

        // Insere o paciente no banco
        $model->insert($dados);

        // Redireciona para a listagem
        return redirect()
            ->to(base_url('veiculos'))
            ->with('success', 'Veículo cadastrado com sucesso!');
    }


    // Exibe o formulário de edição
    public function editar($id)
    {
        // Instancia o Model de Paciente
        $veiculosModel = new VeiculosModel();

        // Instancia o Model de responsavel
        $clientesModel = new ClientesModel();

        // Busca o paciente que será editado
        $dados['veiculos'] = $veiculosModel->find($id);

        // Busca todos os responsáveis para preencher o SELECT
        $dados['clientes'] = $clientesModel->findAll();

        // Carrega a View de edição
        return view('sistema/veiculos/editar_veiculo', $dados);
    }


    // Atualiza um paciente
    public function atualizar($id)
    {
        // Instancia o Model
        $model = new VeiculosModel();

        // Recupera os novos dados do formulário
        $dados = [
            'VEI_PLACA' => $this->request->getPost('placa'),
            'VEI_MARCA' => $this->request->getPost('marca'),
            'VEI_MODELO' => $this->request->getPost('modelo'),
            'VEI_ANO' => $this->request->getPost('ano'),

            // Guarda o ID do responsavel escolhido no formulário
            // como chave estrangeira do paciente
            'FK_CLI_ID' => $this->request->getPost('clientes')
        ];

        // Atualiza o paciente pelo ID
        $model->update($id, $dados);

        // Redireciona para a listagem
        return redirect()
            ->to(base_url('veiculos'))
            ->with('success', 'Veículo atualizado com sucesso!');
    }


    // Exclui um paciente
    public function excluir($id)
    {
        // Instancia o Model
        $model = new VeiculosModel();

        // Exclui o veículo pelo ID
        $model->delete($id);

        // Redireciona para a listagem
        return redirect()
            ->to(base_url('veiculos'))
            ->with('success', 'Veículo excluído com sucesso!');
    }
}