<?php 
    $pdo = new PDO('mysql:host=localhost;dbname=chat', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE username = ? AND senha = ?');

    $stmt->bindValue(1, $_POST['username']);
    $stmt->bindValue(2, md5($_POST['password']));
    $result = $stmt->execute();

    //print_r($result);

    if ($result) {
        session_start();
        $_SESSION['username'] = $_POST['username'];
        echo json_encode(["message" => "true", "status" => "success"]);
    }
?>
