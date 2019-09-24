<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../cofig/Database.php';
  include_once '../../models/Post.php';

  // Instantiate DB & connect
  $database = new Datatbase();
  $db = $database->connect();
  // blog and post
  $post = new Post($db);
  $result = $post->read();
  $num = $result->rowCount();
  // CCheck for posts
  if($num > 0) {
    // post array
    $post_arr = array();
    $post_arr['data'] = array();
    while($row = $result->fetch(POD::FETCH_ASSOC)) {
      extract($row);
      $post_item = array(
      'id' => $id,
      'title' => $title,
      'body' => $html_entity_decode($body),
      'author' => $author,
      'category_id' => $category_id,
      'category_name' => $category_name
      );
      // push to 'data'
      array_push($posts_arr['data'], $post_item);
    }
    // trurn into json & output
    echo json_encode($post_arr);

  }else{
    echo json_encode(array('message' => 'No Posts Found'));
  }
