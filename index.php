<?php
session_start();

$lista = $_SESSION['oficinas'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oficinas</title>
</head>
<body>
    
<h2>Cadastrar Oficina</h2>

<form action="manipular.php" method="POST">
    <input name="nome" placeholder="Modalidade">
    <input name="professor" placeholder="Professor">
    <input name="horario" placeholder="Horário">
    <input name="vagas" placeholder="Ex: 10/20">

    <select name="status">
        <option>Ativo</option>
        <option>Inativo</option>
    </select>

    <button type="submit">Cadastrar</button>
</form>

<hr>

<h2>Buscar</h2>

<form action="manipular.php" method="GET">
    <input name="busca" placeholder="Buscar oficina">
    <button>Filtrar</button>
</form>

<hr>

<h2>Oficinas</h2>

<?php foreach ($lista as $item): ?>
    <div style="border:1px solid #aaa; margin:10px; padding:10px;">
        <h3><?= $item['nome'] ?></h3>
        <p>Professor: <?= $item['professor'] ?></p>
        <p>Horário: <?= $item['horario'] ?></p>
        <p>Vagas: <?= $item['vagas'] ?></p>
        <p>Status: <?= $item['status'] ?></p>
    </div>
<?php endforeach; ?>

</body>
</html>