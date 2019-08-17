<?php
class M_student extends CI_model {
	function add_student($data){
        return $this->db->insert('student', $data);
    }
    function list_student(){
    	$this->db->select("*");
        $this->db->from("student");
		$result = $this->db->get()->result();
		return $result;
    }
    function single_student($id){
    	return $this->db->where('id', $id)->get('student')->row();
    }
    function update_student($data, $id){       
        return $this->db->where('id', $id)->update('student', $data);
    }
    function delete_student($id){
        return $this->db->where('id', $id)->delete('student');
    }
    function search_student($keyword){
        // return "found";
        $this->db->like('name', $keyword);
        $this->db->or_like('dept', $keyword);
        $this->db->or_like('session', $keyword);
        $result = $this->db->get('student')->result();
        return $result;
    }
}
?>