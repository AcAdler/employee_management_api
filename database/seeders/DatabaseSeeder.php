<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $hr = Department::create(['name' => 'Human Resources']);
        $it = Department::create(['name' => 'IT Department']);
        $finance = Department::create(['name' => 'Finance']);

        Employee::create([
            'first_name' => 'Juan',
            'last_name' => 'Dela Cruz',
            'email' => 'juan@example.com',
            'department_id' => $it->id,
        ]);

        Employee::create([
            'first_name' => 'Maria',
            'last_name' => 'Santos',
            'email' => 'maria@example.com',
            'department_id' => $hr->id,
        ]);

        Employee::create([
            'first_name' => 'Pedro',
            'last_name' => 'Penduko',
            'email' => 'pedro@example.com',
            'department_id' => $it->id,
        ]);

        Employee::create([
            'first_name' => 'Ana',
            'last_name' => 'Reyes',
            'email' => 'ana@example.com',
            'department_id' => $finance->id,
        ]);
    }
}