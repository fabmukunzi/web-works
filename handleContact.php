<?php
include('./connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $names = $_POST["names"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $createdAt = date("Y-m-d H:i:s");
    $sql = "INSERT INTO messages (senderNames, senderEmail, message, createdAt) VALUES ('$names', '$email', '$message', '$createdAt')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Message sent successfully. Our team will get back to you ASAP.');location.href='contact.php'</script>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
