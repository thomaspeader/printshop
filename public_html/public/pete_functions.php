    <?php
    function createThumbnail($image) {
     
        require 'config.php';
         
        if(preg_match('/[.](jpg)$/', $image)) {
            $im = imagecreatefromjpeg($path_to_image_directory . $image);
        } else if (preg_match('/[.](gif)$/', $image)) {
            $im = imagecreatefromgif($path_to_image_directory . $image);
        } else if (preg_match('/[.](png)$/', $image)) {
            $im = imagecreatefrompng($path_to_image_directory . $image);
        }
         
        $ox = imagesx($im);
        $oy = imagesy($im);
         
        $nx = $final_width_of_image;
        $ny = floor($oy * ($final_width_of_image / $ox));
         
        $nm = imagecreatetruecolor($nx, $ny);
         
        imagecopyresampled($nm, $im, 0,0,0,0,$nx,$ny,$ox,$oy);
         
        if(!file_exists($path_to_thumbs_directory)) {
          if(!mkdir($path_to_thumbs_directory)) {
               die("There was a problem. Please try again!");
          }
           }
     
        imagejpeg($nm, $path_to_thumbs_directory . $image);
   
}
       function createThumbnail2($image) {
     
        require 'config.php';
         
        if(preg_match('/[.](jpg)$/', $image)) {
            $im = imagecreatefromjpeg($path_to_image_directory . $image);
        } else if (preg_match('/[.](gif)$/', $image)) {
            $im = imagecreatefromgif($path_to_image_directory . $image);
        } else if (preg_match('/[.](png)$/', $image)) {
            $im = imagecreatefrompng($path_to_image_directory . $image);
        }
         
        $ox = imagesx($im);
        $oy = imagesy($im);
         
        $nx = $final_width_of_image2;
        $ny = floor($oy * ($final_width_of_image2 / $ox));
         
        $nm = imagecreatetruecolor($nx, $ny);
         
        imagecopyresampled($nm, $im, 0,0,0,0,$nx,$ny,$ox,$oy);
         
        if(!file_exists($path_to_thumbs_directory2)) {
          if(!mkdir($path_to_thumbs_directory2)) {
               die("There was a problem. Please try again!");
          }
           }
     
        imagejpeg($nm, $path_to_thumbs_directory2 . $image);
   
}     
?>
     
