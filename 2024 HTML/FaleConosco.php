<?php
// Inclui a conexão com o banco de dados "FaleConosco"
include 'conexao2.php'; 

$message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $mensagem = filter_var($_POST['mensagem'], FILTER_SANITIZE_STRING);


    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $stmt = $conexao2->prepare("INSERT INTO contato (Nome, Email, Mensagem) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sss", $nome, $email, $mensagem);

            if ($stmt->execute()) {
                $message = "Mensagem enviada com sucesso!"; 
            } else {
                $message = "Erro ao enviar mensagem: " . $stmt->error; 
            }

            $stmt->close();
        } else {
            $message = "Erro ao preparar a declaração: " . $conexao2->error; 
        }
    } else {
        $message = "Por favor, insira um email válido."; 
    }


    $conexao2->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <link rel="stylesheet" href="FCstyle.css">
</head>
<body>
    <header>
        <h1>Contato</h1>
    </header>

    <div class="container">
        <h2>Entre em contato conosco</h2>
        <?php if ($message):  ?>
            <div id="mensagem" style="margin-top: 20px; color: green;">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form action="FaleConosco.php" method="POST">
            <div>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div>
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="mensagem">Mensagem:</label>
                <br>
                <textarea id="mensagem" name="mensagem" rows="5" required></textarea>
            </div>
            <input type="submit" value="Enviar">
        </form>
    </div>

    <footer>
        <p>&copy; 2024 CircuitoBH. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
