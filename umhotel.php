<?php
include "cabecalho.php";
?>
<?php

include "conexao.php";

$sql = "select * from hospedagem where id = " .$id;
$resultado = mysqli_query($conexao, $sql);

while ($linha = mysqli_fetch_assoc($resultado)) {
?>

    <div class="container my-5">
        <div class="row justify-content-center align-items-start g-5">

            <div class="col-md-5 text-center">
                <img src="<?= $linha['foto'] ?>" class="img-fluid rounded shadow">
            </div>


            <div class="col-md-7">
                <div class="info-box">
                    <h2><?= $linha['nome_hotel'] ?></h2>
                    <div class="cidade"> <?= $linha['classificacao'] ?></div>
                    <p><?= $linha['preco_diaria'] ?></p>
                    <a href="Hospedagem.php" class="btn btn-primary">← Voltar</a>
                </div>
            </div>
        </div>
    </div>
<?php
}
mysqli_close($conexao);
?>

<?php
include "rodape.php";
?>