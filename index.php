<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>班级成绩查询系统</title>
    <!-- 网页图标 -->
    <link rel="icon" href="https://static.thenounproject.com/png/40762-200.png" type="image/png">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'PingFang SC', 'Microsoft YaHei', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            min-height: 100vh;
            padding: 20px 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .header {
            text-align: center;
            margin: 20px 0 30px;
            width: 100%;
        }
        h1 {
            color: #1890ff;
            font-size: 2.2rem;
            margin-bottom: 10px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
            background: linear-gradient(45deg, #1890ff, #52c41a);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: 700;
            letter-spacing: 1px;
            padding: 0 10px;
        }
        .subtitle {
            color: #666;
            font-size: 1rem;
            margin-top: 5px;
        }
        .card {
            background: white;
            width: 100%;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            margin-bottom: 25px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
        }
        .search-box {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .form-group {
            width: 100%;
            margin-bottom: 20px;
            position: relative;
        }
        label {
            display: block;
            margin-bottom: 12px;
            font-size: 1.1rem;
            color: #333;
            font-weight: 500;
            text-align: center;
        }
        input[type="text"] {
            width: 100%;
            padding: 14px 20px;
            border: 2px solid #e1e8ed;
            border-radius: 12px;
            font-size: 1.1rem;
            transition: all 0.3s;
            background: #f8fafc;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);
        }
        input[type="text"]:focus {
            border-color: #1890ff;
            outline: none;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(24, 144, 255, 0.15);
        }
        input[type="submit"] {
            background: linear-gradient(135deg, #1890ff 0%, #096dd9 100%);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 14px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            max-width: 300px;
            box-shadow: 0 4px 12px rgba(24, 144, 255, 0.3);
            transition: all 0.3s ease;
            letter-spacing: 1px;
        }
        input[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(24, 144, 255, 0.4);
        }
        input[type="submit"]:active {
            transform: translateY(0);
        }
        #progress-bar {
            width: 100%;
            height: 16px;
            background: #edf2f7;
            border-radius: 10px;
            overflow: hidden;
            margin: 25px 0;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
        }
        #progress {
            height: 100%;
            background: linear-gradient(90deg, #52c41a 0%, #1890ff 100%);
            border-radius: 10px;
            transition: width 0.3s ease;
            width: 0;
        }
        .result-container {
            width: 100%;
            display: none;
        }
        .result-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            margin-top: 20px;
        }
        .result-header {
            background: linear-gradient(135deg, #1890ff 0%, #096dd9 100%);
            color: white;
            padding: 20px;
            text-align: center;
        }
        .result-name {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        .result-id {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        .result-body {
            padding: 25px 20px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
            gap: 18px;
        }
        .score-item {
            text-align: center;
            padding: 12px 5px;
            background: #f8fafc;
            border-radius: 10px;
            transition: transform 0.3s;
        }
        .score-item:hover {
            transform: translateY(-3px);
            background: #edf7ff;
        }
        .score-title {
            font-size: 0.95rem;
            color: #666;
            margin-bottom: 8px;
        }
        .score-value {
            font-size: 1.4rem;
            font-weight: 700;
            color: #1890ff;
        }
        .total-score {
            grid-column: 1 / -1;
            background: linear-gradient(135deg, #f6ffed 0%, #e6f7ff 100%);
            border: 2px dashed #91d5ff;
            padding: 15px;
            margin-bottom: 10px;  /* 改为底部边距 */
        }
        .total-score .score-value {
            font-size: 2rem;
            color: #096dd9;
        }
        .error-message {
            color: #f5222d;
            background: #fff1f0;
            padding: 15px;
            border-radius: 10px;
            margin: 25px 0;
            text-align: center;
            width: 100%;
            border: 1px solid #ffa39e;
            font-size: 1.1rem;
        }
        .footer {
            width: 100%;
            text-align: center;
            padding: 25px 0 15px;
            color: #8c8c8c;
            font-size: 0.9rem;
            margin-top: auto;
        }
        .copyright {
            margin-top: 8px;
            font-size: 0.8rem;
        }
        .decoration {
            position: absolute;
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, rgba(24, 144, 255, 0.08) 0%, rgba(82, 196, 26, 0.08) 100%);
            border-radius: 50%;
            z-index: -1;
            top: -50px;
            right: -50px;
        }
        .decoration:nth-child(2) {
            top: auto;
            bottom: -80px;
            left: -60px;
            width: 250px;
            height: 250px;
            opacity: 0.6;
        }
        
        /* 响应式调整 */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.8rem;
            }
            .card {
                padding: 20px 15px;
            }
            .result-body {
                grid-template-columns: repeat(auto-fill, minmax(110px, 1fr));
                gap: 12px;
                padding: 20px 15px;
            }
            .score-item {
                padding: 10px 5px;
            }
            .score-value {
                font-size: 1.3rem;
            }
            .total-score .score-value {
                font-size: 1.8rem;
            }
        }
        
        @media (max-width: 480px) {
            h1 {
                font-size: 1.6rem;
            }
            .result-body {
                grid-template-columns: repeat(2, 1fr);
            }
            input[type="text"] {
                padding: 12px 16px;
                font-size: 1rem;
            }
            input[type="submit"] {
                padding: 13px;
                font-size: 1rem;
            }
        }
        
        /* 动画效果 */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 0.6s ease forwards;
        }
    </style>
</head>
<body>
    <div class="decoration"></div>
    <div class="decoration"></div>
    
    <div class="container">
        <div class="header">
            <h1>班级成绩查询系统</h1>
            <div class="subtitle">输入准考证号查询期末考试成绩</div>
        </div>
        
        <div class="card">
            <div class="search-box">
                <form action="index.php" method="post" id="searchForm">
                    <div class="form-group">
                        <label for="exam_number">准考证号</label>
                        <input type="text" id="exam_number" name="exam_number" required 
                               placeholder="请输入您的准考证号">
                    </div>
                    <input type="submit" value="查询成绩">
                </form>
            </div>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $exam_number = $_POST['exam_number'];
            $data = json_decode(file_get_contents('data.json'), true);
            $student = array_filter($data, function($item) use ($exam_number) {
                return $item['exam_number'] === $exam_number;
            });

            if (!empty($student)) {
                $student = array_values($student)[0];
        ?>
        <div id="progress-bar">
            <div id="progress"></div>
        </div>
        
        <div class="result-container" id="resultContainer">
            <div class="result-card fade-in">
                <div class="result-header">
                    <div class="result-name"><?php echo htmlspecialchars($student['name']); ?></div>
                    <div class="result-id">准考证号: <?php echo htmlspecialchars($student['exam_number']); ?></div>
                </div>
                <div class="result-body">
                    
                    <div class="score-item total-score">
                        <div class="score-title">总分</div>
                        <div class="score-value"><?php echo htmlspecialchars($student['total_score']); ?></div>
                    </div>
                    
                    <div class="score-item">
                        <div class="score-title">语文</div>
                        <div class="score-value"><?php echo htmlspecialchars($student['chinese']); ?></div>
                    </div>
                    <div class="score-item">
                        <div class="score-title">数学</div>
                        <div class="score-value"><?php echo htmlspecialchars($student['math']); ?></div>
                    </div>
                    <div class="score-item">
                        <div class="score-title">英语</div>
                        <div class="score-value"><?php echo htmlspecialchars($student['english']); ?></div>
                    </div>
                    <div class="score-item">
                        <div class="score-title">物理</div>
                        <div class="score-value"><?php echo htmlspecialchars($student['physics']); ?></div>
                    </div>
                    <div class="score-item">
                        <div class="score-title">化学</div>
                        <div class="score-value"><?php echo htmlspecialchars($student['chemistry']); ?></div>
                    </div>
                    <div class="score-item">
                        <div class="score-title">政治</div>
                        <div class="score-value"><?php echo htmlspecialchars($student['politics']); ?></div>
                    </div>
                    <div class="score-item">
                        <div class="score-title">历史</div>
                        <div class="score-value"><?php echo htmlspecialchars($student['history']); ?></div>
                    </div>
                    <div class="score-item">
                        <div class="score-title">地理</div>
                        <div class="score-value"><?php echo htmlspecialchars($student['geography']); ?></div>
                    </div>
                    <div class="score-item">
                        <div class="score-title">生物</div>
                        <div class="score-value"><?php echo htmlspecialchars($student['biology']); ?></div>
                    </div>
                    <div class="score-item">
                        <div class="score-title">体育</div>
                        <div class="score-value"><?php echo htmlspecialchars($student['pe']); ?></div>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            var progress = document.getElementById("progress");
            var interval = setInterval(function() {
                var width = progress.offsetWidth + 5; 
                if (width > progress.parentNode.offsetWidth) {
                    clearInterval(interval);
                    setTimeout(function() {
                        document.getElementById("resultContainer").style.display = "block";
                    }, 200);
                } else {
                    progress.style.width = width + "px";
                }
            }, 10); 
        </script>
        <?php
            } else {
                echo '<div class="error-message fade-in">没有在数据库中找到该准考证号的成绩信息，请检查是否输入错误！</div>';
            }
        }
        ?>
        
        <div class="footer">
            <div>咸鱼网络科技工作室 · 技术支持</div>
            <div class="copyright">© 2025 成绩查询系统 | XXX班专用</div>
        </div>
    </div>
</body>
</html>