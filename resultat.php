<?php
include "connect.php";
$bonnes_reponses = 0;
$i = 0;


foreach ($_POST as $cle => $val) {
    $sql = "select * from reponses where idr = $val";
    $resultat = mysqli_query($id, $sql);
    $ligne = mysqli_fetch_assoc($resultat);
    if ($ligne["verite"] == 1) {
        $bonnes_reponses++;
    }else{
        $sql2 = "select * from questions where idq = $cle";
        $resultat2 = mysqli_query($id, $sql2);
        $ligne2 = mysqli_fetch_assoc($resultat2);
        echo "erreur a la question: ".$ligne2["libelleQ"]."<br>";
        $sql2 = "select * from reponses where idq =$cle and verite =1";
        $resultat2 = mysqli_query($id, $sql2);
        $ligne2 = mysqli_fetch_assoc($resultat2);
        echo "La bonne reponse etait : ".$ligne2["libeller"]."<br>";

    }
    // echo "À la question $cle tu as répondu $val<br>"; 
    $i=$i+2;
}
$score = $bonnes_reponses *2;
echo "<br>Nombre total de bonnes réponses : $bonnes_reponses<br>";

echo "Ta note final est de  $score / $i<br>";
?>
