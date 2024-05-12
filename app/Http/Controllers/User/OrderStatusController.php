<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\OrderStatusService;
use App\Http\Requests\Admin\OrderStatus\UpdateOrderStatusRequest;


class OrderStatusController extends Controller
{
    public function index()
    {
        return view('admin.order_statuses.index', ['order_statuses' => OrderStatusService::getAllOrderStatuses()]);
    }
    public function create()
    {
        return view('admin.order_statuses.create');
    }
    public function store(Request $request)
    {
        $result = OrderStatusService::storeOrderStatus($request->all());
        if (str_contains($result, 'successfully')) {
            return redirect()->route('admin.order_statuses.index')->with('success', $result);
        } else {
            return redirect()->route('admin.order_statuses.create')->with('error', $result);
        }
    }
    public function edit(string $id)
    {
        $order_status = OrderStatusService::findOrderStatus($id);
        return view('admin.order_statuses.edit', ['order_status' => $order_status]);
    }
    public function update(string $id, UpdateOrderStatusRequest $request)
    {
        $result = OrderStatusService::updateOrderStatus($id, $request->all());
        if (str_contains($result, 'successfully')) {
            return redirect()->route('admin.order_statuses.index')->with('success', $result);
        } else {
            return redirect()->route('admin.order_statuses.edit', ['order_status' => $id])->with('error', $result);
        }
    }
}