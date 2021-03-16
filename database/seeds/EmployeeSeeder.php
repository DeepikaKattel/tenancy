<?php

use App\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'name'=>'Laravel',
            'domain'=>'Laravel.wip',
            'database'=>'laravel'
        ]);
        Employee::create([
            'name'=>'Laravel',
            'domain'=>'Paravel.wip',
            'database'=>'paravel'
        ]);
    }
}
