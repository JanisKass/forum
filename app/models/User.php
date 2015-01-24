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
        
        public function threads() {
            return $this->hasMany('Thread');
        }
}
