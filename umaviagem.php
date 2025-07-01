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
 
$sql = "SELECT * FROM destinos WHERE id = $id";
$resultado = mysqli_query($conexao, $sql);
 
if ($linha = mysqli_fetch_assoc($resultado)) {
?>
    <style>
        .info-box {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
 
        .info-box h2 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 15px;
        }
 
        .info-box .avaliacao {
            font-size: 18px;
            color: #f39c12;
            margin-bottom: 10px;
        }
 
        .info-box p {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }
 
        .info-box .btn {
            margin-top: 20px;
        }
 
        .info-box iframe {
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
 
    <div class="container my-5">
        <div class="row justify-content-center align-items-start g-5">
 
            <div class="col-md-5 text-center">
                <img src="<?= $linha['foto'] ?>" alt="<?= $linha['nome'] ?>" class="img-fluid rounded shadow">
            </div>
 
 
            <div class="col-md-7">
                <div class="info-box">
                    <h2><?= $linha['nome'] ?></h2>
                    <div class="descricao"> <?= $linha['descricao'] ?></div>
                    <p><?= $linha['preco'] ?? 'Descrição não disponível.' ?></p>
 
                    <?php if (!empty($linha['trailer'])): ?>
                        <div class="ratio ratio-16x9 my-3">
                            <iframe src="<?= $linha['trailer'] ?>" title="Trailer" allowfullscreen></iframe>
                        </div>
                    <?php endif; ?>
 
                    <a href="index.php" class="btn btn-primary">← Voltar</a>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
    echo "<div class='container my-5'><p class='alert alert-danger'>Filme não encontrado!</p></div>";
}
 
include "rodape.php";
?>