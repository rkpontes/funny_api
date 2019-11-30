<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 29 Nov 2019 00:09:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Playlist
 * 
 * @property int $id
 * @property string $name
 * 
 * @property \Illuminate\Database\Eloquent\Collection $videos
 *
 * @package App\Models
 */
class Playlist extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function videos()
	{
		return $this->hasMany(\App\Models\Video::class);
	}
}
