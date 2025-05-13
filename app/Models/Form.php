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
 * @property string $user_id
 * @property string $form_type
 * @property string $farmer_name
 * @property string $age
 * @property string $district
 * @property string $mobile
 * @property string $gender
 * @property string|null $spouse
 * @property string|null $h_members
 * @property string $type_of_households
 * @property string $special_catog
 * @property string $caste
 * @property string $hh_occupation
 * @property string $type_of_house
 * @property string $drinking_water
 * @property string $potability
 * @property string $domestic_water
 * @property string $toilet_avail
 * @property string $toilet_cond
 * @property string $house_owner
 * @property string $household_education
 * @property string $id_type
 * @property string $id_number
 * @property string|null $hamlet
 * @property string|null $panchayat
 * @property string|null $lat
 * @property string|null $lon
 * @property string|null $block
 * @property string|null $mcode
 * @property string $status
 * @property Carbon $created_at
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
