<?php
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';

$json = file_get_contents('todo.json');
$arrayJson = json_decode($json, true);

$todoName = $_POST['todo_name'];

unset($arrayJson[$todoName]);

file_put_contents('todo.json', json_encode($arrayJson, JSON_PRETTY_PRINT));

header("Location: index.php");
?>