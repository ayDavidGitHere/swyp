<?php
 header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
 header("Expires: " . gmdate("D, d M Y H:i:s") . " GMT"); 
 header("Cache-Control: no-cache, must-revalidate"); 
 header("Pragma: no-cache"); 
?>
<html >
    
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">


<link rel="stylesheet" href="http://localhost:1111/fontconstant.css">
<link rel="stylesheet" href="http://<?php print $_SERVER['HTTP_HOST']; ?>/siteconstant.css"> 
<link rel="stylesheet" href="swyp.css">
<link rel="shortcut icon"  href="img/mainlogo.png" />


   <meta name="theme-color" content="#000837"/>
 <meta name="title" content=" Swyp"> <meta name="description" content="  design "> <meta name="keywords" content=" erotica, sci-fi, fantasy, relationship, advices, stories, read, write"> <meta name="robots" content="index, follow"> <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <meta name="language" content="English"> <meta name="revisit-after" content="1 days"> <meta name="author" content="aydavidgithere">
 <title > swyp  </title>
<noscript>Unfortunately, JavaScript must be enabled in your browser</noscript>
    </head>
    
    <body onload="run()">
<script src="http://localhost:1111/lidsacaebasic.js">
 </script>
<script src="http://localhost:1111/aygraph2.js">
 </script>
 </script>
 
 
 
    <script>
    

       function is$Between(val, lim0, lim1){
           //destructuring assignment //check which is grrater
            [lim0, lim1] =  ( (lim1<lim0)?([lim1, lim0]):[lim0, lim1] )
            if(val>lim0 && val<lim1){ return true;  }
            else{ return false;}
       }
       function retCloser(val, lim0, lim1, gap){
           //destructuring assignment //check which is grrater
            [lim0, lim1] =  ( (lim1<lim0)?([lim1, lim0]):[lim0, lim1] )
            if(val>lim0 && val<lim0+gap){ return lim0;  }
            if(val>lim1-gap && val<lim1){ return lim1;  }
       }
                 
 function run(){
         try{
             
        var countX = 5; var countY = 5;
        var null_elsStyleLeft; var null_elsStyleTop;
        var null_els_row; var null_els_col;
        
        
        
        
        
        
        

        
                   function loadAllEls(){
        
        //generate
        $("containAll").innerHTML = ""; 
        var i= 0;
        while(i< (countX*countY) ){
            $("containAll").innerHTML += 
            '<div class="els" row="" col="" >1</div>'
            i++;
        }
        
        
        
        
        //iterate at set
        getAllElem(CLS("els", "class"), function(elsAt, elsInd){
              //init
              
              setRow = Math.floor(elsInd/countX);
              setCol = Math.floor(elsInd-setRow*countY)
              elsAt.setAttribute("row", setRow);
              elsAt.setAttribute("col", setCol);
              elsAt.setAttribute("ind", elsInd);
              elsAt.setAttribute("null", "no");
              elsAt.setAttribute("focused", false)
              elsAt.innerHTML =setRow+", "+setCol;
              elsAtWid= (100/countX); elsAt.style.width = elsAtWid+"%"
              elsAtHei= (100/countY); elsAt.style.height = elsAtHei+"%"
              elsAt.style.top =  (setRow/countX)*100+"%"; // 1/4*100%;
              elsAt.style.left = (setCol/countY)*100+"%";
              elsAt.innerHTML = elsAt.style.top+", "+elsAt.style.left
              
              
              var prev_ePX = 0;  var prev_ePY = 0; 
              var ePX=0; var ePY=0;
              var elsAtStyleLeft = 0; var elsAtStyleTop = 0;
              var init_elsAtStyleLeft; var init_elsAtStyleTop;
              var restrictY; var restrictX;
              var directMovement;
              
              
              elsAt.ontouchstart = function(ev){
                   ev.preventDefault()
                   ePX = ev.touches[0].pageX;
                   ePY = ev.touches[0].pageY;
                   prev_ePX = ePX;
                   prev_ePY = ePY;
                   init_elsAtStyleLeft = Number(elsAt.style.left.replace("%", ""))
                   init_elsAtStyleTop = Number(elsAt.style.top.replace("%", ""))
                   
                   
                            if(elsAt.getAttribute("focused") == "true" ){
                   //determine direction function
                  elsAtDirection = elsAt.getAttribute("direction");
                  switch(elsAtDirection){
                      case "left":
                      directMovement = function(){
                      if( !is$Between(elsAtStyleLeft+1, init_elsAtStyleLeft, (null_elsStyleLeft) ) ){ 
                          restrictX = true;
                      } 
                      }//directMovement
                      break;
                      case "top":
                      directMovement = function(){
                      if( !is$Between(elsAtStyleTop+1, init_elsAtStyleTop, (null_elsStyleTop) ) ){ 
                          restrictY = true;
                      } 
                      }//EO directMovement
                      break;
                      case "bottom":
                      directMovement = function(){
                      if( !is$Between(elsAtStyleTop-1, init_elsAtStyleTop, null_elsStyleTop) ){
                          restrictY = true;
                      }
                      }//EO directMovement
                      break;
                      case "right":
                      directMovement = function(){
                      if( !is$Between(elsAtStyleLeft-1, init_elsAtStyleLeft, null_elsStyleLeft) ){
                          restrictX = true;
                      }
                      }//EO directMovement
                  }
              
                                
                                
                                
                            }//EO if
                   
              }//EO ontouchstart
              elsAt.ontouchmove = function(ev){
                  //dragger hack
                  //uses difference in touch moves
                           
                            if(elsAt.getAttribute("focused") == "true" ){
                   ev.preventDefault()
                   ePX = ev.touches[0].pageX;
                   ePY = ev.touches[0].pageY;
                   diff_ePX = ePX-prev_ePX;
                   diff_ePY = ePY-prev_ePY;
                   elsAtStyleLeft = Number(elsAt.style.left.replace("%", ""))
                   elsAtStyleTop = Number(elsAt.style.top.replace("%", ""))
                   
                                
                                
                                
                  setRow = elsAt.getAttribute("row");
                  setCol = elsAt.getAttribute("col")
                  restrictY = (setRow == null_els_row)?true:false;
                  restrictX = (setCol == null_els_col)?true:false;
                  
                  directMovement();

                   //could use direction attribute instead
                   if(!restrictX) elsAtStyleLeft += diff_ePX;
                   if(!restrictY) elsAtStyleTop += diff_ePY;
                   elsAt.style.top =  elsAtStyleTop+"%"; // 1/4*100%;
                   elsAt.style.left = elsAtStyleLeft+"%";
                   elsAt.innerHTML = elsAtDirection+" "+is$Between(elsAtStyleTop, init_elsAtStyleTop, null_elsStyleTop)+", "+elsAtStyleTop+" "+ init_elsAtStyleTop+" "+null_elsStyleTop;
                   //$("logger").innerHTML+= 
                   prev_ePX = ePX;
                   prev_ePY = ePY;
                        }//EO if
              }//EO ontouchmove
              elsAt.ontouchend = function(ev){  
                        if(elsAt.getAttribute("focused") == "true" ){
                   ev.preventDefault();
                   setRow = elsAt.getAttribute("row");
                   setCol = elsAt.getAttribute("col");
                   elsAtInd = Number(elsAt.getAttribute("ind"))
                   //elsAtStyleTop = retCloser(elsAtStyleTop, init_elsAtStyleTop, null_elsStyleTop, elsAtWid); 
                   
                   //bring to position
                   elsAtDirection = elsAt.getAttribute("direction");
                   switch(elsAtDirection){
                       case "left":
                            if(is$Between(elsAtStyleLeft, 100, null_elsStyleLeft+1) ){
                                elsAtStyleLeft = null_elsStyleLeft
                                loadAllEls()
                                setElsToNull(elsAtInd)
                            }
                            else{ elsAtStyleLeft = init_elsAtStyleLeft }; 
                       break;
                       case "top":
                            if(is$Between(elsAtStyleTop, 100, null_elsStyleTop+1) ){
                                elsAtStyleTop = null_elsStyleTop;
                                loadAllEls();
                                setElsToNull(elsAtInd); 
                            }
                            else{ elsAtStyleTop = init_elsAtStyleTop; }; 
                           break;
                       case "right": 
                            if(is$Between(elsAtStyleLeft, 0, null_elsStyleLeft+1)){
                                elsAtStyleLeft = null_elsStyleLeft;
                                loadAllEls();
                                setElsToNull(elsAtInd)
                            }else{ elsAtStyleLeft = init_elsAtStyleLeft } 
                       break;
                       case "bottom":
                            if(is$Between(elsAtStyleTop, 0, null_elsStyleTop+1) ){
                                elsAtStyleTop = null_elsStyleTop;
                                loadAllEls();
                                setElsToNull(elsAtInd);
                            }
                            else{ elsAtStyleTop = init_elsAtStyleTop }; 
                           break;
                       break;
                   }//EO switch
                   elsAt.style.top =  elsAtStyleTop+"%"; // 1/4*100%;
                   elsAt.style.left = elsAtStyleLeft+"%";
                        }//EO if    
                        
              }//EO ontouchstart
              
        });//EO getAllElem
        
        
        
                   }//EO loadAllEls
                   
                   
        
        
        loadAllEls()
        
        //setElsToNull at center
        var centerInd = Math.floor( CLS("els", "class").length/2 );
        var elsAtCenter = CLS("els", centerInd);
        var null_els = elsAtCenter;
        setElsToNull(elsAtCenter);
                    
                    
                    
                    function setElsToNull(elstoNull){
        //allows element or index
        if(typeof elstoNull != "object"){    
            elstoNull = CLS("els", elstoNull);
        }
        
        //set null elements
        null_els = elstoNull;
        null_els_row = null_els.getAttribute("row");
        null_els_col = null_els.getAttribute("col");
        null_elsStyleTop =  (null_els_row/countX)*100; // 1/4*100%;
        null_elsStyleLeft = (null_els_col/countY)*100;
        
        
        
        //delete elem at center
        null_els.style.background = "ghostwhite";
        null_els.style.zIndex = "-1"
        null_els.setAttribute("null", "yes");
        null_els.innerHTML = "";
        
        
         //set focuses
        arr_focused = [];
        arr_focused.push([Number(null_els_row), Number(null_els_col)-1, "left"]);
        arr_focused.push([Number(null_els_row)-1, Number(null_els_col), "top"]);
        arr_focused.push([Number(null_els_row), Number(null_els_col)+1, "right"]);
        arr_focused.push([Number(null_els_row)+1, Number(null_els_col), "bottom"]);
        
        getAllElem(CLS("els", "class"), function(elsAt, elsInd){ 
            elsAt.setAttribute("focused", false);
            elsAt.removeAttribute("direction");
        });
        arr_focused.forEach(function(focused){
            fcR = focused[0];
            fcC = focused[1]; 
            fDirection = focused[2];
            focusedInd = ( (fcR)*countX )+ (fcC); //generate index
            //$("containAll").querySelector('[row ="'+fcR+'"]  [col ="'+fcC+'"]').setAttribute("focused", true);
                 if(is$Between(focusedInd, 0, CLS("els", "class").length)){
                     //check if exist
            CLS("els", focusedInd).setAttribute("focused", true);
            CLS("els", focusedInd).setAttribute("direction", fDirection);
                 }
        });
                        }//EO //setElsToNull

        
        
        
        
        
        
             }catch(e){ alert(""+e) }
      }//EO run
      
      
      
      
      
      
      
      
      



  

        
        
    </script>

    
    
    
    
    
    
<div id="boxContain">
 
    <div id="containAll" class="rows" >
        <div class="els" row="" col="" >1</div>
        <div class="els" row="" col="" >2</div>
        <div class="els" row="" col="" >3</div>
        <div class="els" row="" col="" >4</div>
        <div class="els" row="" col="" >3</div>
        <div class="els" row="" col="" >4</div>
        <div class="els" row="" col="" >5</div>
        <div class="els" row="" col="" >6</div>
        <div class="els" row="" col="" >4</div>
        <div class="els" row="" col="" >5</div>
        <div class="els" row="" col="" >6</div>
        <div class="els" row="" col="" >7</div>
        <div class="els" row="" col="" >4</div>
        <div class="els" row="" col="" >5</div>
        <div class="els" row="" col="" >6</div>
        <div class="els" row="" col="" >7</div>
        <div class="els" row="" col="" >6</div>
        <div class="els" row="" col="" >7</div>
        <div class="els" row="" col="" >4</div>
        <div class="els" row="" col="" >5</div>
        <div class="els" row="" col="" >6</div>
        <div class="els" row="" col="" >7</div>
        <div class="els" row="" col="" >7</div>
        <div class="els" row="" col="" >4</div>
        <div class="els" row="" col="" >5</div>
        <div class="els" row="" col="" >6</div>
        <div class="els" row="" col="" >7</div>
    </div>  
     <linker> </linker>
</div>
    
    <div id="logger"></div>
    
    
    </body>
    
    
    
    
</html>  
 