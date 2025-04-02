<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link rel="stylesheet" href="../assets/css/content.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <script>
        function excluirCategoria(id) {
            if (confirm('Tem certeza que deseja excluir esta categoria?')) {
                window.location.href = 'excluirCategoria.php?id=' + id;
            }
        }
    </script>
</head>
<body>
    <?php require_once __DIR__ . '/../../components/navbar.php'; ?>
    <?php require_once __DIR__ . '/../../components/sidebar.php'; ?>

    <div class="content" style="margin-left: 220px; padding: 20px;">
        <h1>Categorias</h1>
        <button class="btn-adicionar" onclick="window.location.href='incluirCategoria.php'">Incluir Categoria</button>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once __DIR__ . '/../../config.php';
                
                $sql = "SELECT * FROM categoria";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nome"]. "</td><td><button onclick=\"excluirCategoria(" . $row['id'] . ")\"><i class='fas fa-trash'></i></button></td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>0 resultados</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php require_once __DIR__ . '/../../components/footer.php'; ?>
</body>
</html>
