<?php

namespace App\Models;

use PDO;

Class CommentsModel extends DatabaseModel
{
	protected static $tablename = 'comments';
	protected static $columns = ['id','comment','user_id','travel_id'];

	protected static $validationRules = [
		'comment' => 'minlength:10,maxlength:100,inputValidate'

	];

	public function getAllComments($id){

		// get database connection
		$db = $this->getDatabaseConnection();

		$sql = "SELECT comments.comment, comments.id, travels.title, users.email
				FROM comments
				JOIN travels ON comments.travel_id = travels.id
				JOIN users ON comments.user_id = users.id
				WHERE comments.travel_id = :id";

		$statement = $db->prepare($sql);

		$statement->bindValue(':id', $id);

		$result = $statement->execute();

		$commentsArray = [];
		while ($record = $statement->fetch(PDO::FETCH_ASSOC)){
			array_push($commentsArray, $record);
		}
		
		return $commentsArray;
		


	}
}