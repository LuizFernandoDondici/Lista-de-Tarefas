<?php

// Cria uma conexão. E cria a tabela 'lista' caso ela não exista.
function connect()
{
    $db = new PDO ('sqlite:'. __DIR__ .'./database/lista-tarefas.sqlite');

    $query = 
        'CREATE TABLE IF NOT EXISTS lista(
            id INTEGER PRIMARY KEY,
            tarefa TEXT
        );';

    $db->exec($query);
    
    return $db;
}


// Busca as tarefas na tabela 'lista' e retorna um array.
function buscarTarefa()
{
    $db = connect();
                      
    $stmt = $db->prepare('SELECT id, tarefa FROM lista');

    $stmt->execute();
    $tarefas = $stmt->fetchAll();

    return $tarefas;
}


// Cria uma tarefa.
function criarTarefa($tarefa)
{
    if (empty($tarefa)) {
        header('location: index.php');
        exit;
    }

    $db = connect();

    $stmt = $db->prepare('INSERT INTO lista (tarefa) VALUES (?);');

    $stmt->bindParam(1, $tarefa);
    $stmt->execute();

    header('location: index.php');  
}


// Deleta uma tarefa.
function deletarTarefa($id)
{
    if (empty($id)) {
        header('location: index.php');
        exit;
    }

    $db = connect();

    $stmt = $db->prepare('DELETE FROM lista WHERE id = (?)');

    $stmt->bindParam(1, $id);
    $stmt->execute();

    header('location: index.php');  
}