<?php

ini_set('display_errors', "On");

// URLパラメータからidを取得
$id = $_GET['id'];

require('dbc.php');
require('todo.php');

$result = getEditTodo($id);

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
    <div class="w-1/3 m-auto">

        <div class="my-16">
            <h1 class="text-4xl text-center">My ToDo App</h1>
        </div>

        <form action="todo_update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
            <div class="m-auto shadow-lg py-16 mb-16">

                <div class="flex justify-between mb-8 m-auto w-3/4">
                    <p class="mr-4 bg-emerald-500 text-white font-bold w-16 py-2 text-center rounded">日付</p>
                    <input value="<?php echo $result['date']; ?>" type="date" name="date" class="block w-4/6 px-1">
                </div>

                <div class="flex justify-between m-auto w-3/4">
                    <p class="mr-4 bg-emerald-500 text-white font-bold w-16 py-2 text-center rounded">ToDo</p>
                    <input value="<?php echo $result['content']; ?>" type="text" name="content" class="block w-4/6 px-1 border-b-2">
                </div>

            </div>

            <input type="submit" value="リストを編集" class="cursor-pointer bg-green-500 text-white font-bold w-full py-2 rounded shadow-lg hover:bg-green-700 hover:shadow-none hover:duration-300 duration-300 mb-8">
        </form>
        <a href="index.php" class="block text-center hover:text-emerald-500">戻る</a>
    </div>
</body>

</html>