<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

        // determine if User is admin by checking DB field class (default is 1, 2 is admin)
        public function isAdmin() {
            return ($this->class == 2);
        }
        
        public function isNotified(){
            return ($this->notification == 1);
        }
        
         public function images() {
             
       if (!$this->picture){ 
           return array(
            'server_path' => public_path().'/prof_images/',
            'asset_path' => 'prof_images/',
            'image' => 'default.jpg',);
            } else {
            return array(
            'server_path' => public_path().'/prof_images/',
            'asset_path' => 'prof_images/',
            'image' => $this->id.'.jpg',);
            }   
        
         }
        public function threads() {
            return $this->hasMany('Thread')->orderBy('created_at','asc');
        }
        
        public function comments(){
        return $this->hasMany('Comment');
        }
}
