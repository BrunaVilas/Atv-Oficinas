<?php
session_start();

$lista = ($_SESSION["oficinas"]) ?? [];

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
                <form action="manipular.php" method="GET">
                    <input name="busca" placeholder="Buscar nas oficinas cadastradas...">
                    <button>Filtrar</button>
                </form>    
            </div>

            <div class="cards">
                <?php foreach ($lista as $item): ?>
                    <div class="card">
                        <h3><?= $item['nome'] ?></h3>
                        <div class="card-interno">
                            <div class="itens">
                                <h4>Professor</h4>
                                <p><span class="material-icons"> person </span><?= $item['professor'] ?> </p>
                            </div>
                            <div class="itens">
                                <h4>Status</h4>
                                <p class="<?= ($item['status'] == "Ativo") ? "ativo" : "inativo" ?>"> <?= $item['status'] ?></p>    
                            </div>
                            <div class="itens">
                                <h4>Horário</h4>
                                <p><span class="material-icons">schedule</span> <?= $item['horario'] ?></p>
                            </div>
                            <div class="itens">
                                <h4>Vagas</h4>
                                <p><span class="material-icons"> groups </span> <?= $item['vagas'] ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
    </div>
    

</body>
</html>