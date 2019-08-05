<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<script src="{{asset('js/jquery-3.3.1.js')}}"></script>
</head>
<body>
	<h1 align="center">商品列表</h1>
	<table class="table table-hover">
		<tr>
			<th>商品名称</th>
			<th>商品价格</th>
			<th>商品图片</th>
			<th>操作</th>
		</tr>
		<tbody id="tbody">
			
		</tbody>
	</table>
	<script type="text/javascript">
		$(function(){
			$.ajax({
				url:"http://www.api.com/goodsApi",
				method:"get",
				dataType:'json',
				success:function(msg){
					$.each(msg.data,function(k,v){
						var tr = $('<tr></tr>');
						tr.append('<td>'+v.goods_name+'</td>');
						tr.append('<td>'+v.goods_price+'</td>');
						tr.append('<td>'+v.goods_name+'</td>');
						tr.append('<td width="280"><button type="button" class="btn btn-danger del" goods_id="'+v.goods_id+'">删除</button><a class="btn btn-primary upd" href="/goods_upd?goods_id='+v.goods_id+'">修改</a></td>');
						$('#tbody').append(tr);
					});
				}
			});

			$(document).on('click','.del',function(){
				// alert(1);
				var _this = $(this);
				var goods_id = _this.attr('goods_id');
				$.ajax({
					url:"http://www.api.com/goodsApi/"+goods_id,
					method:"delete",
					dataType:'json',
					success:function(msg){
						alert(msg.msg);
						if(msg.err == 1){
							_this.parents('tr').remove();
						}
					}
				});
			});
		})
	</script>
</body>
</html>