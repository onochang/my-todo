<?php

echo 'ここはdelete.phpです';

// URLパラメータからidを取得
$id = $_GET['id'];

// DBに接続
require('dbc.php');
require('todo.php');

deleteTodo($id);
