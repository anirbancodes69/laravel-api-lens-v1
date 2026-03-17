<?php

namespace ApiLens\Laravel\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController
{
    public function index()
    {
        $total = DB::table('api_lens_events')->count();

        $errors = DB::table('api_lens_events')
            ->where('status', '>=', 400)
            ->count();

        $avgTime = DB::table('api_lens_events')->avg('duration');

        $topEndpoints = DB::table('api_lens_events')
            ->select('endpoint', DB::raw('count(*) as total'))
            ->groupBy('endpoint')
            ->orderByDesc('total')
            ->limit(10)
            ->get();

        $slowEndpoints = DB::table('api_lens_events')
            ->select('endpoint', DB::raw('avg(duration) as avg_time'))
            ->groupBy('endpoint')
            ->orderByDesc('avg_time')
            ->limit(10)
            ->get();

        return view('apilens::dashboard', compact(
            'total',
            'errors',
            'avgTime',
            'topEndpoints',
            'slowEndpoints'
        ));
    }
}