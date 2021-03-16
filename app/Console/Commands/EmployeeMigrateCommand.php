<?php

namespace App\Console\Commands;

use App\Employee;
use Illuminate\Console\Command;

class EmployeeMigrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:migrate {$employee?} {--fresh} {--seed}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if($this->argument('employee')){
            $this->migrate(
                Employee::find($this->argument('employee'))
            );
        }else{
            Employee::all()->each(
                fn($employee) => $this->migrate($employee)
            );
        }
    }
     public function migrate($employee){
        $employee->configure()->user();

        $this->line('');
        $this->line("==================");
        $this->info("Migrating Tenant #{$employee->id} ({$employee->name})");
        $this->line("===========================");

        $options = ['--force' => true];

        if($this->option('seed')){
            $options['--seed'] = true;
        }
        $this->call(
            $this->option('fresh') ? 'migrate:fresh' : 'migrate',
            $options
        );

     }
}
