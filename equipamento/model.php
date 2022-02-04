<?php 
/**
 * Modelo para gerenciar produtos
 *
 * @package TutsupMVC
 * @since 0.1
 */
class BuscainstituicaoModel
{

	/**
	 * Construtor para essa classe
	 *
	 * Configura o DB, o controlador, os parâmetros e dados do usuário.
	 *
	 * @since 0.1
	 * @access public
	 * @param object $db Objeto da nossa conexão PDO
	 * @param object $controller Objeto do controlador
	 */
	public function __construct( $db = false,$mongo = false, $controller = null ) {
		// Configura o DB (PDO)
		$this->db = $db;

		$this->mongo = $mongo;
		
		// Configura o controlador
		$this->controller = $controller;

		// Configura os parâmetros
		$this->parametros = $this->controller->parametros;

		// Configura os dados do usuário
		$this->userdata = $this->controller->userdata;
	}

	/*
	// method  => listarTarefas()
	// chamada => 
	// info    => retorna um array de intituicoes que pode ser filtrado por status
	*/
	public function getAllInstituicoes($filtro = null){

        $where = ' 1 = 1';

		if(@$filtro['nome']) $where .= " AND clientes.Nome_Fantasia like '%".$filtro['nome']."%'";

		if(@$filtro['responsavel']) $where .= " AND clientes.Responsavel like '%".$filtro['responsavel']."%'";

		if((@$filtro['situacao'] == 1 ) && (isset($filtro['situacao']) && $filtro['situacao'] != '')){
			$where .= " AND (cis.idStatus = 1 OR cis.idStatus IS NULL)";
		}

		if((@$filtro['situacao'] == '0' ) && (isset($filtro['situacao']) && $filtro['situacao'] != '')){
			$where .= " AND (cis.idStatus = 0)";
		}

        $sql = "SELECT c.idCliente, c.Nome, b.Name from avaliasi_admin.cliente c
                inner join avaliasi_admin.banco b on c.idBanco = b.idBanco
                WHERE c.Situacao = 1 AND idCliente NOT IN (12, 15, 18, 31, 41, 50) ;";
            
        $query = $this->db->query($sql);
		
		$result = $query->fetchAll(PDO::FETCH_ASSOC);

		// return $result;

        $mount_sql = "SELECT clientes.*, cis.idStatus FROM ( ";

        $count = 0;
		foreach($result as $r){
            if($count > 0) $mount_sql .= " UNION ";
            $mount_sql .= " SELECT ".str_replace(' ', '', $r['Nome']).".Nome_Fantasia, ".str_replace(' ', '', $r['Nome']).".Telefone, ".str_replace(' ', '', $r['Nome']).".Responsavel, count(e_".str_replace(' ', '', $r['Nome']).".idEstudo) ".str_replace(' ', '', $r['Nome'])."_Estudos, ".str_replace(' ', '', $r['Nome']).".Situacao," .$r['idCliente']." AS idCliente, ".str_replace(' ', '', $r['Nome']).".idCliente AS idInstituicao
                            FROM ".$r['Name'].".cliente ".str_replace(' ', '', $r['Nome'])."
                            LEFT JOIN ".$r['Name'].".estudo e_".str_replace(' ', '', $r['Nome'])." on e_".str_replace(' ', '', $r['Nome']).".idCliente = ".str_replace(' ', '', $r['Nome']).".idCliente
                            WHERE ".str_replace(' ', '', $r['Nome']).".Telefone IS NOT NULL AND ".str_replace(' ', '', $r['Nome']).".Telefone != ''
							GROUP BY ".str_replace(' ', '', $r['Nome']).".idCliente ";
            $count++;
        }
        $mount_sql .= " ) as clientes 
		LEFT JOIN cliente_instituicao_status cis ON cis.idCliente = clientes.idCliente AND cis.idInstituicao_Cliente = clientes.idInstituicao
		WHERE $where GROUP BY clientes.Nome_Fantasia;";

        $query = $this->db->query($mount_sql);
		$result = $query->fetchAll(PDO::FETCH_ASSOC);

		$resultFinal = array();
		foreach ($result as $r){
			$resultFinal[$r['idCliente'].'_'.$r['idInstituicao']] = $r;
		}
		
		$result_sql = "SELECT * FROM cliente_instituicao_status";

		$query = $this->db->query($result_sql);
		$result_sql = $query->fetchAll(PDO::FETCH_ASSOC);

		foreach($result_sql as $f){

			unset($resultFinal[$f['idCliente'].'_'.$f['idInstituicao_Cliente']]);
		}
        
		return $result;
	}

	public function editarClienteStatus($dados){

		$array = array(
			'idCliente'					=> $dados['idCliente'],
			'idInstituicao_Cliente'		=> $dados['idInstituicao'],
			'idStatus'					=> $dados['status']
		);

		$sql = "SELECT * FROM cliente_instituicao_status
				WHERE idCliente = ".$dados['idCliente']." AND idInstituicao_Cliente = ".$dados['idInstituicao']." ";

		$query = $this->db->query($sql);
		$result = $query->fetch(PDO::FETCH_ASSOC);

		if($result){
			$retorno =  $this->db->updateDB('cliente_instituicao_status', array('idClienteInstituicaoStatus' => $result['idClienteInstituicaoStatus']),$array);
		}else{
			$retorno =  $this->db->insertDB('cliente_instituicao_status', $array);
		}

		if(is_string($retorno)){
			return false;
		} else return true;
	}

	public function listarTodasInstituicoesAtivas(){
		$sql = "SELECT * FROM cliente_instituicao_status cis WHERE cis.idStatus = 1";

		$query = $this->db->query($sql);

		$result = $query->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}

	public function listarClientesAjax($parametro,$idClienteInstituicaoStatus = null){
		$where = '';
		if(!empty($idClienteInstituicaoStatus)){
			$where = ' AND idClienteInstituicaoStatus = '.$idClienteInstituicaoStatus;
		}

		$sql = "SELECT * FROM cliente_instituicao_status where idStatus = 1";
		
		$query = $this->db->query($sql);

		$result = $query->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}
}
?>