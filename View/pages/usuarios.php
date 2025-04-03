<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <link rel="stylesheet" href="../assets/css/content.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
</head>
<body>
    <?php include '../components/navbar.php'; ?>
    <?php include '../components/sidebar.php'; ?>

    <div class="content" style="margin-left: 220px; padding: 20px;">
        <h1>Usuários</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data de Nascimento</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../config.php';
                
                $sql = "SELECT * FROM usuario";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nome"]. "</td><td>" . $row["email"]. "</td><td>" . $row["dtnascimento"]. "</td><td>" . $row["cpf"]. "</td><td>" . $row["telefone"]. "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>0 resultados</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <?php include '../components/footer.php'; ?>
</body>
</html>