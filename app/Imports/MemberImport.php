<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class MemberImport implements ToCollection, WithHeadingRow, WithValidation
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $test = new User();
            $test->name = $row['name'];
            $test->email = $row['email'];
            $test->save();
        }
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
        ];
    }
}
