// 等待DOM加载完成后执行
document.addEventListener('DOMContentLoaded', function() {
    // 获取轮播相关元素
    const slides = document.querySelectorAll('.carousel-slide'); // 轮播图片
    const indicators = document.querySelectorAll('.indicator'); // 指示器
    const prevBtn = document.querySelector('.prev-btn'); // 上一页按钮
    const nextBtn = document.querySelector('.next-btn'); // 下一页按钮
    let currentIndex = 0; // 当前轮播索引
    const slideLength = slides.length; // 轮播图片数量
    let carouselTimer = null; // 自动轮播定时器

    // 初始化轮播图
    function initCarousel() {
        // 显示初始轮播图和指示器
        updateCarousel();
        // 启动自动轮播
        startAutoCarousel();
    }

    // 更新轮播图显示状态
    function updateCarousel() {
        // 隐藏所有轮播图，移除所有指示器激活状态
        slides.forEach(slide => slide.classList.remove('active'));
        indicators.forEach(indicator => indicator.classList.remove('active'));
        // 显示当前轮播图，激活当前指示器
        slides[currentIndex].classList.add('active');
        indicators[currentIndex].classList.add('active');
    }

    // 上一页
    function prevSlide() {
        currentIndex = (currentIndex - 1 + slideLength) % slideLength;
        updateCarousel();
    }

    // 下一页
    function nextSlide() {
        currentIndex = (currentIndex + 1) % slideLength;
        updateCarousel();
    }

    // 点击指示器切换轮播图
    function indicatorClick(index) {
        currentIndex = index;
        updateCarousel();
    }

    // 启动自动轮播
    function startAutoCarousel() {
        carouselTimer = setInterval(() => {
            nextSlide();
        }, 3000); // 每3秒切换一次
    }

    // 停止自动轮播
    function stopAutoCarousel() {
        clearInterval(carouselTimer);
    }

    // 绑定事件
    prevBtn.addEventListener('click', prevSlide);
    nextBtn.addEventListener('click', nextSlide);
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            indicatorClick(index);
        });
    });

    // 鼠标悬停轮播区域时停止自动轮播，离开时恢复
    const carouselContainer = document.querySelector('.carousel-container');
    carouselContainer.addEventListener('mouseenter', stopAutoCarousel);
    carouselContainer.addEventListener('mouseleave', startAutoCarousel);

    // 初始化轮播
    initCarousel();

    // 导航栏锚点跳转平滑滚动（修复后的逻辑）
    const navLinks = document.querySelectorAll('.nav a');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const targetHref = this.getAttribute('href');
            // 只对以#开头的锚点执行平滑滚动，阻止默认行为；普通链接则保留默认跳转
            if (targetHref.startsWith('#')) {
                e.preventDefault(); // 仅阻止锚点的默认行为
                const targetElement = document.querySelector(targetHref);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                    // 更新导航栏激活状态
                    navLinks.forEach(link => link.classList.remove('active'));
                    this.classList.add('active');
                }
            }
            // 普通链接（如login/login.php）会自动执行默认跳转，无需额外处理
        });
    });
});