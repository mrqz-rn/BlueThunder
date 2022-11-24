$image = $_FILES["image"];

$filename = $_FILES['image']['name'];
$fileTmpName = $_FILES['image']['tmp_name'];
$fileSize = $_FILES['image']['size'];
$fileError = $_FILES['image']['error'];
$fileType = $_FILES['image']['type'];
$file_ext = explode('.', $filename);
$fileActualExt = strtolower(end($file_ext));
$allowed = array('jpg','jpeg','png');

if(in_array($fileActualExt, $allowed)){
    if($fileError === 0){
        if($fileSize < 1000000){
            $fileNameNew = uniqid('', true).'.'.$fileActualExt;
            $fileDestination = '../assets/image/prodcut-imag/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            header("Location : add-prod.php ?Upload Success");
        } else {
            echo "Your file is too large";
        }
    } else {
        echo "There was an error";
    }
} else {
    echo "You cannot uppload this file type";
}



1669209443.png
