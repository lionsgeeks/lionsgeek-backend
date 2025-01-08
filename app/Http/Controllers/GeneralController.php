<?php

namespace App\Http\Controllers;

use App\Models\General;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function tableview(Request $request)
    {
        $general = General::find(1);
        if ($request->view) {
            $general->update([
                'tablemode' => $request->view
            ]);
        }

        return back();
    }
}
