<?php
    foreach($entradas as $entrada){
        echo "<a href='./view/login.php?id={$entrada->getId()}'>
        <div class='entrada'>
        <h2> {$entrada->getTitulo()} </h2>
        <p>Autor: {$entrada->getAutor()}</p>
        </div></a>";
    }
?>