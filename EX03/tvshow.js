function choice_change(vid){
    var vid = vid ;
    var mycont=document.getElementById("screen");
    mycont.innerHTML=video_change(vid) ;
}

function video_change(vid){
    var vid = vid ;
    var video_source = 'https://www.youtube.com/embed/'+vid;
    htmlstr= "<iframe  width='560' height='315' src='"+ video_source +"' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
    return htmlstr;
}

function start(vid){
    var vid = vid ;
    var video_source = 'https://www.youtube.com/embed/'+vid;
    htmlstr= "<iframe  width='560' height='315' src='"+ video_source +"' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
    return htmlstr;
}




