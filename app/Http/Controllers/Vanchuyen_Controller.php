<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\thanhpho_model;
use App\Models\quanpro_model;
use App\Models\phuongwar_model;
use App\Models\feeship_model;
class Vanchuyen_Controller extends Controller
{
    public function phivanchuyen(){
    	$city = thanhpho_model::orderby('matp','DESC')->get();
    	return view('admin.delivery.add_delivery')->with(compact('city'));
    }
    public function select_delivery(Request $request){
    	$data = $request->all();
    	$output = '';
    	if ($data['action']=='city') {
    		$quanhuyen = quanpro_model::where('matp',$data['matp'])->orderby('maqh','DESC')->get();
    		$output ='<option>---Chọn quận huyện---</option>';
    		foreach ($quanhuyen as $key => $value) {
    			$output .='<option value="'.$value->maqh.'">'.$value->name_quanhuyen.'</option>';
    		}
    	}
    	else{
    		$xaphuong = phuongwar_model::where('maqh',$data['matp'])->orderby('xaid','DESC')->get();
    		$output ='<option>---Chọn xã phường---</option>';
    		foreach ($xaphuong as $key => $value1) {
    			$output .='<option value="'.$value1->xaid.'">'.$value1->name_xaphuong.'</option>';
    		}
    	}
    	echo $output;
    }
    public function insert_delivery(Request $request){
    	$data = $request->all();
    	$fee_ship = new feeship_model();
    	$fee_ship->fee_matp = $data['city'];
    	$fee_ship->fee_maqh = $data['qh_province'];
    	$fee_ship->fee_xaid = $data['xp_wards'];
    	$fee_ship->fee_ship = $data['fee_ship'];
    	$fee_ship->save();
    }
    public function load_delivery(request $request){
        $fee_ship = feeship_model::orderby('id','DESC')->get();
        $output = "";
        $output .= '
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thread>
                        <tr>
                            <th class="text-center">Tên thành phố</th>
                            <th class="text-center">Tên quận huyện</th>
                            <th class="text-center">Tên xã phường</th>
                            <th class="text-center">Phí ship</th>
                        </tr>   
                    </thread> ';

                    foreach ($fee_ship as $key => $value) {
                    $output.=
                        '<tbody>
                            <tr>
                                <td>'.$value->thanhpho_feeship->name_city.'</td>
                                <td>'.$value->quanhuyen_feeship->name_quanhuyen.'</td>
                                <td>'.$value->xaphuong_feeship->name_xaphuong.'</td>
                                <td contenteditable data-feeship_id ="'.$value->id.'" class="feeship_id_edit">'.number_format($value->fee_ship,0,',','.').'</td>
                            </tr>
                        </tbody>'; 
                    }

        $output .= '            
                </table>
            </div>
        ';
        echo $output;       
    }
    public function update_delivery(Request $request){
        $data = $request->all();
        $fee_ship = feeship_model::find($data['fee_id']);
        $fee_value = rtrim($data['fee_value'],'.');
        $fee_ship->fee_ship = $fee_value;
        $fee_ship->save();
    }
}
