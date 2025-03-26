<?php
// Exemplo de inclusão segura de arquivos usando __DIR__
$menuItems = [
    ['link' => __DIR__ . '/../view/pages/index.php', 'label' => 'Home', 'icon' => 'fas fa-home'],
    ['link' => __DIR__ . '/../view/pages/categorias.php', 'label' => 'Categorias', 'icon' => 'fas fa-list'],
    ['link' => __DIR__ . '/../view/pages/produtos.php', 'label' => 'Produtos', 'icon' => 'fas fa-box']
];

// Incluindo os arquivos necessários (opcional, caso sejam script ativos em PHP)
require_once(__DIR__ . '/../view/pages/index.php');
require_once(__DIR__ . '/../view/pages/categorias.php');
require_once(__DIR__ . '/../view/pages/produtos.php');
?>

<aside>
    <button type="button" aria-label="Menu de navegação">Menu</button>
    <nav>
        <ul>
            <?php foreach ($menuItems as $item): ?>
                <li>
                    <a href="<?php echo htmlspecialchars($item['link']); ?>">
                        <i class="<?php echo htmlspecialchars($item['icon']); ?>"></i>
                        <?php echo htmlspecialchars($item['label']); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</aside>
