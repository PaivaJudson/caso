    <div class="container">
        <?php if(!isset($editando)): ?>
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
                    <li class="list-group-item"><?php echo $produto['titulo']. " - ". $produto['descricao'] . " - " . number_format($produto['valor'], 2, ", ", ".") ?> 
                        <a href="/sistema/produto/editar?id=<?php echo $produto['id'] ?>" class="btn btn-secondary" role="button" aria-disabled="true">Editar</a>
                        <a href="/sistema/produto/editar?id=<?php echo $produto['id'] ?>" class="btn btn-secondary" role="button" aria-disabled="true">Deletar</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <hr>

        <?php if(isset($editando)): ?>
            <h2>Editando Produto</h2>
        <?php else:?>
            <h2>Adicionar Produto</h2>
        <?php endif; ?>

        <?php if(isset($msg)): ?>
            <p> <?php echo $msg ?> </p>
        <?php endif ?>
        <form action="<?php echo (isset($editando)? '/sistema/produto/salvar':'/sistema/adicionar') ?>" method="post">
            <?php if(isset($editando)): ?>
                <input type="hidden" name="id" value="<?php echo $produtoEdit['id'] ?>">
            <?php endif; ?>
            <input type="text" name="titulo" placeholder="Título" value="<?php echo isset($produtoEdit['titulo'])? $produtoEdit['titulo']: ''; ?>">
            <input type="text" name="descricao" placeholder="Descrição" value="<?php echo isset($produtoEdit['descricao'])? $produtoEdit['descricao']: ''; ?>">
            <input type="text" name="valor" placeholder="Valor" value="<?php echo (isset($produtoEdit['valor'])? $produtoEdit['valor']: ''); ?>">
            <button> <?php echo (isset($editando)? 'Actualizar':'Adicionar') ?> </button>
            <?php if(isset($editando)): ?>
                <a href="Paginas/home.php" class="btn btn-secondary" role="button" aria-disabled="true">Cancelar</a>
            <?php endif; ?>
        </form>
   </div>