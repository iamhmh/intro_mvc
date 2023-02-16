<?php 
class PostsController extends Controller
{

	function index()
	{
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

	function view($id,$slug)
	{
		$this->loadModel('Post');
		$d['post']  = $this->Post->findFirst(array(
			'fields'	 => 'id,slug,content,name',
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
	/**
	 * Admin
	 */
	function admin_index()
	{
		$perPage = 10; 
		$this->loadModel('Post');	
		$condition = array('type'=>'post'); 
		$d['posts'] = $this->Post->find(array(
			'conditions' => $condition,
			'limit' => ($perPage*($this->request->page-1)).','.$perPage
		));
		$d['total'] = $this->Post->findCount($condition); 
		$d['page'] = ceil($d['total'] / $perPage);
		$this->set($d);
	}

	function admin_delete($id)
	{
		$this->loadModel('Post');
		//$this->Post->delete($id);
		$this->Session->setFlash("Le contenu a bien été supprimé !");
		$this->redirect('admin/posts/index');
	}
	function admin_edit($id = null)
	{
		$this->loadModel('Post');
		
		if($id === null)
		{
			$post = $this->Post->findFirst(array(
				'conditions' => ['online' => -1]
			));
			if(!empty($post))
			{
				$id = $post->id;
			}
			else
			{
				$this->Post->save(array(
					'online' => -1
				));
				$id = $this->Post->id;
			}
		}
		$d['id'] = $id;
		echo $d['id'];
		if($this->request->data)
		{
			if($this->Post->validates($this->request->data))
			{
				$this->request->data->type = 'post';
				$this->request->data->created = date('Y-m-d h:i:s');
				$this->Post->save($this->request->data);
				$this->Session->setFlash("La modification a bien été prise en compte !");
				$this->redirect('admin/posts/index');
			}
			else
			{
				$this->Session->setFlash("Merci de corriger vos informations ", 'error');
			}
		}
		else
		{
			$conditions = ['id' => $id];
			$this->request->data = $this->Post->findFirst(array(
				'conditions' => $conditions
			));
			$d['id'] = $id;
		}
		//debug($d);
		$this->set($d);
	}
	function admin_tinymce()
	{
		$this->loadModel('Post');
		$this->layout = 'modal';
		$d['posts'] = $this->Post->find();
		$this->set($d);
	}
}