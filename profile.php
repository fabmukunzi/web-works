<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User | Profile</title>
    <link rel="stylesheet" href="styles/styles.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins"
      rel="stylesheet"
    />
    <style>

        section {
            width: 50%;
            background-color: white;
            margin-left:auto;
            margin-right:auto;  
            margin-top: 10px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        img {
            max-width: 100%;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        h2 {
            margin-top: 10px;
        }

        p {
            margin: 5px 0;
            color: #777;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        form .secondary-btn{
            width:auto;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <?php
        include('header.php');
        ?>
    </header>

    <section>
    <?php
include('connect.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
$user_id=$_SESSION['user_id'];
$query = "SELECT names, email, avatar FROM users WHERE id = '$user_id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
    $user_name = $user_data['names'];
    $user_email = $user_data['email'];
    $profile_image = $user_data['avatar'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] == UPLOAD_ERR_OK) {
        $avatar_tmp_name = $_FILES["avatar"]["tmp_name"];
        $target_directory = "./dashboard/uploads/";
        $avatar_file_name = $target_directory . basename($_FILES["avatar"]["name"]);
        if (move_uploaded_file($avatar_tmp_name, $avatar_file_name)) {
            $update_avatar_query = "UPDATE users SET avatar = '$avatar_file_name' WHERE id = '$user_id'";
            $conn->query($update_avatar_query);
            header("Location: profile.php");
        } else {
            echo "<script>alert('Can't upload avatr');</script>";
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["old-password"]) && isset($_POST["new-password"])) {
        $old_password = $_POST["old-password"];
        $new_password = $_POST["new-password"];
        $check_password_query = "SELECT password FROM users WHERE id = '$user_id'";
        $password_result = $conn->query($check_password_query);
    
        if ($password_result->num_rows > 0) {
            $password_data = $password_result->fetch_assoc();
            $stored_password = $password_data['password'];
            if (password_verify($old_password, $stored_password)) {
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
                $update_password_query = "UPDATE users SET password = '$hashed_new_password' WHERE id = '$user_id'";
                $conn->query($update_password_query);
                echo "<script>alert('Password updated successfully');</script>";
            } else {
                echo "<script>alert('Old password does not match');</script>";
            }
        }
    }
}

?>
        <?php
        echo "<img src='" . ($profile_image ? $profile_image : 'defaultImage.png') . "' alt='Profile Picture'>";
        echo "<h2>$user_name</h2>";
        echo "<p>Email: $user_email</p>";
        ?>
        <form action="" method="post">
            <label for="old-password">Old Password:</label>
            <input type="password" id="old-password" name="old-password" required>

            <label for="new-password">New Password:</label>
            <input type="password" id="new-password" name="new-password" required>

            <button type="submit" class="secondary-btn">Update Password</button>
        </form>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="avatar">Update Avatar:</label>
            <input type="file" id="avatar" name="avatar" accept="image/*" required>
            <button type="submit" class="secondary-btn">Update Avatar</button>
        </form>
    </section>
</body>

</html>
