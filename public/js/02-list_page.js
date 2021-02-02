// 標題
    $(function(){
        var len = 30; // 超過30個字以"..."取代
        $(".card_introduction").each(function(i){
            if($(this).text().length>len){
                $(this).attr("title",$(this).text());
                var text=$(this).text().substring(0,len-1)+"...";
                $(this).text(text);
            }
        });
    });

    // 內文
    $(function(){
        var len = 36; // 超過36個字以"..."取代
        $(".card_content").each(function(i){
            if($(this).text().length>len){
                $(this).attr("title",$(this).text());
                var text=$(this).text().substring(0,len-1)+"...";
                $(this).text(text);
            }
        });
    });
    
