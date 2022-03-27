<?php

function dbConnect()
{
    $dsn = 'mysql:dbname=my_todo;host=localhost;charaset=utf8';
    $user = 'user';
    $password = 'user0123';

    try {
        // PDOの機能を使えるようにしている
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        print('Error:' . $e->getMessage());
        die();
    }

    return $dbh;
}
