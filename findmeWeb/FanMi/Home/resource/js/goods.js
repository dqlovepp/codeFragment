/**
 * Created by xxid on 14/10/20.
 */
$(function() {
    $('#etalage').etalage({
        thumb_image_width: 441,
        thumb_image_height: 674,
        source_image_width: 900,
        source_image_height: 1350,

        zoom_area_width: 480,
        smallthumbs_position: 'left',
        zoom_area_height: 720,
        zoom_area_distance: 5,
        show_hint: true,
        click_callback: function(image_anchor, instance_id) {
        }
    });
    //购买数量
    //减少
    $("#reduce_num").click(function(){
        if (parseInt($(".amount").val()) <= 1){
            alert("商品数量最少为1");
        } else{
            $(".amount").val(parseInt($(".amount").val()) - 1);
        }
    });

    //增加
    $("#add_num").click(function(){
        $(".amount").val(parseInt($(".amount").val()) + 1);
    });

    //直接输入
    $(".amount").blur(function(){
        if (parseInt($(".amount").val()) < 1){
            alert("商品数量最少为1");
            $(this).val(1);
        }
    });
    //选择尺寸
    $(".product a").click(function(){
        $(this).addClass("selected").siblings().removeClass("selected");
        $(this).find("input").attr({checked:"checked"});
        //去除虚边框
        $(this).blur();
    });

    //商品详情效果
    $(".detail_hd li").click(function(){
        $(".detail_div").hide().eq($(this).index()).show();
        $(this).addClass("on").siblings().removeClass("on");
    });

    $("#dlg").window({
        modal:true,
        shadow:false,
        closed:true,
        noheader:true ,
        inline:true
    });
    
});
function checkSubmit(){ 
        var isSumit=true; 
        if($("#userHeight").val()=='')
        {
            isSumit=false;
            $("#userHeight").css('border',"solid 1px #EE0000").next().html('您还没有选择身高');       
        }
        else
        {
            $("#userHeight").css('border',"none").next().html('');
        }
        if($("#userweight").val()=='')
        {
            isSumit=false;
           $("#userweight").css('border',"solid 1px #EE0000").next().html('您还没有选择身高');
        }
        else
        {
             $("#userweight").css('border',"none").next().html('');
        }
        return isSumit;
}
