<?php

include "config/db.php";

class DataOperation extends Database
{
	public function insert_record($table,$fileds){
		$sql = "";
		$sql .= "INSERT INTO ".$table;
		$sql .= " (".implode(",", array_keys($fileds)).") VALUES ";
		$sql .= "('".implode("','", array_values($fileds))."')";
		$query = mysqli_query($this->con,$sql);
		if($query){
			return true;
		}
	}

	public function fetch_record_all($table){
		$sql = "SELECT * FROM ".$table;
		// $array = array();
		$query = mysqli_query($this->con,$sql);
        $array = mysqli_fetch_all($query, MYSQLI_ASSOC);
		// while ($row = mysqli_fetch_assoc($query)) {
		// 	$array[] = $row;
		// }
		
		return $array;
	}

	public function fetch_record($table){
		$sql = "SELECT * FROM ".$table." ORDER BY genre_id DESC";
		// $array = array();
		$query = mysqli_query($this->con,$sql);
        $array = mysqli_fetch_all($query, MYSQLI_ASSOC);
		// while ($row = mysqli_fetch_assoc($query)) {
		// 	$array[] = $row;
		// }
		
		return $array;
	}

	public function fetch_books($table1, $table2){
		$sql = "SELECT b.book_id,b.book_name, b.author, b.email, g.genre FROM ".$table1." b join ".$table2." g where b.genre_id = g.genre_id ORDER BY b.book_id DESC";
		$query = mysqli_query($this->con,$sql);
        $array = mysqli_fetch_all($query, MYSQLI_ASSOC);
		return $array;
	}

	public function select_record($table,$where){
		$sql = "";
		$condition = "";
		foreach ($where as $key => $value) {
			$condition .= $key . "='" .$value . "' AND ";
		}
		$condition = substr($condition, 0, -5);
		$sql .= "SELECT * FROM ".$table." WHERE ".$condition;
		$query = mysqli_query($this->con,$sql);
		$row = mysqli_fetch_array($query);
		return $row;
	}

	public function update_record($table,$where,$fields){
		$sql = "";
		$condition = "";
		foreach ($where as $key => $value) {
			$condition .= $key . "='" .$value . "' AND ";
		}
		$condition = substr($condition, 0, -5);
		foreach ($fields as $key => $value) {
			$sql .= $key . "='".$value."', ";
		}
		$sql = substr($sql, 0, -2);
		$sql ="UPDATE ".$table." SET ".$sql." WHERE ".$condition;
		if(mysqli_query($this->con,$sql)){
			return true;
		}
	}

	public function delete_record($table,$where){
		$sql = "";
		$condition = "";
		foreach ($where as $key => $value) {
			$condition .= $key . "='" .$value . "' AND ";
		}
		$condition = substr($condition, 0, -5);
		$sql = "DELETE FROM ".$table." WHERE ".$condition;
		if(mysqli_query($this->con,$sql)){
			return true;
		}
	}
}

$obj = new DataOperation;

if(isset($_POST["submit"])){
	$myArray = array(
		"book_name" => $_POST["book_name"],
		"author" => $_POST["author"],
		"published" => $_POST["published"],
		"no_pages" => $_POST["no_pages"],
		"email" => $_POST["email"],
		"genre_id" => $_POST["category"]
		);

		if($obj->insert_record("books",$myArray)){
			header("location:index.php?msg=Record Inserted");
		}

}

if(isset($_POST["edit_book"])){
	$id = $_POST["book_id"];
	$where = array("book_id"=>$id);
	$myArray = array(
	"book_name" => $_POST["book_name"],
	"author" => $_POST["author"],
	"published" => $_POST["published"],
	"no_pages" => $_POST["no_pages"],
	"email" => $_POST["email"],
	"genre_id" => $_POST["category"]
	);
	if($obj->update_record("books",$where,$myArray)){
		header("location:index.php?msg=Record Updated Successfully");
	}
}


if(isset($_POST["submit_genre"])){
	$myArray = array(
		"genre" => $_POST["genre"],
		"description" => $_POST["description"]
		);

		if($obj->insert_record("genre",$myArray)){
			header("location:genre.php?msg=Record Inserted");
		}

}

if(isset($_POST["edit_genre"])){
	$id = $_POST["genre_id"];
	$where = array("genre_id"=>$id);
	$myArray = array(
	"genre" => $_POST["genre"],
	"description" => $_POST["description"]
	);
	if($obj->update_record("genre",$where,$myArray)){
		header("location:genre.php?msg=Record Updated Successfully");
	}
}



if(isset($_GET["deletebook"])){
	if(isset($_GET["id"])){
		$id = $_GET["id"];
	}
	$where = array("book_id"=>$id);
	if($obj->delete_record("books",$where)){
		header("location:index.php?msg=Record Deleted Successfully");
	}
}

if(isset($_GET["deletegenre"])){
	if(isset($_GET["id"])){
		$id = $_GET["id"];
	}
	$where = array("genre_id"=>$id);
	$myArray = array(
	"genre_id" => "1"
	);
	if($obj->update_record("books",$where,$myArray)){
		if($obj->delete_record("genre",$where)){
			header("location:genre.php?msg=Record Deleted Successfully");
		}	
	}
}


?>