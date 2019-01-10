<?php

require APPPATH . 'libraries/REST_Controller.php';

class Article extends REST_Controller{

  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('ArticleM');
  }

  // method index untuk menampilkan data menggunakan method get
  public function index_get(){
    $response = $this->ArticleM->all_article();
    $this->response($response);
  }

  // untuk menambah data menaggunakan method post
  public function add_post(){
    $response = $this->ArticleM->add_article(
        $this->post('title'),
        $this->post('article'),
        $this->post('category')
      );
    $this->response($response);
  }

  // update data menggunakan method put
  public function update_put(){
    $response = $this->ArticleM->update_article(
        $this->put('id'),
        $this->put('title'),
        $this->put('article'),
        $this->put('category')
      );
    $this->response($response);
  }

  // hapus data person menggunakan method delete
  public function delete_delete(){
    $response = $this->PersonM->delete_article(
        $this->delete('id')
      );
    $this->response($response);
  }

}

?>
