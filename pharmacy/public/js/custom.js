



$('.add-to-cart').click(function(){


    const img = $('#theImg').attr('src');
    const mname = $('.medicineName').html();
    const cname = $('.categoryName').html();
    const price = $('.medicine_special_price').html();
    const pharmacy = $('.pharmacy_name').html();


axios.post('/add-to-cart', {

    mname : mname,
    cname : cname,
    img : img,
    price : price,
    pharmacy: pharmacy

})
    .then(function (response) {
        const data = response.data;

         if(data > 0){
             alert('Successfully Add To Cart')
         }else{
             alert('Failed Add To Cart')
         }
        window.location = '/';



    })
    .catch(function (error) {
        alert('Failed Add To Cart')
        console.log(error);
    });
})

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

///Medicine Details

