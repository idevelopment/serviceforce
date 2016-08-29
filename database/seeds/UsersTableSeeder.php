<?php
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $data['name']     = 'Administrator';
        $data['email']    = 'admin@serviceforce.be';
        $data['password'] = bcrypt('demo123456');
        User::create($data);
    }
}
