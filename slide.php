<DOCTYPE html>
<html>
<head>
<style>
#carousel_inner {  
margin-left: 40px;
float:left; /* important for inline positioning */  
width:80%; /* important (this width = width of list item(including margin) * items shown */  
overflow: hidden;  /* important (hide the items outside the div) */  
/* non-important styling bellow */  
background: #F0F0F0;  
}  
  
#carousel_ul {  
position:relative;  
left:-210px; /* important (this should be negative number of list items width(including margin) */  
list-style-type: none; /* removing the default styling for unordered list items */  
margin: 0px;  
padding: 0px;  
width:9999px; /* important */  
/* non-important styling bellow */  
padding-bottom:10px;  
}  
  
#carousel_ul li{  
float: left; /* important for inline positioning of the list items */  
width:200px;  /* fixed width, important */  
/* just styling bellow*/  
padding:0px;  
height:110px;  
background: #f0f0f0;  
margin-top:10px;  
margin-bottom:10px;  
margin-left:5px;  
margin-right:5px;  
}  
  
#carousel_ul li img {  
.margin-bottom:-4px; /* IE is making a 4px gap bellow an image inside of an anchor (<a href...>) so this is to fix that */  
/* styling */  
cursor:pointer;  
cursor: hand;  
border:0px;  
}  
#left_scroll, #right_scroll{  
float:left;  
height:130px;  
width:15px;  
background: #C0C0C0;  
}  
#left_scroll img, #right_scroll img{  
border:0; /* remove the default border of linked image */  
/*styling*/  
cursor: pointer;  
cursor: hand;  
  
}  
</style>
</head>

<body>
<center>
<div id='carousel_container'>  
  <div id='left_scroll'><a href='javascript:slide("left");'><img style="" src='http://www.leclerc-web.fr/img/left.png' /></a></div>  
    <div id='carousel_inner'>  
        <ul id='carousel_ul'>  
            <li><a href='#'><img src='http://www.leclerc-web.fr/img/img1.jpg' width="350" height="200" /></a></li>  
            <li><a href='#'><img src='http://www.leclerc-web.fr/img/img2.jpg'  width="350" height="200"/></a></li>  
            <li><a href='#'><img src='http://www.leclerc-web.fr/img/img3.jpg' /></a></li>  
			<li><a href='#'><img src='http://www.leclerc-web.fr/img/img4.jpg' /></a></li>  
        </ul>  
    </div>  
  <div id='right_scroll'><a href='javascript:slide("right");'><img src='http://www.leclerc-web.fr/img/right.png' /></a></div>  
  <input type='hidden' id='hidden_auto_slide_seconds' value=0 />  
</div>  



<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
 
<script type="text/javascript">
  $(document).ready(function() {  
  
       
        var auto_slide = 1;  
            var hover_pause = 1;  
        var key_slide = 1;  
  
       
        var auto_slide_seconds = 3000;  

        $('#carousel_ul li:first').before($('#carousel_ul li:last'));  
  
        if(auto_slide == 1){  
         
            var timer = setInterval('slide("right")', auto_slide_seconds);  
  
            $('#hidden_auto_slide_seconds').val(auto_slide_seconds);  
        }  
  
      
        if(hover_pause == 1){  
            
            $('#carousel_ul').hover(function(){  
             
                clearInterval(timer)  
            },function(){  
                
                timer = setInterval('slide("right")', auto_slide_seconds);  
            });  
  
        }  
  
        
        if(key_slide == 1){  
  
       
            $(document).bind('keypress', function(e) {  
                 
                if(e.keyCode==37){  
                    
                        slide('left');  
                }else if(e.keyCode==39){  
                         
                        slide('right');  
                }  
            });  
  
        }  
  
  });  
  

function slide(where){  
  
          
            var item_width = $('#carousel_ul li').outerWidth() + 10;  
  
           
            if(where == 'left'){  
                
                var left_indent = parseInt($('#carousel_ul').css('left')) + item_width;  
            }else{  
                 
                var left_indent = parseInt($('#carousel_ul').css('left')) - item_width;  
  
            }  
  
           
            $('#carousel_ul:not(:animated)').animate({'left' : left_indent},500,function(){  
  
              
                if(where == 'left'){  
                    
                    $('#carousel_ul li:first').before($('#carousel_ul li:last'));  
                }else{  
                    
                    $('#carousel_ul li:last').after($('#carousel_ul li:first'));  
                }  
  
               
                $('#carousel_ul').css({'left' : '-2px'});  
            });  
  
}  
</script>
</center>
</body>

</html>