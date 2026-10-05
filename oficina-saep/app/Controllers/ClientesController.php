<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ClientesModel;

class ClientesController extends BaseController
{
    // Exibe a listagem de responsavel
    public function index()
    {
        // Instancia o Model responsável pela tabela RESPONSAVEL
        $model = new ClientesModel();

        // Verifica se o formulário de pesquisa foi enviado
        if ($this->request->getPost('botao_pesquisar')) {

            // Recupera o texto digitado no campo de pesquisa
            $pesquisar = $this->request->getPost('pesquisar');

            // Busca responsaveis que possuem o termo informado
            // no nome ou data de nascimento
            $dados['clientes'] = $model
                ->like('CLI_NOME', $pesquisar)
                ->orLike('CLI_CPF', $pesquisar)
                ->findAll();
        }
        else {

            // Caso nenhuma pesquisa tenha sido realizada,
            // busca todos os responsaveis cadastrados
            $dados['clientes'] = $model->findAll();
        }

        // Carrega a View de listagem e envia os responsáveis encontrados
        return view('sistema/clientes/index', $dados);
    }


    // Exibe o formulário para cadastrar um novo responsavel
    public function novo()
    {
        // Apenas carrega a View com o formulário
        return view('sistema/clientes/novo_cliente');
    }


    // Insere um novo responsavel no banco de dados
    public function inserir()
    {
        // Instancia o Model
        $model = new ClientesModel();

        // Recupera os valores enviados pelo formulário
        $dados = [
            'CLI_NOME' => $this->request->getPost('nome'),
            'CLI_CPF' => $this->request->getPost('cpf')
        ];

        // Insere o novo responsavel no banco
        $model->insert($dados);

        // Redireciona para a listagem de responsavel
        return redirect()
            ->to(base_url('clientes'))
            ->with('success', 'Cliente cadastrado com sucesso!');
    }


    // Exibe o formulário para editar um responsavel
    public function editar($id)
    {
        // Instancia o Model
        $model = new ClientesModel();

        // Busca o responsavel pelo ID recebido na URL
        $dados['clientes'] = $model->find($id);

        // Carrega a View de edição enviando os dados do responsavel
        return view('sistema/clientes/editar_cliente', $dados);
    }


    // Atualiza os dados de um responsavel
    public function atualizar($id)
    {
        // Instancia o Model
        $model = new ClientesModel();

        // Recupera os novos valores enviados pelo formulário
        $dados = [
            'CLI_NOME' => $this->request->getPost('nome'),
            'CLI_CPF' => $this->request->getPost('cpf')
        ];

        // Atualiza o registro correspondente ao ID
        $model->update($id, $dados);

        // Redireciona para a listagem
        return redirect()
            ->to(base_url('clientes'))
            ->with('success', 'Cliente atualizado com sucesso!');
    }


    // Exclui um responsavel
    public function excluir($id)
    {
        // Instancia o Model
        $model = new ClientesModel();

        // Exclui o registro correspondente ao ID
        $model->delete($id);

        // Redireciona para a listagem
        return redirect()
            ->to(base_url('clientes'))
            ->with('success', 'Cliente excluído com sucesso!');
    }
}