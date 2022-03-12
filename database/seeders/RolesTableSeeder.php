<?php

namespace Database\Seeders;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('roles')->truncate();
        
        $roles =  [
            [
                'title' => 'Pastor',
                'Description' => 'The Controller of all the church activities',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
              ],

              [
                'title' => 'Accountant',
                'Description' => 'Responsible for Accounting and finance in Church',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
              ],
            [
              'title' => 'Administrator',
              'Description' => 'Controls the System as whole',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Parish Worker',
                'Description' => 'Assisting pastors duties',
                'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Evangelist',
                'Description' => 'Administering sermons',
                'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Congregation Secretary',
                'Description' => 'Setting up the schedules',
                'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Normal',
                'Description' => 'Normal',
                'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ]
          ];
          Role::insert($roles);
    }
}
