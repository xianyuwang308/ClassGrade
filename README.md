# 班级成绩查询系统

本项目由咸鱼网络科技工作室开发  

### 官方资源  
- 咸鱼科技躺盐资源站：[https://xianyu.tbit.top](https://xianyu.tbit.top)  
- 咸鱼科技官方 QQ 群：517362327  
- 咸鱼科技官方哔哩哔哩：[https://space.bilibili.com/3493289586067536](https://space.bilibili.com/3493289586067536)  


## 项目概述  
这是一个简洁高效的班级成绩查询系统，专为教育场景设计。  
系统包含 **学生查询前端** 和 **管理后台**，采用 PHP 开发，使用 JSON 文件存储数据，无需数据库支持。  


## 项目结构  
ClassGrade/  
├─ index.php       # 学生成绩查询页面  
├─ admin.php       # 管理员后台  
├─ login.php       # 管理员登录页面  
├─ logout.php      # 退出登录处理  
├─ data.json       # 成绩数据存储  
└─ README.md       # 项目说明文档  
## 功能特点  

### 学生端  
- 准考证号查询成绩  
- 响应式设计，适配各种设备  
- 成绩展示卡片式布局  
- 加载动画效果  
- 错误提示功能  


### 管理端  
- 管理员登录验证  
- 查看所有学生成绩  
- 添加新学生成绩  
- 简洁的表格展示  
- 退出登录功能  


## 安装与使用  

### 部署要求  
1. PHP 5.6+ 环境  
2. Web 服务器（Apache/Nginx 均可）  


### 快速部署  
1. 将项目所有文件上传至服务器  
2. 确保 `data.json` 文件有**写入权限**（需可修改，用于更新成绩数据）  
3. 通过浏览器访问 `index.php` 即可打开学生查询页  


### 管理员登录  
1. 访问地址：`login.php`  
2. 默认账号：`admin`  
3. 默认密码：`123456`  
   > **安全提示**：首次使用后请立即修改默认密码！

### 特别说明
姓名字段建议使用 Unicode 转义序列（如遇生僻字、特殊字符，避免显示异常）

## 第三方下载地址：
123云盘：https://www.123684.com/s/oWSsTd-XopoH


## 数据文件格式  
`data.json` 用 JSON 存储学生成绩，示例结构如下：  
```json
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





