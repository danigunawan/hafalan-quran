<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Membuat role member
		$memberRole = new Role();
		$memberRole->name = "member";
		$memberRole->display_name = "Member";
		$memberRole->save();

		// Membuat sample member
		$member = new User();
		$member->name = "Sample Member";
		$member->email = 'member@gmail.com';
		$member->password = bcrypt('rahasia');
		$member->save();
		$member->attachRole($memberRole);

		$member1 = new User();
		$member1->name = "Sample member1";
		$member1->email = 'member1@gmail.com';
		$member1->password = bcrypt('rahasia');
		$member1->save();
		$member1->attachRole($memberRole);

    }
}
