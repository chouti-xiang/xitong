<?php 
  include('head.php');
 ?>
</head>
<script type="text/javascript" src="/js/utf8-php/ueditor.config.js"></script>
<script type="text/javascript" src="/js/utf8-php/ueditor.all.min.js"></script>
<body background='/admin/resources/images/allbg.gif' leftmargin='8' topmargin='8'>
<div style="min-width:780px">
 <table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D6D6D6" align="center">
      <tr>
           <td height="28" background="/admin/resources/images/tbg.gif" style="padding-left:10px;"><b>用户添加：</b></td>
      </tr>
 </table>
 <table width="98%" border="0" cellpadding="0" cellspacing="0" style="margin-top:10px" bgcolor="#D6D6D6" align="center">
  <tr>
   <td bgcolor="#FFFFFF" width="100%">
   <form action="/admin/users/add/" method="POST"  enctype="multipart/form-data">
<div id="_mainsearch">
          <table width="100%" style='' id="td1" border="0" cellspacing="1" cellpadding="1" bgcolor="#cfcfcf">
            <tr align="center" height="25" bgcolor="#ffffff">
       <td width="300">用户昵称: </td>
       <td align="left" style="padding:3px;"><input type="text" value="" name="username" style="width:400px"/></td>
      </tr>
       <tr align="center" height="25" bgcolor="#ffffff">
       <td width="300">用户密码: </td>
       <td align="left" style="padding:3px;"><input type="password" value="" name="password" style="width:400px"/></td>
      </tr>
      <tr align="center" height="25" bgcolor="#ffffff">
       <td width="300">用户备注: </td>
       <td align="left" style="padding:3px;">
         <textarea name="usersremark" id="" cols="30" rows="10" style="resize:none;width:850px;height:200px"></textarea>
       </td>
      </tr>
       <tr align="center" height="25" bgcolor="#ffffff">
       <td width="300">用户所属组: </td>
       <td align="left" style="padding:3px;">
         <select name="usersgroup_id" id="">
           <option value="0">请选择</option>
           <?php 
            foreach ($group as $k => $v) {
            ?>
            <option value="<?php echo $v['id']; ?>"><?php echo $v['users_group']; ?></option>
            <?php 
              }
             ?>
         </select>
       </td>
      </tr>
       <tr align="center" height="25" bgcolor="#F9FCEF">
       <td width="300"></td>
       <td align="left" style="padding:3px;">
             <button class="apply1">提交</button>
             <button class="back1">返回</button>
       </td>
      </tr>
     </table>
    </form></td>
  </tr>
 </table>
</div>
</body>
</html>