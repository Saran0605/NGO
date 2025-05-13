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

class tlController extends Controller
{
    public function fetch_appl_tl(){
        $form1 = Form::Where('form_type','land')->get();
        $form2 = Form::Where('form_type','pond')->get();
        $form3 = Form::Where('form_type','plant')->get();
        if($form1||$form2||$form3){
            return view('tl/tl',compact('form1','form2','form3'));
        }

    }
      public function tlDashboard()
{
    $userId = session()->get('user_id');

    $totalSubmitted = DB::table('forms')
        ->whereIn('status', [1])
        ->count();

    $approved = DB::table('forms')
        ->where('user_id', $userId)
        ->whereIn('status', [4])
        ->count();

    $changeupdate = DB::table('forms')
        ->where('user_id', $userId)
        ->whereIn('status', [2, 8])
        ->count();

    $completed = DB::table('forms')
        ->where('user_id', $userId)
        ->where('status', 11)
        ->count();

    return view('tl.tldash', compact('totalSubmitted', 'approved', 'changeupdate', 'completed'));
}

    public function fetch_appl_tl1(){
        $form1 = Form::Where('form_type','land')->where('user_id',session('user_id'))->get();
        $form2 = Form::Where('form_type','pond')->where('user_id',session('user_id'))->get();
        $form3 = Form::Where('form_type','plant')->where('user_id',session('user_id'))->get();
        if($form1||$form2||$form3){
            return view('tl/tappl',compact('form1','form2','form3'));
        }
    }
        public function fetch_tl_mem(){
            $user = User::all();
          
            if($user){
                return view('tl/tl_mem',compact('user'));
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
            'sf_number' => 'required',
            'land_to_benefit' => 'required',
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
        $form->mobile = $req->mobileNumber;
        $form->gender = $req->gender;
        $form->spouse = $req->fatherSpouse;
        $form->h_members = implode(',', $req->hh_members);//[]
        $form->id_type = $req->identityCard;
        $form->id_number = $req->idCardNumber;
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
        $form->toilet_avail = $req->toilet;
        $form->toilet_cond = $req->toiletWorking;
        $form->household_education = $req->education;
        $form->age = $req->age;
        $form->district = $req->district;
        $form->taluk = $req->taluk;
        $form->firca = $req->firca;
        $form->lat = $req->lat;
        $form->lon = $req->lon;
        $form->status = 4;
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



    $landForm->sf_number = $req->sf_number;
    $landForm->soil_type = $req->soil_type;
    $landForm->land_to_benefit = $req->land_to_benefit;
    $landForm->field_insp = $req->inspection;
    $landForm->site_app = $req->approved_by;
    $landForm->date_of_ins = $req->inspection_date;
    $landForm->date_of_app = $req->approval_date;
    $landForm->area_benefited = $req->areaBenefited;
    $landForm->any_other_works = $req->otherWorks;
    $landForm->p_contribution = $req->pradanContribution;
    $landForm->f_contribution = $req->farmerContribution;
    $landForm->total_est = $req->estimateAmount;
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

        $passbook_postfundingFile = $req->file('passbook_postfunding');
        $passbook_postfundingName = 'passbook_postfunding_' . time() . '.' . $passbook_postfundingFile->getClientOriginalExtension();
        $passbook_postfundingFile->move(public_path('documents'), $passbook_postfundingName);
        
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
        $fileUpload->passbook_postfunding = $passbook_postfundingName;
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
             'sf_number' => 'required',
             'land_to_benefit' => 'required',
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
        $form->mobile = $req->mobileNumber;
        $form->gender = $req->gender;
        $form->spouse = $req->fatherSpouse;
        $form->h_members = implode(',', $req->hh_members);//[]
        $form->id_type = $req->identityCard;
        $form->id_number = $req->idCardNumber;
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
        $form->toilet_avail = $req->toilet;
        $form->toilet_cond = $req->toiletWorking;
        $form->age = $req->age;
        $form->district = $req->district;
        $form->taluk = $req->taluk;
        $form->firca = $req->firca;
        $form->lat = $req->lat;
        $form->lon = $req->lon;
        $form->household_education = $req->education;
        $form->status = 4;
        $form->save();

    $form_id = $form->id;

    

 // Insert into `land_form` table
 $pondForm = new PondForm();
 $pondForm->form_id = $form_id; // Foreign key reference
 $pondForm->ownership = $req->landOwnership;
 $pondForm->patta = $req->pattaNumber;
 $pondForm->total_area = $req->totalArea;
 $pondForm->revenue = $req->revenueVillage;
 $pondForm->well_irrigation = $req->wellIrrigation;
 $pondForm->irrigated_lands = $req->irrigatedLand;
 $pondForm->crop_season = $req->cropSeason;
 $pondForm->area_irrigated = $req->area_irrigated;
 $pondForm->area_benefited = $req->areaBenefitted;

 $pondForm->livestocks = implode(',', $req->livestock);



 $pondForm->sf_number = $req->sf_number;
 $pondForm->soil_type = $req->soil_type;
 $pondForm->land_serve = $req->land_to_benefit;
 $pondForm->field_insp = $req->inspection;
 $pondForm->site_app = $req->approved_by;
 $pondForm->date_of_ins = $req->inspection_date;
 $pondForm->date_of_app = $req->approval_date;
 $pondForm->length = $req->length;
 $pondForm->breadth = $req->breadth;
 $pondForm->depth = $req->depth;
 $pondForm->volume = $req->volume;
 $pondForm->p_contribution = $req->pradanContribution;
 $pondForm->f_contribution = $req->farmerContribution;
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

$passbook_postfundingFile = $req->file('passbook_postfunding');
$passbook_postfundingName = 'passbook_postfunding_' . time() . '.' . $passbook_postfundingFile->getClientOriginalExtension();
$passbook_postfundingFile->move(public_path('documents'), $passbook_postfundingName);

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
$fileUpload->passbook_postfunding      = $passbook_postfundingName;
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
            'sf_number' => 'required',
            'land_to_benefit' => 'required',
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
            'plantaions'=>'required',
        
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
        $form->form_type = 'plant';
        $form->farmer_name = $req->farmerName;
        $form->mobile = $req->mobileNumber;
        $form->gender = $req->gender;
        $form->spouse = $req->fatherSpouse;
        $form->h_members = implode(',', $req->hh_members);//[]
        $form->id_type = $req->identityCard;
        $form->id_number = $req->idCardNumber;
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
        $form->toilet_avail = $req->toilet;
        $form->toilet_cond = $req->toiletWorking;
        $form->household_education = $req->education;
        $form->status = 4;
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
    $landForm->plantaions = implode(',', $req->plantaions);




    $landForm->sf_number = $req->sf_number;
    $landForm->soil_type = $req->soil_type;
    $landForm->land_to_benefit = $req->land_to_benefit;
    $landForm->field_insp = $req->inspection;
    $landForm->site_app = $req->approved_by;
    $landForm->date_of_ins = $req->inspection_date;
    $landForm->date_of_app = $req->approval_date;
    $landForm->area_benefited = $req->areaBenefited;
    $landForm->any_other_works = $req->otherWorks;
    $landForm->p_contribution = $req->pradanContribution;
    $landForm->f_contribution = $req->farmerContribution;
    $landForm->total_est = $req->estimateAmount;
    
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

$passbook_postfundingFile = $req->file('passbook_postfunding');
$passbook_postfundingName = 'passbook_postfunding_' . time() . '.' . $passbook_postfundingFile->getClientOriginalExtension();
$passbook_postfundingFile->move(public_path('documents'), $passbook_postfundingName);

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
$fileUpload->passbook_postfunding      = $passbook_postfundingName;
$fileUpload->photo    = $photoName;
$fileUpload->passbook = $passbookName;
$fileUpload->save();


    
        return response()->json(['status' => 200, 'message' => 'inserted succesfully']);




    
    }
    public function deleteUser($id)
{
    $user = User::find($id);

    if ($user) {
        $user->delete();
        return response()->json(['message' => 'User deleted successfully.']);
    }

    return response()->json(['message' => 'User not found.'], 404);
}
public function storeUser(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required',
        'role' => 'required',
        'mobile' => 'required',
        'date_of_joining' => 'required',
        'location' => 'required',
        'photo' => 'required|image|max:2048',
    ]);

    // Store file manually to public/user_images
    $photoName = time() . '_' . $request->file('photo')->getClientOriginalName();
    $request->file('photo')->move(public_path('user_images'), $photoName);

    // Save path in database (relative to public)
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'role' => $request->role,
        'mobile' => $request->mobile,
        'date_of_joining' => $request->date_of_joining,
        'location' => $request->location,
        'photo' => 'user_images/' . $photoName, // relative path
    ]);

    return response()->json(['message' => 'User created successfully']);
}
public function get_user($id)
{
    $user = User::find($id);

    if ($user) {
        return response()->json($user);
    }

    return response()->json(['error' => 'User not found'], 404);
}
public function update_user(Request $request)
{
    $request->validate([
        'id' => 'required|exists:users,id',
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'role' => 'required',
        'mobile' => 'required',
        'date_of_joining' => 'required',
        'location' => 'required',
    ]);

    $user = User::find($request->id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = $request->password; // Encrypt if needed
    $user->role = $request->role;
    $user->mobile = $request->mobile;
    $user->date_of_joining = $request->date_of_joining;
    $user->location = $request->location;
    $user->save();

    return response()->json(['success' => true]);
}



}
