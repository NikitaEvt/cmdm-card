// $(document).ready(function(){
//   $(".home-product-slider").slick({
//     slidesToShow: 4,
//     slidesToScroll: 1,
//   });

// });

$(document).ready(function(){  //дожидаемся загрузки страницы
  $('#click_btn').on("click", function(){  //вешаем событие на клик по кнопке
      $('#menu').toggle(); //включает/выключает элемент
  });
  $('#dropbtn').on("click", function(){  //вешаем событие на клик по кнопке
    $('#dropdown').toggle(); //включает/выключает элемент
});
$('.questions__acc-link').on('click', function (e) {
  e.preventDefault()
  $(this).toggleClass('questions__acc-link--active')
  $(this).children('.questions__acc-text').slideToggle()
})
});

/* Javascript */
$(function () {
  $("#rateYo").rateYo({
    starWidth: "30px"
  });
});
