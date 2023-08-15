<?php
    $todos = [];
    if (file_exists('todo.json')) {
        $todoList = file_get_contents('todo.json');
        $todos = json_decode($todoList, true);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <div style="align-items: center; justify-content: center; margin-left: 15rem; margin-top: 3rem; padding-left: 15rem">
        <h1>ADD TODO:</h1>
        <form action="todo.php" method="post" onClick="">
          <input type="text" class="form-control" name="todo_name" placeholder="">
          <button class="btn btn-primary" type="submit">Submit</button>
        </form>
        <br>
        <?php foreach ($todos as $todo => $todoItem) { ?>
            <div style="margin: 15px;">
            <form action="change_status.php" method="post" style="display: inline-block">
                <input type="hidden" name="todo_name" value="<?php echo $todo ?>">
                <input type="checkbox" <?php echo $todoItem['completed'] ? 'checked': '' ?>>
            </form>
                Item: <?php echo $todo?>
                <form action="delete.php" method="post" style="display: inline-block">
                    <input type="hidden" name="todo_name" value="<?php echo $todo ?>">
                    <button type="submit">Delete</button>
                </form>
            </div>
        <?php } ?>
    </div>
</body>
<script>
    const checkboxes = document.querySelectorAll('input[type=checkbox]');
    checkboxes.forEach(ch => {
        ch.onclick = function() {
            this.parentNode.submit();
        }
    })
</script>
</html>