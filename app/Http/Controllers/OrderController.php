<?php

namespace App\Http\Controllers;

use App\Models\ClothDetails;
use App\Models\ClothFeature;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'order_date'=>'required|date',
                'delivery_date'=>'required|date',
                'name'=>'required',
                'phone'=>'required',
                'address'=>'required',
                'receiver_name'=>'required',
                'total'=>'required',
                'advance'=>'required',
                'due'=>'required',
                'little_punjabi'=>'nullable',
                'kalidar_punjabi'=>'nullable',
                'madani_punjabi'=>'nullable',
                'little_robe'=>'nullable',
                'arabian_robe'=>'nullable',
                'kabli'=>'nullable',
                'fatwa'=>'nullable',
                'salwar'=>'nullable',
                'pajama_cutting'=>'nullable',
                'sherwani_collar'=>'nullable',
                'brand_collar'=>'nullable',
                'shirt_collar'=>'nullable',
                'chest_pocket'=>'nullable',
                'chest_pocket_sticker'=>'nullable',
                'chain_pocket'=>'nullable',
                'bottom_no'=>'nullable',
                'isnaf_bottom_no'=>'nullable',
                'metal_bottom_no'=>'nullable',
                'cuffs'=>'nullable',
                'coughlin_sleeves'=>'nullable',
                'black_color'=>'nullable',
                'tira'=>'nullable',
            ]);

            if ($validator->fails()) {
                return $this->errorResponse($validator->errors()->first(),'Validation Error',422);
            }


            $data = $validator->validated();

            $data['order_number'] = 'ORDER-'.rand(111,999);

            $orders = Order::create($data);

            $this->createCloth($request,$orders->id);
            $this->createClothFeatures($request,$orders->id);

            DB::commit();
            return $this->successResponse($orders,'Order Created Successfully',200);
        }catch (\Exception $exception){
            DB::rollBack();
            return $this->errorResponse($exception->getMessage(),'Something went wrong',500);
        }
    }

    protected function createCloth(Request $request,$order_id)
    {
        ClothDetails::create([
            'order_id' => $order_id,
            'little_punjabi'=>$request->little_punjabi ?? false,
            'kalidar_punjabi'=>$request->kalidar_punjabi ?? false,
            'madani_punjabi'=>$request->madani_punjabi ?? false,
            'little_robe'=>$request->little_robe ?? false,
            'fatwa'=>$request->fatwa ?? false,
            'salwar'=>$request->salwar ?? false,
            'arabian_robe'=>$request->arabian_robe ?? false,
            'kabli'=>$request->kabli ?? false,
        ]);
    }

    protected function createClothFeatures(Request $request,$order_id)
    {
        ClothFeature::create([
            'order_id' => $order_id,
            'sherwani_collar'=>$request->sherwani_collar ?? false,
            'brand_collar'=>$request->brand_collar ?? false,
            'shirt_collar'=>$request->shirt_collar ?? false,
            'chest_pocket'=>$request->chest_pocket ?? false,
            'chest_pocket_sticker'=>$request->chest_pocket ?? false,
            'chain_pocket'=>$request->chain_pocket ?? false,
            'bottom_no'=>$request->bottom_no ?? false,
            'isnaf_bottom_no'=>$request->isnaf_bottom_no ?? false,
            'metal_bottom_no'=>$request->metal_bottom_no ?? false,
            'cuffs'=>$request->cuffs ?? false,
            'coughlin_sleeves'=>$request->coughlin_sleeves ?? false,
            'black_color'=>$request->black_color ?? false,
            'tira'=>$request->tira ?? false,
        ]);
    }
}
