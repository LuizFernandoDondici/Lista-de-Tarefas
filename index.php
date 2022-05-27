<?php

require './app.php';


if ($_SERVER['PATH_INFO'] == '/criar-tarefa') {
    criarTarefa($_POST['tarefa']);
}

if ($_SERVER['PATH_INFO'] == '/deletar-tarefa') {
    deletarTarefa($_GET['id']);
}

$tarefas = buscarTarefa();

ob_clean();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./style/style.css">
    
    <title> Lista de Tarefas </title>

</head>

<body>  

    <h1 class="title"> Lista de Tarefas </h1>
    
    <form action="/criar-tarefa" method="POST" class="form">
        <input type="text" name="tarefa" id="insert-tarefa" placeholder="Digite sua mensagem aqui">
        <button type="submit" id="btn-salvar"> Salvar </button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th id="th-id"> Id </th>
                <th id="th-tarefas"> Tarefas </th>
                <th id="th-deletar"> Deletar </th>
            </tr>
        </thead>
        <tbody>
        <?php
            // Mostra todas as tarefas.
            for ($i = 0; $i < count($tarefas); $i++):
                $tarefa = $tarefas[$i];
        ?> 
            <tr>
                <td id="td-id"> <?= $i+1 ?> </td>
                <td id="td-tarefas"> <?= $tarefa['tarefa'] ?> </td>
                <td id="td-deletar"><a href="deletar-tarefa?id=<?php echo $tarefa['id']?>"> X </a></td>
            </tr>
        <?php endfor; ?>
        </tbody>
    </table>

    <script src="./script/script.js"></script>  

</body>
</html>