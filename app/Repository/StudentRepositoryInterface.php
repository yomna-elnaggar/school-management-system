<?php
namespace App\Repository;

interface StudentRepositoryInterface {

    public function addStudent();
    public function get_classrooms($id);
    public function get_Sections($id);
    public function storeStudent($request);
    public function showStudent();
    public function editStudent($id);
    public function showStudentInf($id);
    public function updateStudent($request);
    public function deleteStudent($request);
    public function attachment_upload($request);
    public function  Download_attachment($studentName,$fileName);
    public function  Delete_attachment($request); 
}

