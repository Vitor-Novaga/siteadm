<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Exibe o ID recebido para depuração
    var_dump("ID recebido: " . $id);

    // Verifica se a conexão com o banco de dados está estabelecida
    if ($conn) {
        $stmt = $conn->prepare("DELETE FROM categoria WHERE id = ?");
        $stmt->bind_param("i", $id);

        // Verificar se a exclusão foi executada corretamente
        if ($stmt->execute()) {
            // Exibe a mensagem de sucesso para depuração
            var_dump("Categoria excluída com sucesso!");

            // Redireciona para categories.php com sucesso
            header("Location: categories.php?sucesso=1");
            exit();
        } else {
            // Exibe mensagem de erro para depuração
            var_dump("Erro ao excluir categoria: " . $stmt->error);

            // Caso falhe, redireciona para categories.php com erro
            header("Location: categories.php?erro=1");
            exit();
        }

        $stmt->close();
        $conn->close();
    } else {
        // Exibe mensagem de erro se a conexão com o banco de dados falhar
        var_dump("Erro na conexão com o banco de dados");

        // Redireciona para categories.php com erro
        header("Location: categories.php?erro=1");
        exit();
    }
}
?>
