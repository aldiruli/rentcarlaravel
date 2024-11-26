<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\RentalHistory;

class DashboardController extends Controller
{
    public function index()
    {
        $rentData = RentalHistory::selectRaw('MONTH(borrowed_at) as month, COUNT(*) as total')
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
