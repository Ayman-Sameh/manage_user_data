<?php

namespace App\Imports;

use App\Models\UserData;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class  UserDataImport implements ToCollection , ToModel
{
    private $current = 0;

    public function collection(Collection $collection)
    {

    }

    public function model(array $row)
    {
        $this->current++;
        if ($this->current > 1) {

            $count = UserData::where('email' , '=' , $row[2])->count();

            if (empty($count)) {
                $data = new UserData;
                $data->full_name    = $row[0];
                $data->phone_number = $row[1];
                $data->email        = $row[2];
                $data->save();
            }

        }
    }
}
