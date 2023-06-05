    <div class="container">
        <h2><?php echo getInfo("titulo"); ?> </h2>
        
        <p> <?php echo getInfo("descricao"); ?> </p>
        
        <hr>
        <h2>Lista de Produtos</h2>
        <ul>
            <?php foreach($produtos as $produto): ?>
                <li><?php echo number_format($produto['valor'], 2, ", ", ".") ?></li>
            <?php endforeach; ?>
        </ul>
    </div>