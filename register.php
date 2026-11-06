<?php
    require_once "config.php";

    
        function h($str){
            return htmlspecialchars($str ?? '', ENT_QUOTES, 'UTF-8');

        }

        $mess = [];
        $errors = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $uname = $_POST['uname'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if($password === $password2){

        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param('ss', $uname, $password);
        $stmt->execute();

        if($stmt->affected_rows > 0){
            $mess[] = "Registered successfully. Please wait for admin approval.";
        } else {
            $errors[] = "Something went wrong. Please try again later.";
        }

        $stmt->close();

    } else {
        $errors[] = "Passwords should match.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
    <title>Register</title>
</head>
<body>
   <body>

<div class="container">

    <div class="card">

        <h2>Create Account</h2>
        <p class="subtitle">Join PinkSpace today</p>

        <?php foreach ($mess as $m): ?>
            <div class="message"><?= h($m); ?></div>
        <?php endforeach; ?>

        <?php foreach ($errors as $e): ?>
            <div class="error"><?= h($e); ?></div>
        <?php endforeach; ?>

        <form method="POST">

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="uname" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="password2" required>
            </div>

            <button type="submit" class="btn">
                Create Account</button>

        </form>

        <div class="link">
            Already have an account?
            <a href="index.php">Sign In</a>
        </div>

    </div>

</div>

</body>