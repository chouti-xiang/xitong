document.write("<div style='position:absolute;left:0px;top:0px;width:100%;height:100%;z-index:199;display:none;' id='MessBoxBg2x'></div>");
document.write("<div style='position:absolute; left:100px; top:100px; width:250px; z-index:200; background-color:#b5b19c; border:solid 1px #c2c3c4; font-weight:bold;display:none;' id='MessBox2x'>");
document.write("	<div style='background-color:#16a003; border-bottom:solid 1px #aaa; padding:0px; cursor:move;height:30px' onmousedown='drag(this.parentNode, event);'>");
document.write("	<TABLE width=100% cellpadding=5 cellspacing=0 bgcolor=#16a003 border=0 height=30>");
document.write("	<TR >");
document.write("		<TD align=left>&nbsp;<font style='font-family:Microsoft Yahei;color:#ffffff' id='MessTitleID2x'></font></TD>");
document.write("		<TD align=right><a href='javascript:CloseMess2();'><font color=white><b>×</b></font></a> </TD>");
document.write("	</TR>");
document.write("	</TABLE>");
document.write("	</div>");
document.write("	<div style='padding:0px;background-color:#ffffff; margin-top:-4px;'><div style='height:2px;'></div>");
document.write("		<iframe width=0 height=0 border=0 frameborder=0 src='/ExplorerEntry/view/loading.htm' name='MessIframe2x' id='MessIframe2x'></iframe>");
document.write("	</div>");
document.write("</div>");


document.write("<div style='position:absolute;left:0px;top:0px;filter: alpha(opacity=80);width:100%;height:100%;z-index:299;display:none;' id='MessBoxBg3x'></div>");
document.write("<div style='position:absolute; left:100px; top:100px; width:250px; z-index:55555555; background-color:#b5b19c; border:solid 1px #c2c3c4; font-weight:bold;display:none;' id='MessBox3x'>");
document.write("	<div style='background-color:#1F94CC; border-bottom:solid 1px #aaa; padding:0px; cursor:move;height:28px' onmousedown='drag(this.parentNode, event);'>");
document.write("	<TABLE width=100% cellpadding=5 cellspacing=0 bgcolor=#1F94CC border=0 height=30>");
document.write("	<TR >");
document.write("		<TD align=left>&nbsp;&nbsp;&nbsp;<font style='font-family:Microsoft Yahei;color:#ffffff' id='MessTitleID3x'></font></TD>");
document.write("		<TD align=right><a href='javascript:CloseMess3();'><font color=white><b>X</b></font>&nbsp;&nbsp;&nbsp;</TD>");
document.write("	</TR>");
document.write("	</TABLE>");
document.write("	</div>");
document.write("	<div style='background-color:#ffffff;'>");
document.write("		<iframe width=0 height=0 border=0 frameborder=0 src='/ExplorerEntry/view/loading.htm' name='MessIframe3x' id='MessIframe3x'></iframe>");
document.write("	</div>");
document.write("</div>");


function OpenMess3x(Width,Height,IframeSrc,Title)
{
	var MessBox = document.getElementById("MessBox3x");  
	var MessBoxBg = document.getElementById("MessBoxBg3x");
	var FrameObj= document.getElementById("MessIframe3x");
	var TitleObj=document.getElementById("MessTitleID3x");

	TitleObj.innerHTML=Title;
	MessBox.style.display="block";
	MessBox.style.width=Width+"px";
	MessBox.style.height=Height+"px";
	sc1("MessBox3x");
	FrameObj.style.width=parseInt(Width)+"px";
	FrameObj.style.height=parseInt(Height-34)+"px";
	MessBoxBg.style.display="block";
  	
	var winHeight=document.body.clientHeight;
  	MessBoxBg.style.height=winHeight ;

	document.getElementById("MessIframe3x").src=IframeSrc;
}
function CloseMess3()
{
	var MessBox = document.getElementById("MessBox3x");  
	var MessBoxBg = document.getElementById("MessBoxBg3x");
	MessBox.style.display="none";
	MessBoxBg.style.display="none";
}

function OpenMess2x(Width,Height,IframeSrc,Title)
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
	FrameObj.style.height=parseInt(Height-34)+"px";
	MessBoxBg.style.display="block";
  	var winHeight=document.body.clientHeight ;
  	MessBoxBg.style.height=winHeight ;
	document.getElementById("MessIframe2x").src=IframeSrc;
}
function CloseMess2()
{
	var MessBox = document.getElementById("MessBox2x");  
	var MessBoxBg = document.getElementById("MessBoxBg2x");
	MessBox.style.display="none";
	MessBoxBg.style.display="none";
}
function sc1(name){
 document.getElementById(name).style.top=((document.body.scrollTop | document.documentElement.scrollTop)+(document.documentElement.clientHeight-document.getElementById(name).offsetHeight)/2)+"px";
 document.getElementById(name).style.left=(document.documentElement.scrollLeft+(document.documentElement.clientWidth-document.getElementById(name).offsetWidth)/2)+"px";
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