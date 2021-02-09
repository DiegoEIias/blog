<?php

namespace App\Console\Commands;

use App\Models\Rank;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Installer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Instalador inicial';

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
        if(!$this->verify()) {
            $rank = $this->createRankSuperAdmin();
            $user = $this->createUserSuperAdmin();
            $user->Ranks()->attach($rank);
            $this->line('Felicitaciones');
        } else {
            $this->error('No se puede ejecutar');
        }
    }

    private function verify()
    {
        return Rank::find(1);
    }

    private function createRankSuperAdmin()
    {
        $rank = "Super Admin";
        return Rank::create([
            'name' => $rank,
            'slug' => Str::slug($rank, '-')
        ]);
    }

    private function createUserSuperAdmin()
    {
        return User::create([
            'name' => 'Root',
            'email' => 'diegoelias@gamerxhq.net',
            'password' => Hash::make('123456'),
            'state' => 1
        ]);
    }
}
