<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FileUpload
 * 
 * @property int $id
 * @property string $form_id
 * @property string $identity
 * @property string|null $geotag
 * @property string $patta
 * @property string $fmb
 * @property string|null $passbook_postfunding
 * @property string $photo
 * @property string $passbook
 *
 * @package App\Models
 */
class FileUpload extends Model
{
	protected $table = 'file_uploads';
	public $timestamps = false;

	protected $fillable = [
		'form_id',
		'identity',
		'geotag',
		'patta',
		'fmb',
		'passbook_postfunding',
		'photo',
		'passbook'
	];
}
