<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo ($meta_title); ?>_<?php echo C('WEB_SITE_TITLE');?></title>
<link href="/Public/Home/css/font-face.css" rel="stylesheet">
<link href="/Public/Home/css/common.css" rel="stylesheet">
<link href="/Public/Home/css/top.css" rel="stylesheet">
<link href="/Public/Home/css/footer.css" rel="stylesheet">

<script type="text/javascript" src="/Public/static/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/Home/js/public.js"></script>


</head>
<body>
<!-- 工具条 -->
	<!-- 顶部工具条 -->
	<!-- /工具条 -->
	<!-- 头部 -->
	<div class="wrapper-address">
	         <!-- 导航条 -->



<div class="header-wrap"><a href="<?php echo C('DOMAIN');?>" class="logo" title="<?php echo C('WEB_SITE_TITLE');?>"><img src="/Public/Home/images/logo.png" alt=""></a>

<div class="shopping_cart_procedure2"><span>1、我的购物车</span><span>   2、填写订单</span><span style="width:175px; padding:0;">3、完成订单</span>  </div>
</div>
	<!-- /头部 -->
	
	<!-- 主体 -->
	<div  class="wrapper-order">

 <div id="check">
<div class="mt">
				<h2>填写并核对订单信息</h2>
			</div>
<script type="text/javascript">

	$(document).ready(function(){

  $("#show").click(function(){
  $("#formsender").toggle();

  });
});
function savemsg() { 
//判断是否是默认地址
if (document.getElementById("isdefault").checked==true) {
       var info="yes";
    }
    else {
      var info="no";
    }
    var pca=$("#idprovince").val()+$("#idcity").val()+$("#idarea").val();
	var address=$("#address").val();
	var orderid=$("#orderid").val();
	var username=$("#realname").val();
	var phone=$("#phone").val();
	var b=$("#youbian").val();
	
	$.ajax({
type:'post', //传送的方式,get/post
url:'<?php echo U("Address/build");?>', //发送数据的地址
data:{province:$("#idprovince").val(),city:$("#idcity").val(),area:$("#idarea").val(),posi:address,pho:phone,rel:username,id:orderid,msg:info},
 dataType: "json",
success:function(data)
{
if (data.msg=="yes") {
     $("#f_default").remove();var str='<p id="f_default"><input type="radio" name="sender" value="'+data.addressid+'" id="default" checked="checked"/>&nbsp;&nbsp;收件人：'+data.realname+'&nbsp;&nbsp;&nbsp;联系电话：'+data.cellphone+'&nbsp;'+'&nbsp;&nbsp;&nbsp;收货地址：'+data.province+data.city+data.area+data.address+'</p>';
    $("#senderdetail").append(str);
	}
else{
var str='<p><input type="radio" id="new" name="sender" value="'+data.addressid+'" checked="checked"/>&nbsp;&nbsp;收件人：'+data.realname+'&nbsp;&nbsp;&nbsp;联系电话：'+data.province+data.city+data.area+data.cellphone+'&nbsp;'+'&nbsp;&nbsp;&nbsp;收货地址：'+data.address+'</p>';
 $("#senderdetail").append(str);}

 $("#formsender").toggle();
},
error:function (event, XMLHttpRequest, ajaxOptions, thrownError) {
alert("表单错误，"+XMLHttpRequest+thrownError); }
		})
	 }
function makeorder() {
	//判断默认地址是否选中,获取地址id
   if (document.getElementById("default").checked==true) {
      document.getElementById("senderid").value=document.getElementById("default").value;
	  document.myform.submit();
    }	
 var val=$('input:radio[name="sender"]:checked').val();
	//判断新地址是否选中,获取地址id
	  if(val==null){
	
		 alert("请选择一个地址!");return false;
		}
  else{document.getElementById("senderid").value=val;
	  document.myform.submit();     
            }
		 }
</script>

<script type="text/javascript">  
function checkcode()  //检查优惠券是否可以
{
	var str=$("input#code").val();
if(str!==""){
    $.ajax({
type:'post',
url:'<?php echo U("Fcoupon/check");?>', //发送数据的地址//
data:{couponid:str},
 dataType: "json",
success:function(data)
{if(data.msg=="yes"){
	$("span.tips").html(data.info);
}
else{$("span.tips").empty();
	document.getElementById("code").value="";
	$("span.tips").html(data.info);



}
} 
});//ajax结束

}//if结束
	
	}


</script>  

      <div class="orderplace">
 <link type="text/css" href="/Public/Home/css/selectpick.css"
	rel="stylesheet" />    

	<div class="o_title"> <h2>收货人信息 <?php if(empty($uid)): else: ?><span><a href="javascript:vod(0);" id="show">新增</a></span><?php endif; ?></h2> </div> 
                     <div id="formwarp" class="place"> 
                     
                     
  <?php if(empty($address)): ?><div id="senderdetail"></div>
   <div id="formsender" style="position:relative;">
<form id="formincart" name="form" >  
    <dl>         <div class="infolist">

                            <lable>所在地区：</lable>

                            <div class="liststyle">

                                <span id="Province">

                                    <i>请选择省份</i>

                                    <ul>

                                        <li><a href="javascript:void(0)" alt="请选择省份">请选择省份</a></li>

                                    </ul>

                                    <input id="idprovince" type="hidden" name="cho_Province" value="请选择省份">

                                </span>

                                <span id="City">

                                    <i>请选择城市</i>

                                    <ul>

                                        <li><a href="javascript:void(0)" alt="请选择城市">请选择城市</a></li>

                                    </ul>

                                    <input type="hidden" id="idcity"name="cho_City" value="请选择城市">

                                </span>

                                <span id="Area">

                                    <i>请选择地区</i>

                                    <ul>

                                        <li><a href="javascript:void(0)" alt="请选择地区">请选择地区</a></li>

                                    </ul>

                                    <input type="hidden" id="idarea" name="cho_Area" value="请选择地区">

                                </span>

                            </div>

                        </div> 

							</dl>  <dt>详细地址：</dt>  <dd><input type="text" class="cart_long" id="address" maxlength="40" data-input="text" value="" name="area"><font class="ml10 cleb6100" style="display: none;">详细地址不能为空</font></dd>        </dl>
          <dl>              <dt><span>*</span>收 货 人：</dt>              <dd><input type="text"  class="cart_long" id="realname" maxlength="20" data-input="text" value=""><font class="ml10 cleb6100" style="display: none;">收货人不能为空</font></dd>        </dl>        <dl>              <dt><span></span>手&nbsp;&nbsp;&nbsp;&nbsp;机：</dt>              <dd><input type="text"  class="cart_long" id="phone" maxlength="11" data-msg="收货手机号码格式不正确" data-input="text" data-type="cellphone" value="">&nbsp;用于接收发货通知及送货前确认</dd>        </dl>     
             <dl>                  <dd><input id="isdefault" checked="checked"  name="default" type="checkbox" class="cart_n_box">设为默认地址</dd>        </dl>      
             <dl>                   </dl>      
               <dl>  
			   <dd><a href="javascript:void(0)" class="ncart_btn_on" onclick="savemsg();">保存</a></dd>        </dl>    
 </form></div>
                        <?php else: ?>
                        
                        
 <div id="senderdetail">
 <p id="f_default"><input type="radio" id="default" name="sender" checked="checked" value="<?php echo (get_addressid($uid)); ?>" />&nbsp;收件人：<?php echo (get_realname($uid)); ?>&nbsp;&nbsp;联系电话:<?php echo (get_cellphone($uid)); ?>&nbsp;&nbsp;收货地址：<?php echo (get_address($uid)); ?>  </p>
 
 </div>
      <div id="formsender" style="display:none">
    <form id="formincart" name="form" >  
    <dl>         <div class="infolist">

                            <lable>所在地区：</lable>

                            <div class="liststyle">

                                <span id="Province">

                                    <i>请选择省份</i>

                                    <ul>

                                        <li><a href="javascript:void(0)" alt="请选择省份">请选择省份</a></li>

                                    </ul>

                                    <input id="idprovince" type="hidden" name="cho_Province" value="请选择省份">

                                </span>

                                <span id="City">

                                    <i>请选择城市</i>

                                    <ul>

                                        <li><a href="javascript:void(0)" alt="请选择城市">请选择城市</a></li>

                                    </ul>

                                    <input type="hidden" id="idcity"name="cho_City" value="请选择城市">

                                </span>

                                <span id="Area">

                                    <i>请选择地区</i>

                                    <ul>

                                        <li><a href="javascript:void(0)" alt="请选择地区">请选择地区</a></li>

                                    </ul>

                                    <input type="hidden" id="idarea" name="cho_Area" value="请选择地区">

                                </span>

                            </div>

                        </div> 

							</dl>
							
							<dl>        <dt>详细地址：</dt>  <dd><input type="text" class="cart_long"  id="address" maxlength="40" data-input="text" value="" name="area"><font class="ml10 cleb6100" style="display: none;">详细地址不能为空</font></dd>        </dl>
          <dl>              <dt><span>*</span>收 货 人：</dt>              <dd><input type="text" class="cart_long"  id="realname" maxlength="20" data-input="text" value=""><font class="ml10 cleb6100" style="display: none;">收货人不能为空</font></dd>        </dl>        <dl>              <dt><span></span>手&nbsp;&nbsp;&nbsp;&nbsp;机：</dt>              <dd><input type="text" class="cart_long"  id="phone" maxlength="11" data-msg="收货手机号码格式不正确" data-input="text" data-type="cellphone" value="">&nbsp;用于接收发货通知及送货前确认</dd>        </dl>     
             <dl>                  <dd><input id="isdefault" checked="checked"  name="default" type="checkbox" class="cart_n_box">设为默认地址</dd>        </dl>      
                
               <dl>    <dd><a href="javascript:void(0)" class="ncart_btn_on" onclick="savemsg();">保存</a></dd>        </dl>    
 </form></div><?php endif; ?>
<script type="text/javascript" src="/Public/Home/js/city.js"></script>
				<script type="text/javascript">
	

	</script>
    
  	
    
    
    </div>  </div>     <!--收货信息 结束-->          
               <!--订单支付 开始-->   
              <form action='<?php echo U("order/save");?>' method="post" name="myform" id="myform">   <div class="orderplace">             <div class="o_title">     <h2>支付</h2> </div>           
                   <div id="formwarp">   <dl>                              <dt>支付方式：</dt>        <dd>                      <input type="hidden" name="tag"  id="orderid" value="<?php echo ($tag); ?>">  
                    <input type="hidden" name="sender"  id="senderid" >      
                   
                       <input type="radio" name="PayType" id="huo" checked="checked" value="1">货到付款       <input type="radio" name="PayType" id="pay"  value="2">在线支付                                                                                                 </dd>                        </dl>                                        
              </div>    </div>         <!--订单支付 结束-->  
			  
			   <!--优惠券开始-->   
                <div class="orderplace">             <div class="o_title">     <h2>优惠券</h2> </div>           
                   <div id="formwarp">   <dl>                              <dt>请输入优惠券代码：</dt>        <dd>                                   
                   
                       <input type="text"  class="cart_long"  name="couponcode"  onblur="checkcode();" id="code" >   <span class="red tips"></span>                                                                                                 </dd>                        </dl>                                        
              </div>    </div>         <!--优惠券结束-->   
			  
			  
			  <!--商品信息 开始-->    
              
               <div class="orderplace">   <div class="o_title">  <h2>商品信息</h2></div>                                   <table border="0" cellspacing="0" cellpadding="0"  class="gridtable cart-2" width="100%">  <tbody><tr class="com_list_tit">        <th>商品名称</th>      <th>规格</th>    <th>单价(元)</th> <th>数量</th>   </tr>   <?php if(is_array($shoplist)): $i = 0; $__LIST__ = $shoplist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><A href="<?php echo U('Article/detail?id='.$vo['goodid']);?>" > <?php echo (get_good_name($vo["goodid"])); ?></A></td>
               <td align="center"> <span class="weight"><?php echo ((isset($vo["parameters"]) && ($vo["parameters"] !== ""))?($vo["parameters"]):"无"); ?></span></td>
                <td align="center"><?php echo ($vo["price"]); ?></td>
                <td align="center"><?php echo ($vo["num"]); ?></td>
                 
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>                    </tbody></table>                     </div>            <!--商品信息 结束-->   
                   <!--发票信息 开始-->         <div class="orderplace fapiao">
                  <h2> 发票信息</h2>   
                  <p>发票信息：不需要发票</p>   
                    <p>很抱歉，近期我们暂时不能提供发票。请联系<?php echo C('CONTACT');?>申请，我们将尽快为您补寄。                              </p>                       
 </div>             
                   <!--发票信息 结束-->            <!--提交信息 开始-->           
                    <div class="orderplace trans"> 
                      <p><b ><?php echo ($num); ?></b>件商品</p>     
                     <p>商品金额<b><?php echo ($total); ?></b>元 </p>                     
                       <p>运费<b ><?php echo ($trans); ?></b>元</p>
                       <p><input type="checkbox" name="score" id="huo" value="<?php echo (get_score($uid)); ?>"> <b class="red" ><strong>积分<?php echo (get_score($uid)); ?>，可兑换成<?php echo ($ratio); ?>元</strong></b></p>
                          <p class="jiesuan">应付总额 <span id="TotalNeedPay" class="red">￥<?php echo ($all); ?></span>元 <a class="btn_submit_pay"   onclick="makeorder();return false" >提交订单</a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>            <!--提交信息 结束-->              

   
</div>   </form> 
 
     
   

 </div>
	<!-- /主体 -->

	<!-- 底部 -->
	
    <!-- 底部-->
   <script type="text/javascript"  charset="utf-8" src="/Public/static/js/menudown.js"></script> 

</div></div>
<div class="footer">
<div class="footer_pic_new">
		<div class="footer_pic_new_inner">
		    <a name="foot_1" href="http://help.dangdang.com/details/page13" target="_blank" class="footer_pic01"><span>正规渠道正品保障</span></a>
		    <a name="foot_2" class="footer_pic02" href="http://help.dangdang.com/details/page21" target="_blank"><span>放心购物货到付款</span></a>
		    <a name="foot_3" class="footer_pic03" href="http://help.dangdang.com/details/page16" target="_blank"><span>150城市次日送达</span></a>
		    <a name="foot_4" class="footer_pic04" href="http://help.dangdang.com/details/page29" target="_blank"><span>上门退货当场退款</span></a>
		</div>
	</div>
    <div class="foot_center">  
	
  <?php if(is_array($footer)): $i = 0; $__LIST__ = $footer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl><dt><?php echo ($vo["title"]); ?></dt>
 <?php if(is_array($vo['id'])): $i = 0; $__LIST__ = $vo['id'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$son): $mod = ($i % 2 );++$i;?><dd><a rel="nofollow"  href="<?php echo U('help/lists?pid='.$son['id']);?>"><?php echo ($son["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
</dl><?php endforeach; endif; else: echo "" ;endif; ?> 
     

<dl>
    <dt>在线客服</dt>
    <dd>周一至周五</dd>
    <dd>09:00-18:00</dd>
	<dd><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('QQ');?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo C('QQ');?>:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></dd>
</dl>

  

     
    </div>
 
<div class="theme-footer"> 
    

  
      
       <p><span style=" text-align: center;"> Copyright@yershop商城系统 2014-2015 <strong><a href="http://www.yershop.com/" target="_blank" class="red">Yershop.com</a></strong> <?php echo C('WEB_SITE_ICP');?></p>
    
	</div> </div>

</div>
	<!-- /底部 -->
</body>
</html>