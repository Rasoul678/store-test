<?php
    
    use App\Models\User;
    use Illuminate\Database\Seeder;

class UserWithRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::findOrFail(1);
        $user->assignRole('SuperAdmin');
    }
}
