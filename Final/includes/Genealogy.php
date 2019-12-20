<?php
class Genealogy{
    private $id;
    private $name;
    private $relationship;
    private $document;
   

    public function setId($id){ $this->id = $id; }
    public function getId(){ print_r( 'Id #: '.$this->id . '<br>'); }
    public function setName($name){ $this->name = $name; }
    public function getName(){ print_r('Name: '.$this->name . '<br>'); }
    public function setRelationship($relationship){ $this->relationship = $relationship; }
    public function getRelationship(){ print_r('Relationships: '.$this->relationship . '<br>'); }
    public function setDocument($document){ 
        $this->document = str_getcsv($document);
    }
    public function getDocument(){ 
        for($j=0; $j<count($this->document); $j++){
            if($j%2==0) print_r("<span style='color:blue'>Documents:".$this->document[$j]."</span><br>");
            else print_r("<span style='color:red'>Documents:".$this->document[$j]."</span><br>");
        }
    }
    public function getTitleLink(){
        print_r($this->name . ': '. $this->relationship . '<br>');
    }
  

    public function setData($data_row){
	$this->setId($data_row[0]);
	$this->setName($data_row[1]);
	$this->setRelationship($data_row[2]);
	$this->setDocument($data_row[3]);
    
   
    }

    public function getData(){
	$this->getId();
	$this->getName();
	$this->getRelationship();
	$this->getDocument();
	
    }
}
?>