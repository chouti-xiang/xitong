document.write("<div style='position:absolute;left:0px;top:0px;background-color:rgba(0, 0, 0, 0.6);filter: alpha(opacity=85);width:100%;height:100%;z-index:999;display:none;' id='MessBoxBg'></div>");
document.write("<div style='position:absolute; left:100px; top:100px; width:250px; z-index:1000; background-color:#ddd; border:solid 1px #ddd; font-weight:bold;display:none;' id='MessBox'>");
document.write("	<div style='background-color:#ececec; border-bottom:solid 1px #ddd; padding:5px; cursor:move;height:20px' onmousedown='drag(this.parentNode, event);'>");
document.write("	<TABLE width=100% cellpadding=0 cellspacing=0 bgcolor=#ececec border=0 height=20>");
document.write("	<TR >");
document.write("		<TD align=left>&nbsp;<font style='font-family:Microsoft YaHei;color:#000' id='MessTitleID'></font></TD>");
document.write("		<TD align=right><a href='javascript:XCloudClose();'><font style='color:black;text-decoration:none;'>X</font></a>&nbsp;</TD>");
document.write("	</TR>");
document.write("	</TABLE>");
document.write("	</div>");
document.write("	<div style='padding:0px;background-color:#fff;'>");
document.write("		<iframe width=0 height=0 border=0 frameborder=0 src='' id='MessIframe' name='MessIframe'></iframe>");
document.write("	</div>");
document.write("</div>");
document.write("<div style='position:absolute;left:0px;top:0px;background-color:rgba(0, 0, 0, 0);width:100%;height:100%;z-index:1000;display:none;' id='MessBoxBg2x'></div>");
document.write("<div style='position:absolute; left:100px; top:100px; width:250px; z-index:1000; background-color:#ddd; border:solid 1px #ddd; font-weight:bold;display:none;' id='MessBox2x'>");
document.write("	<div style='background-color:#ececec; border-bottom:solid 1px #ddd; padding:5px; cursor:move;height:20px' onmousedown='drag(this.parentNode, event);'>");
document.write("	<TABLE width=100% cellpadding=0 cellspacing=0 bgcolor=#ececec border=0 height=20>");
document.write("	<TR >");
document.write("		<TD align=left>&nbsp;<font style='font-family:Microsoft YaHei;color:#000' id='MessTitleID2x'></font></TD>");
document.write("		<TD align=right><a href='javascript:XCloudTopClose();'><font style='font-weight:bold;font-size:14px;color:black;'>X</font></a>&nbsp;</TD>");
document.write("	</TR>");
document.write("	</TABLE>");
document.write("	</div>");
document.write("	<div style='padding:0px;background-color:#fff;'>");
document.write("		<iframe width=0 height=0 border=0 frameborder=0 src='' id='MessIframe2x'></iframe>");
document.write("	</div>");
document.write("</div>");




function XCloudTopOpen(Width,Height,IframeSrc,Title)
{
	var MessBox = document.getElementById("MessBox2x");  
	var MessBoxBg = document.getElementById("MessBoxBg2x");
	var FrameObj= document.getElementById("MessIframe2x");
	var TitleObj=document.getElementById("MessTitleID2x");
	TitleObj.innerHTML=Title;
	MessBox.style.display="block";
	MessBox.style.width=Width+"px";
	MessBox.style.height=Height+"px";
	sc1("MessBox2x");
	FrameObj.style.width=parseInt(Width)+"px";
	FrameObj.style.height=parseInt(Height-32)+"px";
	MessBoxBg2x.style.display="block";
  	MessBoxBg2x.style.height = (parseInt(document.body.scrollHeight) + 1000)+"px";

	document.getElementById("MessIframe2x").src=IframeSrc;
	
}
function XCloudTopClose()
{
	var MessBox = document.getElementById("MessBox2x");  
	var MessBoxBg = document.getElementById("MessBoxBg2x");
	MessBox.style.display="none";
	MessBoxBg.style.display="none";
}




function XCloudOpen(Width,Height,IframeSrc,Title)
{
	var MessBox = document.getElementById("MessBox");  
	var MessBoxBg = document.getElementById("MessBoxBg");
	var FrameObj= document.getElementById("MessIframe");
	var TitleObj=document.getElementById("MessTitleID");
	TitleObj.innerHTML=Title;
	MessBox.style.display="block";
	MessBox.style.width=Width+"px";
	MessBox.style.height=Height+"px";
	sc1("MessBox");
	FrameObj.style.width=parseInt(Width)+"px";
	FrameObj.style.height=parseInt(Height-32)+"px";
	MessBoxBg.style.display="block";

  	MessBoxBg.style.height = (parseInt(document.body.scrollHeight) + 1000)+"px";

	document.getElementById("MessIframe").src=IframeSrc;
	
}
function XCloudClose()
{
	var MessBox = document.getElementById("MessBox");  
	var MessBoxBg = document.getElementById("MessBoxBg");
	MessBox.style.display="none";
	MessBoxBg.style.display="none";
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
function sc1(name)
{
	document.getElementById(name).style.top=((document.body.scrollTop | document.documentElement.scrollTop)+(document.documentElement.clientHeight-document.getElementById(name).offsetHeight)/2)+"px";
	document.getElementById(name).style.left=(document.documentElement.scrollLeft+(document.documentElement.clientWidth-document.getElementById(name).offsetWidth)/2)+"px";
}