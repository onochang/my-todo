<?php

// formからデータを取得
$todo = $_POST;

// DBに接続
require('dbc.php');
require('todo.php');

addTodo($todo);
