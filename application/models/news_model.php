<?php
class News_model extends CI_Model {
  public function __construct(){
    $this->load->database();//使用数据库类
  }
  //读取文章方法
  public function get_news($slug = FALSE){
  	if ($slug === FALSE){
    	$query = $this->db->get('news');
    	return $query->result_array();
  	}
  	$query = $this->db->get_where('news', array('slug' => $slug));
  	return $query->row_array();
  }
  //删除文章方法
  public function delete_news($id){
  	$id = explode(',',$this->input->post('id'));
  	for($i=0;$i<count($id);$i++){
  		$this->db->delete('news', array('id' => $id[$i]));
    	$this->db->where('id', $id[$i]);
		$this->db->delete('news');
	}
  }
  //添加文章方法
  public function set_news(){
  	$this->load->helper('url');
  	$slug = url_title($this->input->post('title'), 'dash', TRUE);//把空格替换为'-'
  	$data = array(
    	'title' => $this->input->post('title'),
    	'slug' => $slug,
    	'text' => $this->input->post('text')
  	);
  	return $this->db->insert('news', $data);
  }
  //查询文章方法
  public function check_news($text){
  	$text = $this->input->post('text');
  	echo 'You\'re searching for:"'.$text.'"<br>';
  	$query = $this->db->get('news')->result_array();
  	$counts=0;
  	for($i=0;$i<count($query);$i++){
  		$b=strstr($query[$i]['text'],$text);
  		if($b!=''){
  			echo $query[$i]['id'].':'.$query[$i]['title'].'/'.$query[$i]['text'].'<br>';
  			$counts++;
  		}else{
  			echo '';
  		}
  	}
  	echo '<b>'.$counts.'</b> result(s) matched!';
  }
  public function edit_news($id,$title,$text){
  	$id = $this->input->post('id');
  	$title = $this->input->post('title');
    $text = $this->input->post('text');

  	$query = $this->db->get_where('news', array('id' => $id))->result_array();
  	$data = array(
               'title' => $title,
               'text' => $text
            );
	$this->db->where('id', $id);
	$this->db->update('news', $data);
  }
}