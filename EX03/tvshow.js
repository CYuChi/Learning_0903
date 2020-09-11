function choice_change(vid){
    var mycont=document.getElementById("screen");
    var vid = vid ;
    console.log(vid);

    mycont.innerHTML=video_change(vid) ;
}

function video_change(vid){
    var vid = vid ;
    console.log('https://www.youtube.com/embed/'+vid);
    htmlstr= "<iframe  width='560' height='315' src=''https://www.youtube.com/embed/'+$vid' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>"
    return htmlstr;
}




