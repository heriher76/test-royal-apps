<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CreateAuthor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:author {token}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new author.';

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
        $token = $this->argument('token');
        $first_name = $this->ask('First name');
        $last_name = $this->ask('Last name');
        $birthday = $this->ask('Birthday (format: yyyy-mm-dd)');
        $biography = $this->ask('Biography');
        $gender = $this->choice(
            'Gender',
            ['male', 'female']
        );    
        $place_of_birth = $this->ask('Place of Birth');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$token
        ])->post(env('API_URL').'/authors', [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'birthday' => $birthday,
            'biography' => $biography,
            'gender' => $gender,
            'place_of_birth' => $place_of_birth,
        ]);
        
        if($response->failed()) {
            $this->info("Create author failed.");
            return 1;
        }

        $this->info($response->body());
        $this->info('New author created succesfully!');
    }
}
