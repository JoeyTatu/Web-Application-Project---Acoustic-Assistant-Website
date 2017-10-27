<?php

/*
 * PHP SimpleXML
 * Loading a XML from a file, adding new elements and editing elements
 */
/*prevent form redirect*/
if(isset($_SERVER['HTTP_REFERER'])){
    header("Location: " . $_SERVER['HTTP_REFERER']);    
} else {
    echo "An Error";
}

//get details from form
$name = $_POST["name"];
$v1 = $_POST["v1"];
$v2 = $_POST["v2"];
$v3 = $_POST["v3"];
$v4 = $_POST["v4"];


//check for file
if (file_exists('../files/AcousticAbsorptionTable.xml')) {
    //loads the xml and returns a simplexml object 
    $xml = simplexml_load_file('../files/AcousticAbsorptionTable.xml');
    $newChild = $xml->addChild('section');
    $newChild->addChild('name', $name);
    $newChild->addChild('v1', $v1);
    $newChild->addChild('v2', $v2);
    $newChild->addChild('v3', $v3);
    $newChild->addChild('v4', $v4);

    //transforming the object in xml format
    $output = $xml->asXML();
    
} else {
    exit('Failed to open AbsortionFactorTable.xml.');
}
//save changes to xml file
 file_put_contents('/home/cabox/workspace/WADProject/files/AcousticAbsorptionTable.xml', $xml->asXML());
?>