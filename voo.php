<?php
include "cabecalho.php";
include "banner.php";
?> 

<div class="container">
    <h2 class="display-5">Viagens</h2>
    <div class="row">
 
 
        <?php
        include "conexao.php";
 
        $sql = "select * from tb_destinos order by id";
        $resultado = mysqli_query($conexao, $sql);
 
 
        while ($linha = mysqli_fetch_assoc($resultado)) {
        ?>
 
            <div class="col-3 mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="<?= $linha['foto']; ?>" class="card-img-top img-formatada-lista">
                    <div class="card-body">
                        <h5 class="card-title"><?= $linha['pais']; ?></h5>
                        <p class="card-text"><?= $linha['descricao']; ?></p>
                        <a href="umaviagem.php?id=<?= $linha['id']; ?>" class="btn btn-outline-danger"><?= $linha['preco']; ?></a>
                    </div>
                </div>
            </div>
 
        <?php
        }
 
        mysqli_close($conexao);
        ?>
    </div>
</div>
 

<?php
include "rodape.php";
?>