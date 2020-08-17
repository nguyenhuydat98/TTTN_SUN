<?php
	class DB {
		protected $conn = null;

		public function getConnection() {
			if(!isset($conn)) {
				$conn = mysqli_connect('localhost', 'root', '', 'demo_mvc') or die("Connect DB Fail.");
				mysqli_set_charset($conn, "utf-8");
			}
			return $conn;
		}

		public function closeConnection() {
			if(isset($conn)) {
				mysqli_close($conn);
			}
		}

	}
?>