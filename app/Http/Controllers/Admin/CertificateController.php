<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\EmployeesCertificateImport;
use App\Models\EmployeesCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class CertificateController extends Controller
{
    public function import(Request $request)
    {
//        return 1;
        $fileName = $request->file->getClientOriginalName();
        $file_to_store = time() . '_' . $fileName ;
        $request->file->move(public_path('assets/images/files/cer/'), $file_to_store);


        Excel::import(new EmployeesCertificateImport, public_path("assets/images/files/cer/$file_to_store"));

        return redirect()->back()->with('success', 'Data imported successfully');
    }
}
