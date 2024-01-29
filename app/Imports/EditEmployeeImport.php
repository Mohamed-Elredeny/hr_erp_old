<?php

namespace App\Imports;

use App\Models\Employee;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class EditEmployeeImport implements ToCollection
{
    protected $columnName;

    public function __construct($columnName)
    {
        $this->columnName = $columnName;
    }

    public function collection(Collection $rows)
    {
        $i = 0;
        foreach ($rows as $row) {
            if ($i == 0)
            {
                $i++;
            } else {
                $employee = Employee::where('empCode', $row[0])->get();

                $employee[0]->update([
                    "$this->columnName" => $row[1],
                ]);

            }

        }
    }

}
