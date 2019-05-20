<?php defined ('BASEPATH') OR exit ('no direct access allowed');

class Auth_model extends CI_Model
{
    private $_table = "registrasi";
    public $username;
    public $password;

    public function rules()
    {
        return [
            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required'
            ],

            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required'
            ],
               
            ['field' => 'tipe',
            'label' => 'Tipe',
            'rules' => 'numeric'
            ],
        ];
    }

    function cek_login($username,$password){
        $where = array(
			'username' => $username,
			'password' => $password
		);
		return $this->db->get_where($this->_table,$where);
	}

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getByUsername($username, $password)
    {
        return $this->db->get_where($this->_table, ["username"=>$username,"password"=>$password])->row();
    }

    public function checkLogin($username, $password)
    {
        return $this->db->get_where($this->_table, ["username"=>$username,"password"=>$password])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->password = md5($post["password"]);
        $this->username = $post["name"];
        $this->tipe = $post["tipe"];
        $this->db->insert($this->_table,$this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->password = md5($post["password"]);
        $this->username = $post["username"];
        $this->tipe = $post["tipe"];
        $this->db->update($this->_table,$this, array('username'=>$post["username"]));
    }

    public function delete($username)
    {
        return $this->db->delete($this->_table, array("username" => $username));
    }



}