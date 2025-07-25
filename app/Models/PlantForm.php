<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PlantForm
 * 
 * @property int $id
 * @property int|null $form_id
 * @property string|null $ownership
 * @property string|null $well_irrigation
 * @property string|null $area_irrigated
 * @property string|null $irrigated_lands
 * @property string|null $patta
 * @property string|null $total_area
 * @property string|null $revenue
 * @property string|null $crop_season
 * @property string|null $livestocks
 * @property string|null $plantaions
 * @property string|null $taluk
 * @property string|null $firka
 * @property string|null $verified_by
 * @property string|null $sf_number
 * @property string|null $soil_type
 * @property string|null $land_to_benefit
 * @property string|null $field_insp
 * @property string|null $site_app
 * @property string|null $date_of_ins
 * @property string|null $date_of_app
 * @property string|null $area_benefited_by_proposal
 * @property string|null $any_other_works
<<<<<<< HEAD
 * @property string|null $p_cont
=======
 * @property string|null $p_contribution
>>>>>>> 05c42563e46e6ed964244fcac2ee436132e6600c
 * @property string|null $f_contribution
 * @property string|null $total_est
 * @property string|null $nos
 * @property string|null $price
 * @property string|null $other_exp
 * @property string|null $total_nos
 * @property string|null $total_price
 *
 * @package App\Models
 */
class PlantForm extends Model
{
	protected $table = 'plant_form';
	public $timestamps = false;

	protected $casts = [
		'form_id' => 'int'
	];

	protected $fillable = [
		'form_id',
		'ownership',
		'well_irrigation',
		'area_irrigated',
		'irrigated_lands',
		'patta',
		'total_area',
		'revenue',
		'crop_season',
		'livestocks',
		'plantaions',
		'taluk',
		'firka',
		'verified_by',
		'sf_number',
		'soil_type',
		'land_to_benefit',
		'field_insp',
		'site_app',
		'date_of_ins',
		'date_of_app',
		'area_benefited_by_proposal',
		'any_other_works',
		'p_contribution',
		'f_contribution',
		'total_est',
		'nos',
		'price',
		'other_exp',
		'total_nos',
		'total_price'
	];
}
