$('.owl-slider1').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    // stagePadding:50,
    center:true,
    autoplay:true,
    autoplayHoverPause:true,
    autoplayTimeout:2000,
    dots:false,
    navText:[
        ' <i class="fa-solid fa-angle-right fa-xl "></i>',
         "<i class='fa-solid fa-chevron-left fa-xl' ></i>"

         ],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});

$('.owl-slider2').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    // stagePadding:50,
    center:true,
    autoplay:true,
    autoplayHoverPause:true,
    // autoplayTimeout:2000,
    dots:false,
    navText:[
        ' <i class="fa-solid fa-angle-right fa-xl "></i>',
         "<i class='fa-solid fa-chevron-left fa-xl' ></i>"

         ],

    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    },

})
// $('.medicine_card').click(function (){
//
//    const medicineName =  $(this).data(name);
//
//     alert(medicineName);
// })
