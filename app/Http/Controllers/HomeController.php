<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\PurchaseOrders;
use App\Models\GoodsReceipt;
use App\Models\Sales;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title="Dashboard Admin";
        $produk=Produk::orderby('id','desc')->first();
        $supplier=Supplier::orderby('id','desc')->first();
        $dt=PurchaseOrders::withCount('lines')->orderBy('created_at','desc')->first();
        $data1=GoodsReceipt::orderBy('created_at','desc')->first();
        $data2=Sales::orderBy('created_at','desc')->first();

        return view('home', compact('title','produk','supplier','dt','data1','data2'));
        
    }
}
