<?php 
  include('head.php');
 ?>
<body>
<div class="metinfotop">
	<div class="position">邀请卡管理 > <a href="/index.php?app=admin&act=advert-index">邀请卡列表</a></div>
</div>
<div style="clear:both;"></div>
<div class="v52fmbx_tbmax">
<div class="v52fmbx_tbbox">
<table cellpadding="2" cellspacing="1" class="table">
		<tr> 
            <td width="5%" class="list">ID</td>
            <td width="15%" class="list">用户微信名</td>
            <td width="10%" class="list">邀请码</td>
            <td width="10%" class="list">创建时间</td>
            <td width="15%" class="list">当前状态</td>
			<td width="15%" class="list">操作<span class="add"><a href="/index.php?app=admin&act=advert-add" >添加</a></span></td>
        </tr>
      <?php 
        foreach ($data as $k => $v){
    ?>
        <td class="list-text" rel="id"><?php echo $v['cid']?></td>
        <td class="list-text" rel="username"><?php echo $v['username']?></td>
        <td class="list-text" rel="wxcode"><?php echo $v['wxcode']?></td>
        <td class="list-text" rel="time"><?php echo date('Y-m-d',$v['creattime']);?></td>
        <td class="list-text" rel="email">
        <?php 
            if($v['is_show']){
                echo "使用";
            }else{
                echo "过期";
            }
         ?>
        </td>
        <td class="list-text" rel="mobile">
        <a href="/index.php?app=admin&act=advert-update&id=<?php echo  $v['cid'] ?>" class="updata">修改</a> | 
            <a href="javascript:;" class="del">删除</a>
        </td>
    </tr>
        <?php  
            }
         ?>
</table>
</div>
</div>
</body>
</html>

<script>
    $('.del').click(function(){
        tr = $(this).parents('tr');
        id = tr.find('td').eq(0).html();
        url = '/index.php?app=admin&act=advert-del';
        $.post(url,{id:id},function(e){
            if(e.flag){
                alert(e.data);
            }else{
                alert('删除失败');
            }
        },'json');
        tr.remove();
    });
</script>
