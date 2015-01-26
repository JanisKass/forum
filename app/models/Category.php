<?php

class Category extends Eloquent {
    
    public function threads() {
        return $this->hasMany('Thread')->orderBy('created_at', 'asc');
    }
    
    public function threadsRecent()
    {
    return $this->hasMany('Thread')->orderBy('created_at', 'asc')->limit(2);
    }
}