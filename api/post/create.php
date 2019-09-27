<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers'); 
  header('Access-Control-Allow-Headers: Access-Control-Allow-Methods'); 
  header('Access-Control-Allow-Headers: Content-Type'); 
  header('Access-Control-Allow-Headers: Authorization');
  header('Access-Control-Allow-Headers: X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Post.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
  // blog and post
  $post = new Post($db);

  // Get raw posted data
  $data = json_encode(file_get_contents('php://input'));

  $post->title = $data->title;
  $post->body = $data->body;
  $post->aurthor = $data->aurthor;
  $post->categroy_id = $data->categroy_id;

  // Create post
  if($post->create()) {
    echo json_encode(
      array('mesage' => 'Post created')
    );
  }else{
    echo json_encode(
      array('mesage' => 'Post not created')
    ); 
  }
