<?php
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];

    //database connection
    $conn = new mysqli('localhost', 'root','','portfolio_db');
    if($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error);
    }else{
        $stmt = $conn->prepare("Insert into contact(firstname, lastname, email, number,message )
        value(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $firstname, $lastname ,$email, $number,$message );
        $stmt->execute();
        echo "registration successfully...";
        $stmt->close();
        $conn->close();
    }

?>