<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'] ?? '';
    $professor = $_POST['professor'] ?? '';
    $horario = $_POST['horario'] ?? '';
    $vagas = $_POST['vagas'] ?? '';
    $status = $_POST['status'] ?? '';

    if ($nome !== '' && $professor !== '' && $horario !== '' && $vagas !== '') {

        $_SESSION['oficinas'][] = [
            'nome' => $nome,
            'professor' => $professor,
            'horario' => $horario,
            'vagas' => $vagas,
            'status' => $status
        ];

        header("Location: index.php");
    }
}

?>
