<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir Categoria</title>
    <link rel="stylesheet" href="../assets/css/content.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
</head>
<body>
    <?php include '../components/navbar.php'; ?>
    <?php include '../components/sidebar.php'; ?>

    <div class="content" style="margin-left: 220px; padding: 20px;">
        <h1>Incluir Categoria</h1>
        <form method="post">
            <label for="nome">Nome da Categoria:</label>
            <input type="text" id="nome" name="nome" required><br>
            <input type="submit" name="incluir" value="Incluir">
        </form>

        <?php
        if (isset($_POST['incluir'])) {
            include '../config.php';

            $nome = $_POST['nome'];

            // Verifica se a conexão com o banco de dados está estabelecida
            if ($conn) {
                $stmt = $conn->prepare("INSERT INTO categoria (nome) VALUES (?)");
                $stmt->bind_param("s", $nome);

                if ($stmt->execute()) {
                    echo "Categoria incluída com sucesso!";
                } else {
                    echo "Erro ao incluir categoria: " . $stmt->error;
                }

                $stmt->close();
                $conn->close();
            } else {
                echo "Erro na conexão com o banco de dados.";
            }
        }
        ?>
    </div>

    <?php include '../components/footer.php'; ?>
</body>
</html>