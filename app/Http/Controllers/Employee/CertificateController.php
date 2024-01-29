<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Embassy;
use App\Models\Employee;
use App\Models\EmployeesCertificate;
use App\Models\Kpi;
use App\Models\Manager;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CertificateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:employee');
    }

    public function index(){
//        $emp = Employee::where('empCode',auth('employee')->user()->empCode)->first();
        $employee = Employee::find(auth('employee')->user()->id);
        $certificate = Certificate::where('Emp_Id',$employee->id)->orderBy('date_submit', 'desc')->get();
        $embassyes = Embassy::get();
        if (auth('employee')->user()->emailWork == "review@medgulfconstruction.com") {
            $certificates = Certificate::orderBy('date_submit', 'desc')->get();
            return view('employees.certificate.english.review.index', compact('employee','certificates'));
        }

        if (auth('employee')->user()->emailWork == "elie.azzi@ensrv.com" || auth('employee')->user()->emailWork == "approavl@medgulfconstruction.com") {
            $certificates = Certificate::orderBy('date_submit', 'desc')->get();
            return view('employees.certificate.english.approval.index', compact('employee','certificates'));
        }
        return view('employees.certificate.index', compact('employee','certificate','embassyes'));
    }

    public function store(Request $request){
        $count = Certificate::count();
        $count++;
        $emp = Employee::where('empCode',auth('employee')->user()->empCode)->first();
        $employee = Employee::find(auth('employee')->user()->id);
        $employeeCertificate = Certificate::insertGetId([
            'type'=>$request->certificate_type,
            'remark'=>$request->remark,
            'state'=>'0',
            'date_submit'=>date("Y/m/d"),
            'Emp_Id'=>$employee->id,
            'embassy'=>$request->embassy_name,
            'ref'=>"HRA-MG-2023-$count"
        ]);

        return redirect()->route('employee.certificate.index')->with('success', 'The request has been registered successfully');
    }

    public function showAll(){
        $emp = Employee::where('empCode',auth('employee')->user()->empCode)->first();
        $employee = Employee::find(auth('employee')->user()->id);
        $certificates = Certificate::where('Emp_Id',$employee->id)->orderBy('date_submit', 'desc')->get();
        return view('employees.certificate.show_all', compact('employee','certificates'));
    }

    public function show($id){
        $certificate = Certificate::find($id);
        $emp = Employee::where('id',$certificate->Emp_Id)->first();
        $employee = Employee::find(auth('employee')->user()->id);
        $authemp = Employee::where('empCode',auth('employee')->user()->empCode)->first();

        $units = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine');
        $teens = array('ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen');
        $tens = array('', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety');
        $thousands = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion');

        if (isset($certificate->salary)) {
            $sal = $certificate->salary;
        } else{
            $sal = $employee->TotalSalary;
        }
        $number = sprintf("%012d", $sal);
        $chunks = str_split($number, 3);
        $result = '';

        for ($i = 0; $i < count($chunks); $i++) {
            $chunk = (int)$chunks[$i];
            if ($chunk != 0) {
                $hundreds = floor($chunk / 100);
                $remainder = $chunk % 100;

                if ($hundreds > 0) {
                    $result .= $units[$hundreds] . ' hundred ';
                    if ($remainder > 0) {
                        $result .= ' and ';
                    }
                }

                if ($remainder < 10) {
                    $result .= ' ' . $units[$remainder];
                } elseif ($remainder < 20) {
                    $result .= ' ' . $teens[$remainder - 10];
                } else {
                    $result .= ' ' . $tens[floor($remainder / 10)];
                    $remainder %= 10;
                    if ($remainder > 0) {
                        $result .= '-' . $units[$remainder];
                    }
                }

                $result .= ' ' . $thousands[count($chunks) - $i - 1] . ' ' ;
            }
        }

        $employee->salaryText = $result;
//        return trim($result);

        if($certificate->type == "Personal Loan" || $certificate->type == "Credit Card" || $certificate->type == "Vehicle Loan") {
            if (auth('employee')->user()->emailWork == "review@medgulfconstruction.com" && $certificate->state == "0") {
                return view('employees.certificate.english.review.loan', compact('employee','certificate','authemp'));
            } elseif (auth('employee')->user()->emailWork == "elie.azzi@ensrv.com" || auth('employee')->user()->emailWork == "approavl@medgulfconstruction.com" && $certificate->state == "11") {
                return view('employees.certificate.english.approval.loan', compact('employee','certificate','authemp'));
            }
            return view('employees.certificate.english.loan', compact('employee','certificate','authemp'));
        } elseif ($certificate->type == "Employment Certificate to Embassy"){
            if (auth('employee')->user()->emailWork == "review@medgulfconstruction.com" && $certificate->state == "0") {
                return view('employees.certificate.english.review.embassy', compact('employee','certificate','authemp'));
            } elseif (auth('employee')->user()->emailWork == "elie.azzi@ensrv.com" || auth('employee')->user()->emailWork == "approavl@medgulfconstruction.com" && $certificate->state == "11") {
                return view('employees.certificate.english.approval.embassy', compact('employee','certificate','authemp'));
            }
            return view('employees.certificate.english.embassy', compact('employee','certificate','authemp'));
        } elseif ($certificate->type == "Certificate Without salary -TO WHOMSOEVER IT MAY CONCERN" || $certificate->type == "Salary Certificate-TO WHOMSOEVER IT MAY CONCERN"){
            if (auth('employee')->user()->emailWork == "review@medgulfconstruction.com" && $certificate->state == "0") {
                return view('employees.certificate.english.review.salary', compact('employee','certificate','authemp'));
            } elseif (auth('employee')->user()->emailWork == "elie.azzi@ensrv.com" || auth('employee')->user()->emailWork == "approavl@medgulfconstruction.com" && $certificate->state == "11") {
                return view('employees.certificate.english.approval.salary', compact('employee','certificate','authemp'));
            }
            return view('employees.certificate.english.salary', compact('employee','certificate','authemp'));
        }
        
        
        elseif ($certificate->type == "Gate Pass lost"){
            if (auth('employee')->user()->emailWork == "review@medgulfconstruction.com" && $certificate->state == "0") {
                return view('employees.certificate.arabic.review.Gate_Pass_lost', compact('employee','certificate','authemp'));
            } elseif (auth('employee')->user()->emailWork == "elie.azzi@ensrv.com" || auth('employee')->user()->emailWork == "approavl@medgulfconstruction.com" && $certificate->state == "11") {
                return view('employees.certificate.arabic.approval.Gate_Pass_lost', compact('employee','certificate','authemp'));
            }
            return view('employees.certificate.arabic.Gate_Pass_lost', compact('employee','certificate','authemp'));
        } elseif ($certificate->type == "Gate Pass Cancellation"){
            if (auth('employee')->user()->emailWork == "review@medgulfconstruction.com" && $certificate->state == "0") {
                return view('employees.certificate.arabic.review.Gate_Pass_Cancellation', compact('employee','certificate','authemp'));
            } elseif (auth('employee')->user()->emailWork == "elie.azzi@ensrv.com" || auth('employee')->user()->emailWork == "approavl@medgulfconstruction.com" && $certificate->state == "11") {
                return view('employees.certificate.arabic.approval.Gate_Pass_Cancellation', compact('employee','certificate','authemp'));
            }
            return view('employees.certificate.arabic.Gate_Pass_Cancellation', compact('employee','certificate','authemp'));
        } elseif ($certificate->type == "Experience Certificate"){
            if (auth('employee')->user()->emailWork == "review@medgulfconstruction.com" && $certificate->state == "0") {
                return view('employees.certificate.arabic.review.Experience_Certificate', compact('employee','certificate','authemp'));
            } elseif (auth('employee')->user()->emailWork == "elie.azzi@ensrv.com" || auth('employee')->user()->emailWork == "approavl@medgulfconstruction.com" && $certificate->state == "11") {
                return view('employees.certificate.arabic.approval.Experience_Certificate', compact('employee','certificate','authemp'));
            }
            return view('employees.certificate.arabic.Experience_Certificate', compact('employee','certificate','authemp'));
        } elseif ($certificate->type == "Family Visit visa request"){
            if (auth('employee')->user()->emailWork == "review@medgulfconstruction.com" && $certificate->state == "0") {
                return view('employees.certificate.arabic.review.Family_Visit_visa_request', compact('employee','certificate','authemp'));
            } elseif (auth('employee')->user()->emailWork == "elie.azzi@ensrv.com" || auth('employee')->user()->emailWork == "approavl@medgulfconstruction.com" && $certificate->state == "11") {
                return view('employees.certificate.arabic.approval.Family_Visit_visa_request', compact('employee','certificate','authemp'));
            }
            return view('employees.certificate.arabic.Family_Visit_visa_request', compact('employee','certificate','authemp'));
        } elseif ($certificate->type == "Family Residency visa request"){
            if (auth('employee')->user()->emailWork == "review@medgulfconstruction.com" && $certificate->state == "0") {
                return view('employees.certificate.arabic.review.Family_Residency_visa_request', compact('employee','certificate','authemp'));
            } elseif (auth('employee')->user()->emailWork == "elie.azzi@ensrv.com" || auth('employee')->user()->emailWork == "approavl@medgulfconstruction.com" && $certificate->state == "11") {
                return view('employees.certificate.arabic.approval.Family_Residency_visa_request', compact('employee','certificate','authemp'));
            }
            return view('employees.certificate.arabic.Family_Residency_visa_request', compact('employee','certificate','authemp'));
        } elseif ($certificate->type == "QID Lost" ){
            if (auth('employee')->user()->emailWork == "review@medgulfconstruction.com" && $certificate->state == "0") {
                return view('employees.certificate.arabic.review.QID_Lost', compact('employee','certificate','authemp'));
            } elseif (auth('employee')->user()->emailWork == "elie.azzi@ensrv.com" || auth('employee')->user()->emailWork == "approavl@medgulfconstruction.com" && $certificate->state == "11") {
                return view('employees.certificate.arabic.approval.QID_Lost', compact('employee','certificate','authemp'));
            }
            return view('employees.certificate.arabic.QID_Lost', compact('employee','certificate','authemp'));
        }
    }


    public function reviewConfirm(Request $request){
        $emp = Employee::where('empCode',auth('employee')->user()->empCode)->first();
        $employee = Employee::find(auth('employee')->user()->id);
        $certificate = Certificate::find($request->id);
        $certificate->update([
            'state'=>'11',
            'review_date'=>date("Y/m/d"),
            'salary'=> $request->salary,
            'review_name'=> $request->review_name,
            'review_remark'=> $request->review_remark,
        ]);
        return redirect()->route('employee.certificate.index')->with('success', 'The request has been confirmed successfully');
    }

    public function reviewReject(Request $request){
        $emp = Employee::where('empCode',auth('employee')->user()->empCode)->first();
        $employee = Employee::find(auth('employee')->user()->id);
        $certificate = Certificate::find($request->id);
        $certificate->update([
            'state'=>'10',
            'review_date'=>date("Y/m/d"),
            'review_name'=> $request->review_name,
            'review_remark'=> $request->review_remark,
        ]);
        return redirect()->route('employee.certificate.index')->with('success', 'The request has been Rejected successfully');
    }

    public function approvalConfirm(Request $request){
        $employeemail = Employee::where('empCode',auth('employee')->user()->empCode)->first();
        $employee = Employee::find($employeemail->id);
        $certificate = Certificate::find($request->id);
        $request->empmail = $employeemail->emailWork;
//        Mail::send('employees.certificate.email', ['token' => $employee], function($message) use($request){
//            $message->to($request->empmail);
//            $message->subject('Your Certificate Request Has Been Granted and Process Completed');
//        });
        $certificate->update([
            'state'=>'21',
            'approval_date'=>date("Y/m/d"),
            'approval_remark'=> $request->review_remark,
        ]);
        return redirect()->route('employee.certificate.index')->with('success', 'The request has been confirmed successfully');
    }

    public function approvalReject(Request $request){
        $emp = Employee::where('empCode',auth('employee')->user()->empCode)->first();
        $employee = Employee::find(auth('employee')->user()->id);
        $certificate = Certificate::find($request->id);
        $certificate->update([
            'state'=>'20',
            'approval_date'=>date("Y/m/d"),
            'approval_remark'=> $request->review_remark,
        ]);
        return redirect()->route('employee.certificate.index')->with('success', 'The request has been Rejected successfully');
    }

    public function printPage($id) {
        $certificate = Certificate::find($id);
        $employee = Employee::find($certificate->Emp_Id);
        $authemp = Employee::where('EmpCode',auth('employee')->user()->empCode)->first();

        $units = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine');
        $teens = array('ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen');
        $tens = array('', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety');
        $thousands = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion');

        if (isset($certificate->salary)) {
            $sal = $certificate->salary;
        } else{
            $sal = $employee->TotalSalary;
        }
        $number = sprintf("%012d", $sal);
        $chunks = str_split($number, 3);
        $result = '';

        for ($i = 0; $i < count($chunks); $i++) {
            $chunk = (int)$chunks[$i];
            if ($chunk != 0) {
                $hundreds = floor($chunk / 100);
                $remainder = $chunk % 100;

                if ($hundreds > 0) {
                    $result .= $units[$hundreds] . ' hundred ';
                    if ($remainder > 0) {
                        $result .= ' and ';
                    }
                }

                if ($remainder < 10) {
                    $result .= ' ' . $units[$remainder];
                } elseif ($remainder < 20) {
                    $result .= ' ' . $teens[$remainder - 10];
                } else {
                    $result .= ' ' . $tens[floor($remainder / 10)];
                    $remainder %= 10;
                    if ($remainder > 0) {
                        $result .= '-' . $units[$remainder];
                    }
                }

                $result .= ' ' . $thousands[count($chunks) - $i - 1] . ' ' ;
            }
        }

        $employee->salaryText = $result;
//        return trim($result);

        if($certificate->type == "Personal Loan" || $certificate->type == "Credit Card" || $certificate->type == "Vehicle Loan") {
            return view('employees.certificate.english.print.loan', compact('employee','certificate','authemp'));
        } elseif ($certificate->type == "Employment Certificate to Embassy"){
            return view('employees.certificate.english.print.embassy', compact('employee','certificate','authemp'));
        } elseif ($certificate->type == "Certificate Without salary -TO WHOMSOEVER IT MAY CONCERN" || $certificate->type == "Salary Certificate-TO WHOMSOEVER IT MAY CONCERN"){
            return view('employees.certificate.english.print.salary', compact('employee','certificate','authemp'));
        } elseif ($certificate->type == "Gate Pass lost"){
            return view('employees.certificate.arabic.print.Gate_Pass_lost', compact('employee','certificate','authemp'));
        } elseif ($certificate->type == "Gate Pass Cancellation"){
            return view('employees.certificate.arabic.print.Gate_Pass_Cancellation', compact('employee','certificate','authemp'));
        } elseif ($certificate->type == "Experience Certificate"){
            return view('employees.certificate.arabic.print.Experience_Certificate', compact('employee','certificate','authemp'));
        } elseif ($certificate->type == "Family Visit visa request"){
            return view('employees.certificate.arabic.print.Family_Visit_visa_request', compact('employee','certificate','authemp'));
        } elseif ($certificate->type == "Family Residency visa request"){
            return view('employees.certificate.arabic.print.Family_Residency_visa_request', compact('employee','certificate','authemp'));
        } elseif ($certificate->type == "QID Lost"){
            return view('employees.certificate.arabic.print.QID_Lost', compact('employee','certificate','authemp'));
        }
    }
}
