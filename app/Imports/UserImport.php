<?php

namespace App\Imports;

use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $dateformated = Carbon::parse($row['date_of_birth']);
        return new User([
            //
            'first_name'=>$row['first_name'],
            'middle_name'=>$row['middle_name'],
            'last_name'=>$row['last_name'],
            'username'=>$row['username'],
            'gender'=>$row['gender'],
            'email'=>$row['email'],
            'date_of_birth'=>$dateformated,
            'place_of_birth'=>$row['place_of_birth'],
            'marital_status'=>$row['marital_status'],
            'spouse_name'=>$row['spouse_name'],
            'password'=>bcrypt($row['password'])
        ]);   
    }
}
