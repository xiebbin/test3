<?php
namespace Test\Model;
class Test
{
    public $id;
    public $student;
    public $grade;
    public function  exchangeArray($data)
    {
        $this->id=(!empty($data['id'])) ? $data['id']:null;
        $this->student=(!empty($data['student'])) ? $data['student']:null;
        $this->grade=(!empty($data['grade'])) ? $data['grade']:null;
    }
}