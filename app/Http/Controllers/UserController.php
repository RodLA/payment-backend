<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function save(Request $request){

        DB::beginTransaction();
        try {
            $user_request = (Object) $request->user;
            $payments_request = (Array) $request->payments;

            $user = new User();
            $user->first_name = $user_request->first_name;
            $user->last_name = $user_request->last_name;
            $user->dob = $user_request->dob;
            $user->phone = $user_request->phone;
            $user->email = $user_request->email;
            $user->address = $user_request->address;

            if( $user->save() ){
                foreach ($payments_request as $pay_req ) {
                    $pay_req_obj = (Object) $pay_req;

                    $payment = new Payment();
                    $payment->user_id = $user->id;
                    $payment->transaction_id = $pay_req_obj->transaction_id;
                    $payment->amount = $pay_req_obj->amount;
                    $payment->date = $pay_req_obj->date;

                    $payment->save();
                }
                //si todo esta bien realizara el commit
                DB::commit();
                return response()->json(["status"=>true]);
            }

        } catch (\Exception $e) {
            //si ocurre un error revertira los cambios
            DB::rollback();
            return response()->json(["status"=>false]);
        }
    }

    public function all(){
        $users = User::all();

        foreach( $users as $user ){
            $payments = Payment::where(["user_id"=> $user->id])->get();

            $total = 0;
            foreach ($payments as $payment) {
                $total += $payment->amount;
            }
            //Nueva propiedad
            $user->total_payments = $total;
            $user->number_payments = count($payments);
        }

        return $users;
    }
}
