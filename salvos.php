<?php
include './template/header.php';

$dsn = 'mysql:host=127.0.0.1;dbname=rick_and_morty';
$usuario = 'root';
$senha = '';

$conn = new PDO($dsn, $usuario, $senha);

$script = "SELECT * FROM personagem";

$dados = $conn->query($script)->fetchAll();



?>

<section class="container mt-5">
    <h1 class="text-center mb-3">Personagem salvos</h1>
    <main id="rick-container" class="row row-gap-4">
        <?php foreach($dados as $linhas){?>
            <?= "<div class='col-12 col-md-4 col-lg-3 '>
                    <div class='card h-100 shadow-sm'>
                        <div class='card-body text-center'>
                            <img src='{$linhas['imagem']}' alt='card' class='personagem-img mb-2 img-fluid rounded'>
                            <h5 class='card-tile fs-6'><strong>Nome: </strong> {$linhas['nome']}</h5>
                            <p class='card-text'><strong>Data cadastro: {$linhas['dataCadastro']}</strong> </p>
                            <a class='btn btn-danger' href='removerPersonagem.php?id={$linhas['id']}'>Remover personagem</a>
                        </div>
                    <div class='card-footer text-center'> 
                        <p class='card-text text-muted'><strong>Id #</strong>{$linhas['id']}</p>
                    </div>
                </div>
                </div>
            "?>
        <?php } ?>
    </main>
</section>