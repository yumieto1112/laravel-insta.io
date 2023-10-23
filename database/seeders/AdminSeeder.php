<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->user->name = 'The Admin';
        $this->user->email = 'admin@gmail.com';
        $this->user->password = Hash::make('admin123');
        $this->user->role_id = User::ADMIN_ROLE_ID;
        $this->user->save();
    }
}
