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








class mainController extends Controller
{

    public function volDashboard()
{
    $userId = session()->get('user_id');

    
        $totalSubmitted = DB::table('forms')
        ->where('user_id', $userId)
        ->whereIn('status', [1, 7])
        ->count();

    $acceptedByTLorCoord = DB::table('forms')
        ->where('user_id', $userId)
        ->whereIn('status', [4,6,9])
        ->count();

    $changeupdate = DB::table('forms')
        ->where('user_id', $userId)
        ->whereIn('status', [2,5,8])
        ->count();

    $completed = DB::table('forms')
        ->where('user_id', $userId)
        ->whereIn('status', [11])
        ->count();

    return view('assoc.vol', compact('totalSubmitted', 'acceptedByTLorCoord', 'changeupdate', 'completed'));
}

    public function login(Request $req){
        $req->validate([
            'email' => 'required',
            'pass' => 'required',
        ]);
        
        $user = User::where('email',$req->email)->first();
        if($user && $user->password=== $req->pass){
            session([
                'name'=> $user->name,   
                'email'=> $user->email,
                'user_id'=> $user->id,
                'role'=>$user->role
                
            ]);

            // Return JSON success response for AJAX
            return response()->json([
                'status' => 200,
                'message' => 'Login successful!',
                'role'=>$user->role,
            ]);
        }

    }
   



    public function land_form(Request $req)
    {
        $req->validate([
            // Basic Details
            'farmerName' => 'required',
            'mobileNumber' => 'required',
            'gender' => 'required',
            'fatherSpouse' => 'required',
            'hh_members' => 'required',
            'identityCard' => 'required',
            'idCardNumber' => 'required',
            'hamlet' => 'required',
            'panchayat' => 'required',
            'block' => 'required',
            'householdType'=> 'required',
            'hh_occupation'=>'required',
            'specialCategory'=>'required',
            'caste'=>'required',
            'houseOwnership'=>'required',
            'houseType'=>'required',
            'drinkingWater'=>'required',
            'potability'=>'required',
            'domesticWater'=>'required',
            'toilet'=>'required',
            'toiletWorking'=>'required',
            'education'=>'required',

            // Land Ownership
            'pattaNumber' => 'required',
            'totalArea' => 'required',
            'revenueVillage' => 'required',
            'landOwnership'=> 'required',
            'wellIrrigation'=> 'required',
            'irrigatedLand'=> 'required',
            'cropSeason'=> 'required',
            'livestock'=> 'required',
            'areaIrrigated'=> 'required',



        
            // Land Development Activity
            'sf_no' => 'required',
            'land_benefit' => 'required',
            'soil_type' => 'required',
            'inspection' => 'required',
            'approved_by' => 'required',
            'inspection_date' => 'required',
            'approval_date' => 'required',
            'estimateAmount' => 'required',
        
            'workType' => 'required',
            'areaBenefited' => 'required',
            'otherWorks' => 'required',
            'pradanContribution' => 'required',
            'farmerContribution' => 'required',
        
            // Bank Details
            'account_holder' => 'required',
            'account_number' => 'required',
            'bank_name' => 'required',
            'branch' => 'required',
            'ifsc' => 'required',
            'farmer_agreement'=> 'required',
        ]);
        
        $form = new Form();
        $form->user_id = $req->user_id;
        $form->form_type = 'land';
        $form->farmer_name = $req->farmerName;
        $form->mobile_number = $req->mobileNumber;
        $form->gender = $req->gender;
        $form->father_spouse = $req->fatherSpouse;
        $form->household_members = implode(',', $req->hh_members);//[]
        $form->identity_card_type = $req->identityCard;
        $form->identity_card_number = $req->idCardNumber;
        $form->hamlet = $req->hamlet;
        $form->panchayat = $req->panchayat;
        $form->block = $req->block;
        $form->type_of_households = $req->householdType;
        $form->hh_occupation = implode(',', $req->hh_occupation);//[]
        $form->special_catog =  implode(',', $req->specialCategory);
        $form->caste = $req->caste;
        $form->house_owner = $req->houseOwnership;
        $form->type_of_house = $req->houseType;
        $form->drinking_water  = implode(',', $req->drinkingWater);
        $form->potability = implode(',', $req->potability);
        $form->domestic_water =  implode(',', $req->domesticWater);
        $form->toilet_availability = $req->toilet;
        $form->toilet_cond = $req->toiletWorking;
        $form->household_education = $req->education;
        $form->age = $req->age;
        $form->district = $req->district;
        $form->taluk = $req->taluk;
        $form->firca = $req->firca;
        $form->lat = $req->lat;
        $form->lon = $req->lon;
        $form->status = 1;
        $form->save();

// Get the auto-generated form_id
    $form_id = $form->id;

    // Insert into `land_form` table
    $landForm = new LandForm();
    $landForm->form_id = $form_id; // Foreign key reference
    $landForm->ownership = $req->landOwnership;
    $landForm->patta = $req->pattaNumber;
    $landForm->total_area = $req->totalArea;
    $landForm->revenue = $req->revenueVillage;
    $landForm->well_irrigation = $req->wellIrrigation;
    $landForm->area_irrigated = $req->areaIrrigated;
    $landForm->irrigated_lands = $req->irrigatedLand;
    $landForm->crop_season = $req->cropSeason;
    $landForm->livestocks = implode(',', $req->livestock);



    $landForm->sf_no = $req->sf_no;
    $landForm->soil_type = $req->soil_type;
    $landForm->land_benefit = $req->land_benefit;
    $landForm->field_insp = $req->inspection;
    $landForm->site_app = $req->approved_by;
    $landForm->date_of_ins = $req->inspection_date;
    $landForm->date_of_app = $req->approval_date;
    $landForm->type_of_work = implode(',', $req->workType); // Convert array to string
    $landForm->area_benefit = $req->areaBenefited;
    $landForm->other_works = $req->otherWorks;
    $landForm->pradan_cont = $req->pradanContribution;
    $landForm->farmer_cont = $req->farmerContribution;
    $landForm->total_amount = $req->estimateAmount;
    $landForm->save();

        // Insert into `bank_details` table
        $bankDetail = new BankDetail();
        $bankDetail->form_id = $form_id;
        $bankDetail->account_holder_name = $req->account_holder;
        $bankDetail->account_number = $req->account_number;
        $bankDetail->bank_name = $req->bank_name;
        $bankDetail->branch = $req->branch;
        $bankDetail->ifsc_code = $req->ifsc;
        $bankDetail->farmer_ack = $req->farmer_agreement;

        $bankDetail->save();
        $pattaFile = $req->file('patta');
        $pattaName = 'patta_' . time() . '.' . $pattaFile->getClientOriginalExtension();
        $pattaFile->move(public_path('documents'), $pattaName);
        
        $identityFile = $req->file('id_card');
        $identityName = 'id_' . time() . '.' . $identityFile->getClientOriginalExtension();
        $identityFile->move(public_path('documents'), $identityName);
        
        $fmbFile = $req->file('fmb');
        $fmbName = 'fmb_' . time() . '.' . $fmbFile->getClientOriginalExtension();
        $fmbFile->move(public_path('documents'), $fmbName);
        
        $photoFile = $req->file('photo_farmer');
        $photoName = 'photo_' . time() . '.' . $photoFile->getClientOriginalExtension();
        $photoFile->move(public_path('documents'), $photoName);
        
        $passbookFile = $req->file('bank_passbook');
        $passbookName = 'passbook_' . time() . '.' . $passbookFile->getClientOriginalExtension();
        $passbookFile->move(public_path('documents'), $passbookName);
        
        
        $fileUpload = new FileUpload();
        $fileUpload->form_id  = $form_id;
        $fileUpload->patta    = $pattaName;
        $fileUpload->identity = $identityName;
        $fileUpload->fmb      = $fmbName;
        $fileUpload->photo    = $photoName;
        $fileUpload->passbook = $passbookName;
        $fileUpload->save();
        
    
        return response()->json(['status' => 200, 'message' => 'inserted succesfully']);




    
    }


    public function pond_form(Request $req)
    {
        $validatedData = $req->validate([
            // Basic Details
            'farmerName' => 'required',
            'mobileNumber' => 'required',
            'gender' => 'required',
            'fatherSpouse' => 'required',
            'hh_members' => 'required',
            'identityCard' => 'required',
            'idCardNumber' => 'required',
            'hamlet' => 'required',
            'panchayat' => 'required',
            'block' => 'required',
            'householdType'=> 'required',
            'hh_occupation'=>'required',
            'specialCategory'=>'required',
            'caste'=>'required',
            'houseOwnership'=>'required',
            'houseType'=>'required',
            'drinkingWater'=>'required',
            'potability'=>'required',
            'domesticWater'=>'required',
            'toilet'=>'required',
            'toiletWorking'=>'required',
            'education'=>'required',


             // Pond Ownership
             'pattaNumber' => 'required',
             'totalArea' => 'required',
             'revenueVillage' => 'required',
             'landOwnership'=> 'required',
             'wellIrrigation'=> 'required',
             'irrigatedLand'=> 'required',
             'cropSeason'=> 'required',
             'livestock'=> 'required',
 
 
 
         
             // Pond Development Activity
             'sf_no' => 'required',
             'land_benefit' => 'required',
             'soil_type' => 'required',
             'inspection' => 'required',
             'approved_by' => 'required',
             'inspection_date' => 'required',
             'approval_date' => 'required',
             'estimateAmount' => 'required',
             'length' => 'required',
             'breadth' => 'required',
             'depth' => 'required',
             'volume' => 'required',
             'otherWorks' => 'required',
             'pradanContribution' => 'required',
             'farmerContribution' => 'required',




            
            'bank_name' => 'required',
            'branch' => 'required',
            'account_holder' => 'required',
            'account_number' => 'required',
            'ifsc' => 'required',
            'farmer_agreement' => 'required',
        ]);


        $form = new Form();
        $form->user_id = $req->user_id;
        $form->form_type = 'pond';
        $form->farmer_name = $req->farmerName;
        $form->mobile_number = $req->mobileNumber;
        $form->gender = $req->gender;
        $form->father_spouse = $req->fatherSpouse;
        $form->household_members = implode(',', $req->hh_members);//[]
        $form->identity_card_type = $req->identityCard;
        $form->identity_card_number = $req->idCardNumber;
        $form->hamlet = $req->hamlet;
        $form->panchayat = $req->panchayat;
        $form->block = $req->block;
        $form->type_of_households = $req->householdType;
        $form->hh_occupation = implode(',', $req->hh_occupation);//[]
        $form->special_catog =  implode(',', $req->specialCategory);
        $form->caste = $req->caste;
        $form->house_owner = $req->houseOwnership;
        $form->type_of_house = $req->houseType;
        $form->drinking_water  = implode(',', $req->drinkingWater);
        $form->potability = implode(',', $req->potability);
        $form->domestic_water =  implode(',', $req->domesticWater);
        $form->toilet_availability = $req->toilet;
        $form->toilet_cond = $req->toiletWorking;
        $form->age = $req->age;
        $form->district = $req->district;
        $form->taluk = $req->taluk;
        $form->firca = $req->firca;
        $form->lat = $req->lat;
        $form->lon = $req->lon;
        $form->household_education = $req->education;
        $form->status = 1;
        $form->save();

    $form_id = $form->id;

    

 // Insert into `land_form` table
 $pondForm = new PondForm();
 $pondForm->form_id = $form_id; // Foreign key reference
 $pondForm->land_owner = $req->landOwnership;
 $pondForm->patta = $req->pattaNumber;
 $pondForm->total_area = $req->totalArea;
 $pondForm->revenue = $req->revenueVillage;
 $pondForm->well_irrigation = $req->wellIrrigation;
 $pondForm->irrigated_lands = $req->irrigatedLand;
 $pondForm->crop_season = $req->cropSeason;
 $pondForm->area_irrigated = $req->area_irrigated;
 $pondForm->area_benefitted = $req->areaBenefitted;

 $pondForm->livestocks = implode(',', $req->livestock);



 $pondForm->sf_no = $req->sf_no;
 $pondForm->soil_type = $req->soil_type;
 $pondForm->land_serve = $req->land_benefit;
 $pondForm->field_insp = $req->inspection;
 $pondForm->site_appr = $req->approved_by;
 $pondForm->date_of_insp = $req->inspection_date;
 $pondForm->date_of_appr = $req->approval_date;
 $pondForm->length = $req->length;
 $pondForm->breadth = $req->breadth;
 $pondForm->depth = $req->depth;
 $pondForm->volume = $req->volume;
 $pondForm->pradan_cont = $req->pradanContribution;
 $pondForm->farmer_cont = $req->farmerContribution;
 $pondForm->total = $req->estimateAmount;
 $pondForm->save();


// Now insert into BankDetail table using the form_id
$bankDetail = new BankDetail();
$bankDetail->form_id = $form_id;
$bankDetail->account_holder_name = $req->account_holder;
$bankDetail->account_number = $req->account_number;
$bankDetail->bank_name = $req->bank_name;
$bankDetail->branch = $req->branch;
$bankDetail->ifsc_code = $req->ifsc;
$bankDetail->farmer_ack = $req->farmer_agreement;
$bankDetail->save();

$pattaFile = $req->file('patta');
$pattaName = 'patta_' . time() . '.' . $pattaFile->getClientOriginalExtension();
$pattaFile->move(public_path('documents'), $pattaName);

$identityFile = $req->file('id_card');
$identityName = 'id_' . time() . '.' . $identityFile->getClientOriginalExtension();
$identityFile->move(public_path('documents'), $identityName);

$fmbFile = $req->file('fmb');
$fmbName = 'fmb_' . time() . '.' . $fmbFile->getClientOriginalExtension();
$fmbFile->move(public_path('documents'), $fmbName);

$photoFile = $req->file('photo_farmer');
$photoName = 'photo_' . time() . '.' . $photoFile->getClientOriginalExtension();
$photoFile->move(public_path('documents'), $photoName);

$passbookFile = $req->file('bank_passbook');
$passbookName = 'passbook_' . time() . '.' . $passbookFile->getClientOriginalExtension();
$passbookFile->move(public_path('documents'), $passbookName);


$fileUpload = new FileUpload();
$fileUpload->form_id  = $form_id;
$fileUpload->patta    = $pattaName;
$fileUpload->identity = $identityName;
$fileUpload->fmb      = $fmbName;
$fileUpload->photo    = $photoName;
$fileUpload->passbook = $passbookName;
$fileUpload->save();


return response()->json(['status' => 200, 'message' => 'inserted succesfully']);

    }

    public function plant_form(Request $req)
    {
        $req->validate([
            // Basic Details
            'farmerName' => 'required',
            'mobileNumber' => 'required',
            'gender' => 'required',
            'fatherSpouse' => 'required',
            'hh_members' => 'required',
            'identityCard' => 'required',
            'idCardNumber' => 'required',
            'hamlet' => 'required',
            'panchayat' => 'required',
            'block' => 'required',
            'householdType'=> 'required',
            'hh_occupation'=>'required',
            'specialCategory'=>'required',
            'caste'=>'required',
            'houseOwnership'=>'required',
            'houseType'=>'required',
            'drinkingWater'=>'required',
            'potability'=>'required',
            'domesticWater'=>'required',
            'toilet'=>'required',
            'toiletWorking'=>'required',
            'education'=>'required',

            // Land Ownership
            'pattaNumber' => 'required',
            'totalArea' => 'required',
            'revenueVillage' => 'required',
            'landOwnership'=> 'required',
            'wellIrrigation'=> 'required',
            'irrigatedLand'=> 'required',
            'cropSeason'=> 'required',
            'livestock'=> 'required',
            'areaIrrigated'=> 'required',



        
            // Land Development Activity
            'sf_no' => 'required',
            'land_benefit' => 'required',
            'soil_type' => 'required',
            'inspection' => 'required',
            'approved_by' => 'required',
            'inspection_date' => 'required',
            'approval_date' => 'required',
            'estimateAmount' => 'required',
        
            'workType' => 'required',
            'areaBenefited' => 'required',
            'otherWorks' => 'required',
            'pradanContribution' => 'required',
            'farmerContribution' => 'required',
            'plantation'=>'required',
        
            // Bank Details
            'account_holder' => 'required',
            'account_number' => 'required',
            'bank_name' => 'required',
            'branch' => 'required',
            'ifsc' => 'required',
            'farmer_agreement'=> 'required',
        ]);
        
        $form = new Form();
        $form->user_id = '1';
        $form->form_type = 'plant';
        $form->farmer_name = $req->farmerName;
        $form->mobile_number = $req->mobileNumber;
        $form->gender = $req->gender;
        $form->father_spouse = $req->fatherSpouse;
        $form->household_members = implode(',', $req->hh_members);//[]
        $form->identity_card_type = $req->identityCard;
        $form->identity_card_number = $req->idCardNumber;
        $form->hamlet = $req->hamlet;
        $form->panchayat = $req->panchayat;
        $form->block = $req->block;
        $form->type_of_households = $req->householdType;
        $form->hh_occupation = implode(',', $req->hh_occupation);//[]
        $form->special_catog =  implode(',', $req->specialCategory);
        $form->caste = $req->caste;
        $form->house_owner = $req->houseOwnership;
        $form->type_of_house = $req->houseType;
        $form->drinking_water  = implode(',', $req->drinkingWater);
        $form->potability = implode(',', $req->potability);
        $form->age = $req->age;
        $form->district = $req->district;
        $form->taluk = $req->taluk;
        $form->firca = $req->firca;
        $form->lat = $req->lat;
        $form->lon = $req->lon;
        $form->domestic_water =  implode(',', $req->domesticWater);
        $form->toilet_availability = $req->toilet;
        $form->toilet_cond = $req->toiletWorking;
        $form->household_education = $req->education;
        $form->status = 1;
        $form->save();

// Get the auto-generated form_id
    $form_id = $form->id;

    $landForm = new PlantForm();
    $landForm->form_id = $form_id; // Foreign key reference
    $landForm->ownership = $req->landOwnership;
    $landForm->patta = $req->pattaNumber;
    $landForm->total_area = $req->totalArea;
    $landForm->revenue = $req->revenueVillage;
    $landForm->well_irrigation = $req->wellIrrigation;
    $landForm->area_irrigated = $req->areaIrrigated;
    $landForm->irrigated_lands = $req->irrigatedLand;
    $landForm->crop_season = $req->cropSeason;
    $landForm->livestocks = implode(',', $req->livestock);
    $landForm->plantation = implode(',', $req->plantation);




    $landForm->sf_no = $req->sf_no;
    $landForm->soil_type = $req->soil_type;
    $landForm->land_benefit = $req->land_benefit;
    $landForm->field_insp = $req->inspection;
    $landForm->site_app = $req->approved_by;
    $landForm->date_of_ins = $req->inspection_date;
    $landForm->date_of_app = $req->approval_date;
    $landForm->type_of_work = implode(',', $req->workType); // Convert array to string
    $landForm->area_benefit = $req->areaBenefited;
    $landForm->other_works = $req->otherWorks;
    $landForm->pradan_cont = $req->pradanContribution;
    $landForm->farmer_cont = $req->farmerContribution;
    $landForm->total_amount = $req->estimateAmount;
    
    $landForm->save();

        // Insert into `bank_details` table
        $bankDetail = new BankDetail();
        $bankDetail->form_id = $form_id;
        $bankDetail->account_holder_name = $req->account_holder;
        $bankDetail->account_number = $req->account_number;
        $bankDetail->bank_name = $req->bank_name;
        $bankDetail->branch = $req->branch;
        $bankDetail->ifsc_code = $req->ifsc;
        $bankDetail->farmer_ack = $req->farmer_agreement;

        $bankDetail->save();

        $pattaFile = $req->file('patta');
$pattaName = 'patta_' . time() . '.' . $pattaFile->getClientOriginalExtension();
$pattaFile->move(public_path('documents'), $pattaName);

$identityFile = $req->file('id_card');
$identityName = 'id_' . time() . '.' . $identityFile->getClientOriginalExtension();
$identityFile->move(public_path('documents'), $identityName);

$fmbFile = $req->file('fmb');
$fmbName = 'fmb_' . time() . '.' . $fmbFile->getClientOriginalExtension();
$fmbFile->move(public_path('documents'), $fmbName);

$photoFile = $req->file('photo_farmer');
$photoName = 'photo_' . time() . '.' . $photoFile->getClientOriginalExtension();
$photoFile->move(public_path('documents'), $photoName);

$passbookFile = $req->file('bank_passbook');
$passbookName = 'passbook_' . time() . '.' . $passbookFile->getClientOriginalExtension();
$passbookFile->move(public_path('documents'), $passbookName);


$fileUpload = new FileUpload();
$fileUpload->form_id  = $form_id;
$fileUpload->patta    = $pattaName;
$fileUpload->identity = $identityName;
$fileUpload->fmb      = $fmbName;
$fileUpload->photo    = $photoName;
$fileUpload->passbook = $passbookName;
$fileUpload->save();


    
        return response()->json(['status' => 200, 'message' => 'inserted succesfully']);




    
    }


    public function fetch_appl(){
        $form1 = Form::Where('form_type','land')->where('user_id',session('user_id'))->get();
        $form2 = Form::Where('form_type','pond')->where('user_id',session('user_id'))->get();
        $form3 = Form::Where('form_type','plant')->where('user_id',session('user_id'))->get();
        if($form1||$form2||$form3){
            return view('assoc/applications',compact('form1','form2','form3'));
        }

    }
    public function fetch_appl_post(){
        $form1 = Form::where('form_type', 'land')
        ->where('user_id', session('user_id'))
        ->whereIn('status', [6, 7, 8, 9, 11])
        ->get();

$form2 = Form::where('form_type', 'pond')
        ->where('user_id', session('user_id'))
        ->whereIn('status', [6, 7, 8, 9, 11])
        ->get();

$form3 = Form::where('form_type', 'plant')
        ->where('user_id', session('user_id'))
        ->whereIn('status', [6, 7, 8, 9, 11])
        ->get();

        if($form1||$form2||$form3){
            return view('assoc/post_appl',compact('form1','form2','form3'));
        }

    }

    

    public function fetch_farmer_det($id)
    {
        $form = Form::where('id', $id)->first();
    
        if ($form) {
            // Assuming the Form model has the necessary details of the farmer
            return response()->json(["status" => 200, "data" => $form]);
        } else {
            return response()->json(["status" => 404, "message" => "Farmer not found"]);
        }
    }
    

    public function fetch_land_det($id){
        $form = LandForm::where('form_id',$id)->first();
        if($form){
            return response()->json(["status"=>200,"data"=>$form]);
        }
    }

    public function fetch_pond_det($id){
        $form = PondForm::where('form_id',$id)->first();
        if($form){
            return response()->json(["status"=>200,"data"=>$form]);
        }
    }

    public function fetch_bank_det($id){
        $form = BankDetail::where('form_id',$id)->first();
        if($form){
            return response()->json(["status"=>200,"data"=>$form]);
        }

    }

    public function fetch_plant_det($id){
        $form = PlantForm::where('form_id',$id)->first();
        if($form){
            return response()->json(["status"=>200,"data"=>$form]);
        }

    }

    public function fetch_appl_coor(){
        $form1 = Form::Where('form_type','land')->get();
        $form2 = Form::Where('form_type','pond')->get();
        $form3 = Form::Where('form_type','plant')->get();
        if($form1||$form2||$form3){
            return view('coor',compact('form1','form2','form3'));
        }

    }

    public function coor_appr($id)
{
    Form::where('id', $id)->update(['status' => 2]);

    return response()->json(["status"=>200,"message"=>"done"]);
}

public function measure_submit(Request $req){
    $req->validate([
        'meas_id' => 'required',
        'length' => 'required',
        'breadth' => 'required',
        'depth' => 'required',
        'volume' => 'required',
    ]);

    // Create a new Measurement entry
    $measurement = new Measurement();
    $measurement->form_id = $req->meas_id;
    $measurement->len = $req->length;
    $measurement->bre = $req->breadth;
    $measurement->dep = $req->depth;
    $measurement->vol = $req->volume;
    $measurement->save();

    Form::where('id', $req->meas_id)->update(['status' => 3]);


    return response()->json(["status"=>200,"message"=>"done"]);


}
public function getDocument(Request $request)
{
    $form_id = $request->form_id;
    $type = $request->type;

    $file = FileUpload::where('form_id', $form_id)->first();

    if ($file && isset($file->$type)) {
        $fileName = $file->$type;
        $filePath = public_path("documents/{$fileName}");

        if (file_exists($filePath)) {
            $url = asset("documents/{$fileName}");
            return response()->json(['file_url' => $url]);
        }
    }

    return response()->json(['file_url' => null]);
}

public function submit_pf_land(Request $request)
{
    $request->validate([
        'pf_land_id' => 'required',
        'area_land' => 'required|numeric',
    ]);

    landForm::where('form_id', $request->pf_land_id)
        ->update([
            'area_pf' => $request->area_land
        ]);
        Form::where('id', $request->pf_land_id)
        ->update([
            'status' => 7 // 7 = PF Submitted by Associate
        ]);

    return response()->json(['status' => 200, 'message' => 'Land Post-Funding details updated.']);
}

public function submit_pf_pond(Request $request)
{
    $request->validate([
        'pf_pond_id' => 'required',
        'length' => 'required',
        'breadth' => 'required',
        'depth' => 'required',
        'volume' => 'required',
        'area_benefited' => 'required',
    ]);

    PondForm::where('form_id', $request->pf_pond_id)
        ->update([
            'len_pf' => $request->length,
            'bre_pf' => $request->breadth,
            'dep_pf' => $request->depth,
            'vol_pf' => $request->volume,
            'area_pf' => $request->area_benefited
        ]);
        Form::where('id', $request->pf_pond_id)
        ->update([
            'status' => 7 // 7 = PF Submitted by Associate
        ]);

    return response()->json(['status' => 200, 'message' => 'Pond Post-Funding details updated.']);
}

public function submit_pf_plant(Request $request)
{
    $request->validate([
        'pf_plant_id' => 'required',
        'nos' => 'required',
        'price' => 'required',
        'other_expenses' => 'required',
        'total_nos' => 'required',
        'total_price' => 'required',
    ]);

    PlantForm::where('form_id', $request->pf_plant_id)
        ->update([
            'nos' => $request->nos,
            'price' => $request->price,
            'other_exp' => $request->other_expenses,
            'total_nos' => $request->total_nos,
            'total_price' => $request->total_price
        ]);
        Form::where('id', $request->pf_plant_id)
        ->update([
            'status' => 7
        ]);

    return response()->json(['status' => 200, 'message' => 'Plantation Post-Funding details updated.']);
}

   
public function getLandPostFund($id)
{
    $landForm = LandForm::where('form_id', $id)->first();
    return response()->json($landForm);
}

public function updateLandPostFund(Request $request)
{
    $request->validate([
        'form_id' => 'required',
        'area_pf' => 'required|string|max:255',
    ]);

    // Update LandForm
    LandForm::where('form_id', $request->form_id)
        ->update(['area_pf' => $request->area_pf]);

    // Also update status to 7 in Form model
    Form::where('id', $request->form_id)
        ->update(['status' => 7]);

    return response()->json(['success' => true]);
}
public function editPondPostFund($id)
{
    $pond = PondForm::where('form_id', $id)->first();
    return response()->json($pond);
}
public function updatePondPostFund(Request $request)
{
    $request->validate([
        'form_id' => 'required|',
        'len_pf' => 'required|numeric',
        'bre_pf' => 'required|numeric',
        'dep_pf' => 'required|numeric',
        'area_pf' => 'required|string|max:255',
    ]);

    $vol_pf = $request->len_pf * $request->bre_pf * $request->dep_pf;

    // Update pond form
    PondForm::where('form_id', $request->form_id)->update([
        'len_pf' => $request->len_pf,
        'bre_pf' => $request->bre_pf,
        'dep_pf' => $request->dep_pf,
        'vol_pf' => $vol_pf,
        'area_pf' => $request->area_pf,
    ]);

    // Update status to 7 in Form model
    Form::where('id', $request->form_id)->update(['status' => 7]);

    return response()->json(['success' => true]);
}

        // GET plant post funding details
public function getPlantPostFund($id)
{
    $plant = PlantForm::where('form_id', $id)->first();
    return response()->json($plant);
}

// POST update plant post funding
public function updatePlantPostFund(Request $request)
{
    $plant = PlantForm::where('form_id', $request->form_id)->first();

    $plant->nos = $request->nos;
    $plant->price = $request->price;
    $plant->other_exp = $request->other_exp;
    $plant->total_nos = $request->total_nos;
    $plant->total_price = $request->total_price;
    $plant->save();

    // update status in main forms table
    Form::where('id', $request->form_id)->update(['status' => 7]);

    return response()->json(['success' => true]);
}

public function getBankDetails($form_id)
{
    $bank = BankDetail::where('form_id', $form_id)->first();

    if ($bank) {
        return response()->json([
            'success' => true,
            'data' => $bank
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Bank details not found.'
        ]);
    }
}
public function updateBankDetails(Request $request)
{
    $request->validate([
        'form_id' => 'required|integer',
        'holder_name' => 'required|string',
        'account_number' => 'required|string',
        'bank_name' => 'required|string',
        'branch' => 'required|string',
        'ifsc_code' => 'required|string'
    ]);

    $bank = BankDetail::where('form_id', $request->form_id)->first();

    if ($bank) {
        $bank->update([
            'account_holder_name' => $request->holder_name,
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name,
            'branch' => $request->branch,
            'ifsc_code' => $request->ifsc_code
        ]);

        return response()->json(['success' => true, 'message' => 'Bank details updated successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Bank details not found']);
}
public function getFarmerDetails($id)
{
    $form = Form::findOrFail($id);
    return response()->json($form);
}
public function updateFarmerDetails(Request $request)
{
    $form = Form::findOrFail($request->form_id);

    $form->update([
        'farmer_name' => $request->farmer_name,
        'father_spouse' => $request->father_spouse,
        'mobile_number' => $request->mobile_number,
        'gender' => $request->gender,
        'identity_card_type' => $request->identity_card_type,
        'household_members' => $request->household_members,
        'identity_card_number' => $request->identity_card_number,
        'hamlet' => $request->hamlet,
        'panchayat' => $request->panchayat,
        'block' => $request->block,
        'type_of_households' => $request->type_of_households,
        'special_catog' => $request->special_catog,
        'caste' => $request->caste,
        'hh_occupation' => $request->hh_occupation,
        'type_of_house' => $request->type_of_house,
        'drinking_water' => $request->drinking_water,
        'potability' => $request->potability,
        'domestic_water' => $request->domestic_water,
        'toilet_availability' => $request->toilet_availability,
        'toilet_cond' => $request->toilet_cond,
        'house_owner' => $request->house_owner,
        'household_education' => $request->household_education,
        'lat' => $request->lat,
        'lon' => $request->lon,
        'mcode' => $request->mcode,
    ]);

    return response()->json(['message' => 'Form updated successfully']);
}
public function getPondDetails($id)
{
    $pond = PondForm::where('form_id', $id)->first();
    return response()->json($pond);
}
public function updatePond(Request $request)
{
   

    $pond = PondForm::findOrFail($request->pond_id);

    $pond->update([
        'land_owner' => $request->p_owner,
        'patta_no' => $request->p_patta,
        'total_area' => $request->p_tarea,
        'irrigated_lands' => $request->p_irrigated_lands,
        'revenue' => $request->p_revenue,
        'livestocks' => $request->p_livestock,
        'crop_season' => $request->p_crop_season,
        'well_irrigation' => $request->p_well_irrigation,
        'sf_no' => $request->p_sf,
        'soil_type' => $request->p_soil,
        'land_to_serve' => $request->p_land,
        'field_insp' => $request->p_field,
        'site_appr' => $request->p_site,
        'type_of_work' => $request->p_type_of_work,
        'date_of_insp' => $request->p_doi,
        'date_of_appr' => $request->p_doa,
        'length' => $request->p_len,
        'depth' => $request->p_dep,
        'breadth' => $request->p_breadth,
        'volume' => $request->p_vol,
        'pradan_cont' => $request->p_pcont,
        'farmer_cont' => $request->p_fcont,
        'total' => $request->total,
    ]);

    return response()->json(['success' => true]);
}
public function getPlantForm(Request $request)
{
    $formId = $request->form_id;
    $plant = PlantForm::where('form_id', $formId)->first();

    if ($plant) {
        return response()->json(['success' => true, 'data' => $plant]);
    } else {
        return response()->json(['success' => false]);
    }
}
public function updatePlantForm(Request $request)
{
    $plant = PlantForm::find($request->plant_id);

    if ($plant) {
        $plant->update([
            'ownership' => $request->pl_ownership,
            'well_irrigation' => $request->pl_well_irrigation,
            'area_irrigated' => $request->pl_area_irrigated,
            'irrigated_lands' => $request->pl_irrigated_lands,
            'patta' => $request->pl_patta,
            'total_area' => $request->pl_total_area,
            'revenue' => $request->pl_revenue,
            'crop_season' => $request->pl_crop_season,
            'livestocks' => $request->pl_livestock,
            'plantation' => $request->pl_type,
            'sf_no' => $request->pl_sf_no,
            'soil_type' => $request->pl_soil_type,
            'land_benefit' => $request->pl_land_benefit,
            'field_insp' => $request->pl_field_inspection,
            'site_app' => $request->pl_site_approval,
            'date_of_ins' => $request->pl_date_of_inspection,
            'date_of_app' => $request->pl_date_of_approval,
            'type_of_work' => $request->pl_type_of_work,
            'area_benefit' => $request->pl_area_benefit,
            'other_works' => $request->pl_other_works,
            'pradan_cont' => $request->pl_pradan_contribution,
            'farmer_cont' => $request->pl_farmer_contribution,
            'total_amount' => $request->pl_total_amount
        ]);

        return response()->json(['success' => true, 'message' => 'Updated successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Plant form not found']);
}


public function editLandForm($id)
{
    $land = \App\Models\LandForm::where('form_id', $id)->first();
    return response()->json($land);
}
public function updateLandForm(Request $request)
{
    $land = LandForm::where('form_id', $request->ed_land_id)->first();
    if (!$land) return response()->json(['error' => 'Form not found.'], 404);

    $land->update($request->only([
        'ownership', 'well_irrigation', 'area_irrigated', 'irrigated_lands', 'patta', 'total_area', 'revenue',
        'crop_season', 'livestocks', 'sf_no', 'soil_type', 'land_benefit', 'field_insp', 'site_app',
        'date_of_ins', 'date_of_app', 'type_of_work', 'area_benefit', 'other_works',
        'pradan_cont', 'farmer_cont', 'total_amount', 'area_pf'
    ]));

    return response()->json(['success' => 'Land form updated successfully']);
}
public function getUserDetails($id)
{
    $user = User::find($id);

    if ($user) {
        return response()->json([
            'name' => $user->name,
            'mobile' => $user->mobile,
        ]);
    } else {
        return response()->json(['error' => 'User not found'], 404);
    }
}
    public function deleteForm(Request $request)
{
    $formId = $request->id;
    $formType = $request->type;

    // Delete from detail table based on type
    switch ($formType) {
        case 'land':
            LandForm::where('form_id', $formId)->delete();
            break;
        case 'pond':
            PondForm::where('form_id', $formId)->delete();
            break;
        case 'plant':
            PlantForm::where('form_id', $formId)->delete();
            break;
        default:
            return response()->json(['error' => 'Invalid form type.'], 400);
    }

    // Delete from shared tables
    BankDetail::where('form_id', $formId)->delete();
    FileUpload::where('form_id', $formId)->delete();
    Form::where('id', $formId)->delete();

    return response()->json(['success' => 'Form deleted successfully.']);
}

}