<?php 
if(isset($_FILES['img'])){

echo "<pre>";
print_r($_FILES);
echo "</pre>";
    
$file_name = $_FILES['img']['name'];
$file_temp= $_FILES['img']['tmp_name'];
$file_type = $_FILES['img']['type'];
$file_size = $_FILES['img']['size'];


move_uploaded_file($file_temp,"upload_img/".$file_name);

}

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>orc</title>
    <script src='https://unpkg.com/tesseract.js@v2.1.0/dist/tesseract.min.js'></script>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
    Choose your file<input type="file" name="img" />
    <input type="submit" value="Upload" />
</form>

<script>
Tesseract.recognize(
  'https://tesseract.projectnaptha.com/img/eng_bw.png',
  'eng',
  { logger: m => console.log(m) }
).then(({ data: { text } }) => {
  console.log(text);
})
</script>
</body>
</html>