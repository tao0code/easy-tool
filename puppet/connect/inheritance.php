<?php
// 验证登录
session_start();
if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {
    header('Location: ../login/login.php');
    exit;
}
// 获取用户
$username = $_SESSION['username'] ?? '用户';

// 数据库连接（请根据你的db_config.php路径调整）
require_once '../config/db_config.php';

// 初始化结果集
$inheritResults = [];
$searchKeyword = '';

// 处理逻辑：如果有搜索关键词则搜索，否则默认查询前3位传承人物
try {
    if (isset($_GET['keyword']) && !empty(trim($_GET['keyword']))) {
        // 有搜索关键词：模糊搜索传承人物（姓名、辈分、介绍、专长）
        $searchKeyword = trim($_GET['keyword']);
        $stmt = $pdo->prepare("SELECT * FROM puppet_inheritors WHERE name LIKE :keyword OR generation LIKE :keyword OR content LIKE :keyword OR specialty LIKE :keyword ORDER BY sort ASC, id DESC");
        $likeKeyword = "%{$searchKeyword}%";
        $stmt->bindParam(':keyword', $likeKeyword, PDO::PARAM_STR);
    } else {
        // 无搜索关键词：默认查询前3位传承人物（按sort排序，取前3条）
        $stmt = $pdo->prepare("SELECT * FROM puppet_inheritors ORDER BY sort ASC, id ASC LIMIT 3");
    }
    $stmt->execute();
    $inheritResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $errorMsg = '数据库查询失败：' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>非遗木偶戏 - 传承人物</title>
    <!-- 引入字体图标 -->
    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/index1.css">
    <!-- 复用原有样式，仅调整字段展示的样式名称 -->
    <style>
        /* 搜索框容器样式 - 轮播图下方 */
        .search-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 5%;
        }
        .search-form {
            display: flex;
            gap: 10px;
            max-width: 600px;
            margin: 0 auto;
        }
        .search-input {
            flex: 1;
            padding: 10px 15px;
            border: 2px solid #8b4513;
            border-radius: 4px;
            font-size: 1rem;
            outline: none;
        }
        .search-input:focus {
            border-color: #cd853f;
            box-shadow: 0 0 5px rgba(205, 133, 63, 0.3);
        }
        .search-btn {
            padding: 10px 20px;
            background-color: #8b4513;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }
        .search-btn:hover {
            background-color: #cd853f;
        }

        /* 结果样式 - 左图右文字布局（复用原有样式） */
        .search-results {
            max-width: 1600px;
            margin: 3rem auto;
            padding: 0 5%;
        }
        .results-title {
            color: #8b4513;
            font-size: 1.3rem;
            text-align: center;
            margin-bottom: 2rem;
        }
        .result-list {
            display: flex;
            flex-direction: column;
            gap: 3rem; /* 每个结果项之间的间距 */
        }
        .result-item {
            display: flex;
            align-items: center;
            gap: 2rem;
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        /* 左侧图片区域 */
        .result-img {
            flex: 0 0 300px; /* 固定图片宽度，不缩放 */
            height: 200px;
            border-radius: 6px;
            overflow: hidden;
        }
        .result-img img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* 保持图片比例，填充容器 */
        }
        /* 右侧文字区域（适配传承人物的字段） */
        .result-text {
            flex: 1; /* 文字区域占剩余空间 */
        }
        .result-title {
            color: #8b4513;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        .result-generation {
            color: #996633;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
        .result-content {
            line-height: 1.8;
            margin-bottom: 1rem;
            color: #333;
        }
        .result-specialty {
            color: #666;
            font-style: italic;
        }
        /* 无结果/错误提示 */
        .no-result {
            text-align: center;
            color: #666;
            font-size: 1.2rem;
            padding: 2rem;
        }
        /* 响应式调整 - 小屏幕下图片在上，文字在下 */
        @media (max-width: 768px) {
            .result-item {
                flex-direction: column;
                gap: 1.5rem;
            }
            .result-img {
                flex: 0 0 auto;
                width: 100%;
                height: auto;
            }
        }
    </style>
</head>
<body>
<!-- 导航栏（保持原有结构） -->
<nav class="navbar">
    <div class="logo">
        <i class="fas fa-theater-masks"></i>
        <span>非遗木偶戏文化平台</span>
    </div>

    <!-- 导航链接（保持原有） -->
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

<!-- 轮播图（替换为传承人物相关图片） -->
<div class="carousel-container">
    <div class="carousel" id="carousel">
        <div class="carousel-item">
            <img src="../img/cc1.png" alt="传承人物张木生">
        </div>
        <div class="carousel-item">
            <img src="../img/cc2.png" alt="传承人物李线翁">
        </div>
        <div class="carousel-item">
            <img src="../img/cc3.png" alt="传承人物王绣娘">
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

<!-- 搜索框区域 - 轮播图下方（修改占位符文案） -->
<div class="search-container">
    <form class="search-form" method="get" action="">
        <input type="text" class="search-input" name="keyword" placeholder="请输入传承人物关键词（如张木生、雕刻）" value="<?php echo htmlspecialchars($searchKeyword); ?>">
        <button type="submit" class="search-btn"><i class="fas fa-search"></i> 搜索</button>
    </form>
</div>

<!-- 传承人物总介绍区域 -->
<div class="content">
    <h2 class="section-title">木偶戏传承人物介绍</h2>
    <p class="puppet-intro">
        木偶戏的传承，是一代又一代艺人数十年如一日的坚守。这些传承人们自幼学艺，将雕刻、提线、服饰妆造等核心技艺烂熟于心，既保留着老祖宗传下的手工技法，又结合时代审美创新演绎：
        雕刻传人以刀为笔，赋予木偶灵魂；提线传人以线为脉，让木偶活灵活现；服饰传人以针为锋，为木偶添彩塑形。
        他们是非遗技艺的守护者，也是木偶戏文化的传播者，让千年木偶戏在当代依然焕发生机。
    </p>
</div>

<!-- 结果展示区域（适配传承人物的字段展示） -->
<div class="search-results">
    <?php if (isset($_GET['keyword']) && !empty($searchKeyword)) : ?>
        <!-- 有搜索关键词时，显示搜索标题 -->
        <h3 class="results-title">搜索“<?php echo htmlspecialchars($searchKeyword); ?>”的结果</h3>
    <?php else : ?>
        <!-- 无搜索关键词时，显示默认标题 -->
        <h3 class="results-title">木偶戏非遗传承人物</h3>
    <?php endif; ?>

    <?php if (isset($errorMsg)) : ?>
        <div class="no-result"><?php echo $errorMsg; ?></div>
    <?php elseif (!empty($inheritResults)) : ?>
        <div class="result-list">
            <?php foreach ($inheritResults as $result) : ?>
                <div class="result-item">
                    <!-- 左侧图片（使用数据库的img_url字段） -->
                    <div class="result-img">
                        <img src="<?php echo htmlspecialchars($result['img_url']); ?>" alt="<?php echo htmlspecialchars($result['name']); ?>">
                    </div>
                    <!-- 右侧文字（适配传承人物的字段：姓名、辈分、介绍、专长） -->
                    <div class="result-text">
                        <h4 class="result-title"><?php echo htmlspecialchars($result['name']); ?></h4>
                        <div class="result-generation">传承辈分：<?php echo htmlspecialchars($result['generation']); ?></div>
                        <div class="result-content"><?php echo nl2br(htmlspecialchars($result['content'])); ?></div>
                        <div class="result-specialty">技艺专长：<?php echo htmlspecialchars($result['specialty']); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="no-result">
            <?php echo isset($searchKeyword) ? '未找到相关的传承人物，请更换关键词重试！' : '暂无数据'; ?>
        </div>
    <?php endif; ?>
</div>

<script src="../JS/index1.js"></script>
</body>
</html>