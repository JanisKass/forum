<?php

class Category extends Eloquent {
    
    public function threads() {
        return $this->hasMany('Thread');
    }
    
    public function threadsRecent()
    {
    return $this->hasMany('Thread')->orderBy('created_at', 'desc')->limit(2);
    }
}