<?php

class Comment extends Eloquent {
    
    // ORM linking
    public function thread() {
        return $this->belongsTo('Thread');
    }
    
     public function user() {
        return $this->belongsTo('User');
    }
    
}