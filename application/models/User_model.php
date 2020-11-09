<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = "user";
    public function rules()
    {
        return [
         ['field' => 'password',
         'label' => 'Password',
         'rules' => 'required']
        ];
    }


    public function doLogin()
    {
        $post = $this->input->post();
        // cari user berdasarkan username
        $this->db->where('username', $post["username"]);
        $user = $this->db->get($this->_table)->row();
        // jika user terdaftar
        if($user)
        {
            // periksa password-nya
            //$isPasswordTrue = 1;
             $isPasswordTrue = password_verify($post["password"], $user->password);
            // jika password benar dan dia admin
            if($isPasswordTrue){ 
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $user]);
                $user_masuk = array(
                    'id_user'  => $user->user_id,
                    'username'  => $user->username,
                    'password'  => $user->password,
                    'user_akademik' => $user->user_akademik,
                    'id_fakultas' => $user->id_fakultas,
                );
                $this->session->set_userdata($user_masuk);
            // $this->_updateLastLogin($user->user_id);
            return true;
            }else{
                $this->session->set_flashdata('error', 'Password salah');
            }
        }else{
            $this->session->set_flashdata('error', 'username salah');
        }
        // login gagal
        return false;
    }

    public function isNotLogin()
    {
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($user_id)
    {
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE user_id={$user_id}";
        $this->db->query($sql);
    }
}
