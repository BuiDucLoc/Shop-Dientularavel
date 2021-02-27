$(document).ready(function(){
	$("#alert1").delay(3000).slideUp();
});

$(document).ready(function(){

	//update phí
	$(document).on('blur','.feeship_id_edit',function(){
		var fee_id = $(this).data('feeship_id');
		var fee_value = $(this).text();
		var _token = $('input[name="_token"]').val();
		$.ajax({
			url : 'update_delivery',
			method : 'POST',
			data:{fee_id:fee_id,fee_value:fee_value,_token:_token},
			success: function(data){
				fetch_delivery();
				swal("sửa thành công");
			}
		});
	});
	//show phí ra 3
	fetch_delivery();
	function fetch_delivery(){
		var _token = $('input[name="_token"]').val();
		$.ajax({
			url : 'load_delivery',
			method : 'POST',
			data:{_token:_token},
			success: function(data){
				$('#load_delivery').html(data);
			}
		});
	}
	//them phí vao csdl 2

	$('.add_delivery').click(function(){
		var city = $('.city').val();
		var qh_province = $('.qh_province').val();
		var xp_wards = $('.xp_wards').val();
		var fee_ship = $('.fee_ship').val();
		var _token = $('input[name="_token"]').val();
		$.ajax({
			url : 'insert_delivery',
			method : 'POST',
			data:{city:city,qh_province:qh_province,xp_wards:xp_wards,fee_ship:fee_ship,_token:_token},
			success: function(data){
				swal("Thêm phí thành công");
			}
		});
	});
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



