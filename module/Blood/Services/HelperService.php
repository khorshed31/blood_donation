<?php

namespace Module\Blog\Services;

use Carbon\Carbon;


class HelperService
{


    public function dahboardData()
    {
//
//        $startDateOfMonth       = Carbon::now()->startOfMonth()->format('Y-m-d');
//        $endDateOfMonth         = Carbon::now()->endOfMonth()->format('Y-m-d');
//        $today                  = Carbon::now()->format('Y-m-d');
//        $yesterday              = Carbon::yesterday()->format('Y-m-d');
//        $cashFlow               = CashFlow::where('dokan_id', auth()->user()->type == 'owner' ? auth()->id() : auth()->user()->dokan_id);
//        $todaySales             = Sale::where('dokan_id', auth()->user()->type == 'owner' ? auth()->id() : auth()->user()->dokan_id);
//        $yesterdaySales         = Sale::where('dokan_id', auth()->user()->type == 'owner' ? auth()->id() : auth()->user()->dokan_id);
//        $todayPurchase          = Purchase::where('dokan_id', auth()->user()->type == 'owner' ? auth()->id() : auth()->user()->dokan_id);
//        $yesterdayPurchase      = Purchase::where('dokan_id', auth()->user()->type == 'owner' ? auth()->id() : auth()->user()->dokan_id);
//
//        $data['total_product']      = Product::dokani()->count();
//        $data['today_sale']         = $todaySales->whereDate('date', $today)->sum('payable_amount');
//        $data['yesterday_sale']     = $yesterdaySales->whereDate('date', $yesterday)->sum('payable_amount');
//
//        $data['today_purchase']     = $todayPurchase->whereDate('date',$today)->sum('payable_amount');
//        $data['yesterday_purchase'] = $yesterdayPurchase->whereDate('date', $yesterday)->sum('payable_amount');
//
//        $data['today_income']       = $todaySales->where('date',$today)->with(['details' => function ($q) {
//            $q->withSum('product', 'purchase_price');
//        }])->get();
//
//        $data['yesterday_income']   = $yesterdaySales->where('date',$yesterday)->with(['details' => function ($q) {
//            $q->withSum('product', 'purchase_price');
//        }])->get();
////
//        $data['today_expense']      = 0;
//        $data['yesterday_expense']  = 0;
////        $data['net_income']         = Sale::dokani()->with(['details' => function ($q) {
////            $q->withSum('product', 'purchase_price');
////        }])->get();
//        $data['net_expense']        = 0;
//        $data['online_order']       = Order::where('dokan_id', auth()->user()->type == 'owner' ? auth()->id() : auth()->user()->dokan_id)->count();
//        $data['cash_flows']         = CashFlow::where('dokan_id', auth()->user()->type == 'owner' ? auth()->id() : auth()->user()->dokan_id)->where('date', '>=', $startDateOfMonth)->where('date', '<=', $endDateOfMonth)->get(['id', 'date', 'amount', 'balance_type']);
//
//        //dd($today);
//        return $data;
    }

    public function sidebars()
    {
        return (object)[
            [
                'name' => 'Sale',
                'url' => '#',
                'icon' => 'fa fa-shopping-bag',
                'target' => '',
                'child' => [
                    [
                        'name' => 'POS Sale',
                        'url' => route('dokani.sales.create'),
                        'icon' => 'fa-caret-right',
                        'target' => '',
                    ],
                    [
                        'name' => 'Sales list',
                        'url' => route('dokani.sales.index'),
                        'icon' => 'fa-caret-right',
                        'target' => '_blank',
                    ],
                    [
                        'name' => 'Due Collection',
                        'url' => route('dokani.collections.create'),
                        'icon' => 'fa-caret-right',
                        'target' => '_blank',
                    ],
                ],
            ],
        ];
    }
}
