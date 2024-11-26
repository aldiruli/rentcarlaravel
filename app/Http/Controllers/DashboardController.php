<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\RentalHistory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $selectedYear = $request->input('year', date('Y'));

        $rentData = RentalHistory::selectRaw('MONTH(borrowed_at) as month, COUNT(*) as total')
            ->whereYear('borrowed_at', $selectedYear) 
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $chartData = [];
        for ($i = 1; $i <= 12; $i++) {
            $chartData[] = $rentData->firstWhere('month', $i)->total ?? 0;
        }
        logger()->info('Chart Data:', $chartData);

        return view('dashboard', compact('chartData', 'selectedYear'));
    }
}
