<?php
namespace Test\Model;
class Test
{
    public $id;
    public $student;
    public $grade;
    public $title;
    public $artist;
    public function  exchangeArray($data)
    {
        $this->id=(!empty($data['id'])) ? $data['id']:null;
        $this->student=(!empty($data['student'])) ? $data['student']:null;
        $this->grade=(!empty($data['grade'])) ? $data['grade']:null;
        $this->title=(!empty($data['title'])) ? $data['title']:null;
        $this->artist=(!empty($data['artist'])) ? $data['artist']:null;
    }
}