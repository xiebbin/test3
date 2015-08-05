<?php
namespace Test\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class TestController extends AbstractActionController
{
        protected $testTable;
        public function getTestTable(){
                if(!$this->testTable){
                        $sm=$this->getServiceLocator();
                        $this->testTable=$sm->get('Test\Model\TestTable');
                }
                return $this->testTable;
        }
        public function indexAction()
        {
                return new ViewModel(array(
                        'tests'=>$this->getTestTable()->fetchAll(),
                ));
        }
}