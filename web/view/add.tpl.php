<!DOCTYPE html>
<html>
<head>
	<title>add article</title>
	 <script src="https://cdn.staticfile.org/vue/2.4.2/vue.min.js"></script>
	  <script src="https://cdn.staticfile.org/vue-resource/1.5.1/vue-resource.min.js"></script>
	  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	 <script src="/js/utf8-php/ueditor.config.js"></script>
 <script src="/js/utf8-php/ueditor.all.js"></script>
   <script src="/js/jquery-1.7.1.min.js"></script>
</head>
<body>
       <!-- 添加新页卡 bengin-->
        <div id="tx-tj">
         <div class="tx-tj-tj">
        <div><input type="text" ref="title" placeholder="请在这里输入标题" class="title" v-model="title"/></div>
        <div><input type="text"  placeholder="请输入作者"  class="author" v-model="author"/></div>
          <script id="container" name="content" type="text/plain">
       <!-- <div>请从这里开始写正文</div>  -->
    </script>

        <div class="tx-tj-qt">
            <div class="tx-tj-qt-titile">封面和摘要</div>
            <div>
            <div class="tx-tj-thumb"><div class="tx-tj-thumb-logo"><i class="icon-add_css"></i></div><span>选择封面</span>
            <input type="file" id="thumb" name="thumb" @change="onUpload1">
            <div id="tx-tj-thumb-show" v-bind:class="cflag"><img :src="thumb" /></div>
        </div>
            <div class="tx-tj-description"><textarea placeholder="选填，如果不填写会默认抓取正文前54个字"></textarea></div>
            </div>
        </div>
        <div class="tx-tj-category">
            <div class="tx-tj-qt-titile">分类名称</div>
            <div>
            <select v-model="selected" name="category" @change="getPid">
                <option value="">选择一个分类</option>
                <option value="1">媒体空间</option>
                <option value="2">百家讲坛</option>
                <option value="3">醍醐灌顶</option>
            </select>
            <select name="category" v-model="selectedC">
                <option value="">选择一个分类</option>
                <option v-for="(value, key, index) in FIDDATA" :value="value.id">{{value.cname}}</option>
            </select>
            </div>
        </div>
        <div>来源</div>
        <div><button @click="submit()">提交</button></div>
        </div>
    </div>
    
 <!-- 添加新页卡 end-->


<style type="text/css">
	#tx-tj{top:80px ;position:absolute;margin:0 auto;z-index: 160;left: 10%;}
	.tx-tj-tj{width: 1000px;margin:0 auto;background-color: white;border-left:1px solid #ddd;border-right:1px solid #ddd;}
	.tx-tj-qt{border-top: 1px solid #ebebeb;padding: 10px 10px 25px 10px ;display: table;}
	.tx-tj-qt .tx-tj-qt-titile{margin:15px 0;}
	.title{ margin: 2px 0;padding-right: 98px;box-sizing: border-box;font-size: 24px;font-weight: 500;height: 46px;line-height: 46px;width: 100%;background-color: transparent;border: 0;outline: 0;padding-left: 7px;}
    .author{padding-left: 7px;margin: 2px 0;padding-right: 98px;box-sizing: border-box;width: 100%;background-color: transparent;border: 0;outline: 0;}
    .tx-tj-thumb{border:2px dashed #ebebeb;padding:5px;width: 200px;height: 85px;text-align: center;float: left;position: relative;}
    .tx-tj-thumb span{color:green;font-size:16px;width:100%;text-align: center;display: block;margin-top: 5px;}
    .tx-tj-thumb .tx-tj-thumb-logo{margin-top:13px;}
/*这个地方使用了伪类 如:before，content就是为了美化标签做的背景，如果不想美化，只用线条，那么这个写空，然后给长宽*/
	.tx-tj-thumb i{clear: both;}
	.tx-tj-qt i{display: inline-block;width: 24px;height: 24px;position: relative;}
    .tx-tj-qt i:before{width: 20px;height: 2px;left: 2px;top: 11px;content: "";display: block;position: absolute;background-color: #43b548;}
    .tx-tj-qt i:after{width: 2px;height: 20px;left: 11px;top: 2px;content: "";display: block;position: absolute;background-color: #43b548;}
    .tx-tj-qt .tx-tj-description{float:left;margin-left: 10px;height:100px;width: 500px}
    .tx-tj-qt .tx-tj-description textarea{height:100%;width:100%;resize:none}
  
    /*分类*/
    .tx-tj-category {margin-left:10px;}
    .tx-tj-category .tx-tj-qt-titile{margin:10px 0;}   
    #thumb{ height: 100%;
    width: 100%;
    position: absolute;
    z-index: 99;
    opacity: 0;
    top: 0;
    left: 0;}     
    #tx-tj-thumb-show{width: 100%;height:100%;
    position: absolute;
    top: 0;
    z-index: 9;
    opacity: 0.7;
    overflow: hidden;}   
    #tx-tj-thumb-show img{width: 100%;height: auto;} 
    .cflag{display: none;}    
</style>



</body>
<script type="text/javascript">

     // 实例化编辑器
   var ue = UE.getEditor('container',{
   	initialFrameHeight:300,
   	autoFloatEnabled:true

   });

	var editCard = new Vue({
		el:'#tx-tj',
		data:{
        // editor:false,
        // classEditor:'noneC',
        selected:'',
        FIDDATA:'',
        title:'',
        content:'',
        author:'',
        thumb:'',
        columnId:'',
        selectedC:'',
        cflag:'cflag'
    },
    mounted: function() {
        url = '/index.php?app=web&act=index-getPID';
        this.$http.post(url,{emulateJSON:true}).then(function(res){
            this.FIDDATA =res.body.data;
        })
    },
  	methods: {
  		//异步ajax提交，需要使用emulateJSON:true协议（json），优点为base64位图片，可以异步预览，后端代码一次接收，缺点是需要连续赋值。
  		onUpload1:function(e){
  			  var file = e.target.files[0]
		      var reader = new FileReader();//创建文件流对象
		      var that = this;
		      reader.readAsDataURL(file)
		      reader.onload = function(e) {
		        that.thumb = this.result;
		        that.cflag = 'c';
		      }
  		},
  		// 同步表单提交,需要使用multipart/form-data表单数据协议，优点是一次赋值，缺点是不可以图片本地预览，后端代码需要分次接收。
        onUpload:function(e){
          let file = e.target.files[0];           
          let param = new FormData(); //创建form对象
          param.append('thumb',file,file.name);//通过append向form对象添加数据
          param.append('title',this.title);//添加form表单中其他数据
          param.append('author',this.author);
          param.append('content',ue.getContent());
		  param.append('columnId',this.selectedC);
		  let config = {
            headers:{'Content-Type':'multipart/form-data'}
          };  //添加请求头
          this.$http.post('/index.php?app=web&act=index-pullArticle',param,config)
          .then(response=>{
            console.log(response.data);
          })  
        },
        submit:function() {
        url ='/index.php?app=web&act=index-pullArticle';
        var title =this.title; 
        var author =this.author;
        var content = ue.getContent();
        var thumb = this.thumb;
        var columnId = this.selectedC;
         
        
        	this.$http.post(url,{title:title,author:author,content:content,columnId:columnId,thumb:thumb}, {emulateJSON:true}).then(function(res){
        		console.log(res.data);
            // if(res.data>0){
            // 	    alert('提交成功')
            //         history.go(-1);
            //     }
        })
        
        
        },
        getPid:function() {
            url = '/index.php?app=web&act=index-getPID';
        
            this.$http.post(url, {pid:this.selected}, {emulateJSON:true}).then(function(res){
                this.FIDDATA = res.data.data;
            })
        },
       
    }
	})
</script>
</html>