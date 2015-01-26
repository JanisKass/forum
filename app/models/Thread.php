<?php

class Thread extends Eloquent {
    
    // ORM linking
    public function category() {
        return $this->belongsTo('Category');
    }
    
     public function user() {
        return $this->belongsTo('User');
    }
    public function images() {
        return array(
            'server_path' => public_path().'/thread_images/',
            'asset_path' => 'thread_images/',
            'image' => $this->id.'.jpg',
        );
    }
    
    public function comments(){
        return $this->hasMany('Comment')->orderBy('created_at', 'desc');
    }

}