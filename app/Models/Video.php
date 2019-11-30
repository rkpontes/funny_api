<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 29 Nov 2019 00:09:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Video
 * 
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $youtube_key
 * @property int $playlist_id
 * 
 * @property \App\Models\Playlist $playlist
 *
 * @package App\Models
 */
class Video extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'playlist_id' => 'int'
	];

	protected $fillable = [
		'title',
		'description',
		'youtube_key',
		'playlist_id'
	];

	public function playlist()
	{
		return $this->belongsTo(\App\Models\Playlist::class);
	}
}
