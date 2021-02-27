$(document).ready(function(){
	$("#alert1").delay(3000).slideUp();
});


//them gio hàng
$(document).ready(function(){
	$(".add-to-cart").click(function(){
		var id = $(this).data("id");
		var car_product_id = $(".product_id_"+ id).val();
		var car_product_name = $(".product_name_"+ id).val();
		var car_product_gia = $(".product_gia_"+ id).val();
		var car_product_image = $(".product_image_"+ id).val();
		var car_product_sl = $(".soluong_"+ id).val();
		var _token = $("input[name = _token]").val();
		$.ajax({
			url: 'cart_ajax',
			method:'POST',
			data:{car_product_id:car_product_id,car_product_name:car_product_name,car_product_gia:car_product_gia,car_product_image:car_product_image,car_product_sl:car_product_sl,_token:_token},
			success:function(data){
				// swal("Mua thành công!", "", "success");
				// location.reload();
				alert(data);
			}
		});
	});
});

$(document).ready(function(){
	$(".add-to-cart1").click(function(){
		var id = $(this).data("id");
		var car_product_id = $(".product_id_"+ id).val();
		var car_product_name = $(".product_name_"+ id).val();
		var car_product_gia = $(".product_gia_"+ id).val();
		var car_product_image = $(".product_image_"+ id).val();
		var car_product_sl = $(".soluong_"+ id).val();
		var _token = $("input[name = _token]").val();
		$.ajax({
			url: 'cart_ajax1',
			method:'POST',
			data:{car_product_id:car_product_id,car_product_name:car_product_name,car_product_gia:car_product_gia,car_product_image:car_product_image,car_product_sl:car_product_sl,_token:_token},
			success:function(data){
				swal("Mua thành công!", "", "success");
				location.reload();
			}
		});
	});
});


$(document).ready(function(){
//show cac tinh thanh pho xa phường ra 1
	$('.choice').on('change',function(){
		var action = $(this).attr('id');
		var matp = $(this).val();
		var _token = $('input[name="_token"]').val();
		var resuft = '';
		if (action=='city') {
			resuft = 'qh_province';
		}
		else{
			resuft = 'xp_wards';
		}
		$.ajax({
			url : 'select_delivery',
			method : 'POST',
			data:{action:action,matp:matp,_token:_token},
			success: function(data){
				$('#' + resuft).html(data);
			}
		});
	});
});

//xiat ra phí vận chuyển
$(document).ready(function(){
	$('.van_chuyen').click(function(){
		var matp = $('.city').val();
		var maqh = $('.qh_province').val();
		var maxp = $('.xp_wards').val();
		var _token = $('input[name="_token"]').val();
		if(matp == 0 && maqh == 0 && maxp == 0) {
			alert('vui lòng chọn địa chỉ để tính phí');
		}
		else{
			$.ajax({
			url : 'show_feeship',
			method : 'POST',
			data:{matp:matp,maqh:maqh,maxp:maxp,_token:_token},
			success: function(data){
				swal("Thêm phí thành công");
				location.reload();
			}
		});
	}
	});
});
//inser shipping-order-order-detal vào csdl
$(document).ready(function(){
	$(".send_order").click(function(){

		swal({
		  title: "Xác nhận đơn hàng?",
		  text: "Đơn hàng sẽ được xác nhận nếu bạn đồng ý mua hàng!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn-danger",
		  confirmButtonText: "Đồng ý, Mua hàng!",
		  closeOnConfirm: false
		},
		function(){
			var email = $(".email").val();
			var ten = $(".ten").val();
			var sdt = $(".sdt").val();
			var diachi = $(".diachi").val();
			var ghichu = $(".ghichu").val();
			var fee_ship = $(".fee_ship").val();
			var coupon = $(".coupon").val();
			var ht_thanhtoan = $('.ht_thanhtoan').val();
			var tong = $('.tong').val();
			var _token = $("input[name = _token]").val();
			$.ajax({
				url: 'donhang',
				method:'POST',
				data:{email:email,ten:ten,sdt:sdt,diachi:diachi,ghichu:ghichu,fee_ship:fee_ship,coupon:coupon,ht_thanhtoan:ht_thanhtoan,tong:tong,_token:_token},
				success:function(data){
		  			swal("Đơn hàng!", "Đơn hàng đã được đặt thành công.", "success");
				}
			});
			window.setTimeout(function(){
				location.reload();
			} ,3000);
		});
		
	});
});

$(document).ready(function(){
	$('.check').click(function(){
		var ma = $('.ma').val();
		var _token = $("input[name = _token]").val();
		$.ajax({
			url:'check_giamgia',
			method:'POST',
			data:{ma:ma,_token:_token},
			success:function(data){
			swal(data);
			location.reload();	
			}
		});
	});
	$('.delete').click(function(){
		var _token = $("input[name = _token]").val();
		$.ajax({
			url:'delete_giamgia',
			method:'POST',
			data:{_token:_token},
			success:function(data){
			swal(data);
			location.reload();	
			}
		});
	});
	$('.delete_vanchuyen').click(function(){
		var _token = $("input[name = _token]").val();
		$.ajax({
			url:'delete_vanchuyen',
			method:'POST',
			data:{_token:_token},
			success:function(data){
			swal(data);
			location.reload();	
			}
		});
	});
});



