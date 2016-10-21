jQuery(document).ready(function(){

    jQuery(document).foundation();

    jQuery('#home-slider').flexslider({
         animation: "fade",
         directionNav:false,
    });

    // Menu
    jQuery("#umbrella").tinyNav({
      active: 'current-menu-item', // String: Set the "active" class
      header: 'Menu', // String: Specify text for "header" and show header instead of the active item
      indent: '- ', // String: Specify text for indenting sub-items
      label: '' // String: Sets the <label> text for the <select> (if not set, no label will be added)
    });


    jQuery('.testim-slider').slick({
         dots: false,
         adaptiveHeight: true,
         autoplay: true,
         infinite: false,
         speed: 300,
         slidesToShow: 2,
         slidesToScroll: 1,
         responsive: [
           {
             breakpoint: 1024,
             settings: {
               slidesToShow: 2,
               slidesToScroll: 1,
               infinite: true,
               dots: false
             }
           },
           {
             breakpoint: 768,
             settings: {
               slidesToShow: 1,
               slidesToScroll: 1,
               dots: true,
               arrows: false
             }
           }]
    });

});
