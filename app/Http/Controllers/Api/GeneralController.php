<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\General;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    // increase the number of views
    public function increment()
    {
        $gen = General::find(1);
        if ($gen) {
            $views = $gen->views;
            $gen->update([
                'views' => $views + 1
            ]);
        } else {
            General::create();
        }

        return 'success';
    }
}
