let screenWidth = window.innerWidth

if (screenWidth < 1024) {

} else {
    // ScrollSmoother.create({
    //     wrapper: '.wrapper',
    //     content: '.content',
    //     smooth: 2.5,
    //     effects: true
    // });
}

function startLanding() {
    let rightItems = document.querySelectorAll('.right-bar-items');
    let kinds = document.querySelectorAll('.kinds-titles');
    let del = 0.6
    gsap.to('.left-bar', {'transform': 'scaleX(1)', duration: 1, ease: 'power2'});
    rightItems.forEach((item) => {
        gsap.to(item, {'transform': 'scaleX(1)', duration: 1, delay: del, ease: 'power2'});
        del += 0.2
    });
    kinds.forEach((item) => {
        gsap.to(item, {'transform': 'scaleX(1)', duration: 1, delay: del, ease: 'power2'});
        del += 0.2
    });
    gsap.to('.hero-benefits', {scaleY: 1, duration: 1, delay: 2, ease: 'power2'});
}