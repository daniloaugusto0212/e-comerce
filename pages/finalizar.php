<div class="chamada-escolher">
    <div class="container">
        <h2>Feche o seu pedido</h2> 
    </div>
</div>
<div class="container">
    <div class="tabela-pedidos">
        <h2><i class="fas fa-shopping-cart"></i> Carrinho</h2>
        <table>
            <tr>
                <td>Nome do produto</td>
                <td>Quantidade</td>
                <td>Valor</td>
            </tr>
            <?php 
                $itemsCarrinho = $_SESSION['carrinho'];
                $total = 0;
                foreach ($itemsCarrinho as $key => $value) {
                    $idProduto = $key;
                    $produto = \MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque` WHERE id = $idProduto");
                    $produto->execute();
                    $produto  = $produto->fetch();
                    $valor = $produto['preco'] * $value;                    
                    $total+= $valor;
            ?>
            <tr>
                <td><?php echo $produto['nome'] ?></td>
                <td><?php echo $value ?></td>
                <td>R$<?php echo Painel::convertMoney($valor) ?></td>
            </tr>
            
                <?php } ?>
        </table>
    </div>    
</div>
<div class="finalizar-pedido">
     <div class="container">
         <h2>Total do Pedido: R$<?php echo Painel::convertMoney($total) ?></h2>
         <div class="clear"></div>
         <a href="" class="btn-pagamento">Pagar agora!</a>
         <div class="clear"></div>
     </div>   
</div>