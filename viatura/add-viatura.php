<?php
session_start();
include("../conexao.php");

// Pasta onde o imagem vai ser salvo
$_UP['pasta'] = 'imagens/';

// Array com as extensões permitidas
$_UP['extensoes'] = array('jpg', 'png', 'jpeg');

// Renomeia o imagem? (Se true, o imagem será salvo como .jpg e um nome único)
$_UP['renomeia'] = false;

// Array com os tipos de erros de upload do PHP
// $_UP['erros'][0] = 'Não houve erro';
// $_UP['erros'][1] = 'O imagem no upload é maior do que o limite do PHP';
// $_UP['erros'][2] = 'O imagem ultrapassa o limite de tamanho especifiado no HTML';
// $_UP['erros'][3] = 'O upload do imagem foi feito parcialmente';
// $_UP['erros'][4] = 'Não foi feito o upload do imagem';
//   // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
//   if ($_FILES['imagem']['error'] != 0) {
//     die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['imagem']['error']]);
//     exit; // Para a execução do script
//   }

// Faz a verificação da extensão do imagem
  $extensao = strtolower(end(explode('.', $_FILES['imagem']['name'])));
  if (array_search($extensao, $_UP['extensoes']) === false) {
    $_SESSION['erro_upload'] = true;
  }

// O imagem passou em todas as verificações, hora de tentar movê-lo para a pasta
  else {
  // Primeiro verifica se deve trocar o nome do imagem
  if ($_UP['renomeia'] == true) {
  // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
    $nome_final = time().'.jpg';
  } else {
  // Mantém o nome original do imagem
    $nome_final = $_FILES['imagem']['name'];
  }

// Depois verifica se é possível mover o imagem para a pasta escolhida
if (move_uploaded_file($_FILES['imagem']['tmp_name'], $_UP['pasta'] . $nome_final)) {
  // Upload efetuado com sucesso, exibe uma mensagem e um link para o imagem
    echo "Upload efetuado com sucesso!";
    echo '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o imagem</a>';
  } else {
    // Não foi possível fazer o upload, provavelmente a pasta está incorreta
    echo "Não foi possível enviar o imagem, tente novamente";
  }
}

$placa = $_POST['placa'];
$modelo = $_POST['modelo'];
$ano = $_POST['ano'];
$marca = $_POST['marca'];
$situacao = $_POST['situacao'];
$usuarioInsert = $_POST['usuarioInsert'];
$imagem = $_FILES['imagem']['name'];

$sql = "select count(*) as total from viaturas where placa = '$placa'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['placa_existe'] = true;
	header('Location: cadastrar-viatura.php');
	exit;
}

$sql = "INSERT INTO viaturas (placa, modelo, ano, marca, situacao, usuarioInsert, imagem, created_at) 
        VALUES ('$placa', '$modelo', '$ano', '$marca', '$situacao', '{$_SESSION['usuario']}', '$imagem', NOW())";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

// if(empty($_POST['placa']) 
// 	|| empty($_POST['modelo']) 
// 	|| empty($_POST['ano']) 
// 	|| empty($_POST['marca']) 
// 	|| empty($_POST['imagem'])){
// 	$_SESSION['erro'] = true;
// }

$conexao->close();

header('Location: /viatura/cadastrar-viatura.php');
exit;
?>