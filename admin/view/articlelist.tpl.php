<?php 
    include('head.php');
 ?>
<body>
<div class="metinfotop">
	<div class="position">单词管理 > <a href="/index.php?app=admin&act=article-index">单词列表</a></div>
</div>
<div style="clear:both;"></div>
<form name='form3' action='/index.php?app=admin&act=article-index' method='POST'>
<input type='hidden' name='dopost' value='listArchives' />
<table width='99%'  border='0' cellpadding='1' cellspacing='1' bgcolor='#cfcfcf' align="center" style="margin-top:8px">
  <tr bgcolor='#EEF4EA'>
    <td background='/admin/resources/images/wbg.gif'>
      <table border='0' cellpadding='0' cellspacing='0' height="32">
        <tr>
         <td nowrap>
          关键字：
        </td>
        <td width='130'>
            <input type='text' name='cntitle' value="<?php echo $cntitle; ?>" placeholder="请输入关键词" style='width:120px' />
        </td>
  
       <td>
          <input name="imageField" type="image" src="/admin/resources/images/button_search.gif" width="60" height="22" border="0" class="np" />
       </td>
      </tr>
     </table>
   </td>
  </tr>
</table>
</form>
<div class="v52fmbx_tbmax">
<div class="v52fmbx_tbbox">
<table cellpadding="2" cellspacing="1" class="table">
		<tr> 
            <td width="5%" class="list">单词ID</td>
            <td width="10%" class="list">中文标题</td>
            <td width="15%" class="list">英文标题</td>
			<td width="10%" class="list">操作<span class="add"><a href="/index.php?app=admin&act=article-add" >添加</a></span></td>
        </tr>
       <?php 
            foreach ($article as $k => $v){
        ?>
        <td class="list-text" rel="id"><?php echo $v['wid'] ?></td>
        <td class="list-text" rel="photo"><?php echo $v['cntitle'] ?></td>
      <td class="list-text" rel="photo"><?php echo $v['entitle'] ?></td>
        <td class="list-text" rel="mobile"><a href="/index.php?app=admin&act=article-update&id=<?php echo  $v['wid'] ?>" class="updata">修改</a> | 
            <a href="javascript:;" class="del">删除</a></td>
    </tr>
        <?php  
            }
         ?>
</table>
 <div class="page" style="float:right;margin-top:15px">
            <?php 
                if($page>1){
             ?>
                <a href='/index.php?app=admin&act=article-index&page=<?php echo $page-1 ?><?php  if($title){ echo "&title={$title}";} if($cate){ echo "&cate={$cate}";} ?>'>上一页</a>
            <?php 
                }
             ?>
            <?php
                for($i=1;$i<=$pages;$i++){
             ?>
                <a href='/index.php?app=admin&act=article-index&page=<?php echo $i=$i; ?><?php  if($title){ echo "&title={$title}";} if($cate){ echo "&cate={$cate}";} ?>' class='active1'><?php echo $i; ?></a>

             <?php 
                }
              ?>
            <?php 
                if($page<$pages){
             ?>
                <a href="/index.php?app=admin&act=article-index&page=<?php echo $page+1 ?><?php  if($title){ echo "&title={$title}";} if($cate){ echo "&cate={$cate}";} ?>">下一页</a>
            <?php } ?>
            <form action="/index.php?app=admin&act=article-index&" class="page_form" method="POST" style="float:right">
            <input type="hidden" name="title" value="<?php echo $title; ?>">
            <input type="hidden" name="cate" value="<?php echo $cate; ?>">
            <span>共<?php echo $pages;?>页</span><?php echo $num; ?>个单词
            到<input type="text"  width="50px" value="<?php echo $page; ?>" name="page" class="num" />
            <span class="sure">确定</span>
            </form>
</div>
</div>
</div>
</body>
</html>
<script>
    $('.del').click(function(){
        tr = $(this).parents('tr');
        id = tr.find('td').eq(0).html();
        url = '/index.php?app=admin&act=article-del';
        $.post(url,{id:id},function(e){
            if(e.flag){
                alert(e.data);
            }else{
                alert('删除失败');
            } 
        },'json');
        tr.remove();
    });
    $('.sure').click(function(){
        $('.page_form').submit();
    })
</script>
