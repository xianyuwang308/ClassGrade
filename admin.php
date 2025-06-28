<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>成绩管理系统</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
        }
        input[type="submit"] {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .logout {
            float: right;
            padding: 10px;
            background-color: #f44336;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>成绩管理系统</h1>
    <a href="logout.php" class="logout">退出登录</a>
    <h2>所有学生成绩</h2>
    <table>
        <tr>
            <th>姓名</th>
            <th>准考证号</th>
            <th>总分</th>
            <th>语文</th>
            <th>数学</th>
            <th>英语</th>
            <th>物理</th>
            <th>化学</th>
            <th>政治</th>
            <th>历史</th>
            <th>地理</th>
            <th>生物</th>
            <th>体育</th>
        </tr>
        <?php
        $data = json_decode(file_get_contents('data.json'), true);
        foreach ($data as $student) {
            echo "<tr>";
            echo "<td>" . $student["name"] . "</td>";
            echo "<td>" . $student["exam_number"] . "</td>";
            echo "<td>" . $student["total_score"] . "</td>";
            echo "<td>" . $student["chinese"] . "</td>";
            echo "<td>" . $student["math"] . "</td>";
            echo "<td>" . $student["english"] . "</td>";
            echo "<td>" . $student["physics"] . "</td>";
            echo "<td>" . $student["chemistry"] . "</td>";
            echo "<td>" . $student["politics"] . "</td>";
            echo "<td>" . $student["history"] . "</td>";
            echo "<td>" . $student["geography"] . "</td>";
            echo "<td>" . $student["biology"] . "</td>";
            echo "<td>" . $student["pe"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>添加学生成绩</h2>
    <form action="admin.php" method="post">
        <label for="name">姓名:</label>
        <input type="text" id="name" name="name" required>
        <label for="exam_number">准考证号:</label>
        <input type="text" id="exam_number" name="exam_number" required>
        <label for="total_score">总分:</label>
        <input type="text" id="total_score" name="total_score" required>
        <label for="chinese">语文:</label>
        <input type="text" id="chinese" name="chinese" required>
        <label for="math">数学:</label>
        <input type="text" id="math" name="math" required>
        <label for="english">英语:</label>
        <input type="text" id="english" name="english" required>
        <label for="physics">物理:</label>
        <input type="text" id="physics" name="physics" required>
        <label for="chemistry">化学:</label>
        <input type="text" id="chemistry" name="chemistry" required>
        <label for="politics">政治:</label>
        <input type="text" id="politics" name="politics" required>
        <label for="history">历史:</label>
        <input type="text" id="history" name="history" required>
        <label for="geography">地理:</label>
        <input type="text" id="geography" name="geography" required>
        <label for="biology">生物:</label>
        <input type="text" id="biology" name="biology" required>
                <label for="pe">体育:</label>
        <input type="text" id="pe" name="pe" required>
        <input type="submit" value="添加">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $exam_number = $_POST['exam_number'];
        $total_score = $_POST['total_score'];
        $chinese = $_POST['chinese'];
        $math = $_POST['math'];
        $english = $_POST['english'];
        $physics = $_POST['physics'];
        $chemistry = $_POST['chemistry'];
        $politics = $_POST['politics'];
        $history = $_POST['history'];
        $geography = $_POST['geography'];
        $biology = $_POST['biology'];
        $pe = $_POST['pe'];

        $new_student = [
            'name' => $name,
            'exam_number' => $exam_number,
            'total_score' => $total_score,
            'chinese' => $chinese,
            'math' => $math,
            'english' => $english,
            'physics' => $physics,
            'chemistry' => $chemistry,
            'politics' => $politics,
            'history' => $history,
            'geography' => $geography,
            'biology' => $biology,
            'pe' => $pe
        ];

        $data = json_decode(file_get_contents('data.json'), true);
        $data[] = $new_student;
        file_put_contents('data.json', json_encode($data));
        echo "新记录添加成功";
    }
    ?>
</body>
</html>