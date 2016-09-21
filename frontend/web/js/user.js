/**
 * Created by linpeiyu on 2016-08-30.
 */


//$(".dropdown").on("mouseover",function(){
//    //$('#dLabel').dropdown('toggle');
//    $(this).find(".dropdown-toggle").dropdown('toggle');
//});

//$(".dropdown-toggle").on("mouseover",function(){
//    //$('#dLabel').dropdown('toggle');
//    $(this).dropdown('toggle');
//});
//$('#dLabel').dropdown('toggle');

$('li.dropdown').mouseover(function() {
    $(this).addClass('open');    }).mouseout(function() {        $(this).removeClass('open');    });






