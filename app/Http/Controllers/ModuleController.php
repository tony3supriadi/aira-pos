<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Module;

class ModuleController extends Controller
{
    
    public function index()
    {
        $data = [];
        $index = 0;
        $main = DB::table('modules')
            ->orderBy('sort', 'ASC')->get();
        for ($i = 0; $i < count($main); $i++) {
            if (!$main[$i]->parent) {
                $data[$index] = $main[$i];
                $index++;

                $sub = DB::table('modules')
                    ->where('parent', $main[$i]->id)
                    ->orderBy('sort', 'ASC')->get();
                for ($j = 0; $j < count($sub); $j++) {
                    $data[$index] = $sub[$j];
                    $data[$index]->name = $main[$i]->name . " - " . $sub[$j]->name;
                    $index++;
                }
            } 
        }
        return $data;
    }

    public function json()
    {
        $main = DB::table('modules')
            ->where('parent', null)->get();
        for ($i = 0; $i < count($main); $i++) {
            $main[$i]->sub = DB::table('modules')
                ->where('parent', $main[$i]->id)->get();

            for ($j = 0; $j < count($main[$i]->sub); $j++) {
                $main[$i]->sub[$j]->action = DB::table('modules')
                    ->where('parent', $main[$i]->sub[$j]->id)->get();
            }
        }
        return $main;
    }

    public function show($id)
    {
        $main = Module::find($id);

        if ($main->parent == null) {
            $main->sub = DB::table('modules')
                ->where('parent', $main->id)->get();

            for ($i = 0; $i < count($main->sub); $i++) {
                $main->sub[$i]->action = DB::table('modules')
                    ->where('parent', $main->sub[$i]->id)->get();
            }
        } else {
            $action = DB::table('modules')
                ->where('parent', $main->id)->get();
            if (!count($action)) {
                $main = Module::find($id);
            } else {
                $main->action = DB::table('modules')
                    ->where('parent', $main->id)->get();
            }
        }

        return $main;
    }

    public function store(Request $request)
    {
        $data = Module::create($request->all());
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $data = Module::find($id);
        $data->update($request->all());
        return response()->json($data, 201);
    }

    public function destroy($id)
    {
        $data = Module::find($id);

        $subb = DB::table('modules')
            ->where('parent', $data->id)->get();
        for ($i = 0; $i < count($subb); $i++) {

            $acti = DB::table('modules')
                ->where('parent', $subb[$i]->id)->get();
            for ($j = 0; $j < count($acti); $j++) {
                Module::find($acti[$j]->id)->delete();
            }

            Module::find($subb[$i]->id)->delete();
        }
        $data->delete();
        return response()->json(null, 204);
    }

}
