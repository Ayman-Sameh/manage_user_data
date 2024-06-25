<?php

namespace App\Exports;

use App\Models\UserData;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;


class UserDataExport implements FromArray , WithHeadings
{
    public function array():array
    {
        $list = [];

        $data = UserData::all();

        foreach ($data as $item) {
            $list[] = [$item->full_name , $item->phone_number , $item->email];
        }

        return $list;
    }

    public function headings(): array
    {
        return [
            'full name',
            'Phone number',
            'Email',

        ];
    }
}
