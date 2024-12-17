<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\General;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    // increase the number of views
    public function increment(Request $request)
    {
        if ($request->tempoToken == "3c6b27df90dbc68b8b24fdf744bc94558daebaf3da836d58c360794c6384b6d2") {
            $gen = General::find(1);
            if ($gen) {
                $views = $gen->views;
                $gen->update([
                    'views' => $views + 1
                ]);
            } else {
                General::create();
            }
        }

        return 'success';
    }
}
