<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BuildFrontend extends Command
{
    protected $signature = 'build:frontend';
    protected $description = 'Build frontend assets using Vite';

    public function handle()
    {
        $this->info('Running npm run build...');
        exec('npm run build 2>&1', $output, $return);
        foreach ($output as $line) {
            $this->line($line);
        }
        $this->info('Frontend build complete.');
        return $return;
    }
}
