<?php

namespace App\Http\Controllers;
use App\Models\Data_covid;
use Illuminate\Http\Request;

class DashboardChartController extends Controller
{
    public function index()
    {
        $data = Data_covid::with('user')->get();
        return $data;
    }
}
