<?php
namespace App\Repository;

interface TeacherRepositoryInterface {

    public function getAllTeachers();

    public function getGenders();

    public function getSpecializations();

    public function store($request);

    public function edit($id);
    public function update($request);

    public function delete($request);
}

