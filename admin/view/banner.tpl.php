<?php 
  include('head.php');
 ?>
<body>
<div class="metinfotop">
	<div class="position">广告位管理 > <a href="/admin/advert/banner/">广告位列表</a></div>
</div>
<div style="clear:both;"></div>
<div class="v52fmbx_tbmax">
<div class="v52fmbx_tbbox">
<table cellpadding="2" cellspacing="1" class="table">
		<tr> 
            <td width="5%" class="list">ID</td>
            <td width="15%" class="list">轮播标题</td>
            <td width="10%" class="list">轮播图</td>
            <td width="10%" class="list">创建时间</td>
            <td width="15%" class="list">当前状态</td>
			<td width="15%" class="list">操作<span class="add"><a href="/admin/advert/banner_add/" >添加</a></span></td>
        </tr>
      <?php 
        foreach ($data as $k => $v){
    ?>
        <td class="list-text" rel="id"><?php echo $v['id']?></td>
        <td class="list-text" rel="id"><?php echo $v['title']?></td>
         <td class="list-text" rel="creattime"><img src="/<?php echo $v['images']?>" width="170px" height="70px" /></td>
        <td class="list-text" rel="uname"><?php echo date('Y-m-d',$v['creat_time']);?></td>
        <td class="list-text" rel="email">
        <?php 
            if($v['type']){
                echo "上架";
            }else{
                echo "下架";
            }
         ?>
        </td>
        <td class="list-text" rel="mobile">
        <a href="/admin/advert/banner_update/?id=<?php echo  $v['id'] ?>" class="updata">修改</a> | 
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
        url = '/admin/advert/banner_del/';
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
