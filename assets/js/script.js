// $(document).ready(function(){
    
//     $('.search-toggle').click(function(){
//         $('.search-wrapper').toggleClass('show');
//     });

//     $('.modal-toggle').click(function(){
//         $('.modalBox').toggleClass('show');
//     })

//     $('.modalBox').click(function(){
//         $(this).removeClass('show');
//     });

//     $('.spinner').click(function(){
//         $(".theme-selector").toggleClass('show');
//     });
//     $('.light').click(function(){
//         $('body').addClass('light-theme');
//         $('body').removeClass('dark-theme');
//     });
//     $('.dark').click(function(){
//         $('body').toggleClass('dark-theme');
//         $('body').removeClass('light-theme');
//     });






//     function updateTime() {
//       var now = new Date();
//      //  var dateElement = document.getElementById('date');
//       var timeElement = document.getElementById('time');
//      //  dateElement.innerHTML = now.toDateString();
//       timeElement.innerHTML = now.toLocaleTimeString();
//     }
//     updateTime();
//     setInterval(updateTime, 1000);

// });



// // smooth scroll
// $(document).ready(function(){
//     $(".navbar .nav-link").on('click', function(event) {

//         if (this.hash !== "") {

//             event.preventDefault();

//             var hash = this.hash;

//             $('html, body').animate({
//                 scrollTop: $(hash).offset().top
//             }, 700, function(){
//                 window.location.hash = hash;
//             });
//         } 
//     });
// }); 


//////////////////////////

$(document).ready(function(){

    $('.modal-toggle').click(function(){
        $('.modalBox').toggleClass('show');
    })

    $('.modalBox').click(function(){
        $(this).removeClass('show');
    });

    function updateTime() {
      var now = new Date();
      var dateElement = document.getElementById('date');
      var timeElement = document.getElementById('time');
      dateElement.innerHTML = now.toDateString();
      timeElement.innerHTML = now.toLocaleTimeString();
    }
    updateTime();
    setInterval(updateTime, 1000);

});



// smooth scroll
$(document).ready(function(){
    $(".navbar .nav-link").on('click', function(event) {

        if (this.hash !== "") {

            event.preventDefault();

            var hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 700, function(){
                window.location.hash = hash;
            });
        } 
    });
}); 

jQuery(document).ready(function ($) {

    $(".ms-holder").each(function (j, el) {

        var t = $(this), // the slider(s)
            m = $(".mini-slide"), // the slide(s)
            n = m.length, // number of slides
            w = m.outerWidth(), // width of the slides
            s = 0.8, // transition time in seconds
            count = { // creating a counter object for each slide
                j: 0,
            },
            c = count.j;

        // position the slides horizontally
        for (var i = 0; i < n; i++) {
            $(".mini-slide:nth-child(" + (i + 1) + ")").css({
                "left": "" + (i * w) + "px"
            });
        }
        
        // Add a unique ID to each slide - this is so we can target individual click events
        t.attr("id", "slider-" + j);

        // Add click functionality to cycle through the slides
        $("#slider-" + j + " button").on("click", function (event) {
            event.preventDefault();
            
            var id = $(this).parent().attr("id"),
                th = $(this),
                l = $("#slider-"+ j +" .mini-slide").length;
            

            if (th.is(".data-next")) {
                c++; // increase the counter
                if (c >= l) {
                    c = 0; // set a limit on the counter
                }
            } else {
                c--; // decrease the counter
                if (c < 0) {
                    c = l - 1; // set a limit on the counter
                }
            }

            // make those puppies move with css3
            $("#slider-" + j + " ul").css({
                "-webkit-transform": "translate3d(" + (-c * w) + "px, 0px, 0px)",
                "-webkit-transition": s + "s ease",
                
                // For old, outdated, and/or non webkit browswers - only if needed
                "-moz-transform": "translate3d(" + (-c * w) + "px, 0px, 0px)",
                "-moz-transition": s + "s ease",
                "-ms-transform": "translate3d(" + (-c * w) + "px, 0px, 0px)",
                "-ms-transition": s + "s ease",
                "-o-transform": "translate3d(" + (-c * w) + "px, 0px, 0px)",
                "-o-transition": s + "s ease",
                "transform": "translate3d(" + (-c * w) + "px, 0px, 0px)",
                "transition": s + "s ease"
            });
        });
    });
});

var delay = 2000;
var animTime = 200;
var animFunc = 'swing';
var interval = new Array();

function initScrollContent() {
  /*for (var i = 0; i <= interval.length; i++) {
    clearInterval(interval[i]);
  }
  interval = new Array();*/
  $('.scrollcontent').each(function() {
    $this = $(this);
    $this.find('.text').stop(true,true).css('left', 0);
    setTimeout(function() {
      //interval.push(_doScrollContent($this))
      _doScrollContent($this)
    }, delay);
  });
}

function _doScrollContent(e) {
  $container = e.find('.contain');
  $text = e.find('.text');
  var textWidth = $text.outerWidth(true);
  var containerWidth = $container.outerWidth(true);
  if (textWidth > containerWidth) {
    var duration = Math.round((textWidth / 70) * 1000);
    var left = parseInt('-' + (textWidth - containerWidth));
    var offset = parseInt($text.css('left'));
    var direction = -1;
    if (offset == 0 || offset >= left)
      direction = (offset == 0 ? 1 : 0);
    if (direction > -1) {
      $container.find('.fade').removeClass('dock');
      $text.animate({
        left: (!direction ? 0 : left)
      }, duration, animFunc);
      setTimeout(function() {
        $container.find('.fade.' + (offset == 0 ? 'right' : 'left')).addClass('dock');
      }, (duration - animTime));
    }
  }
  return setTimeout(function() {
    _doScrollContent(e)
  }, delay + duration);
}

/*$(window).on('resize', function() {
  initScrollContent();
});*/
initScrollContent();