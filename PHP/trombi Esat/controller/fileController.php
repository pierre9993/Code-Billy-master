<?php
class FileController
{

    public function upload($type,$user)
    {
        switch ($type) {
            case 'image':
                $dossier = "photos/";
                break;
            case 'cv':
                $dossier = "cv/";
                break;
        }
        //on récupère le nom du fichier
        $nomFichier = $_FILES[$type]['name']; //blabla.monfichier.pdf
        //on fait des séparation à chaque fois qu'il y a un "." dans le nom du fichier pour récupérer l'extention
        $extension = explode(".", $nomFichier); //
        //on récupère l'extention qui se trouve à la fin du tableau
        $extension = end($extension);
        //on check si l'extension est ok
            if($this->extension($extension, $type)){

        //On modifie le nom du fichier
        // $fileName= microtime(true) . '.' . $extention
        $nomModifier = $user.$type .'.'. $extension;

        //va indiquer la position ET le nom
        $fichier = $dossier . basename($nomModifier);
var_dump($_FILES[$type]["tmp_name"]);
        //on déplace le fichier uplader la ou le $fichier l'envoie
        if (move_uploaded_file($_FILES[$type]["tmp_name"], $fichier)) {

            return $fichier;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        }
        else{
            echo 'Type de fichier refusé';
        }
    }

    public function extension($extension, $type)
    {
        switch ($type) {
            case 'image':
                $aExtention = array('jpg', 'png', 'jpng', 'gif');
                break;
            case 'cv':
                $aExtention = array('pdf', 'gif');
                break;
        }
        if (in_array($extension, $aExtention)) {
            return true;
        } else {
            return false;
        }
    }
}
