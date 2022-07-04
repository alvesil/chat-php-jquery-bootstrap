<?php 
    $pdo = new PDO('mysql:host=localhost;dbname=chat', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    $stmt = $pdo->prepare('INSERT INTO messages (username, mensagem) VALUES (?, ?)');
    $stmt->bindValue(1, $_POST['username']);
    $stmt->bindValue(2, $_POST['message']);
    $result = $stmt->execute();

    echo $result;
    
    if ($result) {
        echo json_encode(["message" => $result, "status" => "success"]);
    } else {
        echo json_encode(["message" => "Nada a Exibir", "status" => "error"]);
    }
?>