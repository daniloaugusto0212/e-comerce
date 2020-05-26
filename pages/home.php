<div class="chamada-escolher">
    <div class="container">
        <h2>Escolha seus produtos e compre agora!</h2> 
    </div>
</div>

<div class="lista-items">
    <div class="container">
    <?php 
        $items = \models\homeModel::getLojaItems();
        foreach ($items as $key => $value) { 
            $imagem = \MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque_imagens` WHERE produto_id = $value[id] ");
            $imagem->execute();
            $imagem = $imagem->fetch()['imagem'];       
        
    ?>
        <div class="produto-single-box">
            <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $imagem ?>" alt="Imagem do produto">
            <p>Preço: R$<?php echo Painel::convertMoney($value['preco']) ?></p>
            <a href="<?php echo INCLUDE_PATH ?>?addCart=<?php echo $value['id'] ?>">Adicionar ao carrinho</a>
        </div>
    <?php } ?>
    </div>
</div>