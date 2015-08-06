<?php
namespace Test\Model;
use Zend\Db\TableGateway\TableGateway;

class TestTable {
    protected $tableGateway;
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway= $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet=$this->tableGateway->select();
        return $resultSet;
    }
    public function getTest($id)
    {
        $id=(int)$id;
        $rowSet=$this->tableGateway->select();
        $row=$rowSet->current();
        if(!$row){
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }
    public function saveTest(Test $test)
    {
        $data=array(
            'student'=>$test->student,
            'grade'=>$test->grade,
        );
        $id=(int)$test->id;
        if($id==0){
            $this->tableGateway->insert($data);
        }else{
            if($this->getTest($id)){
                $this->tableGateway->update($data,array('id'=>$id));
            }else{
                throw new \Exception('Student is not exist');
            }
        }
    }
    public function deleteTest($id)
    {
        $this->tableGateway->delete($id);
    }
    public function innerJoin()
    {
        $sql=$this->tableGateway->getSql();
        $select=$sql->select();
        $select->columns(array('student','grade'))
            //->where(array('album.id' => 1))
            ->join(
                'album',
                'album.id=test.id',
                array('title','artist'),
                $select::JOIN_INNER
            );
        return $this->tableGateway->selectWith($select);
    }
}