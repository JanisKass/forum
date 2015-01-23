<?php

class CategoryController extends BaseController {
    
    // Filters
    public function __construct()
    {
        // only Admin have access
        $this->beforeFilter('admin');
    }
    
    public function getAdd()
    {
        return View::make('category_add');
    }
    
    public function postAdd()
    {
        $data = Input::all();
        
        $rules = $rules = array(
            'category' => 'required|min:3|max:200|unique:categories,name',
        );
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            $category = new Category();
            
            $category->name = $data['category'];
            
            $category->save();
           
            return Redirect::to('admin')->withMessage('Category added!');
        }
        
        return Redirect::to('category/add')->withErrors($validator);
    }
}

?>