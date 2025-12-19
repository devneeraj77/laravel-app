<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Facade;

require __DIR__ . '/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Bootstrap Laravel App
|--------------------------------------------------------------------------
*/
$app = require_once __DIR__ . '/bootstrap/app.php';
Facade::setFacadeApplication($app);

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "========================================\n";
echo "  LARAVEL DATABASE HEALTH CHECK\n";
echo "========================================\n\n";

/*
|--------------------------------------------------------------------------
| 1. Check DB Connection
|--------------------------------------------------------------------------
*/
echo "1. Checking database connection...\n";

try {
    DB::connection()->getPdo();
    echo "   ✓ Connected successfully.\n\n";
} catch (Exception $e) {
    echo "   ✗ Connection failed:\n";
    echo "     " . $e->getMessage() . "\n";
    exit(1);
}

/*
|--------------------------------------------------------------------------
| 2. Check Required Tables
|--------------------------------------------------------------------------
*/
echo "2. Checking required tables...\n";

// Add your required tables here
$requiredTables = [
    'users',
    'failed_jobs',
    'migrations',
    'password_resets',
    // add custom tables if needed:
    // 'flights',
];

$missingTables = [];

foreach ($requiredTables as $table) {
    if (!DB::getSchemaBuilder()->hasTable($table)) {
        $missingTables[] = $table;
    }
}

if (empty($missingTables)) {
    echo "   ✓ All required tables exist.\n\n";
} else {
    echo "   ✗ Missing tables: " . implode(', ', $missingTables) . "\n\n";
}

/*
|--------------------------------------------------------------------------
| 3. Write Test
|--------------------------------------------------------------------------
*/
echo "3. Running write test...\n";

try {
    DB::statement("CREATE TABLE IF NOT EXISTS health_check_tmp (
        id INT AUTO_INCREMENT PRIMARY KEY,
        message VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    DB::table('health_check_tmp')->insert([
        'message' => 'health check test'
    ]);

    echo "   ✓ Write test successful.\n\n";
} catch (Exception $e) {
    echo "   ✗ Write test FAILED:\n";
    echo "     " . $e->getMessage() . "\n\n";
}

/*
|--------------------------------------------------------------------------
| 4. Read Test
|--------------------------------------------------------------------------
*/
echo "4. Running read test...\n";

try {
    $last = DB::table('health_check_tmp')->latest('id')->first();
    echo "   ✓ Read test successful. Last ID: {$last->id}\n\n";
} catch (Exception $e) {
    echo "   ✗ Read test FAILED:\n";
    echo "     " . $e->getMessage() . "\n\n";
}

/*
|--------------------------------------------------------------------------
| DONE
|--------------------------------------------------------------------------
*/

echo "========================================\n";
echo "  DATABASE HEALTH CHECK COMPLETED\n";
echo "========================================\n";
