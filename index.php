<?php

// dbc.phpを読み込む
require('dbc.php');
// todo.phpを読み込む
require('todo.php');

$todoData = getTodo();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My ToDo App</title>
    <!-- fontawesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="w-6/12 m-auto">

        <div class="flex justify-between items-center my-16">
            <h1 class="text-4xl">My ToDo App</h1>
            <p class="bg-green-500 text-white font-bold flex items-center justify-center w-32 py-2 rounded shadow-lg hover:bg-green-700 hover:shadow-none hover:duration-300 duration-300"><a href="form.html">リストに追加</a></p>
        </div>

        <!-- ここから -->
        <?php foreach ($todoData as $todo) : ?>
            <div class="flex justify-between items-center border-solid border-b pb-3 mb-3">
                <div class="flex">
                    <p class="mr-4"><?php echo $todo['date']; ?></p>
                    <p><?php echo $todo['content']; ?></p>
                </div>
                <div class="flex">
                    <a href="update_form.php?id=<?php echo $todo['id']; ?>" class="fa-solid fa-pen bg-emerald-500 text-white text-xs w-8 h-8 flex items-center justify-center rounded-full shadow-lg"></a>
                    <a href="todo_delete.php?id=<?php echo $todo['id']; ?>" class="fa-solid fa-trash bg-red-500 text-white text-xs w-8 h-8 flex items-center justify-center rounded-full shadow-lg ml-4"></a>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- ここまで -->

    </div>


</body>

</html>