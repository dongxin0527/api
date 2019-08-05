<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<script src="{{asset('js/jquery-3.3.1.js')}}"></script>
</head>
<body>
	<h1 align="center">商品修改</h1>
	<div class="container">
		<form id="form">
		  <div class="form-group">
		    <label for="exampleInputEmail1">商品名称</label>
		    <input type="text" class="form-control" name="goods_name" id="goods_name">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">商品价格</label>
		    <input type="text" class="form-control" name="goods_price" id="goods_price">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputFile">商品图片</label>
		    <input type="file" id="exampleInputFile" name="file">
		  </div>
		  <button type="button" class="btn btn-default" id="btn">Submit</button>
		</form>
	</div>
	<script type="text/javascript">
		$(function(){
			var goods_id = getUrlParam('goods_id');
			$.ajax({
				url:"http://www.api.com/goodsApi/"+goods_id,
				method:"get",
				dataType:'json',
				success:function(msg){
					if(msg.err == 1){
						$('#goods_name').val(msg.data.goods_name);
						$('#goods_price').val(msg.data.goods_price);
					}
				}
			});

			$('#btn').click(function(){
				var formData = new FormData($('#form')[0]);
				formData.append('_method','put');
				$.ajax({
					url:"http://www.api.com/goodsApi/"+goods_id,
					method:"post",
					data:formData,
					contentType:false,
					processData:false,
					dataType:'json',
					success:function(msg){
						alert(msg.msg);
						if(msg.err == 1){
							location.href = "{{asset('goods_list')}}";
						}
					}
				});
			});
		})

		function getUrlParam(name) {
	       var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
	       var r = window.location.search.substr(1).match(reg);  //匹配目标参数
	       if (r != null) return unescape(r[2]); return null; //返回参数值
	    }
	</script>
</body>
</html>