<?php
//验证登录
session_start();
if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {
    header('Location: ../login/login.php');
    exit;

}
//获取用户
$username = $_SESSION['username'] ?? '用户';

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>非遗木偶戏 - 主页</title>
    <!-- 引入字体图标 -->
    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/index1.css">
    <style>
        .section-cards {
            max-width: 1200px;
            margin: 3rem auto;
            padding: 0 5%;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }
        .card {
            background-color: #fff;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .card i {
            color: #8b4513;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        .card h3 {
            color: #8b4513;
            margin-bottom: 0.8rem;
            font-size: 1.2rem;
        }
        .card p {
            color: #666;
            line-height: 1.6;
        }
        /* 调整原有内容区域的间距 */
        .content {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 5%;
        }
    </style>
</head>
<body>
<!-- 导航栏 -->
<nav class="navbar">
    <div class="logo">
        <i class="fas fa-theater-masks"></i>
        <span>非遗木偶戏文化平台</span>
    </div>

    <!-- 新增的主题导航链接 -->
    <div class="nav-links">
        <a href="index.php" class="nav-link">首页</a>
        <a href="mythology.php" class="nav-link">神话故事</a>
        <a href="techniques.php" class="nav-link">制作技艺</a>
        <a href="performances.php" class="nav-link">经典表演</a>
        <a href="inheritance.php" class="nav-link">传承人物</a>
    </div>

    <div class="user-info">
        <span>欢迎回来，<?php echo htmlspecialchars($username); ?>！</span>
        <a href="../config/logout.php">
            <button class="logout-btn">退出登录</button>
        </a>
    </div>
</nav>

<!-- 轮播图 -->
<div class="carousel-container">
    <div class="carousel" id="carousel">
        <div class="carousel-item">
            <img src="../img/9.png" alt="木偶戏表演">
        </div>
        <div class="carousel-item">
            <img src="../img/10.png" alt="木偶制作工艺">
        </div>
        <div class="carousel-item">
            <img src="../img/7.png" alt="传统木偶展示">
        </div>
    </div>

    <!-- 轮播控制按钮 -->
    <button class="carousel-control prev" id="prevBtn">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button class="carousel-control next" id="nextBtn">
        <i class="fas fa-chevron-right"></i>
    </button>

    <!-- 指示器 -->
    <div class="indicators">
        <div class="indicator active" data-index="0"></div>
        <div class="indicator" data-index="1"></div>
        <div class="indicator" data-index="2"></div>
    </div>
</div>

<!-- 内容 -->
<div class="content">
    <h2 class="section-title">木偶戏文化介绍</h2>
    <p class="puppet-intro">
        木偶戏是中国传统民间艺术瑰宝，距今已有两千多年历史。它融合了雕刻、绘画、戏曲、音乐等多种艺术形式，
        通过艺人操控木偶进行表演，讲述民间故事，传递文化内涵。2006年，木偶戏被列入第一批国家级非物质文化遗产名录。
        平台致力于传承和弘扬这一珍贵的民间艺术，让更多人了解和喜爱木偶戏。
    </p>
    <p class="puppet-intro">
        木偶戏是中国传统民间艺术瑰宝，距今已有两千多年历史。它起源于西周时期的“俑戏”，历经秦汉的发展、唐宋的鼎盛、明清的普及，
        逐渐形成了提线木偶、杖头木偶、布袋木偶等多个流派，每个流派都有其独特的艺术魅力。它融合了雕刻、绘画、戏曲、音乐等多种艺术形式，
        通过艺人操控木偶进行表演，讲述民间故事、神话传说，传递忠孝礼义、家国情怀的文化内涵。2006年，木偶戏被列入第一批国家级非物质文化遗产名录，
        成为中华民族文化宝库中不可或缺的一部分。
    </p>
    <p class="puppet-intro" style="margin-top: 1rem;">
        在中国广袤的土地上，木偶戏有着鲜明的地域特色：福建泉州的提线木偶戏以“线功”精湛著称，广东的布袋木偶戏以动作灵活见长，
        陕西的杖头木偶戏则兼具粗犷与细腻的风格。这些不同风格的木偶戏，共同构成了中国木偶戏的多元面貌，也成为各地民俗文化的重要载体。
        如今，木偶戏不仅活跃在乡村庙会、城市剧场，还走出国门，成为中外文化交流的重要桥梁。
    </p>
</div>
<div class="section-cards">
    <div class="card">
        <i class="fas fa-book"></i>
        <h3>神话故事</h3>
        <p>收录盘古开天、精卫填海、后羿射日等经典神话木偶戏剧本与故事解读，探寻木偶戏中的神话文化内核。</p>
    </div>
    <div class="card">
        <i class="fas fa-hammer"></i>
        <h3>制作技艺</h3>
        <p>详解木偶雕刻、彩绘、提线布局、服饰制作等核心技艺，展示老艺人的手工绝活与非遗传承技法。</p>
    </div>
    <div class="card">
        <i class="fas fa-stage"></i>
        <h3>经典表演</h3>
        <p>呈现《嫦娥奔月》《哪吒闹海》等经典木偶戏表演的剧情、特色与舞台特效，感受木偶戏的现场魅力。</p>
    </div>
    <div class="card">
        <i class="fas fa-user-tie"></i>
        <h3>传承人物</h3>
        <p>讲述非遗传承人的学艺经历、技艺专长与坚守故事，见证木偶戏技艺的代代相传。</p>
    </div>
</div>

<script src="../JS/index1.js"></script>
</body>
</html>