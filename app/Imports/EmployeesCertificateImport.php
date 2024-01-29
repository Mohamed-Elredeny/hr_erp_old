<?php

namespace App\Imports;

use App\Models\EmployeesCertificate;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class EmployeesCertificateImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $employeeId = EmployeesCertificate::insertGetId([
                'EmpCode' => $row[0],
                'EmpName' => $row[1],
                'Nationality' => $row[2],
                'Designation' => $row[3],
                'ProjectDepartmentName' => $row[4],
                'ProjectDepartmentNumber' => $row[5],
                'BirthDate' => Date::excelToDateTimeObject($row[6])->format('Y-m-d'),
                'Passport' => $row[7],
                'EmplAcco' => $row[8],
                'ArabicName' => $row[9],
                'ArabicJobTitle' => $row[10],
                'ArabicNationality' => $row[11],
                'Visa' => $row[12],
                'Gender' => $row[13],
                'JoiningDate' => Date::excelToDateTimeObject($row[14])->format('Y-m-d'),
                'TotalSalary' => $row[15],
                'company_id'=>3,
            ]);

            $employee = EmployeesCertificate::find($employeeId);
            if($row[14]==''){
                $employee->update([
                    'JoiningDate'=>null,
                ]);
                $employee->update([
                    'BirthDate'=>null,
                ]);
            }
        }
    }
}
