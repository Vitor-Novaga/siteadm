<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Usuário</title>
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


    <div class="content">
        <h1>Excluir Usuário</h1>
        <form method="post">
            <label for="id">ID do Usuário:</label>
            <input type="text" id="id" name="id" required><br>
            <input type="submit" name="excluir" value="Excluir">
        </form>

        <?php
        if (isset($_POST['excluir'])) {
            include 'config.php';

            $id = $_POST['id'];

            $sql = "DELETE FROM usuario WHERE id='$id'";

            if ($conn->query($sql) === TRUE) {
                echo "Usuário excluído com sucesso!";
            } else {
                echo "Erro ao excluir usuário: " . $conn->error;
            }

            $conn->close();
        }
        ?>
    </div>

    <?php include '../components/footer.php'; ?>
</body>
</html>
