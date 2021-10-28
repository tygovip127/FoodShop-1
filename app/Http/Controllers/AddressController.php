<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;

class AddressController extends Controller
{
    public static function address()
    {
        $province = Province::first();
        $districts = $province->districts;
        return $districts;
        // return $province;
    }

    public static function provinces(){
        return Province::all();
    }

    public function districts($id){
        $province = Province::find($id);
        $districts= $province->districts;
        return $districts;
    }

    public function wards($id){
        $district = District::find($id);
        $wards = $district->wards;
        return $wards;
    }
}
