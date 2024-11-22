<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class createAdminUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-admin-user-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('Quel est votre nom ?');

        for ($i=1 ; $i < 4; $i++)
        {
            $email = $this->ask('Quel est votre email ?');
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $mdp = $this->ask('Quel est votre mdp ?');
                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => Hash::make($mdp),
                ]);
                $this->info("Utilisateur crée.");
                exit();
            } else {
                $this->info("Veuillez rentrer un email correcte (ex test@hotmail.com");
            }
        }
    }
}
