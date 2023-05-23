let screenWidth = window.innerWidth

if (screenWidth < 1024) {

} else {
    ScrollSmoother.create({
        wrapper: '.wrapper',
        content: '.content',
        smooth: 2.5,
        effects: true
    });
}

function start() {
    // gsap.to('.patriot', {width: '50%', duration: 1, ease: 'power2'});
}