var $item = $('.carousel .item'); 
var $wHeight = $(window).height();
$item.eq(0).addClass('active');
$item.height($wHeight); 
$item.addClass('full-screen');

$('.carousel img').each(function() {
  var $src = $(this).attr('src');
  var $color = $(this).attr('data-color');
  $(this).parent().css({
    'background-image' : 'url(' + $src + ')',
    'background-color' : $color
  });
  $(this).remove();
});

$(window).on('resize', function (){
  $wHeight = $(window).height();
  $item.height($wHeight);
});

$('.carousel').carousel({
  interval: 3000,
  pause: "false"
});


$(".selector a.toggle-list").on("click", function(e){
    e.preventDefault();
    $(".state-list").slideToggle();
});

$(".state-list").on("mousewheel", function(e){
    e.preventDefault();

    if(e.originalEvent.wheelDelta/30 > 0) {
        _mouseDir = "up";
        scrollList();
    }
    else{
        _mouseDir = "down";
        scrollList();
    }
});

$(".state-list a.control").on("click", function(e){
    e.preventDefault();
});

var _mouseDown = false;
var _mouseDir = null;
$(".state-list a.control").mousedown(function(e){
    e.preventDefault();
    _mouseDown = true;
    _mouseDir = $(this).hasClass("up")?"up":"down";
    scrollList();
 })
.mouseup(function(e){
     e.preventDefault();
     _mouseDown = false;
})

function scrollList()
{
    var $states = $(".list-container ul");
    var top = parseInt($states.css("top"));
    var spd = 10
    if (isNaN(top))
        top = 0;
    if (_mouseDir == "up")
    {
        top += spd;
    }else{
        top -= spd;
    }
    if (top <= 0 && top > -(parseInt($states.height())-120))
    {
        $states.css("top", top);
    }
    if (_mouseDown)
    {
        setTimeout(scrollList, 50);
    }
}