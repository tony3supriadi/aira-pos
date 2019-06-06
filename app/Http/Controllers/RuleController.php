<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rule;

class RuleController extends Controller
{
    public function index()
    {
        return Rule::all();
    }

    public function show($id)
    {
        return Rule::find($id);
    }

    public function store(Request $request)
    {
        $name = $request->post('name');
        $modules = implode(",", $request->post('modules'));

        $data = Rule::create([
            'name' => $name,
            'modules' => $modules
        ]);
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $data = Rule::find($id);
        $data->name = $request->post('name');
        $data->modules = implode(",", $request->post('modules'));
        $data->save();

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $data = Rule::find($id);
        $data->delete();

        return response()->json(null, 204);
    }
}
