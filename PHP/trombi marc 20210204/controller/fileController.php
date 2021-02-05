<?php
class FileController
{

    public function upload($type)
    {
        switch ($type) {
            case 'image':
                $dossier = "photos/";
                break;
            case 'cv':
                $dossier = "cv/";
                break;
        }
        $fichier = $dossier . basename($_FILES[$type]["name"]);

        if (move_uploaded_file($_FILES[$type]["tmp_name"], $fichier)) {

            return $fichier;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
