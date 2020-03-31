<?php
    
    use App\Models\User;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Str;
    
    class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
        
        factory('App\Models\User', 3)->create();
    }
}
