<?php
include "cabecalho.php";

$servidor = 'localhost';
$bd = 'passaporte_livre';
$usuario = 'root';
$senha = '';

$conexao = mysqli_connect($servidor, $usuario, $senha, $bd);
if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "<p>Viagem não encontrada.</p>";
    include "rodape.php";
    exit;
}

$sql = "SELECT * FROM tb_destinos WHERE id = $id";
$resultado = mysqli_query($conexao, $sql);

if ($linha = mysqli_fetch_assoc($resultado)) {
?>


    <div class="container my-5">
        <div class="row justify-content-center align-items-start g-5">

            <div class="col-md-5 text-center">
                <img src="<?= $linha['foto'] ?> " class="img-fluid rounded shadow">
            </div>


            <div class="col-md-7">
                <div class="info-box">
                    <h2><?= $linha['nome'] ?></h2>
                    <h3><?= $linha['pais'] ?></h3>
                    <div class="descricao"> <?= $linha['descricao'] ?></div>
                    <p><?= $linha['preco'] ?></p>
                    <a href="voo.php" class="btn btn-primary">← Voltar</a>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
    echo "<div class='container my-5'><p class='alert alert-danger'>Viagem não encontrado!</p></div>";
}

include "rodape.php";
?>