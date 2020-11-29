<?php

include('db.php');

if(isset($_POST['save_task']))
{
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

    $query = "INSERT INTO task(title, description) VALUES ('$title','$description')";
    $result= mysqli_query($conn, $query);
    if(!$result){
        die("Query Failed");
    }

    $_SESSION['message'] = 'Task Saved succesfully';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");

}