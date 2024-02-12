<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportTaskController extends Controller
{
    public function __invoke()
    {
        return response()->json([
            'success' => true
        ]);
    }
}
