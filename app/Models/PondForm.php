<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PondForm
 * 
 * @property int $id
 * @property string|null $form_id
 * @property string|null $ownership
 * @property string|null $patta
 * @property string|null $total_area
 * @property string|null $irrigated_lands
 * @property string|null $revenue
 * @property string|null $livestocks
 * @property string|null $taluk
 * @property string|null $firka
 * @property string|null $verified_by
 * @property string|null $crop_season
 * @property string|null $well_irrigation
 * @property string|null $sf_number
 * @property string|null $soil_type
 * @property string|null $field_insp
 * @property string|null $site_app
 * @property string|null $date_of_ins
 * @property string|null $date_of_app
 * @property string|null $length
 * @property string|null $depth
 * @property string|null $breadth
 * @property string|null $volume
 * @property string|null $p_contribution
 * @property string|null $f_contribution
 * @property string|null $land_to_benefit
 * @property string|null $total_est
 * @property string|null $area_irrigated
 * @property string|null $area_benefited
 * @property string|null $len_pf
 * @property string|null $bre_pf
 * @property string|null $dep_pf
 * @property string|null $vol_pf
 * @property string|null $area_benefited_postfunding
 *
 * @package App\Models
 */
class PondForm extends Model
{
	protected $table = 'pond_form';
	public $timestamps = false;

	protected $fillable = [
		'form_id',
		'ownership',
		'patta',
		'total_area',
		'irrigated_lands',
		'revenue',
		'livestocks',
		'taluk',
		'firka',
		'verified_by',
		'crop_season',
		'well_irrigation',
		'sf_number',
		'soil_type',
		'field_insp',
		'site_app',
		'date_of_ins',
		'date_of_app',
		'length',
		'depth',
		'breadth',
		'volume',
		'p_contribution',
		'f_contribution',
		'land_to_benefit',
		'total_est',
		'area_irrigated',
		'area_benefited',
		'len_pf',
		'bre_pf',
		'dep_pf',
		'vol_pf',
		'area_benefited_postfunding'
	];
}
