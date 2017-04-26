/*
 * BlackBox - jQuery Plugin
 * version: 0.7 (31/08/2012)
 * @requires jQuery v1.6 or later
 *
 *
 * Copyright 2012 Alvin Tin  - tin@alvin.im , Xworm - xworm@xworm.net 
 * Company toWords - toWords.com
 * License : MIT License / GPL License
 * 
 */

//需要在执行前检测是否存储placeHodler，存在的话将其复位后继续运行，需写在_init_方法中

(function (window, document, $, undefined){
	var W = $(window),
			D = $(document);
	BlackBox = function(user_config){
		//全局默认参数，可以在实例化的时候修改，也可以在使用对于方法的时候修改
		this.config = {
			clickBackgrounEffert:'shake',	//用户点击弹窗四周动画效果，可选shake以及close，shake为窗口抖动提醒，close为关闭
			backgroundColor:false,	//额外设置背景颜色，建议对css进行修改
			blackgroundImage:false,//额外设置背景图片，建议对css进行修改
			backgroundImageType:false,//额外设置背景图片样式，可选repeat 和fullscreen，repeat为图像重复，fullscreen为图像自适应
			forceLoad:true,//是否要求iframe窗口在完全载入完毕才显现，默认为true
			allowPromptBlank:false,//是否允许prompt没有输入的时候提交，默认为false，提交会导致窗口抖动
			allowBoxScrolling:true,//是否允许iframe和inline中出现滚动条
			displayClose:true//是否在iframe和inline隐藏关闭按钮
		}
		if(user_config){
			for (var _key in user_config){
				if(_key in this.config){this.config[_key] = user_config[_key]}
			}
		}
		//判断是否有打开的弹窗
		this.is_box_open = false;
		//已载入背景图片信息
		this._loaded_attachments_list = {}
	}
	
	//alert方法
	BlackBox.prototype.alert = function(text,callback){
		var callback = this.getCallBack("onConfirm",true,[callback]),
				_close = this.closeBox;
		this.createGap();
		var html = "<div class = 'system alert'><p>"+text+"</p></div>"
		this.createBox(html);
		this.createButton(_onConfirm=function(){
			_close();
			callback();
		},false,false)
		return true;
	}
	//confirm方法
	BlackBox.prototype.confirm = function(text,callback){
		this.createGap();
		var html = "<div class = 'system confirm'><p>"+text+"</p></div>",
				_on_confirm = this.getCallBack("onConfirm",true,[callback]),
				_on_cancel = this.getCallBack("onCancel",false,[callback]),
				_close = this.closeBox;
		this.createBox(html);
		this.createButton(_onConfirm=function(){
			_close();
			_on_confirm();
		},_onCancel = function(){
			_close();
			_on_cancel();
		},false
		)
		return true;
	}
	
	//prompt方法
  	BlackBox.prototype.prompt = function(text,settings,callback,Default){
		this.createGap();
		var html = "<div class = 'system prompt'><p>"+text+"</p><p><input id='BlackBoxinput'  /></p></div>"
		this.createBox(html);
		var $this  = $("input#BlackBoxinput"),
				_default_value = this.getConfig('Default',true,[settings,callback,Default]),
				_on_confirm = this.getCallBack("onConfirm",true,[settings,callback,Default]),
				_on_cancel = this.getCallBack("onCancel",false,[settings,callback,Default]);
		if(_default_value)$this.attr("placeholder",_default_value)
    	$this.focus();
		var _close = this.closeBox;
		this.createButton(_onConfirm=function(){
			var inputText = $this.val();
		  	if(!inputText&&!settings['allowPromptBlank']){
  		  		$.BlackBoxShake()
		  	}else{
			_close();
			_on_confirm(inputText);
		  }
		},_onCancel = function(){
			_close();
			_on_cancel();
		},false)
		return true;
	}
	
	//inline方法
	BlackBox.prototype.inline = function(target,settings,callback){
		var $target = $(target),
		 		width = this.getConfig('width',false,[settings,callback])*1 || $target.width(),
				height = this.getConfig('height',false,[settings,callback])*1 || $target.height(),
				_allow_box_scrolling =  this.getConfig('allowBoxScrolling',false,[settings,callback]),
				_on_close = this.getCallBack("onClose",true,[settings,callback]),
				_display_close = this.getConfig("displayClose",false,[settings,callback]),
				__createButton = this.createButton,
				_close = this.closeBox;
		this.createGap();
		this.createBox("<div id ='BlackBoxIframe'></div>",width,height);
		$target.wrap("<div id = 'BlackBoxPlaceHolder'></div>").appendTo($("#BlackBoxIframe")).show();
		if(!_allow_box_scrolling)$("#BlackBoxIframe").css("overflow","hidden");
		if(_display_close){
			this.createButton(false,false,_onClose=function(){
				$(target).hide().appendTo($("#BlackBoxPlaceHolder")).unwrap();
				_close();
				_on_close();
			})}
		return true;
	}
	
	//iframe方法
	BlackBox.prototype.iframe = function(url,settings,callback){
		var _set_width = this.getConfig('width',false,[settings,callback])*1,
				_set_height = this.getConfig('height',false,[settings,callback])*1,
				_allow_box_scrolling =  this.getConfig('allowBoxScrolling',false,[settings,callback]),
				_force_load =  this.getConfig('forceLoad',false,[settings,callback]),
				_on_close = this.getCallBack("onClose",true,[settings,callback]),
				_display_close = this.getConfig("displayClose",false,[settings,callback]),
				__createButton = this.createButton,
				_close = this.closeBox,
				_load = this.load,
				_ready = this.ready;
		this.createGap();
		function _getResize_(){
			var W_width = W.width(),
					W_height = W.height();
			width = _set_width ? Math.min(_set_width,(W_width-180)) :  W_width-180;
			height = _set_height ? Math.min(_set_height,(W_height-150)) : W_height-150;
			$("#BlackBoxIframe").attr({
						'width':width,
						'height':height
					});
			return [width,height]
		}
		var _result = _getResize_()
		var html = '<iframe id="BlackBoxIframe"  frameborder="0" hspace="0" width=' + _result[0] + ' height=' +_result[1] +' src='+url+ ($.browser.msie ? ' allowtransparency="true"' : '') + '></iframe>'
		this.createBox(html,_result[0],_result[1]+5 ,true);
		$this = $("#BlackBoxIframe");
		if(!_allow_box_scrolling)$this.attr("scrolling","no");
		function _setButton(){
		if(_display_close){
			__createButton(false,false,_onClose=function(){
			_close();
			_on_close();
		})}}
		if(_force_load){
			_load();
			$this.hide();
			$this.load(function(){
				_ready();
				$this.show();
				_setButton();
			})
		}else{_setButton();}
		$(window).resize(function(){
			var _result = _getResize_(),
					 W_width = W.width(),
					W_height = W.height();
			$("#BlackBoxContent").css({
				left:(W_width-_result[0]-18)/2,
				top:(W_height-_result[1]-23)/2
			});
			$("#BlackBoxContent > .Outer , #BlackBoxContent ").css({
				width:_result[0]+18,
				height:_result[1]+23
			});
		})
	}

	//开始载入，参数设为true将设置隔离层
	BlackBox.prototype.load= function(create_gap){
		if(create_gap)this.createGap();
		$("#BlackBox").append("<div id='BlackBoxload'>载入中</div>")
		function _loadResize(){
		var W_width = W.width(),
				W_height = W.height();
		$("#BlackBoxload").css({
			left:(W_width-$("#BlackBoxload").width())/2,
			top:(W_height-$("#BlackBoxload").height())/2
		})
		}
		_loadResize();
		$(window).resize(function(){
			_loadResize();
		})
	}
	
	//载入完毕，设置参数为true的话将删除整个内容
	BlackBox.prototype.ready= function(remove_all){
		$("#BlackBoxIframe").hide().appendTo($("#BlackBoxPlaceHolder")).unwrap();	
		$("#BlackBoxIframe").children().unwrap().hide();
		if (remove_all)this.closeBox();
		else $("#BlackBoxload").remove();
	}
	
	//关闭整体
	BlackBox.prototype.closeBox = function(){
		$("#BlackBoxIframe").hide().appendTo($("#BlackBoxPlaceHolder")).unwrap();	
		$("#BlackBoxIframe").children().unwrap().hide();
		if(this.is_box_open){
			$("#BlackBox").remove();
		}
		is_box_open = false;
	}
	
	//更换阻挡层的样式
	BlackBox.prototype.setBackground = function(_color,_image,_type,_opacity){
		var	_color = _color || this.getConfig("backgroundColor",false,[]),
				_image = _image || this.getConfig("blackgroundImage",false,[]),
				_type = _type || this.getConfig("backgroundImageType",false,[]),
				_opacity = _opacity*1 || 0.6,
				_loaded_attachments_list = this._loaded_attachments_list;
		this.config["backgroundColor"] = _color;
		this.config["blackgroundImage"] = _image;
		this.config["backgroundImageType"] = _type;
		 _BlackBoxAttachmentFullScreen = $.noop;
		 if($("#BlackBoxAttachmentContainer").html())$("#BlackBoxAttachmentContainer").remove();
		if(_type ==  "repeat"){
				$("#BlackBoxGap").css({
					'background-color':_color,
					'background-image':'url('+_image+')',
					'background-repeat':'repeat'
				})
		}
		if(_type ==  "fullscreen"){
			$("#BlackBox").append("<div id = 'BlackBoxAttachmentContainer'><img id = 'BlackBoxAttachment' src = '"+_image+"'/ ></div>")
			$("#BlackBoxAttachment").fadeTo(0,0).load(function(){
				$(this).fadeTo('fast',1);
				//修复chrome下的关于载入相同图片特殊处理
				if (_image in _loaded_attachments_list){
					var _attachment_date = _loaded_attachments_list[_image].split("-");
					_attachment_width = _attachment_date[0];
					_attachment_height = _attachment_date[1];
				}else{
					var _back_attachment = new Image();
					_back_attachment.src = _image;
					_attachment_width = _back_attachment.width;
					_attachment_height = _back_attachment.height;
					_loaded_attachments_list[_image] = _attachment_width+"-"+_attachment_height;
				}
				_BlackBoxAttachmentFullScreen = function(width,height){
					$("#BlackBoxAttachmentContainer").css({
						'height':height,
						'width':width
					})
					var _ratio = Math.max((width/(_attachment_width*1.0)),(height/_attachment_height*1.0));
					$("#BlackBoxAttachment").attr({
						'width':_ratio*_attachment_width,
						'height':_ratio*_attachment_height
					})
				}
				_BlackBoxAttachmentFullScreen(W.width(),W.height())
			})
		}
		$("#BlackBoxAttachment").unbind( "click" )
		if(this.config.clickBackgrounEffert=="shake"){
			$("#BlackBoxAttachment").click(function(){
				$.BlackBoxShake()
			})
		}else if(this.config.clickBackgrounEffert=="close"){
			$("#BlackBoxAttachment").click(function(){
				_close();
			})
		}
		function _init_(){
			var W_width = W.width(),
					W_height = W.height();
			_BlackBoxAttachmentFullScreen(W_width,W_height)
			$("#BlackBoxGap").css({
				width:W_width,
				height:W_height
			}).fadeTo(0,_opacity);
		}
		_init_();
		$(window).resize(function(){
			_init_();
		})
	}
	
	//根据需要的callback类型生成按钮
	BlackBox.prototype.createButton = function(_onConfirm,_onCancel,_onClose){
		if(_onConfirm || _onCancel){
			$("#BlackBoxContent > .Inner").append("<div id = actions></div>")
			if(_onConfirm){
				$(".Inner > #actions").prepend("<div class = confirm>确认</div>")
				$("#actions > .confirm").click(function(){
					_onConfirm();
				})
			}
			if(_onCancel){
				$(".Inner > #actions").prepend("<div class = cancel>取消</div>")
				$("#actions > .cancel").click(function(){
					_onCancel();
				})
			}
		}
		if(_onClose){
			$(".Outer").prepend("<div class = close>关闭</div>")
			$(".Outer > .close").click(function(){
				_onClose();
			})
		}
	}

	//生产最终弹出窗体，其中width和height为可选内容
	BlackBox.prototype.createBox= function(html,width,height,change){
		$("#BlackBox").append("<div id=BlackBoxContent></div>")
		var content = "<div class = Outer></div><div class = Inner>"+html+"</div>",
				_close = this.closeBox;
		$("#BlackBoxContent").html(content).fadeIn("fast")
		inner_width = width || $("#BlackBoxContent > .Inner").width();
		inner_height = height || $("#BlackBoxContent > .Inner").height();
		function _init_(){
			var W_width = W.width(),
					W_height = W.height(),
					U_width = inner_width+18,
					U_height = inner_height+18;
			$("#BlackBoxContent").css({
				left:(W_width-U_width)/2,
				top:(W_height-U_height)/2,
				width:U_width,
				height:U_height
			});
			$("#BlackBoxContent > .Outer").css({
				width:U_width,
				height:U_height
			}).fadeTo(0, 0.6);
		}
		_init_();
		if(this.config.clickBackgrounEffert=="shake"){
			$("#BlackBoxGap").click(function(){
				$.BlackBoxShake()
			})
		}else if(this.config.clickBackgrounEffert=="close"){
			$("#BlackBoxGap").click(function(){
				_close();
			})
		}
		if(! change){
			$(window).resize(function(){
				_init_();
			})}
	}

	//产生阻挡层的方法，隔离用户与原有页面之间的操作
	BlackBox.prototype.createGap = function(){
		this._init_();//初始化
		$("body").append("<div id='BlackBox'><div id='BlackBoxGap'></div></div>")
		//取保隔离层始终大小全屏，同时部分兼容IE6
		var W_width = W.width(),
				W_height = W.height();
		if ( $.browser.msie && $.browser.version =="6.0" ){
			$(window).scroll(function(){
				$("#BlackBox").css({
					position:"absolute",
					top:$(document).scrollTop()
				})
			})
		}
		//生产隔离样式
		this.setBackground();
	};

	//获取最终设置
	BlackBox.prototype.getConfig = function(config_name,is_default,params){
		return this._getBase("string",config_name,is_default,params);
	}
	
	//获取最终callback
	BlackBox.prototype.getCallBack = function(callBack_name,is_default,params){
		var _callback =  this._getBase("function",callBack_name,is_default,params);
		return _callback ? _callback : $.noop;
	}
	
	//_init_初始化方法，检查是否有BlackBox已经产生
	BlackBox.prototype._init_ = function(){
		$("#BlackBoxIframe").hide().appendTo($("#BlackBoxPlaceHolder")).unwrap();	
		$("#BlackBoxIframe").children().unwrap().hide();
		if($("#BlackBox").html())$("#BlackBox").remove();
		is_box_open = true;
	}
	
	//参数过滤方法
	BlackBox.prototype._getBase = function(target,target_name,is_default,params){
		for(var i in params){
			switch (typeof(params[i]))
			{
				case target:{
					if (is_default){
						return params[i];
					}else{
						break;
					}
				}
				case "object":{
					try{
						for (var item in params[i]){
							if(item==target_name&&typeof(params[i][item])==target)return params[i][item];
						}
							break;
					}catch(e){
						break;
					}
				}
			}
		}
		return this.config[target_name];
	}
	
	
	//向JQUERY中添加抖动的方法
	$.BlackBoxShake =  function (){
		var $panel = $("#BlackBoxContent"),
				box_left = $panel.offset().left;
		for(var i=1; 4>=i; i++){
			$panel.animate({left:box_left-(12-3*i)},50);
			$panel.animate({left:box_left+2*(12-3*i)},50);
		}
	}
	
	
	//将alert写入JQUERY
	$.alert = function(text,callback){
		var _box = new BlackBox();
		_box.alert(text,callback)
	}
	//将confirm写入JQUERY
	$.confirm = function(text,callback){
		var _box = new BlackBox();
		_box.confirm(text,callback)
	}
	//将prompt写入JQUERY
	$.prompt = function(text,callback,Default){
		var _box = new BlackBox();
		_box.prompt(text,callback,Default)
	}
	//关闭所有的BlackBox
	$.closeBox = function(){
		var _box = new BlackBox();
		_box.closeBox();
	}
	//载入中写入JQUERY
	$.boxLoad = function(){
		var _box = new BlackBox();
		_box.load(true);
	}
	//结束载入写入JQUERY
	$.boxReady = function(){
		var _box = new BlackBox();
		_box.ready(true);
	}
	//识别iframe
	$.fn.extend({"blackBoxIframe": function (setting,callback){
		var $box = $(this);
		$box.click(function(){
			var _box = new BlackBox();
			_box.iframe($box.attr("href"),setting,callback)
			return false;
		})
	}})
	//识别inline
	$.fn.extend({"blackBoxInline": function (setting,callback){
		var $box = $(this),
				$target = $($box.attr("href"));
				alert($box.attr("href"))
		$box.click(function(){
			var _box = new BlackBox();
			_box.inline($target,setting,callback)
			return false;
		})
	}})
	
}(window,document,jQuery))