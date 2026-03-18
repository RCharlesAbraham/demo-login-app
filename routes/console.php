<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('db:ping', function () {
    $this->info('Runtime connection details:');
    $this->line('DB_CONNECTION=' . config('database.default'));
    $this->line('DB_HOST=' . config('database.connections.mysql.host'));
    $this->line('DB_PORT=' . config('database.connections.mysql.port'));
    $this->line('DB_DATABASE=' . config('database.connections.mysql.database'));
    $this->line('DB_USERNAME=' . config('database.connections.mysql.username'));

    $this->newLine();
    $this->info('Session config:');
    $this->line('SESSION_DRIVER=' . config('session.driver'));
    $this->line('SESSION_COOKIE=' . config('session.cookie'));
    $this->line('SESSION_DOMAIN=' . var_export(config('session.domain'), true));
    $this->line('SESSION_PATH=' . config('session.path'));
    $this->line('SESSION_SAME_SITE=' . var_export(config('session.same_site'), true));
    $this->line('SESSION_SECURE_COOKIE=' . var_export(config('session.secure'), true));

    try {
        DB::connection()->getPdo();
        DB::select('select 1 as ok');
        $this->newLine();
        $this->info('DB connection test: OK');
        $this->line('users table: ' . (Schema::hasTable('users') ? 'yes' : 'no'));
        $this->line('sessions table: ' . (Schema::hasTable('sessions') ? 'yes' : 'no'));
    } catch (\Throwable $e) {
        $this->newLine();
        $this->error('DB connection test: FAIL');
        $this->line($e->getMessage());
    }
})->purpose('Show DB/session runtime config and test DB connectivity');
