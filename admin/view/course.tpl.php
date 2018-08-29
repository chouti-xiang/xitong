<?php 
  include('head.php');
 ?>
<body>
<div class="metinfotop">
	<div class="position">课程管理 > <a href="/admin/course/index/">课程列表</a></div>
</div>
<div style="clear:both;"></div>
<form name='form3' action='/admin/course/index/' method='POST'>
<input type='hidden' name='dopost' value='listArchives' />
<table width='99%'  border='0' cellpadding='1' cellspacing='1' bgcolor='#cfcfcf' align="center" style="margin-top:8px">
  <tr bgcolor='#EEF4EA'>
    <td background='/admin/resources/images/wbg.gif'>
      <table border='0' cellpadding='0' cellspacing='0' height="32">
        <tr>
         <td nowrap>
          课程名称：
        </td>
        <td width='130'>
            <input type='text' name='course_name' value="<?php echo $course_name; ?>" placeholder="请输入课程名称" style='width:120px' />
        </td>
           <td nowrap>
          课程分类：
        </td>
        <td></td>
        <td width='130'>
           <select name="category" id="">
              <option value="">请选择</option>
              <?php 
                foreach ($type as $key => $value) {
                ?>
                <option value="<?php echo $value['id']; ?>" <?php if($category==$value['id']){ echo 'selected="selected"';} ?>><?php echo $value['course_category']; ?></option>
              <?php
                }
               ?>
           </select>
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
<div style="clear:both;"></div>
<div class="v52fmbx_tbmax">
<div class="v52fmbx_tbbox">
<table cellpadding="2" cellspacing="1" class="table">
		<tr> 
            <td width="5%" class="list">ID</td>
            <td width="10%" class="list">课程名称</td>
            <td width="15%" class="list">课程封面</td>
            <td width="15%" class="list">课程分类</td>
            <td width="15%" class="list">课程状态</td>
			<td width="15%" class="list">操作<span class="add"><a href="/admin/course/add/" >添加</a></span></td>
        </tr>
      <?php 
        foreach ($data as $k => $v){
    ?>
        <td class="list-text" rel="id"><?php echo $v['id']?></td>
        <td class="list-text" rel="uname"><?php echo $v['course_name']?></td>
        <td class="list-text" rel="creattime"><img src="/<?php echo $v['course_image']?>" width="170px" height="70px" /></td>
        <td class="list-text" rel="uname">
        <?php 
          foreach ($type as $key => $value) {
            if($value['id']==$v['category']){
              echo $value['course_category'];
            }
          }
        ?></td>
         <td class="list-text" rel="uname"><?php if($v['type']=='1'){ echo "上架";}elseif($v['type']=='0'){ echo "下架";}?></td>
        <td class="list-text" rel="mobile">
        <a href="/admin/course/update/?id=<?php echo  $v['id'] ?>" class="updata">修改</a> | 
            <a href="javascript:;" class="del">删除</a>
        </td>
    </tr>
        <?php  
            }
         ?>
</table>
</div>
</div>
 <div class="page" style="float:right;margin-top:15px">
            <?php 
                if($page>1){
             ?>
                <a href='/admin/course/index/?page=<?php echo $page-1;  if($course_name){ echo "&course_name={$course_name}";}  if($category){ echo "&category={$category}";} ?>'>上一页</a>
            <?php 
                }
             ?>
            <?php
                for($i=1;$i<=$pages;$i++){
             ?>
                <a href='/admin/course/index/?page=<?php echo $i=$i;  if($course_name){ echo "&course_name={$course_name}";} if($category){ echo "&category={$category}";} ?>' class='active1'><?php echo $i; ?></a>

             <?php 
                }
              ?>
            <?php 
                if($page<$pages){
             ?>
                <a href="/admin/course/index/?page=<?php echo $page+1;  if($course_name){ echo "&course_name={$course_name}";} if($category){ echo "&category={$category}";}?>">下一页</a>
            <?php } ?>
            <form action="/admin/course/index/" class="page_form" method="POST" style="float:right">
            <input type="hidden" name="category" value="<?php echo $category; ?>">
             <input type="hidden" name="course_name" value="<?php echo $course_name; ?>">
            <span>共<?php echo $pages;?>页</span><?php echo $num; ?>篇文章
            到<input type="text"  width="50px" value="<?php echo $page; ?>" name="page" class="num" />
            <span class="sure">确定</span>
            </form>
</div>
</body>
</html>

<script>
    $('.del').click(function(){
        tr = $(this).parents('tr');
        id = tr.find('td').eq(0).html();
        url = '/admin/course/del/';
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
