<?php 
    include('head.php');
 ?>
 <script type="text/javascript" src="/js/utf8-php/ueditor.config.js"></script>
<script type="text/javascript" src="/js/utf8-php/ueditor.all.min.js"></script>
<body background='/admin/resources/images/allbg.gif' leftmargin='8' topmargin='8'>
<div style="min-width:780px">
 <table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D6D6D6" align="center">
      <tr>
           <td height="28" background="/admin/resources/images/tbg.gif" style="padding-left:10px;"><b>文章增加：</b></td>
      </tr>
 </table>
 <table width="98%" border="0" cellpadding="0" cellspacing="0" style="margin-top:10px" bgcolor="#D6D6D6" align="center">
  <tr>
   <td bgcolor="#FFFFFF" width="100%">
   <form action="/index.php?app=admin&act=article-add" method="POST"  enctype="multipart/form-data">
<div id="_mainsearch">
          <table width="100%" style='' id="td1" border="0" cellspacing="1" cellpadding="1" bgcolor="#cfcfcf">
            <tr align="center" height="25" bgcolor="#F9FCEF">
       <td width="300">中文标题: </td>
       <td align="left" style="padding:3px;"><input type="text" value="" name="cntitle" style="width:400px"/></td>
      </tr>
      <tr align="center" height="25" bgcolor="#ffffff">
       <td width="300">英文标题: </td>
       <td align="left" style="padding:3px;resize:none"><textarea name='entitle' row='4' id='edit___cfg_powerby' class='textarea_info' style='width:98%;height:50px'></textarea></td>
      </tr>
      </tr><tr align="center" height="25" bgcolor="#F9FCEF">
       <td width="300">文章内容: </td>
       <td align="left" style="padding:3px;resize:none">
        <script id="editor" type="text/plain" style="width:100%;height:300px;" name="content" ></script></td>
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
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');


    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e)
    }
    function insertHtml() {
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
    }
    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UE.getEditor('editor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }
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