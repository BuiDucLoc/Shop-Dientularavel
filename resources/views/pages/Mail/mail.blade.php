<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h3>Đơn hàng của bạn đã được xác nhận thành công!</h3>
	<h3>Cảm ơn bạn quan tâm đến shop, chúc bạn có một ngày tốt lành ^^</h3>
	<div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">
            CHI TIẾT ĐƠN HÀNG
        </div>
        <div class="table-responsive">
          <table class="table table-striped b-t b-light" style="text-align: center">
            <thead>
              <tr class="hi">
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thành Tiền</th>  
              </tr>
            </thead>
            <tbody>
            @php
              $a = 0;
            @endphp
            @foreach($dulieu as $value)
              <tr style="text-align: center">
                <td>{!! $value->sanpham_orderdetail->sanpham_name !!}</td>
                <td><span class="text-ellipsis">{!!$value->detal_sl !!}</span></td>
                <td><span class="text-ellipsis">{!! number_format($value->detal_gia).'đ' !!}</span></td>
                <td><span class="text-ellipsis">{!! number_format($value->detal_sl*$value->detal_gia).'đ' !!}</span></td>
              </tr>
              @php
                $a = $a + $value->detal_sl*$value->detal_gia;
              @endphp
            @endforeach 
            <tr>
              <td colspan="4" style="color:red">Tổng Tiền:{{number_format($a)}}</td>
            </tr>
            <tr>
              <td colspan="4">
                <a style = "background: #FE980F;color: black"class="btn {{-- btn-default --}} update left" href="">Xác nhận đơn hàng</a>
              </td>
            </tr> 
            <h3>Mọi vấn đề thắc mắc xin liên hệ với cửa hàng theo hotline:0123456789</h3>            
            </tbody>
          </table>
        </div>
       
      </div>
</div>
</body>
</html>