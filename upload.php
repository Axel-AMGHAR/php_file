<?php

if(isset($_FILES['img_or_pdf'])){
    $file = $_FILES['img_or_pdf'];

    if($file['error'] == UPLOAD_ERR_OK){
        $dossier = '';
        $file_name = '.\['. microtime(). ']' .$file['name'];
        $img_or_pdf = true;

        if ($file['type'] == 'application/pdf')  $dossier = '.\pdf';
        elseif ($file['type'] == 'image/jpeg' || $file['type'] == 'image/jpg' || $file['type'] == 'image/png' || $file['type'] == 'image/gif' )
            $dossier = '.\images';
        else $img_or_pdf = false;

        if ($img_or_pdf) {
            if (!is_dir($dossier)) mkdir('.\\'.$dossier);

            if (move_uploaded_file($file['tmp_name'], $dossier.$file_name))
                header('Location:index.php');
            else echo 'echec de l\'upload.';

        } else echo 'le format n\'est pas une image ou un pdf';

    } elseif ($file['error'] == UPLOAD_ERR_INI_SIZE) echo 'la taille du fichier ne doit pas dépasser 2 Mo';
    elseif ($file['error'] == UPLOAD_ERR_NO_FILE) echo ' Aucun fichier n\'a été téléchargé';
}