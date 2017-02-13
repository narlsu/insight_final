<?php

namespace App\Models;

use PDO;
use finfo;
use Intervention\Image\ImageManagerStatic as Image;

Class TravelsModel extends DatabaseModel
{
	protected static $tablename = 'travels';
	protected static $columns = ['id','title','description', 'poster'];
	protected static $validationRules = [
					'title'       => 'minlength:3',
					// 'year'        => 'numeric',
					'description' => 'minlength:10' 
	];


	public static function destroy ($id) {
		
		$db = self::getDatabaseConnection();
		$sql = "DELETE FROM " . static::$tablename . " WHERE id= :id";
		$statement = $db->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
	}

	public function savePoster ($filename) {
		$finfo = new finfo(FILEINFO_MIME_TYPE);
		$mimetype = $finfo->file($filename);
		// var_dump($mimetype);

		$extension = [
			'image/jpg' => '.jpg',
			'image/jpeg' => '.jpg',
			'image/png' => '.jpg',
			'image/gif' => '.jpg'
		];
		// if mime type is present, then select appropiate extension for the file
		if(isset($extensions[$mimetype])){
			$extension = $extensions[$mime];
		} else {
			$extension = '.jpg';
		}

		// create filename 
		$newFilename = uniqid() . $extension;
		$this->poster = $newFilename;

		// creating new folder to store newFilename in order to display the image
		$folder = "images/poster/";

		if (is_dir($folder)) {
			mkdir($folder, 0777, true); 
		}
		$destination = $folder . $newFilename;
		move_uploaded_file($filename, $destination);

		$img = Image::make($destination);
		$img->fit(900, 400);
		$img->save($folder . $newFilename);

		if(! is_dir("images/poster/thumbnails")){
			mkdir('images/poster/thumbnails', 0777, true);
		}
		$img = Image::make($destination);
		$img->fit(280,200);
		$img->save($folder ."thumbnails/". $newFilename);

		// create thumbnails

	}
	public function search($searchTerm){

		$db = $this->getDatabaseConnection();

		$query = "SET @searchterm = :searchTerm";

		$statement = $db->prepare($query);
		$statement->bindValue(":searchTerm" , $searchTerm);
		$statement->execute();

		$query = "SELECT movies.id, movies.title, movies.description, movies.year
				  FROM movies
				  WHERE
				   MATCH(movies.title) AGAINST(@searchterm) OR
				   MATCH(movies.description) AGAINST(@searchterm)
				   ORDER BY (movies.title) DESC";




		$statement = $db->prepare($query);
		$results = $statement->execute();


		$searchresults = [];

		while ($record = $statement->fetch(PDO::FETCH_ASSOC)) {
			$model = new MoviesModel;
			$model->data = $record;
			array_push($searchresults, $model);
		}
		return $searchresults;

	}
}