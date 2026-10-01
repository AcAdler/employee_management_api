<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $query = Employee::with('department');

        if ($request->has('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($request->has('department_id')) {
            $query->where('department_id', $request->department_id);
        }

        return response()->json($query->paginate(10));
    }
}