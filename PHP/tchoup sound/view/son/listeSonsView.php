<div class="mt-5"> 
<?php
foreach ($listeSons as $son) {
    $info= Son::getInfo($son->id_son);
    echo '<div class="col-10 sonliste bg-dark rounded p-0 container d-flex align-items-center justify-content-between "> 
    <img src="'. $son->img_son .'" class="border m-2 img-liste img-fluid"/>
     <a class="text-decoration-none col- pt-4 pb-4 text-center align-self-center text-light" href="?page=son&id='.$son->id_son.'">' . $son->nom_son.' </a> 
    <audio class="p-0 mr-2 col-4 audio" src="'. $son->lien_son .'" controls> Your browser does not support the    <code>audio</code> element.</audio>
    
    </div>';
}
?>
</div>