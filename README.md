# LearnEnglish

### 特点：

我之所以想开发这个是因为有太多的英语学习软件杂乱功能太多,且不能自定义词库
- 自定义词库
- 界面简洁易用
- 支持创建多词库
- 录入单词方便
- 等等 ...


### 下载安装：

下载后，解压并上传到已经搭建好 LAMP PHP7.1 环境的服务器中
将Database下的数据库文件learn_english.sql导入Mysql数据库


- Github打包：https://github.com/AkvicorEdwards/LearnEnglish/archive/master.zip

- Akvicor'Cloud打包：https://cloud.kvxi.org/Website/LearnEnglish.zip

### 界面&&使用：


使用账号密码登陆

![登陆](https://github.com/AkvicorEdwards/LearnEnglish/raw/master/1.png)

登陆后选择List或者录入单词

![选择](https://github.com/AkvicorEdwards/LearnEnglish/raw/master/2.png)

- 录入格式	 (单词&翻译&单词&翻译...) `one &一 &two &二 &hello world&你好 世界`

![录入](https://github.com/AkvicorEdwards/LearnEnglish/raw/master/3.png)

选择List

![登陆](https://github.com/AkvicorEdwards/LearnEnglish/raw/master/4.png)

目录

![目录](https://github.com/AkvicorEdwards/LearnEnglish/raw/master/5.png)

背诵界面

![背诵](https://github.com/AkvicorEdwards/LearnEnglish/raw/master/6.png)

### 文件结构
假设你的虚拟主机是 `/home/wwwroot/xxx.xx`
``` bash
/home/wwwroot/xxx.xx/
├─ resources/
│   ├ themes/  
│   │ └ default/
│   │    ├ home/
│   │    │ ├ css/
│   │    │ │  └styles.css
│   │    │ │ 
│   │    │ ├ js/
│   │    │ │  ├funny-title.js
│   │    │ │  └jquery-2.1.1.min.js
│   │    │ │ 
│   │    │ ├ enter_words.php	# 输入单词页面 #
│   │    │ ├ index.php	# 目录页面 #
│   │    │ ├ learn_words.php	# 背单词页面 #
│   │    │ ├ learning.php	# 判断加载文件 #
│   │    │ ├ select_list.php	# 选择List文件 #
│   │    │ └ upRate.php		# 输入单词正误处理 #
│   │    │ 
│   │    ├ login/	# 登陆用户相关功能 #
│   │    │ └ index.php
│   │    │ 
│   │    ├ register/	# 注册用户相关功能 #
│   │    │ └ index.php
│   │    │
│   │    └ favicon.ico # 网站图标 #
│   │
│   ├ config.php	# 配置文件 #
│   ├ EnterWords.php	# 创建List 输入单词 #
│   ├ LearnWords.php	# 获得单词 #
│   └ FunctionLib.php	# 其他函数库 #
│
├ README.MD
├ index.php
├ .gitattributes	# 防止项目在Github显示错误的编程语言 #
├ .htaccess		# 网站强制https 若开启请将此文件中关于SSL的注释去掉#
└ robots.txt	# 防搜索引擎收录 #
```
