<?php
include 'partials/connection.php';

function addpost($home,$title,$content) {

    $add ="INSERT INTO  $home(title, content) VALUES ('$title', '$content')";
    if (mysqli_query($conn, $add)) 
    {
        $message = 'Added Successfully';
    }
    else 
    {
        $message = 'System Error: Not Submitted!';
    }
}

?>