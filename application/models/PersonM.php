<?php

// extends class Model
class ArticleM extends CI_Model{

  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

  // function untuk insert data ke tabel 
  public function add_article($title,$article,$category){

    if(empty($title) || empty($article) || empty($category)){
      return $this->empty_response();
    }else{
      $data = array(
        "title"=>$title,
        "article"=>$article,
        "category"=>$category
      );

      $insert = $this->db->insert("tbl_news", $data);

      if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data berhasil ditambahkan.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data gagal ditambahkan.';
        return $response;
      }
    }

  }

  // mengambil semua data 
  public function all_article(){

    $all = $this->db->get("tbl_article")->result();
    $response['status']=200;
    $response['error']=false;
    $response['person']=$all;
    return $response;

  }

  // hapus data person
  public function delete_article($id){

    if($id == ''){
      return $this->empty_response();
    }else{
      $where = array(
        "id"=>$id
      );

      $this->db->where($where);
      $delete = $this->db->delete("tbl_article");
      if($delete){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data berhasil dihapus.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data  gagal dihapus.';
        return $response;
      }
    }

  }

  // update 
  public function update_article($id,$title,$article,$category){

    if($id == '' || empty($title) || empty($article) || empty($category)){
      return $this->empty_response();
    }else{
      $where = array(
        "id"=>$id
      );

      $set = array(
        "title"=>$title,
        "article"=>$article,
        "category"=>$category
      );

      $this->db->where($where);
      $update = $this->db->update("tbl_article",$set);
      if($update){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data berhasil diubah.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data gagal diubah.';
        return $response;
      }
    }

  }

}

?>
