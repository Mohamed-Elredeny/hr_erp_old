<?php

namespace App\Imports;

use App\Models\Employee;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class EmployeeImport implements ToCollection
{
//    private $data;
//
//    public function __construct($data = '')
//    {
//        $this->data = $data;
//    }
    public function collection(Collection $rows)
    {
        $i = 0;
        foreach ($rows as $row) {
            if ($i == 0) {
                $i++;
            } else {
                if ($row[76] == 'Medgulf') {
                    $entityId = '1';
                } elseif ($row[76] == 'Trags Engineering') {
                    $entityId = '2';
                } elseif ($row[76] == 'Trags Trading') {
                    $entityId = '3';
                } else {
                    $entityId = '1';
                }
                $employee = Employee::where('empCode',$row[1])->first();
                if(!$employee) {
                    $employeeId = Employee::insertGetId([
                        'status' => $row[0],
                        'empCode' => $row[1],
                        'empName' => $row[2],
                        'nationality' => $row[3],
                        'designation' => $row[4],
                        'projectDepartmentNumber' => $row[5],
                        'projectDepartmentName' => $row[6],
                        'minimum' => $row[7],
                        'maximum' => $row[8],
                        'class' => $row[9],
                        'jobFamily' => $row[10],
                        'jobCode' => $row[11],
                        'categoryPayroll' => $row[12],
                        'empAcc' => $row[13],
                        'joiningDate' => Date::excelToDateTimeObject($row[14])->format('Y-m-d'),
                        'service' => $row[15],
                        'birthDate' => Date::excelToDateTimeObject($row[16])->format('Y-m-d'),
                        'age' => $row[17],
                        'warning' => $row[18],
                        'payType' => $row[19],
                        'eligibility' => $row[20],
                        'vacDays' => $row[21],
                        'sector' => $row[22],
                        'ticketAmount' => $row[23],
                        'numTickets' => $row[24],
                        'familyStatus' => $row[25],
                        'settDate' => Date::excelToDateTimeObject($row[26])->format('Y-m-d'),
                        'campedsc' => $row[27],
                        'passportNo' => $row[28],
                        'passportValidity' => Date::excelToDateTimeObject($row[29])->format('Y-m-d'),
                        'visaNo' => $row[30],
                        'visaExpiry' => Date::excelToDateTimeObject($row[31])->format('Y-m-d'),
                        'visaType' => $row[32],
                        'sponsor' => $row[33],
                        'sex' => $row[34],
                        'empStatus' => $row[35],
                        'effectiveDate' => Date::excelToDateTimeObject($row[36])->format('Y-m-d'),
                        'visaIssueDate' => Date::excelToDateTimeObject($row[37])->format('Y-m-d'),
                        'emailWork' => $row[38],
                        'mobileWork' => $row[39],
                        'mobile' => $row[40],
                        'finger' => Date::excelToDateTimeObject($row[41])->format('Y-m-d'),
                        'medical' => Date::excelToDateTimeObject($row[42])->format('Y-m-d'),
                        'dutyResumption' => $row[43],
                        'hcCode' => $row[44],
                        'hcExpDate' => Date::excelToDateTimeObject($row[45])->format('Y-m-d'),
                        'agency' => $row[46],
                        'basic' => $row[47],
                        'hra' => $row[48],
                        'ta' => $row[49],
                        'fixedOt' => $row[50],
                        'otherAllowance' => $row[51],
                        'total' => $row[52],
                        'arabic_name' => $row[53],
                        'arabic_nationality' => $row[55],
                        'arabic_designation' => $row[54],
                        'total_salary' => $row[56],


                        'grade' => $row[57],
                        'food' => $row[58],
                        'oTMedgulf' => $row[59],
                        'telephoneOT' => $row[60],
                        'other' => $row[61],
                        'pPCEDSC' => $row[62],
                        'jLGC_EMPCARD_GRADE' => $row[63],
                        'mOBIRANGE' => $row[64],
                        'national_Add_Remarks' => $row[65],
                        'national_Add_STS' => $row[66],
                        'license' => $row[67],
                        'cARVALID' => $row[68],
                        'last_resump_Laeve' => $row[69],
                        'leave_Entitl_Days' => $row[70],
                        'leave_Settled_Date' => $row[71],
                        'flight_Ticket_Sector' => $row[72],
                        'available_Employee_Leaves' => $row[73],
                        'job_Expire' => $row[74],
                        'last_Date_Flight_Ticket' => $row[75],
                        'company_id' => $entityId,
                    ]);
                }else{
                    $employeeId = $employee->id;
                    $employee->update([
                        'status' => $row[0],
                        'empCode' => $row[1],
                        'empName' => $row[2],
                        'nationality' => $row[3],
                        'designation' => $row[4],
                        'projectDepartmentNumber' => $row[5],
                        'projectDepartmentName' => $row[6],
                        'minimum' => $row[7],
                        'maximum' => $row[8],
                        'class' => $row[9],
                        'jobFamily' => $row[10],
                        'jobCode' => $row[11],
                        'categoryPayroll' => $row[12],
                        'empAcc' => $row[13],
                        'joiningDate' => Date::excelToDateTimeObject($row[14])->format('Y-m-d'),
                        'service' => $row[15],
                        'birthDate' => Date::excelToDateTimeObject($row[16])->format('Y-m-d'),
                        'age' => $row[17],
                        'warning' => $row[18],
                        'payType' => $row[19],
                        'eligibility' => $row[20],
                        'vacDays' => $row[21],
                        'sector' => $row[22],
                        'ticketAmount' => $row[23],
                        'numTickets' => $row[24],
                        'familyStatus' => $row[25],
                        'settDate' => Date::excelToDateTimeObject($row[26])->format('Y-m-d'),
                        'campedsc' => $row[27],
                        'passportNo' => $row[28],
                        'passportValidity' => Date::excelToDateTimeObject($row[29])->format('Y-m-d'),
                        'visaNo' => $row[30],
                        'visaExpiry' => Date::excelToDateTimeObject($row[31])->format('Y-m-d'),
                        'visaType' => $row[32],
                        'sponsor' => $row[33],
                        'sex' => $row[34],
                        'empStatus' => $row[35],
                        'effectiveDate' => Date::excelToDateTimeObject($row[36])->format('Y-m-d'),
                        'visaIssueDate' => Date::excelToDateTimeObject($row[37])->format('Y-m-d'),
                        'emailWork' => $row[38],
                        'mobileWork' => $row[39],
                        'mobile' => $row[40],
                        'finger' => Date::excelToDateTimeObject($row[41])->format('Y-m-d'),
                        'medical' => Date::excelToDateTimeObject($row[42])->format('Y-m-d'),
                        'dutyResumption' => $row[43],
                        'hcCode' => $row[44],
                        'hcExpDate' => Date::excelToDateTimeObject($row[45])->format('Y-m-d'),
                        'agency' => $row[46],
                        'basic' => $row[47],
                        'hra' => $row[48],
                        'ta' => $row[49],
                        'fixedOt' => $row[50],
                        'otherAllowance' => $row[51],
                        'total' => $row[52],
                        'arabic_name' => $row[53],
                        'arabic_nationality' => $row[55],
                        'arabic_designation' => $row[54],
                        'total_salary' => $row[56],


                        'grade' => $row[57],
                        'food' => $row[58],
                        'oTMedgulf' => $row[59],
                        'telephoneOT' => $row[60],
                        'other' => $row[61],
                        'pPCEDSC' => $row[62],
                        'jLGC_EMPCARD_GRADE' => $row[63],
                        'mOBIRANGE' => $row[64],
                        'national_Add_Remarks' => $row[65],
                        'national_Add_STS' => $row[66],
                        'license' => $row[67],
                        'cARVALID' => $row[68],
                        'last_resump_Laeve' => $row[69],
                        'leave_Entitl_Days' => $row[70],
                        'leave_Settled_Date' => $row[71],
                        'flight_Ticket_Sector' => $row[72],
                        'available_Employee_Leaves' => $row[73],
                        'job_Expire' => $row[74],
                        'last_Date_Flight_Ticket' => $row[75],
                        'company_id' => $entityId,
                    ]);
                }
                /*
                 * GRADE	Food	OTMedgulf	Telephone/OT	Other	PPCEDSC	JLGC_PER_EMPCARD.GRADE	MOBIRANGE	National Add Remarks	National Add STS	License	CARVALID	Last Resumption / Laeve Joing Date 	Leave Entitlement / Leave balance Days	Leave Settled Date	Flight Ticket Sector	Available Employee Leaves.	Job Expire	Last Date Flight Ticket */

                $employee = Employee::find($employeeId);
                if ($row[14] == '') {
                    $employee->update([
                        'joiningDate' => null,
                    ]);
                }
                if ($row[16] == '') {
                    $employee->update([
                        'birthDate' => null,
                    ]);
                }
                if ($row[26] == '') {
                    $employee->update([
                        'settDate' => null,
                    ]);
                }
                if ($row[29] == '') {
                    $employee->update([
                        'passportValidity' => null,
                    ]);
                }
                if ($row[31] == '') {
                    $employee->update([
                        'visaExpiry' => null,
                    ]);
                }
                if ($row[36] == '') {
                    $employee->update([
                        'effectiveDate' => null,
                    ]);
                }
                if ($row[37] == '') {
                    $employee->update([
                        'visaIssueDate' => null,
                    ]);
                }
                if ($row[41] == '') {
                    $employee->update([
                        'finger' => null,
                    ]);
                }
                if ($row[42] == '') {
                    $employee->update([
                        'medical' => null,
                    ]);
                }
                if ($row[45] == '') {
                    $employee->update([
                        'hcExpDate' => null,
                    ]);
                }
            }

        }
    }

}
