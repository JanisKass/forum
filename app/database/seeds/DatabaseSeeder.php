<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		
                  DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		$this->call('UserTableSeeder');
                $this->call('CategoryTableSeeder');
                $this->call('ThreadTableSeeder');
                
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}

class UserTableSeeder extends Seeder {
    public function run() {
        DB::table('users')->delete();
        
        $user = new User();
        
        $user->username = 'ForumAdministrator';
        $user->email = 'admin@forum.dev';
        $user->class = 2;
        $user->password = Hash::make('admin');
            
        $user->save();
    }
}
    
class CategoryTableSeeder extends Seeder {
    public function run() {
        DB::table('categories')->delete();
        
        Category::create(array('id' => 1, 'created_at' => '2015-22-01 16:10:46', 'updated_at' => '2015-22-01 16:10:46', 'name' => 'Movies'));
        Category::create(array('id' => 2, 'created_at' => '2015-22-01 16:11:39', 'updated_at' => '2015-22-01 16:11:39', 'name' => 'TV Shows'));
        Category::create(array('id' => 3, 'created_at' => '2015-22-01 16:13:46', 'updated_at' => '2015-22-01 16:13:46', 'name' => 'Artists'));
    }
}

class ThreadTableSeeder extends Seeder {
    public function run() {
        DB::table('threads')->delete();
        
        Thread::create(array('id' => 9, 'created_at' => '2015-22-01 18:10:51', 'updated_at' => '2015-22-01 18:10:51', 'title' => 'Oscar nominations', 'comment' => 'Who do you think will win the best picture?','picture' => 'Oscar-Statue-2__1232736378_7142.jpg', 'category_id' => 1, 'user_id'=> 1));
        Thread::create(array('id' => 10, 'created_at' => '2015-22-01 18:10:51', 'updated_at' => '2015-22-01 18:10:51', 'title' => 'Birdman', 'comment' => 'What do you think about this movie? I thought it was fantastic!','picture' => 'birdman-movie-poster-5097.jpg', 'category_id' => 1, 'user_id'=> 1));
        Thread::create(array('id' => 11, 'created_at' => '2015-22-01 18:10:51', 'updated_at' => '2015-22-01 18:10:51', 'title' => 'Best 70ties movie', 'comment' => 'What is the best movie made in the 1970ties? pic related- my choice','picture' => 'taxi_driver_ver4.jpg', 'category_id' => 1, 'user_id'=> 1));
        Thread::create(array('id' => 12, 'created_at' => '2015-22-01 18:10:51', 'updated_at' => '2015-22-01 18:10:51', 'title' => 'Game of Thrones', 'comment' => 'Who do you think will die next? I vote on her','picture' => 'Arya-Stark-arya-stark-31335129-700-466-640x426.png', 'category_id' => 2, 'user_id'=> 1));
        Thread::create(array('id' => 13, 'created_at' => '2015-22-01 18:10:51', 'updated_at' => '2015-22-01 18:10:51', 'title' => 'Best character in Simpsons', 'comment' => 'Who do you think is the best character besides the main family? I cast my vote on groundskeeper Willie. ','picture' => 'simpsons_characters_only_pic.jpg', 'category_id' => 2, 'user_id'=> 1));
        Thread::create(array('id' => 14, 'created_at' => '2015-22-01 18:10:51', 'updated_at' => '2015-22-01 18:10:51', 'title' => 'Funniest line in Archer', 'comment' => '“I’m not saying I invented the turtleneck, but I was the first person to realize its potential as a tactical garment. The tactical turtleneck! The … tactleneck.”','picture' => 'tumblr_lxm2voNRcS1r2d5vbo1_500.jpg', 'category_id' => 2, 'user_id'=> 1));
        Thread::create(array('id' => 15, 'created_at' => '2015-22-01 18:10:51', 'updated_at' => '2015-22-01 18:10:51', 'title' => 'Jackie Chan', 'comment' => 'Discuss his body of work here','picture' => '201309-hd-jackie-chan.jpg', 'category_id' => 3, 'user_id'=> 1));
        Thread::create(array('id' => 16, 'created_at' => '2015-22-01 18:10:51', 'updated_at' => '2015-22-01 18:10:51', 'title' => 'What brand of toothpaste do you think Steven Spielberg uses?', 'comment' => 'I am 89% sure he uses colgate','picture' => 'news-graphics-2008-_655878a.jpg', 'category_id' => 3, 'user_id'=> 1));
       
    }
}
