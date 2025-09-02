<?php
$dsn = 'mysql:host=127.0.0.1;dbname=rick_and_morty';
$usuario = 'root';
$senha = '';

$conn = new PDO($dsn, $usuario, $senha);


$id = $_GET['id'];


$script = "DELETE FROM personagem WHERE id = :id";

$dados = $conn->prepare($script);

$dados->execute([
    ":id" => $id
]);

echo "deletado com sucesso";

header('location:salvos.php')

?>