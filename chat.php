<?php
    session_start();
    $pdo = new PDO('mysql:host=localhost;dbname=chat', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $stmt = $pdo->prepare('SELECT * FROM messages ORDER BY id ASC');
    $stmt->execute();
    $messages = $stmt->fetchAll();
    foreach ($messages as $message) {
        echo '<div class="message"';
        if($message['username'] == $_SESSION['username']){
            echo 'style="background-color: rgba(220, 220, 220, 0.9);"';
        }else{
            echo 'style="background-color: rgba(255, 255, 255, 0.9);"';
        }
        echo '>';
        echo '<span class="username"';
        if($message['username'] == $_SESSION['username']){ 
            echo 'style="color: purple; margin-right: 10px;"';
        }else{
            echo 'style="color: violet; margin-right: 10px;"';
        }
        echo '>' . $message['username'] . ':</span>';
        echo '<span class="message-text">' . $message['mensagem'] . '</span>';
        echo '</div>';
    }   // end foreach
    
?>  