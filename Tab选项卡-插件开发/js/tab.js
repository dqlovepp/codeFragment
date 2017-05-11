/*方法一：用jquery实现*/
/*$(document).ready(function(){
	$("li").mouseover(function(){
		$(this).addClass("actived").siblings("li").removeClass("actived");
		$(".contentItem").eq($(this).index()).addClass("current").siblings(".contentItem").removeClass("current");
		 
	})
})*/

/*方法二：自己开发组件*/
$(function(){
	var Tab = function(tab){
		var _this_ = this;
		//保存单个tab组件
		this.tab = tab;
		//设置默认参数
		this.config = {
			//用来定义鼠标的触发类型
			"triggerType" : "mouseover",
			//用来定义内容切换的效果
			"effect" : "default",
			//默认展示第几个标签
			"invoke" : 2,
			//用来定义tab是否自动切换
			"auto" : 10000
		};
		//如果配置参数存在就扩展掉默认的
		if(this.getConfig()){
			$.extend(this.config,this.getConfig());
		}
		//保存tab标签列表、保存对应的contentItem
		this.tabItems = this.tab.find("ul.tabNav li");
		this.contentItems = this.tab.find(".contentWrap .contentItem");
		//保存配置参数
		var config = this.config;
		if(config.triggerType === "click"){
			this.tabItems.bind(config.triggerType,function(){
				_this_.invoke($(this));
			});
		}else if(config.triggerType === "mouseover"){
			this.tabItems.bind(config.triggerType,function(){
				_this_.invoke($(this));
			});
		};
		//自动切换
		if(config.auto){

		
		//定义一个全局定时器
		this.timer = null;
		//计数器
		this.loop = 0;
		this.autoPlay();
		this.tab.hover(function(){
			window.clearInterval(_this_.timer);
		},function(){
			_this_.autoPlay();
		});
		};
		//设置第几个显示
		if(config.invoke>1){
			this.invoke(this.tabItems.eq(config.invoke-1));
		}
	};
	Tab.prototype = {
		//获取配置参数方法
		 getConfig:function(){
		 	//拿一下tab元素上的data-config
		 	var config = this.tab.attr("data-config");
		 	if(config &&  config!=""){
		 		return $.parseJSON(config);
		 	}else{
		 		return null;
		 	}

		 },
		 //事件驱动函数方法
		invoke:function(currentTab){
			var _this_ = this;
			//要执行tab的选中状态，选中的加上classa ctived；显示对应的tab内容，要根据配置参数 effect属性切换
			var index = currentTab.index();
			//选中状态
			currentTab.addClass("actived").siblings().removeClass("actived");
			//切换内容
			var effect = this.config.effect;
			var contentItems = this.contentItems;
			if(effect ==="default"){
			contentItems.eq(index).addClass("current").siblings().removeClass("current");
			}else if(effect ==="fade"){
				contentItems.eq(index).fadeIn().siblings().fadeOut();
			};
			
		//注意：如果配置了自动，记得把当前的loop设置未当前的

			if(this.config.auto){
				this.loop = index;
			};
		},
		//自动切换
		autoPlay:function(){
			var  _this_ = this;
			var tabItems = this.tabItems;
			var len = tabItems.length; 
			var config = this.config;
			this.timer  = window.setInterval(function(){
				 _this_.loop ++ ;
				if( _this_.loop >= len){
					 _this_.loop = 0;
				}
				tabItems.eq( _this_.loop).trigger(config.triggerType);

			},2000) 
		}
	};
	window.Tab = Tab;
});