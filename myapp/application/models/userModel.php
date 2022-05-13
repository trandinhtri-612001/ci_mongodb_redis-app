   
<?php
class userModel extends CI_Model
{
    function __construct() {
		parent::__construct();
        $this->load->library("Mongo_db", array('activate'=>'default'),'mongo_db');
		
	}
    
    public function addUser($data)
    {
  $this->db->insert('users',$data);
  redirect('userController/viewUser','refresh');
        
    }
    public function getuser(){
        $res = $this->Mongo_db->get('users');
        return  $res;
    }
    public function deleteById($id){
        $this->db->where('id',$id);
        $this->db->delete("users");
        redirect('userController/viewUser','refresh');
    }
    public function getById($id){
        $this->db->where('id',$id);
        $res = $this->db->get('users');
        return $res;
    }
    public function updateById($id,$data){
        $this->db->where('id',$id);
       $this->db->update('users',$data);
       redirect('userController/viewUser','refresh');
    }
}




?>