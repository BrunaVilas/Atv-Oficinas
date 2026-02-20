<?php
session_start();

$lista = $_SESSION['oficinas'];
$filtro = $_GET['busca'] ?? "";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oficinas</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="esquerda">
            
            <h2><span class="material-icons">add</span>Cadastrar Oficina</h2>
            
            <form action="manipular.php" method="POST">
                <label for="nome">NOME DA MODALIDADE</label>
                <input name="nome" placeholder="Ex. Pilates">

                <label for="professor">PROFESSOR RESPONSÁVEL</label>
                <input name="professor" placeholder="Nome do instrutor">

                <label for="horario">HORÁRIO</label>
                <input name="horario" placeholder="Ex:08:00 às 09:00">

                <label for="vagas">VAGAS(ATUAL/TOTAL)</label>
                <input name="vagas" placeholder="Ex: 10/20">
                
                <label for="vagas">STATUS INICIAL</label>
                <select name="status">
                    <option>Ativo</option>
                    <option>Inativo</option>
                </select>
            
                <button type="submit">Cadastrar</button>
            </form>
        </div>

        <div class="direita">
            <div class="busca">             
                <form method="GET">
                    <input name="busca" placeholder="Buscar nas oficinas cadastradas...">
                    <button>Filtrar</button>
                </form>    
            </div>

            <div class="cards">
                <?php foreach($lista as $oficina): ?>
                    <?php if($filtro == "" || strtolower($oficina['nome']) == strtolower($filtro)): ?>
                            <div class="card">
                                <h3><?= $oficina['nome'] ?></h3>
                                <p>Professor <?= $oficina['professor'] ?></p>
                                <p class="<?= ($oficina['status'] == "Ativo") ? "ativo" : "inativo" ?>">Status <?= $oficina['status'] ?></p>
                                <p>Horário <?= $oficina['horario'] ?></p>
                                <p>Vagas <?= $oficina['vagas'] ?></p>
                                </div>
                        <?php endif; ?>
                    <?php endforeach; ?>

            </div>
        </div>
        
    </div>
    

</body>
</html>