<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理员登录</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        input[type="text"], input[type="password"] {
            padding: 10px;
            margin: 10px 0;
            width: 200px;
        }
        input[type="submit"] {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>管理员登录</h1>
    <form action="login.php" method="post">
        <label for="username">用户名:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">密码:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="登录">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // 简单的用户名密码验证
        if ($username === 'admin' && $password === '123456') {
            session_start();
            $_SESSION['loggedin'] = true;
            header("Location: admin.php");
            exit;
        } else {
            echo "用户名或密码错误";
        }
    }
    ?>
</body>
</html>