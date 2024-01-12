<?php
include('connect.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $checkUserQuery = "SELECT * FROM users WHERE email = '$email'";
    $userResult = mysqli_query($conn, $checkUserQuery);
    if ($userResult) {
        $userData = mysqli_fetch_assoc($userResult);
        if ($userData) {
            $hashedPassword = $userData['password'];
            if (password_verify($password, $hashedPassword)) {
            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['user_names']=$userData['names'];
            $_SESSION['user_email'] = $userData['email'];
            $_SESSION['role'] = $userData['role'];
            header('Location: ./index.php');
            exit();
            } else {
                echo "<script>alert('Incorrect password');</script>";
                header("Location:login.html");
            }
        } else {
            echo "<script>alert('User not registered, create an account');'</script>";
            header("Location:register.html");
        }
        mysqli_free_result($userResult);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
