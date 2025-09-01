<?php

$dsn = 'mysql:host=127.0.0.1;dbname=rick_and_morty';
$usuario = 'root';
$senha = '';

$conn = new PDO($dsn, $usuario, $senha);

$dadosJson = file_get_contents('php://input');
$dados = json_decode($dadosJson, true);

if (!$dados) {
    http_response_code(400);
    echo "Dados inválidos.";
}

$id = $dados['id'];
$nome = $dados['nome'];
$image = $dados['imagem'];

$stmt = $conn->prepare("SELECT * FROM personagem WHERE id = ?");
$stmt->execute([$id]);


if ($stmt->rowCount() > 0) {
    echo "Personagem já salvo.";
    

} else {
    $insert = $conn->prepare("INSERT INTO personagem (id, nome, imagem) VALUES (:id, :nome, :imagem)");
    $insert->execute([
        ':id' => $id,
        ':nome' => $nome,
        ':imagem' => $image
    ]);
    echo "Personagem salvo com sucesso!";
}

