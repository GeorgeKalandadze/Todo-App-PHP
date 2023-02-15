<?php
if(file_exists('todo.json')){
    $json = file_get_contents('todo.json');
    $todos = json_decode($json,true);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

    <form action="newTodo.php" method="post">
        <input type="text" name="todo_name" placeholder="enter your tod">
        <button>add new todo</button>
    </form>
    <br>
    <?php foreach ($todos as $todoName => $todo):?>
         <div>
             <form action="change_status.php" method="post">
                 <input type="hidden" name="todo_name" value="<?php echo $todoName?>">                 <input type="checkbox" <?php echo $todo['completed'] ? 'checked': ''?>>
             </form>
             <?php echo $todoName ?>
             <form action="delete.php" method="post">
                <input type="hidden" name="todo_name" value="<?php echo $todoName?>">
                 <button>Delete</button>
             </form>
         </div>
   <?php endforeach;  ?>

<script>
    const checkboxses = document.querySelectorAll('input[type=checkbox]');
    checkboxses.forEach(ch => {
        ch.onclick = function () {
            this.parentNode.submit()
        }
    })
</script>
</body>
</html>