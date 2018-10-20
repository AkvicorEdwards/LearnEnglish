# LearnEnglish

### 特点：

我之所以想开发这个是因为有太多的英语学习软件杂乱功能太多,且不能自定义词库
- 自定义词库
- 界面简洁易用
- 支持创建多词库
- 支持录入单词句子等
- 录入方便
- 等等 ...


### 下载安装：

下载后，解压并上传到已经搭建好 LAMP PHP7.1 环境的服务器中
将Database下的数据库文件learn_english.sql导入Mysql数据库


- Github打包：https://github.com/AkvicorEdwards/LearnEnglish/archive/master.zip

- Akvicor'Cloud打包：https://cloud.kvxi.org/Website/LearnEnglish.zip

### 界面&&使用：

注册
- 若域名为`demo.com`
- 则注册页面为`demo.com/?mod=register`
- 默认Registration Code(注册码)为`lyu`



使用账号密码登陆
- 默认账号: `lyu`
- 密码: `1234567`


![登陆](https://github.com/AkvicorEdwards/LearnEnglish/raw/master/1.png)

List就是词库,默认有两个List,可以自己创建
选择要背诵的List或者录入单词
可以先创建List并录入单词

![选择](https://github.com/AkvicorEdwards/LearnEnglish/raw/master/2.png)

- 格式:  单词1&翻译1&单词2&翻译2&单词三&翻译3…………
- 例: hello&你好&hello world&你好世界…………
- 
- 注:  List名可使用中英文或数字
- 	若List名已存在则将单词添加进原有List
- 	若不存在则创建新List


![录入](https://github.com/AkvicorEdwards/LearnEnglish/raw/master/3.png)

选择List

![登陆](https://github.com/AkvicorEdwards/LearnEnglish/raw/master/4.png)

目录
- 点击选择学习方式
- 或者更改List及录入单词


![目录](https://github.com/AkvicorEdwards/LearnEnglish/raw/master/5.png)

学习界面
- 可以点击Translate就会显示出这个单词的汉语翻译
- 然后在Word输入框中输入英文单词 
- 使用 ‘拼写检查’ 检查输入的是否正确
- 也可以点击最上面的Word查看正确的英文单词
- Word输入框不必填写,若此次背诵时拼写正确或者认识就可点击 正确 按钮使这个单词的正确次数加一并刷新显示下一个单词,点击 错误 会使这个单词的错误数量加一刷新显示下一个单词
-   正确率等于 正确次数/(正确次数加错误次数) 初始值为0
- 当单词正确率小于0.5时会被归入困难单词


![学习](https://github.com/AkvicorEdwards/LearnEnglish/raw/master/6.png)

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
│   │    │ ├ list.php	# 列出List内单词 #
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
├ index.php
├ .gitattributes	# 防止项目在Github显示错误的编程语言 #
├ .htaccess		# 网站强制https 若开启请将此文件中关于SSL的注释去掉#
└ robots.txt	# 防搜索引擎收录 #
```
