<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>品课网</title>
<base target="_self">
<link rel="stylesheet" type="text/css" href="/admin/css/css/base.css" />
<link rel="stylesheet" type="text/css" href="/admin/css/css/indexbody.css" />
</head>
<body>
<div>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>

  </tr>
  <tr>
    <td height="1" background="/admin/resources/images/sp_bg.gif" style='padding:0px'></td>
  </tr>
</table>
<div id='mainmsg'>
  <div class="column" id="column1"><!--左侧开始-->    
        <dl class="dbox" id="item1">
            <dt class='lside'><span class='l'>品课网后台</span></dt>
            <dd>
                <div id='updatetest'>
                    <div id='updateinfos'>
                        <div class='updatedvt'>
                    </div>
                    </div>
                 </div>
            </dd>
        </dl><!--更新消息结束-->       
        <dl class='dbox' id="item3">
            <dt class='lside'>
                <div class='l'>快捷操作</div>
            </dt>
            <dd>
                <div id='quickmenu'>
                    <div class='icoitem' style='background:url(/admin/resources/images/addnews.gif) 10px 3px no-repeat;'><a href="/admin/course/index/">课程管理</a></div>
                    <div class='icoitem' style='background:url(/admin/resources/images/manage1.gif) 10px 3px no-repeat;'><a href="/admin/users/index/">用户管理</a></div>
                    <div class='icoitem' style='background:url(/admin/resources/images/manage1.gif) 10px 3px no-repeat;'><a href="/admin/article/index/">文章管理</a></div>
                    <div class='icoitem' style='background:url(/admin/resources/images/manage1.gif) 10px 3px no-repeat;'><a href="/admin/advert/index/">广告位</a></div>
                </div>
            </dd>
              <dd>
            </dd>
    </div><!--左侧结束-->
    <div class="column" id="column2" ><!-- //右边的快捷消息开始 -->
       
        <dl class='dbox' id="item6">
            <dt class='lside'><div class='l'>信息统计</div></dt>
            <dd id='listCount'>
                <table width="100%" class="dboxtable">
                    <tbody><tr>
                        <td width="50%" class="nline" style="text-align:left"> 会员数： </td>
                        <td class="nline" style="text-align:left"><?php echo $u_num; ?></td>
                    </tr>
                    <tr>
                        <td class="nline" style="text-align:left"> 文章数： </td>
                        <td class="nline" style="text-align:left"><?php echo $a_num ?></td>
                    </tr>
                        <tr>
                        <td class="nline" style="text-align:left">课程数: </td>
                        <td class="nline" style="text-align:left"><?php echo $c_num ?></td>
                    </tr>
                    <tr>
                        <td class="nline" style="text-align:left">广告: </td>
                        <td class="nline" style="text-align:left"><?php echo $v_num; ?></td>
                    </tr>
                    </tbody>
                </table>
           </dd>
        </dl><!--信息统计结束-->
    </div>
</div>
</div>
</div>
</body>
</html>