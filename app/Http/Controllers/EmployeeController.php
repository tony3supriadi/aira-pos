<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;

class EmployeeController extends Controller
{
    
    public function index()
    {
        return DB::table('employees')
            ->select('employees.*', 'rules.name as ruleName')
            ->join('rules', 'rules.id', '=', 'employee.ruleId')
            ->get();
    }

    public function show($id)
    {
        return DB::table('employees')
            ->select('employees.*', 'rules.name as ruleName')
            ->join('rules', 'rules.id', '=', 'employee.ruleId')
            ->where('employee.id', $id)
            ->first();
    }

    public function store(Request $request)
    {
        $data = Employee::create($request->all());
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $data = Employee::find($id);
        $data->update($request->all());
        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $data = Employee::find($id);
        $data->delete();
        return response()->json(null, 204);
    }

}
