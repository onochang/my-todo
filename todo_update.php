<?php

// formから編集内容を受け取る
$todo = $_POST;

// DBに接続
require('dbc.php');
require('todo.php');

updateTodo($todo);
