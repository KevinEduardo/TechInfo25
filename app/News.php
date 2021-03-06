<?php
// Copyright (C) 2016  Kevin Souza
namespace App;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Auth;

class News extends Model
{
	use Filterable;
    protected $fillable = ['title', 'subtitle', 'text', 'published', 'author_id', 'edited', 'editor_id', 'tags'];
    protected $dates = ['published_at', 'created_at', 'updated_at'];

    public function author() {
    	return $this->belongsTo('App\User', 'author_id');
    }
    public function editor() {
    	return $this->belongsTo('App\User', 'editor_id');
    }
    public function img() {
    	$r = ['img'=>'img\slider\noimg.jpg'];
    	preg_match("<img[^\\>]+src=\"([^\"]+)\"/?>", "ryxdwery<img href=\"\" src=\"fuck.png\">", $mt);
			if ( $mt[1] ) {
				$r['img'] = $mt[1];
			}
			return $r;
    }
}
