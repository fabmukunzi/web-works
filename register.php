<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullName = $_POST['names'];
    $email = $_POST['email'];
    $role= $_POST['role'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $todate = date("Y-m-d H:i:s");
    $checkUser = "SELECT * FROM users WHERE email = '$email'";
    $user = mysqli_query($conn, $checkUser);

    if (mysqli_num_rows($user) > 0) {
        echo "<script>alert('Email is already registered. Please use a different email.'); location.href='register.html'</script>";
    } else {
        $addUser = "INSERT INTO users (names, email, password,role, createdAt) VALUES ('$fullName', '$email', '$password','$role', '$todate')";
        if (mysqli_query($conn, $addUser)) {
            echo "<script>alert('Registration successful!'); location.href='login.html'</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
mysqli_close($conn);
?>
