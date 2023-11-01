<?php
session_start(); ?>

<?php include './db.php';


$sql = "select * from `doc_details` ";
$res = mysqli_query($connection, $sql);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {

  $fileDataJson = $row['Doc1'];
$fileData = json_decode($fileDataJson, true);

$id = $_GET['fileID'];
$masterid = $_GET['id'];

foreach ($fileData as $key => $file) {
    if ($file['fileID'] == $id) {
        unset($fileData[$key]);
        break; // Exit the loop after deleting the file
    }
}

$sql = "update `doc_details` set Doc1='".json_encode($fileData)."'  where doc_id = ".$masterid;
// echo $sql;
// exit;
$res = mysqli_query($connection, $sql);



// var_dump($fileData);
// exit;
    
    // $all = json_decode($all, true);
    // $jsonfile = $all["Doc1"];
    // $jsonfile = $jsonfile[$id];

    // if ($jsonfile) {
    //     unset($all["Doc1"][$id]);
    //     $all["Doc1"] = array_values($all["Doc1"]);
    //     file_put_contents($fileData, json_encode($all));
    // }
    header("./dis_doc.php");

    }}


                                  