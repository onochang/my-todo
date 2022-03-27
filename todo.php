<?php

// ToDoリストを取得
function getTodo()
{
    // データベースに接続
    $dbh = dbConnect();

    // 1.sqlを準備
    $sql = "SELECT * FROM todo";
    // 2.sqlを実行します
    $stmt = $dbh->query($sql);
    // 3.結果を取得します
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $result;
}

// ToDoの追加
function addTodo($todo)
{
    $dbh = dbConnect();

    // トランザクション
    $dbh->beginTransaction();
    try {
        // sqlを準備 
        $sql = "INSERT INTO todo (content, date) VALUES (:content, :date)";
        // sqlインジェクション（SQLの不正利用）を防止
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':content', $todo['content'], PDO::PARAM_STR);
        $stmt->bindValue(':date', $todo['date'], PDO::PARAM_STR);
        // sqlを実行
        $stmt->execute();
        // データの更新
        $dbh->commit();
        // DBに格納できたら自動的にトップページに戻る
        header('location: index.php');
        exit();
    } catch (PDOException $e) {
        // 処理を停止
        $dbh->rollBack();
        print('Error:' . $e->getMessage());
    }
}

// 編集フォームのTodoを取得
function getEditTodo($id)
{
    $dbh = dbConnect();

    // ---- 取得したidのTodoレコードを取得 ----//
    // $sqlの準備
    $sql = "SELECT * FROM todo WHERE id = :id";
    // sqlインジェクション対策・プレースホルダ
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    // sqlを実行
    $stmt->execute();
    // レコードを取得
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

// Todoの編集
function updateTodo($todo)
{
    $dbh = dbConnect();

    // トランザクション
    $dbh->beginTransaction();

    try {
        // sqlを準備 
        $sql = "UPDATE todo SET content=:content, date=:date WHERE id = :id";
        // sqlインジェクション（SQLの不正利用）を防止
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':content', $todo['content'], PDO::PARAM_STR);
        $stmt->bindValue(':date', $todo['date'], PDO::PARAM_STR);
        $stmt->bindValue(':id', $todo['id'], PDO::PARAM_INT);
        // sqlを実行
        $stmt->execute();
        // データの更新
        $dbh->commit();
        // DBに格納できたら自動的にトップページに戻る
        header('location: index.php');
        exit();
    } catch (PDOException $e) {
        // 処理を停止
        $dbh->rollBack();
        print('Error:' . $e->getMessage());
    }
}

// Todoの削除
function deleteTodo($id)
{
    $dbh = dbConnect();

    try {
        // sqlを準備 
        $sql = "DELETE FROM todo WHERE id = :id";
        // sqlインジェクション（SQLの不正利用）を防止
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
        // sqlを実行
        $stmt->execute();
        // DBに格納できたら自動的にトップページに戻る
        header('location: index.php');
        exit();
    } catch (PDOException $e) {
        print('Error:' . $e->getMessage());
    }
}
