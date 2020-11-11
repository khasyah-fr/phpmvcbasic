<?php 

class Students_model {
    private $table = 'students';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getStudents()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getStudentById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addStudent($data)
    {
        $query = "INSERT INTO " . $this->table . " VALUES ('', :name, :number, :email)";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('number', $data['number']);
        $this->db->bind('email', $data['email']);
        $this->db->execute();
        return $this->db->rowAffected();
    }

    public function deleteStudent($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowAffected();
    }

    public function searchStudents()
    {
        $keyword = $_POST['keyword'];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE name LIKE :keyword');
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}