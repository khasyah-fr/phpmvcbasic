<?php 

class About extends Controller{
    public function index($namakamu = "User", $namaaku = "Admin"){
        $data['namakamu'] = $namakamu;
        $data['namaaku'] = $namaaku;
        $data['judul'] = 'About Index';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page()
    {
        $data['judul'] = 'About Page';
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}
?>