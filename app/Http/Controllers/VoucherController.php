<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vouchers = DB::table('vouchers')->selectRaw('name, discount, started_time, expired_time, count(user_id) as amount')->groupBy(['name', 'discount', 'started_time', 'expired_time'])->get();
        $users = User::all();
        return view('admin.vouchers-management', compact('vouchers', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vouchers = $request->validate([
            'name' => 'required|max:255',
            'discount' => 'required|numeric|min:0|max:100',
            'started_time' => 'required|after_or_equal:today',
            'expired_time' => 'required|after:started_time',
            'user_id' => 'required',
        ]);
        try {
            DB::beginTransaction();
            foreach ($request->user_id as $user_id) {
                Voucher::create([
                    'name' => $request->name,
                    'discount' => $request->discount,
                    'started_time' => $request->started_time,
                    'expired_time' => $request->expired_time,
                    'user_id' => $user_id
                ]);
            }
            DB::commit();
            return redirect()->route('admin.vouchers.index')->with('voucher_success', 'Create voucher success');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('admin.vouchers.index')->with('voucher_fail', $exception->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($name)
    {
        try {
            DB::beginTransaction();
            Voucher::where('name', $name)->delete();
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'success' 
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'message' => 'fail' 
            ]);
        }
    }
}
