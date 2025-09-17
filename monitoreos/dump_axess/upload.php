<?php
function subirarchivo(){
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
     
      $expensions= array("jpeg","jpg","csv");
     
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension no permitida, escoja un archivo .CSV";
      }
     
      if($file_size > 2097152) {
         $errors[]='El tamaño del archivo debe ser maximo 2 MB';
      }
     
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"procesados/".$file_name);
         echo "Subido con exito";
      }else{
         print_r($errors);
      }
   }
   echo '<html>';
echo '   <body>';
echo '     ';
echo '      <form action = "" method = "POST" enctype = "multipart/form-data">';
echo '         <input type = "file" name = "image" />';
echo '         <input type = "submit"/>';
echo '           ';
echo '           ';
echo '      </form>';
echo '     ';
echo '   </body>';
echo '</html>';
return $file_name;
}
//subirarchivo();
 ?>