<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Usuário</title>
    <link rel="stylesheet" href="../assets/css/content.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
</head>
<body>
    <?php include '../config.php'; ?>
    <?php include '../components/navbar.php'; ?>
    <?php include '../components/sidebar.php'; ?>
    <?php include '../components/footer.php'; ?>


    <div class="content" style="margin-left: 220px; padding: 20px;">
        <h1>Inserir Usuário</h1>
        <form method="post">
            <label for="nome">Nome:</label>
            <input type="text" id><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="dtnascimento">Data de Nascimento:</label>
            <input type="date" id="dtnascimento" name="dtnascimento" required><br>
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required><br>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" required><br>
            <input type="submit" name="inserir" value="Inserir">
        </form>

        <?php
        if (isset($_POST['inserir'])) {
            include 'config.php';

            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $dtnascimento = $_POST['dtnascimento'];
            $cpf = $_POST['cpf'];
            $telefone = $_POST['telefone'];

            $sql = "INSERT INTO usuario (nome, email, dtnascimento, cpf, telefone) VALUES ('$nome', '$email', '$dtnascimento', '$cpf', '$telefone')";

            if ($conn->query($sql) === TRUE) {
                echo "Usuário inserido com sucesso!";
            } else {
                echo "Erro ao inserir usuário: " . $conn->error;
            }

            $conn->close();
        }
        ?>
    </div>

    <?php include '../components/footer.php'; ?>
</body>
</html>
