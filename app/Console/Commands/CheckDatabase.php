<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Throwable;

class CheckDatabase extends Command
{
    protected $signature = 'app:db-check';
    protected $description = 'Checks database connection, tables, and read/write capability';

    public function handle()
    {
        $this->info("Running Database Health Check...\n");

        /** --------------------------------
         * 1. Check DB connection
         * --------------------------------*/
        try {
            DB::connection()->getPdo();
            $this->info("✓ Database connection successful!");
        } catch (Throwable $e) {
            $this->error("✗ Database connection failed:");
            $this->error($e->getMessage());
            return Command::FAILURE;
        }

        /** --------------------------------
         * 2. Check required tables
         * --------------------------------*/
        $requiredTables = ['users', 'password_resets', 'jobs']; // add your tables

        $missing = [];

        foreach ($requiredTables as $table) {
            if (!DB::getSchemaBuilder()->hasTable($table)) {
                $missing[] = $table;
            }
        }

        if ($missing) {
            $this->error("✗ Missing tables: " . implode(', ', $missing));
        } else {
            $this->info("✓ All required tables exist.");
        }

        /** --------------------------------
         * 3. Check read/write (optional)
         * --------------------------------*/
        try {
            DB::table('health_checks')->insert([
                'status' => 'ok',
                'created_at' => now(),
            ]);
            $this->info("✓ Write test successful!");

            $last = DB::table('health_checks')->latest()->first();
            $this->info("✓ Read test successful! Last entry ID: " . $last->id);

        } catch (Throwable $e) {
            $this->error("✗ Read/Write test failed:");
            $this->error($e->getMessage());
        }

        $this->info("\nDatabase Health Check Completed.");
        return Command::SUCCESS;
    }
}
