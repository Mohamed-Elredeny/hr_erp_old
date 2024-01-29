<?php

namespace App\Imports;

use App\Models\Designation;
use App\Models\UserDesignation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class DesignaionsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        dd($row);
        return new UserDesignation([
            'name' => $row['name'],
            'jobSummary' => $row['jobSummary'],
            'qualificationsForPosition' => $row['qualificationsForPosition'],
            'responsibilities' => $row['responsibilities'],
            'images' => $row['images']
        ]);
    }

}
