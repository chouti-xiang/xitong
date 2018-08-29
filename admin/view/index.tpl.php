<?php 
    include('head.php');
 ?>
<body>
<div id="metcmsbox">
<div id="top"> 
    <div class="floatr">
	  <div class="top-r-box">
		<div class="top-right-boxr">
			<div class="top-r-t">
		      <font style="color:white;font-weight:bold;font-size:14px;">
             <?php echo($_SESSION["admin_name"]);?>&nbsp;(管理员)</font>
             <a href="/index.php?app=admin&act=users-loginout">(退出)</a>
		      </div>
		</div>

		<div class="nav">
          <ul id="topnav">
			 <li id="metnav_8" class="list"><a href="javascript:;" id="nav_8"  hidefocus="true"><span class="c3"></span>应用管理</a></li>
          </ul>
		</div>
	  </div>
    </div>
    <div class="floatl">
	    <a href="#" hidefocus="true" id="met_logo"><img src="/course/resources/img/bottom_logo.jpg" style="width:150px;height:78px"/></a>
	</div>
</div>

<div id="content">
    <div class="floatl" id="metleft">
      
	    <div class="nav_list" id="leftnav">
      
           <ul style="display:block;" id="ul_8">
                <li ><a href="/index.php?app=admin&act=article-index" target='main' id='nav_8_27' title="词库列表" hidefocus="true" class="on">词库列表</a></li>
                 <li ><a href="/index.php?app=admin&act=advert-index" target='main' id='nav_9_27' title="邀请卡列表" hidefocus="true">邀请卡列表</a></li>
            </ul>
           
		</div>
	</div>
    <div class="floatr" id="metright">
        <div class="iframe">
            <div class="min"><iframe height="670" width="100%" scrolling="auto" frameborder="0" id="main" name="main" src="/index.php?app=admin&act=article-index" scrolling="no"></iframe></div>
        </div>
    </div>
	</div>
    <input type="hidden" class="admin_id" value="<?php echo $_SESSION['admin_id']; ?>">
</div>
<script src="/admin/css/js/metinfo.js" type="text/javascript"></script>
</body>
<script type="text/javascript">
    window.onload=function(){
        var id=$('.admin_id').val();
        if(!id){
            location.href="/index.php?app=admin&act=users-login";
        }
    } 
</script>