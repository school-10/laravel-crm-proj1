<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Order;
use App\Models\Prospect;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Services\ProspectService;
use App\Http\Controllers\Controller;

class OrdersApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = OrderService::getAllOrders();
        return response()->json(['orders' => $orders]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Prospect $prospect)
    {
        $order = OrderService::storeOrder($prospect, $request->all());
        if($order){
            return response()->json(['result' => 'Order created successfully', 'order' => $order]);
        } else {
            return response()->json(['result' => 'Something went wrong']);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return response()->json(['order' => $order]);
    }

    public function update(Request $request, Order $order)
    {
     $result = OrderService::updateOrder($request->all(), $order);
     return response()->json(['result' => $result, 'order' => $order]);
    }


    //                                     !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! 
    // 
    //                          !!! Don't forget to write docs for the API when you are done  !!!
    //  
    //                                     !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 }
