<?php
class MemberModel {
    private $table = 'members';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllMembers() {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY created_at DESC');
        return $this->db->resultSet();
    }

    public function getMemberById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addMember($data) {
        $query = "INSERT INTO members (nis_nip, name, class_dept, phone) 
                  VALUES (:nis_nip, :name, :class_dept, :phone)";
        
        $this->db->query($query);
        $this->db->bind('nis_nip', $data['nis_nip']);
        $this->db->bind('name', $data['name']);
        $this->db->bind('class_dept', $data['class_dept']);
        $this->db->bind('phone', $data['phone']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateMember($data) {
        $query = "UPDATE members SET 
                    nis_nip = :nis_nip,
                    name = :name,
                    class_dept = :class_dept,
                    phone = :phone
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('nis_nip', $data['nis_nip']);
        $this->db->bind('name', $data['name']);
        $this->db->bind('class_dept', $data['class_dept']);
        $this->db->bind('phone', $data['phone']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteMember($id) {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
