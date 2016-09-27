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


//$('#myblog_nav').on('');

$('#myblog_nav').on('show.bs.tab', function (e) {
    console.log(e);
    //console.log(e.href);
    $.ajax(
        {
            url:'index.php?r=user/recent_blog',
            success:function(data){
                console.log(data);
                if(data==null)
                {
                    $('#blogContent').html("there is nothing here! ");
                }
                else{
                    $('#blogContent').html(data);
                }



            },
            error:function(){

            }
        }
    );
    //console.log(e.target); // 激活的标签页
    //e.relatedTarget // 前一个激活的标签页
})






