// 轮播图功能实现
const carousel = document.getElementById('carousel');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const indicators = document.querySelectorAll('.indicator');
let currentIndex = 0;
const itemCount = indicators.length;

// 更新轮播图位置
function updateCarousel() {
    carousel.style.transform = `translateX(-${currentIndex * 33.333}%)`;

    // 更新指示器状态
    indicators.forEach((indicator, index) => {
        if (index === currentIndex) {
            indicator.classList.add('active');
        } else {
            indicator.classList.remove('active');
        }
    });
}

// 上一张
prevBtn.addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + itemCount) % itemCount;
    updateCarousel();
});

// 下一张
nextBtn.addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % itemCount;
    updateCarousel();
});

// 点击指示器切换
indicators.forEach(indicator => {
    indicator.addEventListener('click', () => {
        currentIndex = parseInt(indicator.dataset.index);
        updateCarousel();
    });
});

// 自动轮播
let autoplayInterval = setInterval(() => {
    currentIndex = (currentIndex + 1) % itemCount;
    updateCarousel();
}, 5000);

// 鼠标悬停时暂停自动轮播
carouselContainer.addEventListener('mouseenter', () => {
    clearInterval(autoplayInterval);
});

// 鼠标离开时恢复自动轮播
carouselContainer.addEventListener('mouseleave', () => {
    autoplayInterval = setInterval(() => {
        currentIndex = (currentIndex + 1) % itemCount;
        updateCarousel();
    }, 5000);
});