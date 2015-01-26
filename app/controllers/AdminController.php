<?php
class AdminController extends BaseController {
   
    // Filters
    public function __construct() {
        // only Admin have access
        $this->beforeFilter('admin');
    }
    
    public function getIndex() {
        return View::make('admin');
    }   
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

