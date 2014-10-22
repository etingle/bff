<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	//return View::make('hello');
	return View::make('home');

});

Route::get('/lorem-ipsum',function()
{
	return View::make('lorem-ipsum');
});

Route::post('/lorem-ipsum',function()
{
	$text=File::get(storage_path()."/principia.txt");
	$paragraph_number=Input::get('paragraph_number','1');
	$length=Input::get('length','short');

	$text_array=preg_split("/$\R?^/m", $text);
	$text_array=array_map('trim',$text_array);
	$text_array=array_filter($text_array);
	$text_array=array_values($text_array);
	
	$count=count($text_array);
	
	$x=0;
	if ($length=='long'){
		$low=2000;
		$high=5000;
	} elseif ($length=='medium') {
		$low=500;
		$high=2000;
	} else {
		$low=100;
		$high=500;
	}
	$paragraphs=array();
	while($x<=$paragraph_number-1){
		$paragraph=$text_array[rand(0,$count-1)];
		$size=strlen($paragraph);

		if ($size>=$low && $size<=$high){
			array_push($paragraphs,$paragraph);
			$x++;
		}
	}

	return View::make('lorem-ipsum')
		->with('paragraphs',$paragraphs);
	});





Route::get('/user',function()
{
	$handle=file_get_contents("http://en.wikipedia.org/wiki/List_of_birds_by_common_name");
	//Finds and Extracts Title
	preg_match_all('/<li><a href=\"\/wiki\/(.*?)\" title=/',$handle,$link_array);
	$count=count($link_array[1]);
	$bird_link=$link_array[1][rand(0,$count-3)];
	$bird=file_get_contents('http://en.wikipedia.org/wiki/'.$bird_link);
	//$bird=file_get_contents('http://en.wikipedia.org/wiki/Blue_whistling_thrush');

	preg_match('/<title>(.*?)<\/title>/', $bird,$bird_name_array);
	$bird_name=explode(" - ",$bird_name_array[1]);
	$bird_name=$bird_name[0];
	$bird_email=explode(" ",$bird_name);
	$bird_email=end($bird_email);
	$bird_email=strtolower($bird_email);
	
	preg_match('/center"><a href="(.*?)" class="image">/',$bird,$image_page);
	if (isset($image_page[1])){
		$bird=file_get_contents('http://commons.wikimedia.org'.$image_page[1]);
	} else {
		$bird=file_get_contents('http://commons.wikimedia.org/wiki/File:Pyrrhocorax_pyrrhocorax_-standing-8.jpg');
		//echo $bird_name;
	}
	preg_match('/href="\/\/upload.wikimedia.org\/(.*?)"><img alt/',$bird,$image_page);
	$bird="http://upload.wikimedia.org/".$image_page[1];

	$faker = Faker\Factory::create();
	$address=$faker->address;
	$email=$faker->email;
	$birthday=$faker->date($format = 'd-m-Y', $max = 'now');
	$firstName=$faker->firstName;
	$firstInitial=strtolower($firstName[0]);
	$lastName=$faker->lastName;
	$name=$firstName." ".$lastName." the ". $bird_name;
	$email=$firstInitial.strtolower($lastName)."@".$bird_email.".com";
	return View::make('user')
		->with('image',$bird)
		->with('name',$name)
		->with('address',$address)
		->with('email',$email)
		->with('birthday',$birthday);

});