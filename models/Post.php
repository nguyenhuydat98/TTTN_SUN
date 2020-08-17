<?php
	class Post {
		private $id;
		private $title;
		private $content;

		public function getId() {
			return $this->id;
		}

		public function getTitle() {
			return $this->title;
		}

		public function getContent() {
			return $this->content;
		}


		public function __construct($id, $title, $content) {
			$this->id = $id;
			$this->title = $title;
			$this->content = $content;
		}

		public function getAll() {
			$list = [];
			$conn = DB::getConnection();
			$sql = "SELECT * FROM posts";
			$result = mysqli_query($conn, $sql);
			if(mysqli_error($conn)) {
				echo "Query Fail : " . mysqli_error($conn);
			}
			if(mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_array($result)) {
					$list[] = new Post(
						$row['id'],
						$row['title'],
						$row['content']
					);
				}
			}
			DB::closeConnection();
			return $list;
		}

		public function find($id) {
			$conn = DB::getConnection();
			$sql = "SELECT * FROM posts WHERE id = $id";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_array($result);
				return new Post(
					$row['id'],
					$row['title'],
					$row['content']
				);
			}
			DB::closeConnection();
			return null;
		}
	}
?>