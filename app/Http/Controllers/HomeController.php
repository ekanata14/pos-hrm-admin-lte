<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MOdels\Checkout;

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
        $viewData = [
            'title' => "HRM System",
            'path' => "Dashboard",
            'dir' => "Dashboard",
            'activePage' => 'dashboard',
            'totalKas' => Checkout::sum('total')
        ];

        return view('pages.admin.dashboard', $viewData);
    }
}
