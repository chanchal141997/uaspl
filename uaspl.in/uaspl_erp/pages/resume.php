<?php include './db.php' ?>


<?php 
if(isset($_POST['apply'])){
$name=$_POST['name'];
$email=$_POST['email'];
$no=$_POST['no'];
$qualification=$_POST['qualification'];
$resume = $_FILES['resume'];


$filename = $resume['name'];
$filerrror = $resume['error'];
$filetmp = $resume['tmp_name'];
$fileext = explode('.', $filename);
$filecheck = strtolower(end($fileext));
$fileextstored = array('png', 'pdf', 'jpeg');

$destinationfile = './resumes/' . $filename;

move_uploaded_file($filetmp, $destinationfile);
$sql="INSERT INTO `resume`(`name`, `email`, `no`, `qualification`, `resume`) VALUES ('$name','$email','$no','$qualification','$destinationfile')";
$query=mysqli_query($connection,$sql);
if($query){
    echo "<script>
    alert('Resume sent successfully.....');
    window.location.href='../../index.php'
</script>";

    

}else{
    echo "not inserted";
}
}
else{
    echo "invalid";
}