<?php 
  include('head.php');
 ?>
<body>
<div class="metinfotop">
	<div class="position">课程管理 > <a href="/admin/course/type/">课程分类</a></div>
</div>
<div style="clear:both;"></div>
<div class="v52fmbx_tbmax">
<div class="v52fmbx_tbbox">
<table cellpadding="2" cellspacing="1" class="table">
		<tr> 
            <td width="5%" class="list">ID</td>
            <td width="10%" class="list">分类名称</td>
            <td width="15%" class="list">分类封面</td>
			<td width="15%" class="list">操作<span class="add"><a href="/admin/course/type_add/" >添加</a></span></td>
        </tr>
      <?php 
        foreach ($data as $k => $v){
    ?>
        <td class="list-text" rel="id"><?php echo $v['id']?></td>
        <td class="list-text" rel="uname"><?php echo $v['course_category']?></td>
        <td class="list-text" rel="creattime"><img src="/<?php echo $v['image_category']?>" width="170px" height="70px" /></td>
        <td class="list-text" rel="mobile">
        <a href="/admin/course/type_update/?id=<?php echo  $v['id'] ?>" class="updata">修改</a> | 
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
        url = '/admin/course/type_del/';
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
