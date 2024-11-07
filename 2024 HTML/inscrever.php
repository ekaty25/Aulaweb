<?php
include 'conexao1.php';  

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 

        $stmt = $conexao->prepare("INSERT INTO inscricoes (email) VALUES (?)");
        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {

            echo "<script>alert('Inscrição realizada com sucesso!'); window.history.back();</script>";
        } else {
            echo "Erro ao salvar inscrição: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "<script>alert('Email inválido!'); window.history.back();</script>";
    }

    $conexao->close();
}
?>
