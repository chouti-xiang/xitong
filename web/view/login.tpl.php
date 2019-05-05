<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	 <script src="https://cdn.staticfile.org/vue/2.4.2/vue.min.js"></script>
	 <script src="https://cdn.staticfile.org/vue-resource/1.5.1/vue-resource.min.js"></script>
</head>
<body>
<h1>登录</h1>
<div id="login">
  用户名: <input type="text" name="name" v-model='name'/><br>
  密码: <input type="password" name="password" v-model='password'/><br>
  <input type="submit" value="提交" v-on:click="submit"/>
</div>
</body>
<script type="text/javascript">
	var login =new Vue({
		el:'#login',
		data:{
			name:'',
			password:''

		},
		methods:{
		  submit:function(){
		  	var name=this.name;
		  	// console.log(name);
		  	var password =this.password;
		  	// console.log(password);
		  	url='/index.php?app=web&act=index-check';
		  	this.$http.post(url,{name:name,password:password},{emulateJSON:true}).then(function(res){
		  		console.log(res.data);
		  		if(res.data.indexOf('登录成功')>-1){
		  			alert('登录成功');
		  			window.location.href="/index.php?app=web&act=index-index";  

		  		}else if(res.data.indexOf('用户名密码错误')>-1){
		  			alert('用户名或密码错误')

		  		}

		  	})

		  }

		}
	})
</script>
</html>