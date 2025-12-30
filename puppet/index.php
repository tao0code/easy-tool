<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>非遗木偶戏 - 传统文化传承</title>
    <!-- 引入CSS样式文件 -->
    <link rel="stylesheet" href="CSS/style.css">
    <!-- 引入字体图标（用于轮播控制按钮） -->
    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<!-- 头部导航 -->
<header class="header">
    <div class="container">
        <h1 class="logo">非遗木偶戏 <span>传统文化传承</span></h1>
        <nav class="nav">
            <ul>
                <li><a href="index.php" class="active">首页</a></li>
                <li><a href="login/login.php">登录</a></li>
                <li><a href="register/register.php">注册</a></li>
                <li><a href="#heritage">联系我们</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- 轮播图区域 -->
<section id="home" class="carousel-section">
    <div class="carousel-container">
        <!-- 轮播图片容器 -->
        <div class="carousel-wrapper">
            <div class="carousel-slide active">
                <img src="img/1.png" alt="木偶戏表演1">
            </div>
            <div class="carousel-slide">
                <img src="img/2.png" alt="木偶戏表演2">
            </div>
            <div class="carousel-slide">
                <img src="img/3.png" alt="木偶戏表演3">
            </div>
        </div>
        <!-- 轮播控制按钮 -->
        <button class="carousel-btn prev-btn"><i class="fas fa-chevron-left"></i></button>
        <button class="carousel-btn next-btn"><i class="fas fa-chevron-right"></i></button>
        <!-- 轮播指示器 -->
        <div class="carousel-indicators">
            <span class="indicator active" data-index="0"></span>
            <span class="indicator" data-index="1"></span>
            <span class="indicator" data-index="2"></span>
        </div>
    </div>
</section>

<!-- 木偶戏介绍区域 -->
<section id="intro" class="intro-section">
    <div class="container">
        <h2 class="section-title">木偶戏介绍</h2>
        <div class="intro-content">
            <p>木偶戏是由演员操纵木偶以表演故事的戏剧，又名傀儡戏，是中国非物质文化遗产的重要组成部分。它起源于汉代，发展于唐宋，鼎盛于明清，有着两千多年的悠久历史。</p>
            <p>木偶戏的表演形式丰富多样，通过木偶的动作、表情配合唱腔、台词，展现出栩栩如生的故事场景，兼具观赏性和文化性，是中华传统文化中一颗璀璨的明珠。</p>
        </div>
    </div>
</section>

<!-- 木偶戏种类区域 -->
<section id="types" class="types-section">
    <div class="container">
        <h2 class="section-title">木偶戏种类</h2>
        <div class="types-list">
            <div class="type-item">
                <h3>提线木偶</h3>
                <p>提线木偶是通过操控丝线来控制木偶的动作，丝线数量从十几根到几十根不等，表演技巧精湛，动作细腻。</p>
                <!-- 提线木偶图片容器（替换为你的图片路径） -->
                <div class="type-img">
                    <img src="img/4.png" alt="提线木偶">
                </div>
            </div>
            <div class="type-item">
                <h3>布袋木偶</h3>
                <p>布袋木偶又称掌中木偶，演员将木偶套在手上操控，动作灵活，节奏明快，适合表现活泼的剧情。</p>
                <!-- 布袋木偶图片容器（替换为你的图片路径） -->
                <div class="type-img">
                    <img src="img/5.png" alt="布袋木偶">
                </div>
            </div>
            <div class="type-item">
                <h3>杖头木偶</h3>
                <p>杖头木偶通过木杖来操控木偶的头部和四肢，木偶体型较大，表演气势恢宏，适合表现大戏场景。</p>
                <!-- 杖头木偶图片容器（替换为你的图片路径） -->
                <div class="type-img">
                    <img src="img/6.png" alt="杖头木偶">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 非遗传承区域 -->
<section id="heritage" class="heritage-section">
    <div class="container">
        <h2 class="section-title">非遗传承</h2>
        <div class="heritage-content">
            <p>如今，木偶戏作为非物质文化遗产，正通过进校园、进社区、线上展播等多种形式被传承和推广。越来越多的年轻人开始学习木偶戏技艺，让这门古老的艺术焕发出新的生机。</p>
        </div>
    </div>
</section>

<!-- 页脚 -->
<footer class="footer">
    <div class="container">
        <p>© 2025 非遗木偶戏传统文化传承 - 所有权利保留</p>
        <p>联系我们：3741984712047</p>
    </div>
</footer>

<!-- 引入JS脚本文件 -->
<script src="JS/script.js"></script>
</body>
</html>