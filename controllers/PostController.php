<?php
	require_once 'controllers/BaseController.php';
	require_once 'models/Post.php';

	class PostController extends BaseController
	{
		public function __construct() {
			$this->folder = 'post';
		}

		public function show() {
			$posts = Post::getAll();
			$data = [
				'posts' =>$posts
			];
			$this->render('PostList', $data);
		}

		public function findPost() {
			$post = Post::find($_GET['id']);
			$data = [
				'post' => $post
			];
			$this->render('PostDetail', $data);
		}
	}
?>