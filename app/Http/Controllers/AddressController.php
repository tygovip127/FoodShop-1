<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public static function address()
    {
        $province = Province::first();
        $districts = $province->districts;
        return $districts;
        // return $province;
    }

    public static function provinces()
    {
        return Province::all();
    }

    public static function districts($id)
    {
        $province = Province::find($id);
        $districts =$province->districts;
        return $districts;
    }

    public function wards($id)
    {
        $district = District::find($id);
        $wards = $district->wards;
        return $wards;
    }

    public function saveAddress(Request $request, $id)
    {
        $valid = $request->validate([
            'province' => ['required', 'integer'],
            'district' => ['required', 'integer'],
            'ward' => ['required', 'integer'],
            'street' => ['required', 'string']
        ]);
        if ($valid) {
            $user = User::find($id);
            $user->province_id = $request->input('province');
            $user->district_id = $request->input('district');
            $user->ward_id = $request->input('ward');
            $user->address = $request->input('street');
            $user->save();
            return redirect()->intended('/account')
                ->with('address_success', "Change address succesffully!");
        }
        return redirect()->intended('/account')
            ->with('address_fail', "Change address fail! Try again!");
    }

    public static function getUserAddress($id) {
        $user= User::find($id);
        $address = array();
        $province = Province::find($user->province_id);
        $district = District::find($user->district_id);
        $ward = Ward::find($user->ward_id);
        array_push($address,$province,$district,$ward);
        return $address;
    }
}
