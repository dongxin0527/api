<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<script src="{{asset('js/jquery-3.3.1.js')}}"></script>
</head>
<body>
	<h1 align="center">商品添加</h1>
	<div class="container">
		<form id="form">
		  <div class="form-group">
		    <label for="exampleInputEmail1">商品名称</label>
		    <input type="text" class="form-control" name="goods_name">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">商品价格</label>
		    <input type="text" class="form-control" name="goods_price">
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
			$('#btn').click(function(){
				var formData = new FormData($('#form')[0]);
				$.ajax({
					url:"http://www.api.com/goodsApi",
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
	</script>
</body>
</html>