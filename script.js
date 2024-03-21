const tabs = document.querySelectorAll('.tab-btn');
const formContent = document.querySelectorAll('.form');

tabs.forEach((tab, index) => {
    tab.addEventListener('click', () => {
        tabs.forEach(tab => { tab.classList.remove('active') });
        tab.classList.add('active');

        formContent.forEach(content => { content.classList.remove('active') });
        formContent[index].classList.add('active');
    })
})

const navigation = 

    document.querySelector("div");

const navigationHeight = 

    navigation.offsetHeight;

    document.documentElement.style.setProperty("--scroll-padding",navigationHeight + "px");
    document.addEventListener("DOMContentLoaded", function() {
        var animatedElements = document.querySelectorAll('div');
    
        function checkScroll() {
            animatedElements.forEach(function(element) {
                var position = element.getBoundingClientRect();
    
                // If the top of the element is within the viewport
                if (position.top < window.innerHeight && position.bottom >= 0) {
                    element.classList.add('show');
                } else {
                    element.classList.remove('show');
                }
            });
        }
    
        // Initial check
        checkScroll();
    
        // Check for scroll events
        window.addEventListener('scroll', checkScroll);
    });
    
   