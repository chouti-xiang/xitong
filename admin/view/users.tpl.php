<?php 
    include('head.php');
 ?>
<body>
<div class="metinfotop">
	<div class="position">会员管理 > <a href="/admin/users/index/">会员列表</a></div>
</div>
<div style="clear:both;"></div>
<form name='form3' action='/admin/users/index/' method="post">
<input type='hidden' name='dopost' value='listArchives' />
<table width='99%'  border='0' cellpadding='1' cellspacing='1' bgcolor='#cfcfcf' align="center">
  <tr bgcolor='#EEF4EA'>
    <td background='/admin/resources/images/wbg.gif'>
      <table border='0' cellpadding='0' cellspacing='0' height="32">
        <tr>
        <td nowrap>
          用户名：
        </td>
        <td width='130'>
            <input type='text' name='username' placeholder='请输入会员昵称' value="<?php echo $username; ?>" style='width:120px' />
        </td>
         <td nowrap>
          用户组：
        </td>
        <td width='130'>
            <select name="usersgroup_id" id="">
              <option value="">请选择</option>
              <?php 
                foreach ($group as $k => $v) {
              ?>
              <option value="<?php echo $v['id']; ?>" <?php if($usersgroup_id==$v['id']){ echo 'selected="selected"';} ?>><?php echo $v['users_group']; ?></option>
              <?php
                }
               ?>
            </select>
        </td>
       <td>
          <input name="imageField" type="image" src="/admin/resources/images/button_search.gif" width="60" height="22" border="0" class="np" />
          <a id="load" href="/admin/users/load/" style="color:red;margin-left:18px">导出已经回复的excel</a>
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
            <td width="5%" class="list">id</td>
            <td width="7%" class="list">用户昵称</td>
            <td width="10%" class="list">所属组</td>
			<td width="10%" class="list">操作&nbsp;&nbsp;&nbsp;<span class="add"><a href="/admin/users/add/" >添加</a></span></td>
        </tr>
        <?php 
            foreach ($data as $k => $v){
        ?>
        <td class="list-text" rel="id"><?php echo $v['id'];   ?></td>
        <td class="list-text" rel="uname"><?php echo $v['username']?></td>
        <td class="list-text" rel="uname">
          <?php 
            foreach ($group as $value) {
              if($value['id']==$v['usersgroup_id']){
                echo $value['users_group'];
              }
            }
           ?>
        </td>
       <td class="list-text" rel="mobile"><a href="/admin/users/update/?id=<?php echo  $v['id'] ?>" class="updata">修改</a>&nbsp;&nbsp;
          <a href="javascript:;" class="det">删除</a>
       </td>
    </tr>
        <?php  
            }
         ?>
</table>
  <div class="page" style="float:right;margin-top:15px">
            <?php 
                if($page>1){
             ?>
                <a href='/admin/users/index/?page=<?php echo $page-1 ?><?php if($username){ echo "&username={$username}";} ?>'>上一页</a>
            <?php 
                }
             ?>
            <?php
                for($i=1;$i<=$pages;$i++){
             ?>
                <a href='/admin/users/index/?page=<?php echo $i=$i; ?><?php if($username){ echo "&username={$username}";} ?>' class='active1'><?php echo $i; ?></a>

             <?php 
                }
              ?>
            <?php 
                if($page<$pages){
             ?>
                <a href='/admin/users/index/?page=<?php echo $page+1 ?><?php if($username){ echo "&username={$username}";} ?>'>下一页</a>
            <?php } ?>
            <span>共<?php echo $pages;?>页</span><?php echo $num; ?>个用户
</div>
</div>
</div>
</body>
</html>
<script type="text/javascript">

    $('.det').click(function(){
       self = $(this).parents('tr');
       id = $(this).parents('tr').find('td[rel = id]').text();
       url = '/admin/users/det/';
       $.post(url,{id:id},function(e){
          if(e.flag){
            self.remove();
            alert(e.data);
          }else{
            alert(e.data);
          }
       },'json')
    });


</script>
