<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SelectMockDataController extends Controller
{
    public function mockData()
    {
        return response()->json([
            'result' => [
                ['value' => 1, 'text' => 'test 1 💙'],
                ['value' => 2, 'text' => 'test 2 💙'],
                ['value' => 3, 'text' => 'test 3 💙'],
                ['value' => 4, 'text' => 'test 4 💙'],
                ['value' => 5, 'text' => 'test 5 💙'],
                ['value' => 6, 'text' => 'test 6 💙'],
                ['value' => 7, 'text' => 'test 7 💙'],
                ['value' => 8, 'text' => 'test 8 💙'],
                ['value' => 9, 'text' => 'test 9 💙'],
                ['value' => 10, 'text' => 'test 10'],
            ],
            'pagination' => [
                'more' => false //true
            ],
        ]);
    }
}
