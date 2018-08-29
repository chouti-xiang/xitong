<?php 
  include('head.php');
 ?>
<body background='/admin/resources/images/allbg.gif' leftmargin='8' topmargin='8'>
<div style="min-width:780px">
 <table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D6D6D6" align="center">
      <tr>
           <td height="28" background="/admin/resources/images/tbg.gif" style="padding-left:10px;"><b>广告添加：</b></td>
      </tr>
 </table>
 <table width="98%" border="0" cellpadding="0" cellspacing="0" style="margin-top:10px" bgcolor="#D6D6D6" align="center">
  <tr>
   <td bgcolor="#FFFFFF" width="100%">
   <form action="/index.php?app=admin&act=advert-update" method="POST"  enctype="multipart/form-data">
<div id="_mainsearch">
          <table width="100%" style='' id="td1" border="0" cellspacing="1" cellpadding="1" bgcolor="#cfcfcf">
        
            <tr align="center" height="25" bgcolor="#ffffff">
       <td width="300">微信名称: </td>
       <td align="left" style="padding:3px;"><input type="text" value="<?php echo $data[0]['username']; ?>" name="username" /></td>
      </tr>
            <tr align="center" height="25" bgcolor="#F9FCEF">
       <td width="300">邀请卡号码: </td>
       <td align="left" style="padding:3px;"><input type="text" value="<?php echo $data[0]['wxcode']; ?>" name="wxcode" /></td>
      </tr>
      <input type="hidden" name="id" value="<?php echo $data[0]['cid']; ?>">
       <tr align="center" height="25" bgcolor="#F9FCEF">
       <td width="300"></td>
       <td align="left" style="padding:3px;">
             <button class="apply1">提交</button>
       </td>
      </tr>
     </table>
    </form></td>
  </tr>
 </table>
</div>
</body>
</html>
<script>
    $('.back').click(function(){
        history.go(0);
    });
     var description=$('.des').val();
     $('.description').html(description);
</script>
