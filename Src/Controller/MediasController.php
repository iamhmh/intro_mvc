<?php
class MediasController extends Controller
{
    function admin_index($id)
    {
        $this->loadModel('Media');
        //debug($this->request);
        if ($this->request->data && !empty($_FILES['file']['name'])) 
        {
            if (strpos($_FILES['file']['type'], 'image') !== false) 
            {
                $dir = __WEBROOT__ . __DS__ . 'img' . __DS__ . date('Y-m');
                if (!file_exists($dir)) 
                {
                    mkdir($dir, 0777);
                }
                move_uploaded_file($_FILES['file']['tmpname'], $dir . __DS__ . $_FILES['file']['name']);
                $this->Media->save(
                    array(
                        'name' => $this->request->data->name,
                        'file' => date('Y-m-') . '/' . $_FILES['file']['name'],
                        'post_id' => $id,
                        'type' => 'img',
                    )
                );
                $this->Session->setFlash('L\'image a bien été uploadée !');
            } 
            else 
            {
                $this->Form->errors['file'] = 'Le fichier n\'est pas une image';
            }
        }
        $this->layout = 'modal';
        $d['images'] = $this->Media->find(
            array(
                'conditions' => ['post_id' => $id],
            )
        );
        $d['post_id'] = $id;
        $this->set($d);
    }
}