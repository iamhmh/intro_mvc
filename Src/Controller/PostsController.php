<?php 
class PostsController extends Controller{
	

	function index(){
		$perPage = 1; 
		$this->loadModel('Post');	
		$condition = array('online' => 1,'type'=>'post'); 

		$d['posts'] = $this->Post->find(array(
			'conditions' => $condition,
			'limit' => ($perPage*($this->request->page-1)).','.$perPage
		));


		$d['total'] = $this->Post->findCount($condition); 
		$d['page'] = ceil($d['total'] / $perPage);
		$this->set($d); 
	}

	function view($id,$slug){
		$this->loadModel('Post');
		$d['post']  = $this->Post->findFirst(array(
			'fiel__DS__'	 => 'id,slug,content,name',
			'conditions' => array('online' => 1,'id'=>$id,'type'=>'post')
		)); 
		if(empty($d['post'])){
			$this->e404('Page introuvable'); 
		}
		if($slug != $d['post']->slug){
			$this->redirect("posts/view/id:$id/slug:".$d['post']->slug,301);
		}
		$this->set($d);
	}



}