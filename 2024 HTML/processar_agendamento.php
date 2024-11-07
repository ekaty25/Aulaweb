<?php

include 'conexao3.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
    $data = $_POST['data'];


    $data_formatada = DateTime::createFromFormat('Y-m-d', $data);
    if (!$data_formatada) {
        echo "Data inválida. Por favor, insira uma data válida.";
        exit;
    }


    $stmt = $conexao3->prepare("INSERT INTO agendamentos (nome, data) VALUES (?, ?)");
    if ($stmt) {
        $stmt->bind_param("ss", $nome, $data);


        if ($stmt->execute()) {
            echo "<script>alert('Passeio agendado com sucesso!'); window.history.back();</script>";
        } else {
            echo "Erro ao agendar passeio: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erro ao preparar a declaração: " . $conexao3->error;
    }


    $conexao3->close();
}
?>
