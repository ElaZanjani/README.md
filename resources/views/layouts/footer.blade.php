<!-- scroll to top button -->
<button type="button" class="btn btn-default default-shadow scrollup bottom-right position-fixed btn-44"><span
        class="arrow_carrot-up"></span></button>


<!-- Required jquery and libraries -->
<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-4.4.1/js/bootstrap.min.js')}}"></script>

<!-- cookie css -->
<script src="{{asset('assets/vendor/cookie/jquery.cookie.js')}}"></script>

<!-- Swiper slider  -->
<script src="{{asset('assets/vendor/swiper/js/swiper.min.js')}}"></script>

<!-- Customized jquery file  -->
<script src="{{asset('assets/js/main.js')}}?<?php echo str_shuffle("123456789");?>"></script>
<script src="{{asset('assets/js/color-scheme-demo.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-select/js/bootstrap-select.min.js')}}"></script>


@yield('js')

<script>
"use strict"
$(document).ready(function() {
    /* Swiper slider */
    var swiper = new Swiper('.swiper-categories', {
        slidesPerView: 'auto',
        spaceBetween: 0,
        pagination: false,
    });
    var swiper = new Swiper('.swiper-offers', {
        slidesPerView: 'auto',
        spaceBetween: 20,
        pagination: false,
    });

    /* masonry js */
    /* $('#search-tab[data-toggle="tab"]').on('shown.bs.tab', function(e) {

    })*/

    /* toast message */
    setTimeout(function() {
        $('.toast').toast('show')
    }, 2000);

    /* increasenumber */
    $('.add').on('click', function() {
        var icerikId = $(this).val();
        //var icerikId = document.getElementById('deleteFromCartButton');

        if (icerikId){
            //icerikId = icerikId.value;

            $.ajax({
                method: "POST",
                url: '/api/cart/product/increase/' + icerikId,
                data: null,
                success: function(result) {
                    //console.log(result);

                    if (!result.includes("HATA")) {
                        window.location.replace("https://canpide.com.tr/dashboard/main/cart");
                        // var elemProdPrice = document.getElementById('prodprice_' + icerkId)[0];

                        // var part1 = result.split('.')[0];
                        // var part2 = result.split('.')[1].substr(0,2);

                        // elemProdPrice.innerHTML = "<span>&#8378;</span>" + part1 + "<sup>." + part2 + "</sup>";
                        // belediyelershutdown.val(current + 1);
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    if (textStatus == 'Unauthorized') {
                        alert('custom message. Error: ' + errorThrown);
                    } else {
                        alert('custom message. Error: ' + errorThrown);
                    }
                }
            });
        }
        else{
            var current = parseInt($(this).closest('.increasenumber').find('input').val());
            var belediyelershutdown = $(this).closest('.increasenumber').find('input');
            belediyelershutdown.val(current + 1);
        }




    });
    $('.remove').on('click', function() {
        if ($(this).closest('.increasenumber').find('input').val() > 1) {
            var icerikId = $(this).val();

            if (icerikId){
                //icerikId = icerikId.value;

                $.ajax({
                method: "POST",
                url: '/api/cart/product/decrease/' + icerikId,
                data: null,
                success: function(result) {
                    //console.log(result);
                    if (!result.includes("HATA")) {
                        window.location.replace("https://canpide.com.tr/dashboard/main/cart");
                        //belediyelershutdown.val(current - 1);
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    if (textStatus == 'Unauthorized') {
                        alert('custom message. Error: ' + errorThrown);
                    } else {
                        alert('custom message. Error: ' + errorThrown);
                    }
                }
            });
            }
            else{
                var current = parseInt($(this).closest('.increasenumber').find('input').val());
                var belediyelershutdown = $(this).closest('.increasenumber').find('input');
                belediyelershutdown.val(current - 1);
            }




        }
    });

});
</script>

</body>

</html>
