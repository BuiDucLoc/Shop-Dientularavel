<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(tbl_admin1::class);
    }
}
class tbl_admin1 extends Seeder{
	public function run(){
		DB::table('tbl_admin')->insert([
			['admin_email'=>'admin@gmail.com','admin_password'=>md5(123),'admin_name'=>'Bùi Đức Lộc','admin_phone'=>'0123456789'],
            ['admin_email'=>'loc@gmail.com','admin_password'=>md5(123),'admin_name'=>'Nguyễn Văn A','admin_phone'=>'0123456789'],
		]);
	}
}
