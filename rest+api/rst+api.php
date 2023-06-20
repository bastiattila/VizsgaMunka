<?php

// Példa adatok
$todos = [
    ["id" => 1, "task" => "Bevásárlás", "done" => false],
    ["id" => 2, "task" => "Sportolás", "done" => false]
];

// Az összes teendő lekérdezése
if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/todos') {
    header('Content-Type: application/json');
    echo json_encode($todos);
    exit();
}

// Egy teendő lekérdezése
if ($_SERVER['REQUEST_METHOD'] === 'GET' && preg_match('/\/todos\/(\d+)/', $_SERVER['REQUEST_URI'], $matches)) {
    $todoId = intval($matches[1]);
    foreach ($todos as $todo) {
        if ($todo['id'] === $todoId) {
            header('Content-Type: application/json');
            echo json_encode($todo);
            exit();
        }
    }
    header('HTTP/1.1 404 Not Found');
    exit();
}

// Új teendő hozzáadása
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/todos') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (!isset($data['task'])) {
        header('HTTP/1.1 400 Bad Request');
        exit();
    }
    $newTodo = [
        'id' => count($todos) + 1,
        'task' => $data['task'],
        'done' => false
    ];
    $todos[] = $newTodo;
    header('Content-Type: application/json');
    echo json_encode($newTodo);
    exit();
}

// Egy teendő frissítése
if ($_SERVER['REQUEST_METHOD'] === 'PUT' && preg_match('/\/todos\/(\d+)/', $_SERVER['REQUEST_URI'], $matches)) {
    $todoId = intval($matches[1]);
    $data = json_decode(file_get_contents('php://input'), true);
    $updated = false;
    foreach ($todos as &$todo) {
        if ($todo['id'] === $todoId) {
            if (isset($data['task'])) {
                $todo['task'] = $data['task'];
            }
            if (isset($data['done'])) {
                $todo['done'] = (bool)$data['done'];
            }
            $updated = true;
            break;
        }
    }
    if ($updated) {
        header('Content-Type: application/json');
        echo json_encode($todo);
    } else {
        header('HTTP/1.1 404 Not Found');
    }
    exit();
}

// Ha nem található az útvonal
header('HTTP/1.1 404 Not Found');
