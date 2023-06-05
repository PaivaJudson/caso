    <div class="container">
        <h2><?php echo getInfo("titulo"); ?> </h2>
        
        <p> <?php echo getInfo("descricao"); ?> </p>
        
        <ul class="list-group list-group-flush">
            <?php echo exibeUsuarios(); ?>
        </ul>
    </div>