<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AddAdminCmd extends Command
{
    protected $signature = 'make:admin {--email=} {--password=} {--name=}';

    protected $description = 'Create an admin user if not exists';

    public function handle()
    {
        $admin = User::where("is_admin", true)->first();

        if ($admin) {
            $this->info("Admin user already exists.");
            return;
        }

        $user = User::create([
            "email" => $this->option("email") ?? "admin@example.com",
            "name" => $this->option("name") ?? "Admin",
            "password" => Hash::make($this->option("password") ?? "password"),
            "is_admin" => true
        ]);

        $this->info("Admin user created successfully.");
    }
}