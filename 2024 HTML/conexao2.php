<?php //fale conosco
$servidor2 = "localhost";
$usuario2 = "root";
$senha2 = "";
$banco2 = "FaleConosco";

$conexao2 = new mysqli($servidor2, $usuario2, $senha2, $banco2);

if ($conexao2->connect_error) {
    die("Conexão com banco2 falhou: " . $conexao2->connect_error);
}
?>
