$(function () {
    var location = window.location.href;
    var cur_url = '/' + location.split('/').pop();
 	//alert(location.split('/').pop());
    $('.menu li').each(function () {
        var link = $(this).find('a').attr('href');
 		//alert(cur_url);
 		//alert(link);
        if (cur_url == link)
        {
            $(this).addClass('active');
        }
    });
});