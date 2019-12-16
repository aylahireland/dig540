
<?php
  error_reporting(E_ALL); 
  ini_set("display_errors", 1); 
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
    public function getDOcument(){ 
        for($j=0; $j<count($this->document); $j++){
            if($j%2==0) print_r("<span style='color:blue'>Documents:".$this->document[$j]."</span><br>");
            else print_r("<span style='color:red'>Documents:".$this->document[$j]."</span><br>");
        }
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
$file_handle = fopen('./genealogy_dataset.csv', 'r');
$first_line = fgetcsv($file_handle);
for($i=0; $i<count($first_line); $i++){ 
   print_r('Column header found: '.$first_line[$i].'<br>');
}
$genealogys = array();
    
	while($data_row = fgetcsv($file_handle)){
		$genealogy = new Genealogy();
		$genealogy->setData($data_row);
		array_push($genealogys, $genealogy);
	}

	for($i=count($genealogys)-1; $i>=0; $i--){
		print_r("<p>Relative:<br>");
		$genealogys[$i]->getData();
	   	print_r('</p>');
	}

fclose($file_handle);

?>
// I cant figure out what the issue is with line 33. Also how do I get rid of the fifth "Column Header found line"? am i on the right track?