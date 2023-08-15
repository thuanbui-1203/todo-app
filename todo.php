<?php
$todo_ = $_POST['todo_name'] ?? '';
$todo_ = trim($todo_);
// get the content of the file
if ($todo_) {
    if (file_exists('todo.json')) {
        $json = file_get_contents('todo.json');
        $arrayJson = json_decode($json, true);
        $arrayJson[$todo_] = ['completed' => false];
    }
    else {
        $arrayJson = [];
    }

    // // add new content to the file
    file_put_contents('todo.json',json_encode($arrayJson, JSON_PRETTY_PRINT));
}

header('Location: index.php');
?>
