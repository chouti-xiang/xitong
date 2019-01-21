<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" /> -->
    <title>印象经验——抽屉箱系列1</title>
    <meta name="description" content="抽屉箱系列，这里是发烧友根据自身情况制定的免费使用场所，能够体验记录，收集，交流，空间">
    <meta name="keywords" content="个人标签，通用标签">
    <link rel="stylesheet" href="/web/css/main.css">
 <script src="https://cdn.staticfile.org/vue/2.4.2/vue.min.js"></script>
 <script src="https://cdn.staticfile.org/vue-resource/1.5.1/vue-resource.min.js"></script>
 <!-- <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script> -->
  <script src="/js/jquery-1.7.1.min.js"></script>
 <script src="/js/utf8-php/ueditor.config.js"></script>
 <script src="/js/utf8-php/ueditor.all.js"></script>

</head>

<body class="result-op" style="overflow-x: visible;">
    <div class="main-wrap">
        <header data-click="{&quot;mod&quot;:&quot;header&quot;}">
            <div class="header-stackup" data-scroll-reveal="enter from the top over 0.66s" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                <div class="ibx-container row clr">
                    <a href="http://i.baidu.com/" target="_self" class="header-logo header-logo-index"></a>
                    <div class="header-tool header-tool-user">
                        <a class="header-tu-img header-tool-user-nick" href="javascript:;">
                            kaka
                        </a>
                        <div class="header-tc-content">
                            <a class="header-tuc-logout" href="#">退出帐号</a>
                        </div>
                    </div>
                   

                    <div class="header-tool header-tool-news">
                        <a href="http://i.baidu.com/msg/messages/list/" class="header-tool-news-num">消息</a>
                       
                    </div>

                </div>
            </div>
        </header>
        <section data-scroll-reveal="enter from the top over 0.66s" class="header-app ibx-container" data-click="{&quot;mod&quot;:&quot;header&quot;}" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
            <ul class="ibx-header-app clr">
                <li class="ibx-header-app-item">
                    <div class="ibx-hai-title ibx-hai-tool">工具</div>
                </li>
                <li class="ibx-header-app-item clr">
                    <span class="ibx-hai-link"><a data-click="{&quot;act&quot;:&quot;sousuo&quot;}" target="_blank" href="http://www.baidu.com/?fr=ibaidu">搜索</a></span>
                </li>
               
                

                <li class="ibx-header-app-item">
                    <div class="ibx-hai-space"></div>
                </li>
                <li class="ibx-header-app-item">
                    <div class="ibx-hai-title ibx-hai-sns">外链</div>
                </li>
                <li class="ibx-header-app-item">
                    <span class="ibx-hai-link"><a data-click="{&quot;act&quot;:&quot;tieba&quot;}" target="_blank" href="http://tieba.baidu.com/home/main?un=mpshenqi&amp;fr=ibaidu&amp;ie=utf-8">百度</a></span>
                    <span class="ibx-hai-link"><a data-click="{&quot;act&quot;:&quot;baike&quot;}" target="_blank" href="http://baike.baidu.com/usercenter?fr=ibaidu">谷歌</a></span>
                </li>
                <li class="ibx-header-app-item">
                    <span class="ibx-hai-link"><a data-click="{&quot;act&quot;:&quot;zhidao&quot;}" target="_blank" href="http://zhidao.baidu.com/uhome?fr=ibaidu">阿里</a></span>
                    <span class="ibx-hai-link"><a data-click="{&quot;act&quot;:&quot;wenku&quot;}" target="_blank" href="http://wenku.baidu.com/user/index?fr=ibaidu">教育</a></span>
                </li>
                
                <li class="ibx-header-app-item">
                    <div class="ibx-hai-space"></div>
                </li>
                <li class="ibx-header-app-item">
                    <div class="ibx-hai-title ibx-hai-life">分类</div>
                </li>
                <li class="ibx-header-app-item">
                    <span class="ibx-hai-link"><a data-click="{&quot;act&quot;:&quot;ditu&quot;}" target="_blank" href="http://map.baidu.com/?fr=ibaidu">地理</a></span>
                    <span class="ibx-hai-link"><a data-click="{&quot;act&quot;:&quot;licai&quot;}" target="_blank" href="https://licai.baidu.com/user/0/center/0?fr=ibaidu">历史</a></span>
                </li>
                <li class="ibx-header-app-item">
                    <span class="ibx-hai-link"><a data-click="{&quot;act&quot;:&quot;tuangou&quot;}" target="_blank" href="http://www.nuomi.com/?cid=002544&amp;fr=ibaidu">财经</a></span>
                </li>
               
            </ul>
        </section>
        <main class="ibx-container row">
            
            <div data-scroll-reveal="" class="row user-panel" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                <div class="col span_5_1">
                    <div id="ibx-uc" data-click="{&quot;mod&quot;:&quot;uc&quot;}">
                        <div class="ibx-inner" id="geren">
                            <div class="ibx-uc-uimg">
                                <div class="ibx-uc-uimg-mask">
                                    <a data-click="{&quot;act&quot;:&quot;uc_set&quot;}" class="ibx-uc-ulink" target="_blank" href="http://www.baidu.com/p/setting/profile/portrait">更换头像</a>
                                </div>
                                <img class="ibx-uc-img" v-bind:src="touxiang">
                                
                            </div>
                            <div class="ibx-uc-unick">
                                <a data-click="{&quot;act&quot;:&quot;uc_name&quot;}" target="_blank" href="http://www.baidu.com/p/setting/profile/basic" class="ibx-uc-nick">{{name}}</a>
                                
                            </div> 
                            <div class="ibx-uc-utool">
                                <span class="ibx-uc-utool-cover"></span>
                                <span class="ibx-uc-utool-cover ibx-uc-utool-cover-mask"></span>
                                <div class="ibx-uc-utool-title">认证 :</div>
                                <div class="ibx-uc-utool-content clr">
                                    <a data-click="{&quot;act&quot;:&quot;icon_mobile&quot;}" class="ibx-uc-utool-mobile current" target="_blank" href="http://passport.baidu.com/center" data-title="绑定手机">
                                    </a>
                                    <a data-click="{&quot;act&quot;:&quot;icon_email&quot;}" class="ibx-uc-utool-envelope current" target="_blank" href="http://passport.baidu.com/center" data-title="绑定邮箱">
                                    </a>
                                </div>
                            </div> 
                            <div class="ibx-uc-uop">
                                <div class="ibx-uc-uop-item first">
                                    <a data-click="{&quot;act&quot;:&quot;uc_dingdan&quot;}" target="_blank" href="http://dingdan.baidu.com/my/order/" title="订单中心">
                                        订单中心
                                    </a>
                                </div>
                                <div class="ibx-uc-uop-item">
                                    <a data-click="{&quot;act&quot;:&quot;uc_setting&quot;}" target="_blank" href="http://passport.baidu.com/" title="帐户设置">
                                        帐户设置
                                    </a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col span_5_4">
                    <div id="ibx-cal" data-click="{&quot;mod&quot;:&quot;cal&quot;}">
                        <div class="ibx-inner" id="ibx-cal-content"><div class="ibx-cal-box clr"><div id="ibx-cal-box"><div class="ibx-cal-box-l"><a href="http://www.baidu.com/s?ie=utf-8&amp;wd=%E7%A9%BA%E6%B0%94%E8%B4%A8%E9%87%8F" target="_blank" class="ibx-weather-quality level0" title="空气质量：空气质量优，pm2.5：37">空气质量优</a><a data-click="{&quot;act&quot;:&quot;cal_local&quot;}" href="http://map.baidu.com/?newmap=1&amp;ie=utf-8&amp;from=ibaidu&amp;s=s%26wd%3D%E5%8C%97%E4%BA%AC" target="_blank" class="ibx-location">北京</a><div class="ibx-date">8月23日</div><div class="ibx-lunar clr"><span class="ibx-day">周四</span><span class="ibx-luanr-ctx">七月十三</span></div><a href="http://www.baidu.com/s?ie=utf-8&amp;wd=%E5%A4%A9%E6%B0%94" target="_blank" class="ibx-weather-temp"><img src="yinxiang/1.png" class="ibx-weather-img" title="晴"><span class="ibx-weather-high" title="最高温度31°">31°</span><span class="ibx-weather-low" title="最低温度21°">21°</span></a></div><div class="ibx-cal-box-r" id="ibx-cal-box-r"><ul class="ibx-cal-dlist clr" style="width: 338px; margin-left: 0px;"><li class="ibx-cal-ditem ibx-cal-digame"><a data-click="{&quot;act&quot;:&quot;cal_close&quot;}" href="javascript:;" class="ibx-cal-ditem-close" data-uuid="dcf4c7333855862bbf1a9b653c912cd7" data-uri="calendars/ucvs/activity/youxi"></a><div class="ibx-cal-ditem-game"><a href="http://koubei.baidu.com/activity/travel?fr=ibaidu" target="_blank"><img class="ibx-cal-game-img" src="yinxiang/koubei20160504.jpg"></a><div class="ibx-cal-game-ctx"><div class="ibx-cal-ditem-bg"></div><div class="ibx-cal-game-detail"><a title="旅游维权来百度口碑" href="http://koubei.baidu.com/activity/travel?fr=ibaidu" target="_blank" class="ibx-cal-game-title">旅游维权来百度口碑</a></div></div></div></li><li class="ibx-cal-ditem ibx-cal-diadd"><a data-click="{&quot;act&quot;:&quot;cal_add&quot;}" href="javascript:;" class="ibx-cal-ditem-addbtn"><span class="ibx-cal-ditem-addicon"></span>新建提醒</a></li></ul></div></div><div class="ibx-cal-dpage"><div class="ibx-cal-dpage-bg"></div><div class="ibx-cal-dpage-prev disabled"></div><div class="ibx-cal-dpage-next"></div></div></div><div id="ibx-cal-addPop" class="ibx-cal-addPop"><div class="ibx-cal-apc"><a href="javascript:;" class="ibx-cal-apc-close" title="关闭"></a><div class="ibx-cal-apc-title">新增订阅提醒</div><div class="ibx-cal-apc-con"><a href="javascript:;" data-click="{&quot;act&quot;:&quot;cal_add&quot;}" class="ibx-cal-apc-btn ibx-cal-apc-addbtn">日程</a><a target="_blank" data-click="{&quot;act&quot;:&quot;zhuiju_add&quot;}" href="http://v.baidu.com/?fr=ibaidu" class="ibx-cal-apc-btn">视频追剧</a></div><div class="ibx-cal-triangle"><span class="ibx-cal-triangle-border"></span><span class="ibx-cal-triangle-ctx"></span></div></div></div><div class="ibx-cal-pop-mask"></div><div class="ibx-cal-tab clr"><div class="ibx-cal-tab-op clr"><a href="javascript:;" data-click="{&quot;act&quot;:&quot;cal_add_all&quot;}" class="ibx-cal-tab-add"></a><a href="javascript:;" data-click="{&quot;act&quot;:&quot;cal_conf&quot;}" class="ibx-cal-tab-conf"></a></div></div></div>
                    </div>
                </div>
                
            </div>

            <div data-scroll-reveal="" class="row card-panel"  data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                <span class="rule-wrap"><a id="video" name="video" class="rule"></a></span>
                <div class="col span_4_4">
                    <div class="ibx-even">
                        <div class="ibx-inner" id="ibx-mod-video">
                        <div class="ibx-inner-title" id='fenlei'>
                            <a  target="_blank" href="http://v.baidu.com/" class="ibx-inner-title-ctx">媒体空间</a>
                            <ul class="ibx-inner-title-tab">
                                <li  class="ibx-inner-title-tabitem ibx-video-my OP_LOG_TITLE">我的分类</li>
                                <li  class="ibx-inner-title-tabitem ibx-video-hotTop OP_LOG_TITLE current">亲情推荐</li>
                            </ul>
                            <a herf='#' class="OP_LOG_TITLE card-enter-video-link" @click='miniPrograme' >关注我的小程序</a>
                            <div style="width: 250px;height: 140px;position: absolute;right: 0;top: 50px;" v-if='tag'>
                            <img src="/web/resources/xiaochengxu.jpg" style="width: 100px;height: 100px"></img>
                               
                            </div>
                        </div>
                        <div class="ibx-inner-content" id="ibx-video-list">
                        <div class="hot-video-tab">
                            <span class="hot-video-tab-item hot-video-tab-tv OP_LOG_TITLE"  v-bind:class="{'current':selected ==1}" data-id="0" @click='movie()'>电影</span>
                            <span class="hot-video-tab-item hot-video-tab-movie OP_LOG_TITLE"  v-bind:class="{'current':selected ==2}"><router-link to="/foo" @click='dianshiju()'>电视剧</router-link></span>
                        </div>
                        <div id="hot-video" class="my-video">
                            <ul class="ibx-video-list" style="width: 2868px; left: 0px;" id="hot-video1">
                            <li class="ibx-video-item" v-for="(value, key, index) in item"><a target="_blank" :href="value.url"><img v-bind:src="value.thumb" :alt="value.title" width="130"></a><div class="ibx-video-detail"><em class="ibx-video-dtitle-rank front ">{{key+1}}</em><a target="_blank" class="ibx-video-dtitle" :href="value.url" :title="value.title">{{value.title}}</a><label class="ibx-video-actor" :title="key">{{key}}</label><label class="ibx-video-tag" :title="value.type">{{value.type}}</label></div></li>
                            </ul>
                        </div>
                        <div class="ibx-video-mask"></div>
                        </div></div>
                    </div>
                </div>
            </div>
            <div data-scroll-reveal="" class="row card-panel" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                <span class="rule-wrap"><a id="xinwen" name="xinwen" class="rule"></a></span>
                <div class="col span_4_4">
                    <div class="ibx-even">
                        <div class="ibx-inner" id="ibx-mod-xinwen">
                        <div class="ibx-inner-title">
                            <a target="_blank" href="http://xinwen.baidu.com/" class="ibx-inner-title-ctx">激情推荐</a>
                            <ul class="ibx-inner-title-tab">
                                <li data-click="{&quot;act&quot;: &quot;card_xinwen_pernews&quot;}" class="ibx-inner-title-tabitem ibx-xinwen-pernews OP_LOG_TITLE current">工具类</li>
                                <li data-click="{&quot;act&quot;: &quot;card_xinwen_hot&quot;}" class="ibx-inner-title-tabitem ibx-xinwen-hot OP_LOG_TITLE">生活类</li>
                            </ul>
                            <div class="xinwen-title-link-container OP_LOG_TITLE"><a href="http://app.news.baidu.com/?src=pctop" class="OP_LOG_TITLE" data-click="{&quot;act&quot;: &quot;card_xinwen_client&quot;}" target="_blank">关注我的公众号</a></div>
                        </div>
                        <div class="ibx-inner-content" id="ibx-xinwen">
                        <div id="xinwen-pernews" class="xinwen-pernews"><div class="xinwen-common-tab"><div class="xinwen-normal-top"><span class="xinwen-normal-top-title">推荐鸡汤</span><span class="xinwen-normal-top-line"></span></div><div class="ibx-card-pager"><span class="ibx-card-pager-prev"></span><span class="ibx-card-pager-item current" data-page="0"></span><span class="ibx-card-pager-next"></span></div></div>
                        <div id="xinwen-pernews-main" class="xinwen-pernews-main">
                        <ul class="xinwen-normal-list xinwen-pernews-list" style="width: 976px; left: 0px;" id="hot_article">
                            <li class="xinwen-pernews-item"  v-for="article in data_hot_article">
                                <div class="xinwen-pernews-item-news"><a class="xinwen-pernews-item-link" target="_blank" href="http://tj.people.com.cn/n2/2018/0823/c375366-31968703.html"><img class="xinwen-pernews-item-img" :src="article.thumb" alt=""></a><div class="xinwen-pernews-item-detail detail-type-img"><a class="xinwen-pernews-item-title" target="_blank" href="http://tj.people.com.cn/n2/2018/0823/c375366-31968703.html" title="article.title">{{article.title}}</a>
                                    <!-- <p class="xinwen-pernews-item-info"><span class="xinwen-pernews-item-read">0</span><span class="xinwen-pernews-item-up">0</span><span class="xinwen-pernews-item-down">0</span></p> -->
                                </div></div>
                            </li>
                        </ul>
                    </div>
            <div class="ibx-xinwen-mask hidden"></div></div></div></div>
                    </div>
                </div>
            </div>
                                   
            
                                <div data-scroll-reveal="" class="col span_4_2" data-click="{&quot;mod&quot;: &quot;card_koubei&quot;}" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                    <span class="rule-wrap"><a id="koubei" name="koubei" class="rule"></a></span>
                    <div class="ibx-odd" id="zz">
                        <div id="ibx-mod-koubei" class="ibx-inner ibx-mod-koubei">
                          <div class="ibx-inner-title">
                          <a data-click="{&quot;act&quot;: &quot;card_koubei_link&quot;}" target="_blank" href="http://koubei.baidu.com/" class="ibx-inner-title-ctx">醍醐灌顶</a>
                          <ul class="ibx-inner-title-tab">
                            <li data-click="{&quot;act&quot;: &quot;card_koubei_mine&quot;}" class="ibx-inner-title-tabitem ibx-koubei-mine OP_LOG_TITLE" v-bind:class="{'current':selected ==1}" @click="gongzuo()">我的工作</li>
                            <li data-click="{&quot;act&quot;: &quot;card_koubei_turth&quot;}" class="ibx-inner-title-tabitem ibx-koubei-turth OP_LOG_TITLE" v-bind:class="{'current':selected ==2}" @click="shenghuo()">我的生活</li>
                            <li data-click="{&quot;act&quot;: &quot;card_koubei_hot&quot;}" class="ibx-inner-title-tabitem ibx-koubei-hot OP_LOG_TITLE"  v-bind:class="{'current':selected ==3}" @click="ganwu()">我的感悟</li>
                          </ul>
                            <div class="koubei-title-link-container OP_LOG_TITLE">
                            <a href="http://koubei.baidu.com/truth/wall?fr=ibaidu" class="OP_LOG_TITLE enter-koubei-link koubei-wall-link" data-click="{&quot;act&quot;: &quot;card_open_koubei_wall&quot;}" target="_blank" style="display: none;">进入真相墙 &gt;</a><a href="http://koubei.baidu.com/home?fr=ibaidu" class="OP_LOG_TITLE enter-koubei-link koubei-home-link" data-click="{&quot;act&quot;: &quot;card_open_koubei_home&quot;}" target="_blank" style="display: inline;">进入我的口碑 &gt;</a></div></div><div class="ibx-inner-content" id="ibx-koubei"><div id="koubei-mine-container" class="koubei-mine-container "><div class="koubei-mine-top"><div class="ibx-card-pager"><span class="ibx-card-pager-prev"></span><span class="ibx-card-pager-item current" data-page="0"></span><span class="ibx-card-pager-item" data-page="1"></span><span class="ibx-card-pager-item" data-page="2"></span><span class="ibx-card-pager-next"></span></div></div><div id="koubei-mine-list">

                            <ul class="koubei-mine-list"  >
                            <li class="koubei-mine-item" v-for="(value, key, index) in item"><div class="koubei-mine-item-container"><p class="koubei-mine-item-title"><a class="OP_LOG_TITLE" target="_blank" :title="value.title" :href="value.url" data-click="{&quot;act&quot;: &quot;card_koubei_item_message&quot;}" v-html="value.tag"></a></p><span class="koubei-mine-item-time">{{value.date}}</span></div></li>
                            </ul>
                            </div></div></div></div>
                    </div>
                </div>
                                                <div data-scroll-reveal="" class="col span_4_2 OP_LOG_LINK" data-click="{&quot;mod&quot;:&quot;card_mgr&quot;,&quot;act&quot;:&quot;msg_click&quot;}" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                    <div class="ibx-even editCard" id="editCard">
                        <div class="ibx-inner editCard-inner">
                            <div class="editCard-inner-add" v-on:click="submit"></div>
                            <div class="editCard-inner-tip"><i></i><p>添加卡片</p></div>
                        </div>

                    </div>
                </div>
                            </div>

        </main>
       
       <div>
			
       <div>

        <footer class="row" data-click="{&quot;mod&quot;:&quot;footer&quot;}">
            ©2018 Baidu <a class="beforebd" href="http://www.baidu.com/duty/">使用百度前必读</a> 京ICP证030173号
        </footer>

        
        </div>


    </div>
    <!-- 添加新页卡 bengin-->
       <div id="tx-tj">
         <div class="tx-tj-tj">
    	<div><input type="text" ref="title" placeholder="请在这里输入标题" class="title"  /></div>
    	<div><input type="text" v-model="author" placeholder="请输入作者"  class="author" /></div>
		  <script id="container" name="content" type="text/plain">
       <div>请从这里开始写正文</div> 
    </script>

		<div class="tx-tj-qt">
			<div class="tx-tj-qt-titile">封面和摘要</div>
			<div>
			<div class="tx-tj-thumb"><div class="tx-tj-thumb-logo"><i class="icon-add_css"></i></div><span>选择封面</span></div>
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
			<select name="category"  >
				<option value="">选择一个分类</option>
				<option v-for="(value, key, index) in FIDDATA" :value="key">{{value.cname}}</option>
			</select>
			</div>
		</div>
		<div>来源</div>
		<div><button @click="submit()">提交</button></div>
		</div>
    </div>
 <!-- 添加新页卡 end-->
<style type="text/css">
	#tx-tj{top:80px ;position: absolute;width:100%;margin:0 auto;height:100%;z-index: 6;}
	.tx-tj-tj{width: 1000px;margin:0 auto;background-color: white;border-left:1px solid #ddd;border-right:1px solid #ddd;}
	.tx-tj-qt{border-top: 1px solid #ebebeb;padding: 10px 10px 25px 10px ;display: table;}
	.tx-tj-qt .tx-tj-qt-titile{margin:15px 0;}
	.title{ margin: 2px 0;padding-right: 98px;box-sizing: border-box;font-size: 24px;font-weight: 500;height: 46px;line-height: 46px;width: 100%;background-color: transparent;border: 0;outline: 0;padding-left: 7px;}
    .author{padding-left: 7px;margin: 2px 0;padding-right: 98px;box-sizing: border-box;width: 100%;background-color: transparent;border: 0;outline: 0;}
    .tx-tj-thumb{border:2px dashed #ebebeb;padding:5px;width: 200px;height: 85px;text-align: center;float: left;}
    .tx-tj-thumb span{color:green;font-size:16px;width:100%;text-align: center;display: block;margin-top: 5px;}
    .tx-tj-thumb .tx-tj-thumb-logo{margin-top:13px;}
/*这个地方使用了伪类 如:before，content就是为了美化标签做的背景，如果不想美化，只用线条，那么这个写空，然后给长宽*/
	.tx-tj-thumb i{clear: both;}
	.tx-tj-qt i{display: inline-block;width: 24px;height: 24px;position: relative;}
    .tx-tj-qt i:before{width: 20px;height: 2px;left: 2px;top: 11px;content: "";display: block;position: absolute;background-color: #43b548;}
    .tx-tj-qt i:after{width: 2px;height: 20px;left: 11px;top: 2px;content: "";display: block;position: absolute;background-color: #43b548;}
    .tx-tj-qt .tx-tj-description{float:left;margin-left: 10px;height:100px;width: 500px}
    .tx-tj-qt .tx-tj-description textarea{height:100%;width:100%;resize:none}
    .editCard-inner-tip i{clear: both;}
    .editCard-inner-tip i{display: inline-block;width: 48px;height: 48px;position: relative;}
    .editCard-inner-tip i:before{width: 40px;height: 4px;left: 4px;top: 22px;content: "";display: block;position: absolute;background-color: #43b548;}
    .editCard-inner-tip i:after{width: 4px;height: 40px;left: 22px;top: 4px;content: "";display: block;position: absolute;background-color: #43b548;}
    /*分类*/
    .tx-tj-category {margin-left:10px;}
    .tx-tj-category .tx-tj-qt-titile{margin:10px 0;}                
</style>

</body></html>
<script type="text/javascript">
    <!-- 实例化编辑器 -->
   var ue = UE.getEditor('container',{
   	initialFrameHeight:300,
   	autoFloatEnabled:true

   });
    
 
  var data_hot_video =[
               {title:"我们的四十年",url:"www.baidu.com",thumb:"/web/resources/1.jpg",type:"热剧"},
               {title:"我们的四十年",url:"www.baidu.com", thumb:"/web/resources/1.jpg",type:"热剧"}
  ]
  var data_hot_article =[
                {title:"甄子丹：勇敢走每一步 什么困难都可解决",thumb:"/web/resources/3.jpg"},
                {title:"小饼饼：2019加油小饼饼",thumb:"/web/resources/4.jpg"}
  ]
  var geren =new Vue({
    el:'#geren',
    data:{
        touxiang:'/web/resources/2.jpg',
        name:'kaka'
    }
  })

  var koubei = new Vue({
    // 选项
    el:'#zz',
   
    data:{
        item:'',
        selected:1
    },
   mounted: function() {
        url = '/index.php?app=web&act=index-initDATA';
            this.$http.get(url,{emulateJSON:true}).then(function(res){
                console.log(res.body.data);
                this.item =res.body.data
            })
    },
    methods: {
        details: function() {
            return  this.tag ;
        },
        gongzuo:function(){
            // this.item =data_koubei;
            this.selected =1;
            url = '/index.php?app=web&act=index-addCART';
            this.$http.post(url,{selected:this.selected},{emulateJSON:true}).then(function(res){
                console.log(res.body.data);
                this.item =res.body.data
            })
        },
        shenghuo:function(){
            this.selected =2;
            url = '/index.php?app=web&act=index-addCART';
            this.$http.post(url,{selected:this.selected},{emulateJSON:true}).then(function(res){
                console.log(res.body.data);
                this.item =res.body.data
                console.log(this.item)
            })
        },
        ganwu:function(){
            this.selected=3;
            url = '/index.php?app=web&act=index-addCART';
            this.$http.post(url,{selected:this.selected},{emulateJSON:true}).then(function(res){
                console.log(res.body.data);
                this.item =res.body.data
            })
        }
  }})

  var hot_video = new Vue({
    el:"#ibx-video-list",
    data:{
        item:'',
        selected:1
    },
  mounted: function() {
        url = '/index.php?app=web&act=index-initDATAM';
            this.$http.get(url,{emulateJSON:true}).then(function(res){
                console.log(res.body.data);
                this.item =res.body.data
            })
    },
    methods: {
        details: function() {
            return  this.tag ;
        },
        movie:function(){
            this.selected =1;
            url = '/index.php?app=web&act=index-movieCART';
            this.$http.post(url,{selected:this.selected},{emulateJSON:true}).then(function(res){
                console.log(res.body.data);
                this.item =res.body.data
            })
        },
        dianshiju:function(){
            this.selected =2;
            url = '/index.php?app=web&act=index-movieCART';
            this.$http.post(url,{selected:this.selected},{emulateJSON:true}).then(function(res){
                console.log(res.body.data);
                this.item =res.body.data
                console.log(this.item)
            })
        }
  }
})
  var fenlei =new Vue({
    el:'#fenlei',
    data:{
        tag:false
    },
    methods:{
        miniPrograme:function(){
            if(this.tag==false){
            this.tag=true;}
            else{
                this.tag =false
            }

        }
    }
  })
   

  var hot_article =new Vue({
    el:"#hot_article",
    data:data_hot_article,

  })

  var editCard = new Vue({
  	el:"#editCard",
  	methods: {
  		submit:function() {
  			alert(1)
  		}
  	}
  })


  var tx = new Vue({
  	el:"#tx-tj",
  	data:{title1:null,author1:null,author:'',selected:'',FIDDATA:''},
  	mounted: function() {
        url = '/index.php?app=web&act=index-getPID';
        this.$http.get(url,{emulateJSON:true}).then(function(res){
            this.FIDDATA =res.body.data;
        })
    },
  	methods:{
  		submit:function() {
  			//发送post请求，需要引用一个用于ajax的vue
  			url = '/index.php?app=web&act=index-addCART';
  			//这个没用，只是为了训练赋值
  			 this.author1 = this.author;
  			 this.titile1 = this.$refs.title.value;
  			 //$refs.title.value 和微信小程序一样，把数据存放在全局变量中区，配合ref=“title”用，
  			 //this.author 用于双向绑定，v-model 模式，也可以用于取值
  			this.$http.post(url, {title:this.$refs.title.value,author:this.author}, {emulateJSON:true}).then(function(res){
  				console.log(this);
  				console.log(res);
  				console.log(1);
  			},function(res){
  				console.log(2);
				console.log(res);
				console.log(2);
  			})
  		},
  		getPid:function() {
 			url = '/index.php?app=web&act=index-getPID';
  		
  			this.$http.post(url, {pid:this.selected}, {emulateJSON:true}).then(function(res){
  				this.FIDDATA = res.data.data;
  				console.log(res.data.data);
  				
  			},function(res){
  				
				console.log(res);
				
  			})
 		}
  	}
  })
  // var koubei1 =new Vue({
  //   el:"#shenghuo",
  //   data:function(){
  //       return{
  //           bbb:''
  //       }
  //   },
  //   methods:{
  //       shenghuo:function(){
  //           alert(22222)
  //           url = '/index.php?app=web&act=index-addCART';
  //           this.$http.post(url,{emulateJSON:true}).then(function(res){
  //               console.log(res.body.data);
  //               this.bbb =res.body.data
               
  //           })

  //       }
  //       tell:function(){
  //           eventBus.$emit("tellbbb",this.bbb)
  //       }
  //   },
    
  // })
  // var eventBus =new Vue({
  //   eventBus.$on("haha",function(){

  //   })
  // })
</script>

