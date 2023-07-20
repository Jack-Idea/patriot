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

function mainPage(index, prev) {
    if (index > prev) {
        gsap.to('.org-'+prev, {opacity: 0, transform: 'perspective(500px) translate3d(0, -120%, -150px)', rotateX: '20deg', duration: 0.5, ease:'power'});
        gsap.fromTo('.org-'+index, {opacity: 0, transform: 'perspective(500px) translate3d(0, 120%, -150px)', rotateX: '-20deg'}, {opacity: 1, transform: 'perspective(500px) translate3d(0, 0, 0)', rotateX: 0, duration: 0.5, ease:'power'});
    } else {     
        gsap.to('.org-'+prev, {opacity: 0, transform: 'perspective(500px) translate3d(0, 120%, -150px)', rotateX: '-20deg', duration: 0.5, ease:'power'});
        gsap.fromTo('.org-'+index, {opacity: 0, transform: 'perspective(500px) translate3d(0, -120%, -150px)', rotateX: '20deg'}, {opacity: 1, transform: 'perspective(500px) translate3d(0, 0, 0)', rotateX: 0, duration: 0.5, ease:'power'});
    }
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

function parentKinds(prevId, nextId) {
    gsap.fromTo('.parent-kind-info-'+prevId, {x: 0, opacity: 1}, {x: 200, opacity: 0, duration: 0.3});
    gsap.fromTo('.parent-kind-info-'+nextId, {x: -200, opacity: 0}, {x: 0, opacity: 1, duration: 0.3, delay: 0.3});
}

function competitionsMenu(flag) {
    if (flag) {
        gsap.to('.nav-wrap', {x: 0, duration: 0.3});
        gsap.to('.menu-arrow', {rotateZ: 0, duration: 0.3});
    } else {
        gsap.to('.nav-wrap', {x: -174, duration: 0.3});
        gsap.to('.menu-arrow', {rotateZ: -180, duration: 0.3});
    }
}

function startContacts() {
    gsap.to('.img-figure', {scaleY: 1, duration: 1, ease: 'power'});
    gsap.to('.divider', {scaleX: 1, duration: 1, delay: 0.3, ease: 'power'});
}