<?php 
    include('head.php');
 ?>
<body>
<div class="metinfotop">
	<div class="position">会员管理 > <a href="/admin/users/group/">用户组</a></div>
</div>
<div style="clear:both;"></div>
<div class="v52fmbx_tbmax">
<div class="v52fmbx_tbbox">
<table cellpadding="2" cellspacing="1" class="table">
		<tr> 
            <td width="5%" class="list">id</td>
            <td width="7%" class="list">用户组名称</td>
			<td width="10%" class="list">操作&nbsp;&nbsp;&nbsp;<span class="add"><a href="/admin/users/group_add/" >添加</a></span></td>
        </tr>
        <?php 
            foreach ($data as $k => $v){
        ?>
        <td class="list-text" rel="id"><?php echo $v['id'];   ?></td>
        <td class="list-text" rel="uname"><?php echo $v['users_group']?></td>
       <td class="list-text" rel="mobile"><a href="/admin/users/group_update/?id=<?php echo  $v['id'] ?>" class="updata">修改</a>&nbsp;&nbsp;<a href="javascript:;" class="del">删除</a></td>
    </tr>
        <?php  
            }
         ?>
</table>
</div>
</div>
</body>
</html>
<script type="text/javascript">
  $('.del').click(function(){
        tr = $(this).parents('tr');
        id = tr.find('td').eq(0).html();
        url = '/admin/users/group_del/';
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
