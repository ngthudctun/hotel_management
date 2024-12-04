window.addEventListener('load', () => {
    document.querySelector('.preloader').classList.add('unactive');
})

const btnScrollToTop = document.getElementById('btnScrollToTop')
const docEl = document.documentElement

document.addEventListener('scroll', () => {
    if (docEl.scrollTop > 500) {
        btnScrollToTop.hidden = false;
    } else {
        btnScrollToTop.hidden = true;
    }
})

btnScrollToTop.addEventListener('click', () => {
    docEl.scrollTo({
        top: 0,
        behavior: 'smooth'
    })
})

function scrollToElementY(selector, offsetY, event) {
    // Ngăn chặn hành vi mặc định của sự kiện click, nếu có
    if (event) {
        event.preventDefault();
    }

    const element = document.querySelector(selector);
    
    if (element) {
        const elementRect = element.getBoundingClientRect();
        const targetPosition = elementRect.top + window.pageYOffset + offsetY;

        // Chỉ cuộn nếu vị trí hiện tại của trang khác với vị trí mục tiêu
        if (Math.abs(window.pageYOffset - targetPosition) > 1) {
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }
    } else {
        console.warn('Element not found: ' + selector);
    }
}

const speechSynthesis = document.querySelectorAll('.fa-volume-high')
function speak(element){
if ('speechSynthesis' in window) {
    const text = element.parentElement.children[0].innerHTML;
    const utterance = new SpeechSynthesisUtterance(text);
    window.speechSynthesis.speak(utterance);
} else {
    speechSynthesis.forEach(function(item, index) {
        item.classList.remove('fa-volume-high');
});
    alert('Thiết bị của bạn không hỗ trợ!');
}
}

const aside = document.querySelector('aside')
aside.addEventListener('mouseover', () => {
    aside.classList.remove('mask')
})
aside.addEventListener('mouseout', () => {
    aside.classList.add('mask')
})