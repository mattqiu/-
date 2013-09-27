<?php
class News extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('news_model');
    $this->load->helper('url');
  }
  //显示某条新闻的页面
  public function view($slug){
    $data['news_item'] = $this->news_model->get_news($slug);
    if (empty($data['news_item'])){
      show_404();
    }

  $data['title'] = $data['news_item']['title'];

  $this->load->view('templates/header', $data);
  $this->load->view('news/view', $data);
  $this->load->view('templates/footer');
  }
  //得到所有新闻
  public function index(){
  $data['news'] = $this->news_model->get_news();
  $data['title'] = 'News archive';

  $this->load->view('templates/header', $data);
  $this->load->view('news/index', $data);
  $this->load->view('templates/footer');
  }
  //创建新闻表单验证
  public function create(){
  $this->load->helper('form');
  $this->load->library('form_validation');
  
  $data['title'] = '发布新闻';
  
  $this->form_validation->set_rules('title', 'Title', 'required'); //域名称,错误信息,规则
  $this->form_validation->set_rules('text', 'text', 'required');
  
  if ($this->form_validation->run() === FALSE){
    $this->load->view('templates/header', $data);  
    $this->load->view('news/create');
    $this->load->view('templates/footer');
  }else{
    $this->news_model->set_news();
    $this->load->view('news/success');
    }
  }
  //删除新闻表单验证
  public function delete(){
  $this->load->helper('form');
  $this->load->library('form_validation');
  $data['news'] = $this->news_model->get_news();
  
  $data['title'] = '删除新闻';
  
  $this->form_validation->set_rules('id', 'Id', 'required');
  
  if ($this->form_validation->run() === FALSE){
    $this->load->view('templates/header', $data);
    $this->load->view('news/delete');
    $this->load->view('templates/footer');
  }else{
    $id = $this->input->post('id');
    $this->news_model->delete_news($id);
    $this->load->view('news/success');
    }
  }
  //查询框验证
  public function check(){
  $this->load->helper('form');
  $this->load->library('form_validation');
  
  $data['title'] = '查询新闻';
  $this->form_validation->set_rules('text', 'text', 'required');
  
  if ($this->form_validation->run() === FALSE){
    $this->load->view('templates/header', $data);  
    $this->load->view('news/check');
    $this->load->view('templates/footer');
  }else{
    $text = $this->input->post('text');
    $this->news_model->check_news($text);
    }
  }
  //编辑表单验证
  public function edit(){
  $this->load->helper('form');
  $this->load->library('form_validation');
  $data['news'] = $this->news_model->get_news();
  $data['title'] = '编辑新闻';
  $this->form_validation->set_rules('id', 'id', 'required');
  $this->form_validation->set_rules('title', 'Title', 'required');
  $this->form_validation->set_rules('text', 'text', 'required');

  if ($this->form_validation->run() === FALSE){
    $this->load->view('templates/header', $data);  
    $this->load->view('news/edit');
    $this->load->view('templates/footer');
  }else{
    $id = $this->input->post('id');
    $title = $this->input->post('title');
    $text = $this->input->post('text');
    $this->news_model->edit_news($id,$title,$text);
    }
  }
}