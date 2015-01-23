<?php
class ThreadController extends BaseController {
    
public function getIndex()
    {
        $categories = Category::all();
        return View::make('threads', array('categories' => $categories, 'threads' => 'threadsRecent', 'action'=> 'View all'));
    }

public function getCategory($category_id)
    {
        $category = array(Category::findOrFail($category_id));
        
        return View::make('threads', array('categories' => $category, 'threads' => 'threads', 'action'=> 'Back'));
    }
    
public function getNew($category_id) 
{
    
    return View::make('thread_add', array('category'=>$category_id));
    
}
}
