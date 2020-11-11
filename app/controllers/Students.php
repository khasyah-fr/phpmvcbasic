<?php 

class Students extends Controller {
    public function index()
    {
        $data['judul'] = 'Students List';
        $data['students'] = $this->model('Students_model')->getStudents();
        $this->view('templates/header', $data);
        $this->view('students/index', $data);
        $this->view('templates/footer');
    }

    public function details($id)
    {
        $data['judul'] = 'Student Details';
        $data['students'] = $this->model('Students_model')->getStudentById($id);
        $this->view('templates/header', $data);
        $this->view('students/details', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        if($this->model('Students_model')->addStudent($_POST) > 0){
            Flasher::setFlash('successfully', 'inserted', 'success');
            header('Location: ' . BASEURL . '/students');
            exit;
        } else {
            Flasher::setFlash('failed to', 'insert', 'danger');
            header('Location: ' . BASEURL . '/students');
            exit;
        }
    }

    public function delete($id)
    {
        if($this->model('Students_model')->deleteStudent($id) > 0){
            Flasher::setFlash('successfully', 'deleted', 'success');
            header('Location: ' . BASEURL . '/students');
            exit;
        } else {
            Flasher::setFlash('failed to', 'delete', 'danger');
            header('Location: ' . BASEURL . '/students');
            exit;
        }
    }

    public function getedit()
    {
        echo $this->model('Students_model')->getStudentById($_POST['id']);
    }

    public function search()
    {
        $data['judul'] = 'Students List';
        $data['students'] = $this->model('Students_model')->searchStudents();
        $this->view('templates/header', $data);
        $this->view('students/index', $data);
        $this->view('templates/footer');
    }
}