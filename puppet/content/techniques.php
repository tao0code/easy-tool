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
$techResults = [];
$searchKeyword = '';

// 处理逻辑：如果有搜索关键词则搜索，否则默认查询前3个制作技艺
try {
    if (isset($_GET['keyword']) && !empty(trim($_GET['keyword']))) {
        // 有搜索关键词：模糊搜索制作技艺（分类、名称、详情、工具）
        $searchKeyword = trim($_GET['keyword']);
        $stmt = $pdo->prepare("SELECT * FROM puppet_techniques WHERE category LIKE :keyword OR title LIKE :keyword OR content LIKE :keyword OR tools LIKE :keyword ORDER BY sort ASC, id DESC");
        $likeKeyword = "%{$searchKeyword}%";
        $stmt->bindParam(':keyword', $likeKeyword, PDO::PARAM_STR);
    } else {
        // 无搜索关键词：默认查询前3个制作技艺（按sort排序，取前3条）
        $stmt = $pdo->prepare("SELECT * FROM puppet_techniques ORDER BY sort ASC, id ASC LIMIT 3");
        // 也可以按分类/名称指定展示：
        // $stmt = $pdo->prepare("SELECT * FROM puppet_techniques WHERE title IN ('木雕木偶头部塑形', '传统戏服刺绣与妆面', '神话木偶提线布局') ORDER BY FIELD(title, '木雕木偶头部塑形', '传统戏服刺绣与妆面', '神话木偶提线布局')");
    }
    $stmt->execute();
    $techResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $errorMsg = '数据库查询失败：' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>非遗木偶戏 - 制作技艺</title>
    <!-- 引入字体图标 -->
    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/index1.css">
    <!-- 搜索框和结果样式（复用原有样式，仅调整文案） -->
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
        /* 右侧文字区域（适配制作技艺的字段） */
        .result-text {
            flex: 1; /* 文字区域占剩余空间 */
        }
        .result-title {
            color: #8b4513;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        .result-category {
            color: #996633;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
        .result-content {
            line-height: 1.8;
            margin-bottom: 1rem;
            color: #333;
        }
        .result-tools {
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

<!-- 轮播图（保持原有，可后续替换为制作技艺相关图片） -->
<div class="carousel-container">
    <div class="carousel" id="carousel">
        <div class="carousel-item">
            <img src="../img/tech1.png" alt="木偶戏表演">
        </div>
        <div class="carousel-item">
            <img src="../img/tech2.png" alt="木偶制作工艺">
        </div>
        <div class="carousel-item">
            <img src="../img/tech3.png" alt="传统木偶展示">
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
        <input type="text" class="search-input" name="keyword" placeholder="请输入制作技艺关键词（如木偶雕刻、刺绣）" value="<?php echo htmlspecialchars($searchKeyword); ?>">
        <button type="submit" class="search-btn"><i class="fas fa-search"></i> 搜索</button>
    </form>
</div>

<!-- 原有内容区域（修改为制作技艺的总介绍） -->
<div class="content">
    <h2 class="section-title">木偶戏技艺介绍</h2>
    <p class="puppet-intro">
        中国木偶戏的制作技艺，是 “匠艺与戏曲美学” 的融合，核心分为 **“雕、制、缀、控”** 四大工序，每一步都藏着老艺人的巧思：
        第一步・木偶雕刻：多选用樟木、黄杨木为料 —— 先以墨斗定 “三庭五眼” 比例，用凿子粗塑角色轮廓（神话木偶如 “后羿” 需突出眉骨的棱角，“嫦娥” 则柔化面部曲线）；再以细刻刀勾绘五官，最后用 200 目 - 800 目砂纸层层打磨，让木偶皮肤呈现 “哑光木质肌理”。
        第二步・服饰妆造：戏服需贴合木偶身形，多用真丝缎面手工裁剪，纹样按角色定位刺绣（如 “盘古” 衣袍绣云雷纹，“精卫” 裙裾缀羽毛绣片）；妆面以矿物颜料手绘，“开脸” 时用朱砂点眉、花青勾眼，让木偶神态与故事人设一致。
        第三步・关节与提线：神话木偶需适配夸张动作，关节处用牛筋绳串联（替代金属轴，更显古拙）；提线布局是关键 ——“后羿” 这类持械角色，需在弓箭处额外加 2 条副线，主提线长度控制在 1.5 米（保证艺人操控时的张力），背部配重铅块，让木偶悬起时稳而不晃。
        这套技艺传承千年，如今既保留 “手工雕缀” 的温度，也融入轻量化材料（如用树脂替代实木），让木偶戏既守正又创新。
    </p>
</div>

<!-- 结果展示区域（适配制作技艺的字段展示） -->
<div class="search-results">
    <?php if (isset($_GET['keyword']) && !empty($searchKeyword)) : ?>
        <!-- 有搜索关键词时，显示搜索标题 -->
        <h3 class="results-title">搜索“<?php echo htmlspecialchars($searchKeyword); ?>”的结果</h3>
    <?php else : ?>
        <!-- 无搜索关键词时，显示默认标题 -->
        <h3 class="results-title">核心木偶戏制作技艺</h3>
    <?php endif; ?>

    <?php if (isset($errorMsg)) : ?>
        <div class="no-result"><?php echo $errorMsg; ?></div>
    <?php elseif (!empty($techResults)) : ?>
        <div class="result-list">
            <?php foreach ($techResults as $result) : ?>
                <div class="result-item">
                    <!-- 左侧图片（使用数据库的img_url字段） -->
                    <div class="result-img">
                        <img src="<?php echo htmlspecialchars($result['img_url']); ?>" alt="<?php echo htmlspecialchars($result['title']); ?>">
                    </div>
                    <!-- 右侧文字（适配制作技艺的字段：分类、标题、详情、工具） -->
                    <div class="result-text">
                        <h4 class="result-title"><?php echo htmlspecialchars($result['title']); ?></h4>
                        <div class="result-category">技艺分类：<?php echo htmlspecialchars($result['category']); ?></div>
                        <div class="result-content"><?php echo nl2br(htmlspecialchars($result['content'])); ?></div>
                        <div class="result-tools">所需工具：<?php echo htmlspecialchars($result['tools']); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="no-result">
            <?php echo isset($searchKeyword) ? '未找到相关的技艺，请更换关键词重试！' : '暂无数据'; ?>
        </div>
    <?php endif; ?>
</div>

<script src="../JS/index1.js"></script>
</body>
</html>