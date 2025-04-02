<?php
require_once __DIR__ . '/../../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($conn) {
        $stmt = $conn->prepare("DELETE FROM categoria WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Categoria excluída com sucesso!";
        } else {
            echo "Erro ao excluir categoria: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Erro na conexão com o banco de dados.";
    }

    // Redireciona após a execução
    header("Location: categories.php");
    exit();
} else {
    echo "ID não fornecido.";
}
?>
