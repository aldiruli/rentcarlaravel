<?php

namespace App\Http\Controllers;

use App\Models\Car;

class DashboardController extends Controller
{
    public function index()
    {
        $rentData = Car::selectRaw('MONTH(borrowed_at) as month, COUNT(*) as total')
            ->where('status', 'rented')
            ->whereYear('borrowed_at', date('Y')) 
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $chartData = [];
        for ($i = 1; $i <= 12; $i++) {
            $chartData[] = $rentData->firstWhere('month', $i)->total ?? 0;
        }

        return view('dashboard', compact('chartData'));
    }
}
