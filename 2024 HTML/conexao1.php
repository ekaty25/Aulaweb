<?php //newsletter
$servidor = "localhost";
$usuario = "root"; 
$senha = "";  
$banco = "test";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Conexão com banco falhou: " . $conexao->connect_error);
}
?>
