jQuery(document).ready(function($){
    $('#menu-main-menu').slicknav({
        // appendTo: '.site-header'
    });

    //bx slider
    $('.slider').bxSlider({
        mode: 'fade'
    });
    const headerScroll = document.querySelector('.navigation-bar');
    const rect = headerScroll.getBoundingClientRect();
    const topDistance = Math.abs(rect.top);

    fixedMenu(topDistance);
});

window.onscroll = () => {
    let scroll = window.scrollY;
fixedMenu(scroll);

}

// adds a fixed menu on top

function fixedMenu(scroll){
    const headerScroll = document.querySelector('.navigation-bar');


    if(scroll > 130){
        headerScroll.classList.add('fixed-top');
    }else{
        headerScroll.classList.remove('fixed-top');
    }

}