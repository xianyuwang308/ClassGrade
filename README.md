# ClassGrade成绩管理系统 - 开源文档

## 项目简介

ClassGrade成绩管理系统是一个轻量级、易部署的PHP应用程序，专为教育机构设计，用于管理学生成绩数据并支持学生自助查询。系统采用纯PHP开发，使用JSON文件存储数据，无需MySQL支持，部署简单快捷。

## 项目作者联系方式

哔哩哔哩by.咸鱼网络科技：https://space.bilibili.com/3493289586067536

咸鱼科技躺盐资源站：https://www.xianyuwang.top

电子邮件：xianyuwangluokeji@gmail.com

## 功能特点

- **管理员后台**：完整的成绩管理功能（增删改查）
- **批量导入**：支持CSV格式批量导入成绩数据
- **学生查询**：简洁的查询界面，实时展示成绩详情
- **数据统计**：自动计算学生总数、平均分、最高/最低分等统计信息
- **响应式设计**：适配桌面和移动设备
- **无MySQL依赖**：使用JSON文件存储数据，部署简单

## 安装与部署

### 环境要求

- PHP 5.6+（推荐PHP 7.0+）
- Web服务器（Apache/Nginx）
- 文件写入权限（用于data.json）

### 部署步骤

1. 将项目文件上传到Web服务器目录

2. 设置文件权限：

   chmod 755 data.json
   chmod 755 uploads/

3. 访问系统：

   - 学生查询页面：`http://你的域名/index.php`
   - 管理员后台：`http://你的域名/admin.php`

### 默认管理员账号

```
用户名：admin
密码：123456
```

**强烈建议**首次登录后修改密码（在login.php中修改）

## 使用说明

### 管理员登录

1. 访问`admin.php`
2. 使用默认账号登录
3. 登录后进入管理后台

### 管理学生成绩

- **添加学生**：填写学生详细信息后提交
- **编辑学生**：从下拉列表选择学生后点击"编辑"
- **删除学生**：从下拉列表选择学生后点击"删除"
- **批量操作**：支持导入CAV批量数据

### 批量导入成绩

1. 下载CSV模板
2. 按格式填写学生成绩数据
3. 选择文件并上传
4. 选择是否覆盖现有数据
5. 系统将显示导入结果

**CSV格式要求**：

```
姓名,准考证号,总分,语文,数学,英语,信息技术,思想政治,历史,PS,PR,Python,体育,班级排名
```

### 学生查询功能

1. 学生访问`index.php`
2. 输入准考证号
3. 系统显示该生所有成绩信息
4. 包含总分、各科成绩和班级排名

## 文件说明

| 文件名       | 功能描述                       |
| :----------- | :----------------------------- |
| `admin.php`  | 管理员后台（成绩管理核心功能） |
| `index.php`  | 学生成绩查询页面               |
| `login.php`  | 管理员登录页面                 |
| `logout.php` | 退出登录处理                   |
| `data.json`  | 学生成绩数据存储文件           |

## 注意事项

1. **安全设置**：

   - 务必修改默认管理员密码（在login.php中修改）
   - 限制对admin.php和data.json的公开访问
   - 定期备份data.json文件

2. **性能优化**：

   - 当学生数量超过500人时，建议还是使用数据库
   - 定期清理uploads目录中的临时文件

3. **数据格式**：

   - 导入CSV文件必须使用UTF-8编码
   - 确保CSV文件列顺序与模板一致
   - 总分必须是数字类型

4. **权限管理**：

   ```
   # 推荐权限设置
   chmod 644 data.json
   chmod 755 uploads/
   ```

## 开源许可

本项目采用 MIT 开源许可证

```
MIT License

Copyright (c) 2025 咸鱼网络科技工作室

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```

## 技术支持

- 项目作者：bilibili@咸鱼网络科技
- 问题反馈：创建GitHub Issue
- 班级定制：支持根据需求定制功能

**提示**：首次使用后请务必备份数据并修改默认管理员密码！