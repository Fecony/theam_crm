<?php

namespace App\Console\LocalCommands;

use App\Models\User;
use Illuminate\Console\Command;

class ToggleAdminState extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:toggle {username}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Toggle user admin role state';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $username = $this->argument('username');

        $user = User::where('username', $username)->first();

        if ($user) {
            $user->forceFill([
                'is_admin' => !$user->is_admin
            ])->save();

            $this->info("Admin state was toggled successfully for user '$username'!");
            return;
        }

        $this->error("User with username '$username' does not exist!");
    }
}
