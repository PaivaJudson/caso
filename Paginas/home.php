    <div class="container">
        <h2><?php echo getInfo("titulo"); ?> </h2>
        
        <p> <?php echo getInfo("descricao"); ?> </p>

        <hr>
        <h2>Pesquisar</h2>
        <form action="/sistema/busca" method="POST">
            <input type="text" name="busca" placeholder="Busca">
            <button>Pesquisar</button>
        </form>

        <hr>
        <h2>Lista de Produtos</h2>
        <ul class="list-group list-group-flush">
            <?php foreach($produtos as $produto): ?>
                <li class="list-group-item"><?php echo $produto['titulo']. " - ". $produto['descricao'] . " - " . number_format($produto['valor'], 2, ", ", ".") ?> <a href="" class="btn btn-secondary disabled" role="button" aria-disabled="true">Editar</a></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <hr>
    <h2>Adicionar Produto</h2>
    <?php if(isset($msg)): ?>
        <p> <?php echo $msg ?> </p>
    <?php endif ?>
    <form action="/sistema/adicionar" method="post">
        <input type="text" name="titulo" placeholder="Título">
        <input type="text" name="descricao" placeholder="Descrição">
        <input type="text" name="valor" placeholder="Valor">
        <button>Adicionar</button>
    </form>
