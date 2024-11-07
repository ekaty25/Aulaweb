<?php //agendamento
$servidor3 = "localhost";
$usuario3 = "root";
$senha3 = "";
$banco3 = "passeiosDB";

$conexao3 = new mysqli($servidor3, $usuario3, $senha3, $banco3);

if ($conexao3->connect_error) {
    die("Conexão com banco3 falhou: " . $conexao3->connect_error);
}
?>
