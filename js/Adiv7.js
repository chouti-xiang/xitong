document.write("<div style='position:absolute;left:0px;top:0px;width:100%;height:100%;z-index:1999;display:none;background-color:#666;filter:alpha(opacity=50);-moz-opacity:0.7;-khtml-opacity: 0.7;opacity: 0.7;' id='MessBoxBg4x'></div>");
document.write("<div style='position:absolute; left:100px; top:100px; width:250px; z-index:2000; background-color:#DC3C00;font-weight:bold;display:none;' id='MessBox4x'>");

document.write("	<div style='padding:0px;background-color:#fff;'>");
document.write("		<iframe width=0 height=0 border=0 frameborder=0 src='' name='MessIframe4x' id='MessIframe4x'></iframe>");
document.write("	</div>");
document.write("</div>");

document.write("<div style='position:absolute;left:0px;top:0px;width:100%;height:120%;z-index:2999;display:none;background-color:#666;filter:alpha(opacity=50);-moz-opacity:0.7;-khtml-opacity: 0.7;opacity: 0.7;' id='MessBoxBg5x'></div>");
document.write("<div style='position:absolute; left:100px; top:100px; width:250px; z-index:3000; background-color:#DC3C00; border:solid 1px #DC3C00; font-weight:bold;display:none;' id='MessBox5x'>");
document.write("	<div style='padding:0px;background-color:#fff;'>");
document.write("		<iframe width=0 height=0 border=0 frameborder=0 src='' name='MessIframe5x' id='MessIframe5x'></iframe>");
document.write("	</div>");
document.write("</div>");

  
function OpenMess5x(Width,Height,IframeSrc,Title)
{
	var MessBox = document.getElementById("MessBox5x");  
	var MessBoxBg = document.getElementById("MessBoxBg5x");
	var FrameObj= document.getElementById("MessIframe5x");
	//var TitleObj=document.getElementById("MessTitleID5x");

	//TitleObj.innerHTML=Title;
	MessBox.style.display="block";
	MessBox.style.width=Width+"px";
	MessBox.style.height=Height+"px";
	sc1("MessBox5x");
	sc2("MessBoxBg5x");
	FrameObj.style.width=parseInt(Width)+"px";
	FrameObj.style.height=parseInt(Height)+"px";
	MessBoxBg.style.display="block";
  	
	var winHeight=document.body.clientHeight;
  	MessBoxBg.style.height=winHeight ;

	document.getElementById("MessIframe5x").src=IframeSrc;
}
function CloseMess5()
{
	var MessBox = document.getElementById("MessBox5x");  
	var MessBoxBg = document.getElementById("MessBoxBg5x");
	MessBox.style.display="none";
	MessBoxBg.style.display="none";
}



function OpenMess4x(Width,Height,IframeSrc,Title)
{
	var MessBox = document.getElementById("MessBox4x");  
	var MessBoxBg = document.getElementById("MessBoxBg4x");
	var FrameObj= document.getElementById("MessIframe4x");
	

	
	MessBox.style.display="block";
	MessBox.style.width=Width+"px";
	MessBox.style.height=Height+"px";
	sc1("MessBox4x");
	sc2("MessBoxBg4x");
	FrameObj.style.width=parseInt(Width)+"px";
	FrameObj.style.height=parseInt(Height)+"px";
	MessBoxBg.style.display="block";
  	var winHeight=document.body.clientHeight ;
  	MessBoxBg.style.height=winHeight ;
	document.getElementById("MessIframe4x").src=IframeSrc;
}
function CloseMess4()
{
	var MessBox = document.getElementById("MessBox4x");  
	var MessBoxBg = document.getElementById("MessBoxBg4x");
	MessBox.style.display="none";
	MessBoxBg.style.display="none";
}
function sc1(name){
 document.getElementById(name).style.top=(document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop+(document.documentElement.clientHeight-document.getElementById(name).offsetHeight)/2)+"px";
 document.getElementById(name).style.left=(document.documentElement.scrollLeft+(document.documentElement.clientWidth-document.getElementById(name).offsetWidth)/2)+"px";
}
function sc2(name){
//document.getElementById(name).style.top=(document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop)+"px";
document.getElementById(name).style.height = (parseInt(document.body.scrollHeight))+"px";
 }

function drag(elementToDrag, event)
{

	var startX = event.clientX, startY = event.clientY;
	var origX = elementToDrag.offsetLeft, origY = elementToDrag.offsetTop;
	var deltaX = startX - origX, deltaY = startY - origY;
	if(document.addEventListener) //判断浏览器
	{
		document.addEventListener("mousemove", moveHandler, true);
		document.addEventListener("mouseup", upHandler, true);
	}
	else if(document.attachEvent)
	{
		elementToDrag.setCapture();
		elementToDrag.attachEvent("onmousemove", moveHandler);
		elementToDrag.attachEvent("onmouseup", upHandler);
		elementToDrag.attachEvent("onlosecapture", upHandler);
	}

	if(event.stopPropagation)
	{
		event.stopPropagation();
	}
	else
	{
		event.cancelBubble = true;
	}

	if(event.preventDefault)
	{
		event.preventDefault();
	}
	else
	{
		event.returnValue = false;
	}
	///定义鼠标移动方法
	function moveHandler(e)
	{
		if(!e)
		{
			e = window.event;
		}
		if(e.clientX - deltaX<=0)
		{
			elementToDrag.style.left = "0px";
		}
		else
		{
			elementToDrag.style.left = (e.clientX - deltaX) + "px";
		}
		if(e.clientY - deltaY<=0)
		{
			elementToDrag.style.top = "0px";
		}
		else
		{
			elementToDrag.style.top = (e.clientY - deltaY) + "px";
		}
		if(e.stopPropagation) 
		{
			e.stopPropagation();
		}
		else
		{
			e.cancelBubble = true;
		}	
	}
	//定义鼠标抬起方法
	function upHandler(e)
	{

		if(!e)
		{
			e = window.event;
		}
		if(document.removeEventListener)
		{
			document.removeEventListener("mouseup", upHandler, true);
			document.removeEventListener("mousemove", moveHandler, true);

		}
		else if(document.detachEvent)
		{
			elementToDrag.detachEvent("onlosecapture", upHandler);
			elementToDrag.detachEvent("onmouseup", upHandler);
			elementToDrag.detachEvent("onmousemove", moveHandler);
			elementToDrag.releaseCapture();
		}
		if(e.stopPropagation)
		{
			e.stopPropagation();
		}
		else
		{
			e.cancelBubble = true;
		}
	}
}