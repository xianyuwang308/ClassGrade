=======  班级成绩查询系统 · 开源项目  =======
----------本项目由咸鱼网络科技工作室开发----------
咸鱼科技躺盐资源站：https://xianyu.tbit.top
咸鱼科技官方QQ群：517362327
咸鱼科技官方哔哩哔哩：https://space.bilibili.com/3493289586067536

项目概述：
这是一个简洁高效的班级成绩查询系统，专为教育场景设计。
系统包含学生查询前端和管理后台，采用PHP开发，使用JSON文件存储数据，无需数据库支持。

项目结构：
score-query-system/
├── index.php            # 学生成绩查询页面
├── admin.php            # 管理员后台
├── login.php            # 管理员登录页面
├── logout.php           # 退出登录处理
├── data.json            # 成绩数据存储
└── README.md            # 项目说明文档

功能特点：

学生端：
1、准考证号查询成绩
2、响应式设计，适配各种设备
3、成绩展示卡片式布局
4、加载动画效果
5、错误提示功能

管理端：
1、管理员登录验证
2、查看所有学生成绩
3、添加新学生成绩
4、简洁的表格展示
5、退出登录功能

安装与使用:

部署要求:
1、PHP 5.6+ 环境
2、Web服务器 (Apache/Nginx)

快速部署：
1、将所有文件上传到服务器
2、确保data.json文件有写入权限
3、通过浏览器访问index.php

管理员登录：
1、访问地址: login.php
2、默认账号: admin
3、默认密码: 123456

数据文件格式：
data.json文件使用JSON格式存储学生成绩数据，示例结构：
注意：姓名建议使用Unicode转义序列格式

[
  {
    "name": "张三",
    "exam_number": "2409285001",
    "total_score": "90",
    "chinese": "85",
    "math": "92",
    "english": "88",
    "physics": "76",
    "chemistry": "82",
    "politics": "90",
    "history": "85",
    "geography": "78",
    "biology": "86",
    "pe": "95"
  }
]


安全说明：
1、默认密码: 首次使用后请立即修改默认密码
2、文件权限: 确保data.json文件权限设置合理
3、目录保护: 建议将管理页面放在受保护目录

自定义配置：
修改管理员密码：
编辑login.php文件，修改以下代码：

if ($username === 'admin' && $password === '123456') {
    // 修改这里的密码
}

修改科目名称：
在index.php和admin.php中搜索科目名称进行修改：

<div class="score-title">语文</div>

更新网页图标：
在index.php中修改favicon链接：

<link rel="icon" href="新的图标URL">

=============== 开源协议 ===============
本项目采用 MIT 许可证 开源，您可以自由使用、修改和分发代码。

贡献指南
欢迎贡献代码！请遵循以下流程：

Fork 项目仓库

创建特性分支 (git checkout -b feature/your-feature)

提交更改 (git commit -m 'Add your feature')

推送到分支 (git push origin feature/your-feature)

创建 Pull Request

注意事项：
1、本系统适用于小型班级，大型数据集请考虑使用数据库

2、定期备份data.json文件

3、生产环境建议添加更多安全措施

技术栈：

前端: HTML5, CSS3 (Flexbox, Grid)

后端: PHP

数据存储: JSON

// 核心查询逻辑示例
$exam_number = $_POST['exam_number'];
$data = json_decode(file_get_contents('data.json'), true);
$student = array_filter($data, function($item) use ($exam_number) {
    return $item['exam_number'] === $exam_number;
});

欢迎使用并贡献代码，共同打造更好的教育工具！
