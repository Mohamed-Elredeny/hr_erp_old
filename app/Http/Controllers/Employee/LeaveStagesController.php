<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use App\Models\LeaveStage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LeaveStagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $status = $request->status;
        $stage_id = $request->stageId;
        $comments = $request->stageComments;
        $stage = LeaveStage::find($stage_id);
        $employee_id = auth('employee')->user()->id;
        if (isset($request->signature)) {
            $fileName = $request->signature->getClientOriginalName();
            $file_to_store = time() . '_' . $fileName;
            $request->signature->move(public_path('assets/images/'), $file_to_store);
        } else {
            $file_to_store = $stage->attachments;
        }
        if (isset($request->FlightTicket)) {
            $fileName = $request->FlightTicket->getClientOriginalName();
            $file_to_store1 = time() . '_' . $fileName;
            $request->FlightTicket->move(public_path('assets/images/'), $file_to_store1);
        }
        $old_extra_info = explode('|', $stage['extraInfo']);

        $extraInfo = [
            'RequiredAllocation' => $request->RequiredAllocation ?? 0,
            'ReplacementRequirement' => $request->ReplacementRequirement ?? $old_extra_info[1] ?? '',
            'HandoverPrepared' => $request->HandoverPrepared ?? $old_extra_info[2] ?? '',
            'LastSubmission' => Date('d-m-y h:i:s'),
            'leaveProceed' => $request->leaveProceed ?? $old_extra_info[4] ?? '',
            'leaveProceedGm' => $request->leaveProceedGm ?? $old_extra_info[5] ?? '',
            'BusinessProceed' => $request->BusinessProceed ?? $old_extra_info[6] ?? '',
            'resumptionDate' => $request->resumptionDate ?? $old_extra_info[7] ?? '',
            'FightSector' => $request->FightSector ?? $old_extra_info[8] ?? '',
            'LeaveEntitlement' => $request->LeaveEntitlement ?? $old_extra_info[9] ?? '',
            'FlightTicket' => $file_to_store1 ?? $old_extra_info[10] ?? '',
            'AccommodationKeys' => $request->AccommodationKeys ?? $old_extra_info[11] ?? '',
            'ApartmentCondition' => $request->ApartmentCondition ?? $old_extra_info[12] ?? '',
            'VehicleReturned' => $request->VehicleReturned ?? $old_extra_info[13] ?? '',
            'EquipmentHandOver' => $request->EquipmentHandOver ?? $old_extra_info[14] ?? '',
            'FuelReturned' => $request->FuelReturned ?? $old_extra_info[15] ?? '',
            'shapeEquipment' => $request->shapeEquipment ?? $old_extra_info[16] ?? '',
            'PPEItem' => $request->PPEItem ?? $old_extra_info[17] ?? '',
            'storeInventoryCleared' => $request->storeInventoryCleared ?? $old_extra_info[18] ?? '',
            'OutstandingDeductions' => $request->OutstandingDeductions ?? $old_extra_info[19] ?? '',
            'LapTopReturned' => $request->LapTopReturned ?? $old_extra_info[20] ?? '',
            'DesktopHandOver' => $request->DesktopHandOver ?? $old_extra_info[21] ?? '',
            'Mobile&SmCard' => $request['Mobile&SmCard'] ?? $old_extra_info[22] ?? '',
            'OthersText' => $request->OthersText ?? $old_extra_info[23] ?? '',
            'OthersDevices' => $request->OthersDevices ?? $old_extra_info[24] ?? '',
            'HrProceed' => $request->HrProceed ?? $old_extra_info[25] ?? '',
            'DirectorHrProceed' => $request->DirectorHrProceed ?? $old_extra_info[26] ?? '',
            'EmpRelationMobilePhone' => $request->EmpRelationMobilePhone ?? $old_extra_info[27] ?? '',
            'TicketEntitled' => $request->TicketEntitled ?? $old_extra_info[28] ?? '',

            'onHoldReasons' => $request->onHoldReasons ?? $old_extra_info[29] ?? '',
            'otherReasonsHoldText' => $request->otherReasonsHoldText ?? $old_extra_info[30] ?? '',

            'onRejectReasons' => $request->onRejectReasons ?? $old_extra_info[31] ?? '',
            'otherReasonsRejectText' => $request->otherReasonsRejectText ?? $old_extra_info[32] ?? '',

            'exitPermit'=>$request->exitPermit ?? $old_extra_info[33] ?? ''
        ];

        if($stage->responsible_employee == null){
            $stage->update([
               'responsible_employee'=>$employee_id
            ]);
        }

        $stage->update([
            'comments' => $comments,
            'status' => $status,
            'attachments' => $file_to_store,
            'extraInfo' => implode('|', $extraInfo)
        ]);
        $stage->leave->update([
            'status' => $stage->stage_name
        ]);

        return redirect()->back()->with('success', 'Done Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
