<?php 
  include('head.php');
 ?>
<body background='/admin/resources/images/allbg.gif' leftmargin='8' topmargin='8'>
<div style="min-width:780px">
 <table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D6D6D6" align="center">
      <tr>
           <td height="28" background="/admin/resources/images/tbg.gif" style="padding-left:10px;"><b>轮播添加：</b></td>
      </tr>
 </table>
 <table width="98%" border="0" cellpadding="0" cellspacing="0" style="margin-top:10px" bgcolor="#D6D6D6" align="center">
  <tr>
   <td bgcolor="#FFFFFF" width="100%">
   <form action="/admin/advert/banner_add/" method="POST"  enctype="multipart/form-data">
<div id="_mainsearch">
          <table width="100%" style='' id="td1" border="0" cellspacing="1" cellpadding="1" bgcolor="#cfcfcf">
            <tr align="center" height="25" bgcolor="#ffffff">
       <td width="300">标题: </td>
       <td align="left" style="padding:3px;"><input type="text" value="<?php echo $data[0]['title']; ?>" name="title" /></td>
      </tr>
            <tr align="center" height="25" bgcolor="#F9FCEF">
       <td width="300">链接: </td>
       <td align="left" style="padding:3px;"><input type="text" value="<?php echo $data[0]['url']; ?>" name="url" /></td>
      </tr>
      <tr align="center" height="25" bgcolor="#F9FCEF">
       <td width="300">广告封面: </td>
        <td align="left" style="padding:3px;resize:none"> 
        <img display='none'  width="170px" height="70px" />
            <input type="file" value="" name="uploadinput[]" class="upload-file"/>
        </td>
      </tr>
	   </tr><tr align="center" height="25" bgcolor="#F9FCEF">
       <td width="300">轮播图分类: </td>
       <td align="left" style="padding:3px;resize:none"><input type="text" name="cat" value=""></td>
      </tr>
      </tr><tr align="center" height="25" bgcolor="#F9FCEF">
       <td width="300">排序: </td>
       <td align="left" style="padding:3px;resize:none"><input type="text" name="sorts" value="0"></td>
      </tr>
      <tr align="center" height="25" bgcolor="#F9FCEF">
       <td width="300">是否上架: </td>
       <td align="left" style="padding:3px;resize:none">
         <select name="type" id="">
           <option value="">请选择</option>
           <option value="0">下架</option>
           <option value="1">上架</option>
         </select>
       </td>
      </tr>
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
<script type="text/javascript">
    <?php $timestamp = time();?>
    $(function() {
        $('#file_upload').uploadify({
            'formData'     : {
                'timestamp' : '<?php echo $timestamp;?>',
                'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
            },
            'swf'      : '/js/upload/uploadify.swf',
            'width' : 88,
            'height' : 23,
            'buttonText' : null,
            'buttonImage' :'/charitable/resources/img/tb1.jpg',
            'uploader' : '/js/upload/uploadify.php'
        });
    });
</script>
<script type="text/javascript">
  $('.upload-file').on('change', function(){
    var u = $(this) ;
    var imgSrc = '';
    var reader = new FileReader();
    // reader.readAsDataURL
    reader.onload = function(e) {
       imgSrc = e.target.result;
       u.parent('td').find('img').attr('src',imgSrc).show();
    }
    reader.readAsDataURL(this.files[0]);
    this.files = [];
  })
</script>