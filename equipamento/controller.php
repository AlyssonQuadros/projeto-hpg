<?php
/**
 * produtosController - Controller de exemplo
 *
 * @package TutsupMVC
 * @since 0.1
 */
class BuscainstituicaoController extends MainController
{

	/*
	// method  => index()
	// chamada => protocolo-controlle/exportProtocolo
	// info    => 
	*/
	public function index() {
        $this->title = 'Busca Instituição';
		$modelo = $this->load_model('buscainstituicao/buscainstituicao-model');

		$dados = $modelo->getAllInstituicoes($_GET);
        
		require DIR . '/views/_includes/header.php';
		require DIR . '/views/buscainstituicao/buscainstituicao-index.php';
        require DIR . '/views/_includes/footer.php';
		require DIR . '/views/buscainstituicao/funcoes.php';
        // require DIR . '/views/comercial/funcoes.php';
        // require DIR . '/views/comercial/funcoes2.php';
	}

	public function editarStatus($idCliente = null){

		$modelo = $this->load_model('buscainstituicao/buscainstituicao-model');
		$post = $_POST;
		if($modelo->editarClienteStatus($post)){
			$retorno['status'] = 'OK';
			$retorno['msg'] = 'Status do Cliente alterado com sucesso';
			$retorno['idCliente'] = $post['idCliente'];
			echo json_encode($retorno);
			exit;
		}else{
			$retorno['status'] = 'ERRO';
			$retorno['msg'] = 'Houve um erro ao alterar o Cliente. Entre em contato com o suporte.';
			echo json_encode($retorno);
			exit;
		}
	}

}
?>