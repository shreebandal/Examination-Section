<?php 

    function escape($string){
        $connection = $connection = mysqli_connect('localhost', 'root', '', 'exam_center');
        return mysqli_real_escape_string($connection, $string);
    }


    function makedir($dir){
        $dir = "./".$dir."/";
        if ( !file_exists( $dir ) && !is_dir( $dir ) ) {
            mkdir( $dir );       
        }

    }

    
    function upload($files){

        $filesize =$files['size'];
        $filename = $files['name'];
        $fileerror = $files['error'];
        $filetmp = $files['tmp_name'];
        $filerand = uniqid();

        $fileext = explode('.',$filename);
        $filecheck = strtolower(end($fileext));

        $fileextstored = array('png','jpg','jpeg','pdf');
        
        if ($fileext[1] != 'png' && $fileext[1] != 'jpg' && $fileext[1] != 'jpeg' && $fileext[1] != 'pdf')
                $errF = "Select valid file. Only png, jpg, jpeg and pdf formats are supported<br>";

        if($filesize > 256000)
                $errSz = "Upload file with size less than or equal to 256KB<br>";
        
        // if(isset($errF) && isset($errSz))
            // $arr = array($filename, $filerand, $filetmp, $errF, $errSz); 
        // elseif(isset($errF) && !isset($errSz))
        //     $arr = array($filename, $filerand, $filetmp, $errF, FALSE);
        // elseif(!isset($errF) && isset($errSz))
        //     $arr = array($filename, $filerand, $filetmp, FALSE, $errSz);
        // else
        //     $arr = array($filename, $filerand, $filetmp, FALSE, FALSE);
        return array($filename, $filerand, $filetmp, $errF, $errSz);
    }
?>
