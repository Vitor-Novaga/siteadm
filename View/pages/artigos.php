<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artigos</title>
    <link rel="stylesheet" href="../assets/css/content.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
</head>
<body>
    <?php require_once __DIR__ . '/../../components/navbar.php'; ?>
    <?php require_once __DIR__ . '/../../components/sidebar.php'; ?>

    <div class="content" style="margin-left: 220px; padding: 20px;">
        <h1>Artigos</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Conteúdo</th> <!-- Correção da tag -->
                </tr>
            </thead>
            <tbody>
                <?php
                require_once __DIR__ . '/../../config.php';
                
                // Query SQL para pegar os dados dos artigos e categorias
                $sql = "SELECT artigos.id, artigos.nome, categoria.nome AS categoria, artigos.conteudo 
                        FROM artigos 
                        JOIN categoria ON artigos.idcategoria = categoria.id";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        // Exibindo os dados dos artigos na tabela
                        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nome"]. "</td><td>" . $row["categoria"]. "</td><td>" . $row["conteudo"]. "</td></tr>";
                    }
                } else {
                    // Caso não haja resultados
                    echo "<tr><td colspan='4'>0 resultados</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <?php require_once __DIR__ . '/../../components/footer.php'; ?>
</body>
</html>
