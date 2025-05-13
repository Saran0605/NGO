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
 * @property string $form_id
 * @property string $ownership
 * @property string $patta
 * @property string $total_area
 * @property string $irrigated_lands
 * @property string $revenue
 * @property string $livestocks
 * @property string $taluk
 * @property string $firka
 * @property string $verified_by
 * @property string $crop_season
 * @property string $well_irrigation
 * @property string $sf_number
 * @property string $soil_type
 * @property string $land_serve
 * @property string $field_insp
 * @property string $site_app
 * @property string $date_of_ins
 * @property string $date_of_app
 * @property string $length
 * @property string $depth
 * @property string $breadth
 * @property string $volume
 * @property string $p_contribution
 * @property string $f_contribution
 * @property string $land_to_benefit
 * @property string $total_est
 * @property string $area_irrigated
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
		'land_serve',
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
