<?php

use Illuminate\Database\Seeder;
use App\Hafalan;
class HafalanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $memberRole = new Hafalan();
		$memberRole->id_penghafal = 1;
		$memberRole->id_penyimak  = 2;
		$memberRole->hafalan = "an - naba 1 -2 ";
		$memberRole->tanggal = "2016-02-01";
		$memberRole->nilai = "a";
		$memberRole->save();
    }
}
