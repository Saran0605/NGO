<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Form;
use App\Models\BankDetail;
use App\Models\landForm;
use App\Models\PondForm;
use App\Models\FileUpload;
use App\Models\PlantForm;

class fmController extends Controller
{
    public function fetch_appl_fm(){
        $form1 = Form::Where('form_type','land')->where('status',4)->get();
        $form2 = Form::Where('form_type','pond')->where('status',4)->get();
        $form3 = Form::Where('form_type','plant')->where('status',4)->get();
        if($form1||$form2||$form3){
            return view('fm/fm',compact('form1','form2','form3'));
        }

    }
    public function finDashboard()
{
    $userId = session()->get('user_id');

    $totalSubmitted = DB::table('forms')
        ->where('user_id', $userId)
        ->whereIn('status', [4])
        ->count();

    $acceptedByTLorCoord = DB::table('forms')
        ->where('user_id', $userId)
        ->whereIn('status', [5])
        ->count();

    $changeupdate = DB::table('forms')
        ->where('user_id', $userId)
        ->whereIn('status', [6])
        ->count();

    $completed = DB::table('forms')
        ->where('user_id', $userId)
        ->where('status', 9)
        ->count();

    return view('fm.fmdash', compact('totalSubmitted', 'acceptedByTLorCoord', 'changeupdate', 'completed'));
}


    public function fetch_appl_pf(){
        $form1 = Form::Where('form_type','land')->where('status',9)->get();
        $form2 = Form::Where('form_type','pond')->where('status',9)->get();
        $form3 = Form::Where('form_type','plant')->where('status',9)->get();
        if($form1||$form2||$form3){
            return view('fm/fm_pf',compact('form1','form2','form3'));
        }

    }

    public function fm_rem(Request $req)
{
  
    // Find the form and update
    $form = Form::find($req->form_id);

    if ($form) {
        $form->remarks = $req->remarks;
        $form->status = 5; // 2 = Request Change
        $form->save();

        return response()->json([
            'status' => 200,
            'message' => 'Remarks updated successfully. Form sent back to associate.'
        ]);
    }

    return response()->json([
        'status' => 500,
        'message' => 'Form not found.'
    ], 404);
}

public function getRemarks($id)
{
    $form = Form::find($id);

    if ($form) {
        return response()->json([
            'success' => 200,
            'remarks' => $form->remarks
        ]);
    }

    return response()->json([
        'success' => 404,
        'message' => 'Form not found'
    ]);
}

public function fm_app(Request $req)
{
    try {
        $form = Form::find($req->form_id);

        if (!$form) {
            return response()->json([
                'status' => 404,
                'message' => 'Form not found.'
            ], 404);
        }

        // Validate MCODE
        if (empty($req->mcode)) {
            return response()->json([
                'status' => 400,
                'message' => 'MCODE is required.'
            ], 400);
        }

        $form->mcode = $req->mcode;
        $form->save();

        return response()->json([
            'status' => 200,
            'message' => 'MCODE updated successfully.'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 500,
            'message' => 'An error occurred while updating MCODE.'
        ], 500);
    }
}

public function fin_approve(Request $req)
{
    try {
        $form = Form::find($req->form_id);

        if (!$form) {
            return response()->json([
                'status' => 404,
                'message' => 'Form not found.'
            ], 404);
        }

        // Validate form type
        if (!in_array($req->form_type, ['land', 'pond', 'plant'])) {
            return response()->json([
                'status' => 400,
                'message' => 'Invalid form type.'
            ], 400);
        }

        $form->status = 7; // Status for PF approval
        $form->save();

        return response()->json([
            'status' => 200,
            'message' => 'PF approved successfully.'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 500,
            'message' => 'An error occurred while approving PF.'
        ], 500);
    }
}

public function check_mcode(Request $req)
{
    try {
        $form = Form::find($req->form_id);

        if (!$form) {
            return response()->json([
                'status' => 404,
                'message' => 'Form not found.'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'mcode' => $form->mcode
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 500,
            'message' => 'An error occurred while checking MCODE.'
        ], 500);
    }
}

}
