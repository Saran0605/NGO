<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Form
 * 
 * @property int $id
 * @property string|null $user_id
 * @property string|null $form_type
 * @property string|null $farmer_name
 * @property string|null $age
 * @property string|null $district
 * @property string|null $mobile
 * @property string|null $gender
 * @property string|null $spouse
 * @property string|null $h_members
 * @property string|null $type_of_households
 * @property string|null $special_catog
 * @property string|null $caste
 * @property string|null $hh_occupation
 * @property string|null $type_of_house
 * @property string|null $drinking_water
 * @property string|null $potability
 * @property string|null $domestic_water
 * @property string|null $toilet_avail
 * @property string|null $toilet_cond
 * @property string|null $house_owner
 * @property string|null $household_education
 * @property string|null $id_type
 * @property string|null $id_number
 * @property string|null $hamlet
 * @property string|null $panchayat
 * @property string|null $lat
 * @property string|null $lon
 * @property string|null $block
 * @property string|null $mcode
 * @property string|null $status
 * @property Carbon|null $created_at
 * @property string|null $remarks
 * 
 * @property Collection|BankDetail[] $bank_details
 *
 * @package App\Models
 */
class Form extends Model
{
	protected $table = 'forms';
	public $timestamps = false;

	protected $fillable = [
		'user_id',
		'form_type',
		'farmer_name',
		'age',
		'district',
		'mobile',
		'gender',
		'spouse',
		'h_members',
		'type_of_households',
		'special_catog',
		'caste',
		'hh_occupation',
		'type_of_house',
		'drinking_water',
		'potability',
		'domestic_water',
		'toilet_avail',
		'toilet_cond',
		'house_owner',
		'household_education',
		'id_type',
		'id_number',
		'hamlet',
		'panchayat',
		'lat',
		'lon',
		'block',
		'mcode',
		'status',
		'remarks'
	];

	public function bank_details()
	{
		return $this->hasMany(BankDetail::class);
	}
}
