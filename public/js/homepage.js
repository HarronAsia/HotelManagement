$(document).ready(function() {
    /**********************************Popular Hotel Slide *******************************/
    $("#news-slider2").owlCarousel({
        items: 3,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [980, 2],
        itemsMobile: [600, 1],
        pagination: false,
        navigationText: false,
        autoPlay: true
    });
    /**********************************Popular Hotel Slide *******************************/

    /**********************************Category Slide *******************************/
    $("#news-slider6").owlCarousel({
        items: 3,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [980, 2],
        itemsMobile: [600, 1],
        pagination: false,
        navigationText: false
    });
    /**********************************Category Slide *******************************/

    /**********************************Place Slide *******************************/
    $("#news-slider").owlCarousel({
        items: 2,
        itemsDesktop: [1199, 2],
        itemsMobile: [600, 1],
        pagination: true,
        autoPlay: true
    });
    /**********************************Place Slide *******************************/
});