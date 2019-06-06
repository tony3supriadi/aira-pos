<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;

class ProfileController extends Controller
{
    
    public function update(Request $request)
    {
        $data = Profil::find(1);
        $data->update($request->all());
        return response()->json($data, 201);
    }
}
