<?php
declare(strict_types=1);

// هادو هوما البيانات اللي غادي نستعملو فجميع الخطوات
$notes = [12, 15, 8, 17, 9, 14, 11];
$prenoms = ['Sara', 'Youssef', 'Imane', 'Omar', 'Khadija'];
// 1. Ajouter 16 à la fin (2 façons)
$notes[] = 16;          // Façon 1 (الأسهل)
array_push($notes, 16); // Façon 2 (on ajoute un 2ème 16 juste pour l'exemple)
echo "Après ajout de 16 à la fin : " . implode(", ", $notes) . "<br>";
// 2. Ajouter 10 au début
array_unshift($notes, 10);
echo "Après ajout de 10 au début : " . implode(", ", $notes) . "<br>";

// 3. Retirer le dernier et le premier, et afficher les valeurs
$dernierRetire = array_pop($notes);
$premierRetire = array_shift($notes);
echo "Élément retiré de la fin : $dernierRetire<br>";
echo "Élément retiré du début : $premierRetire<br>";
echo "Tableau actuel : " . implode(", ", $notes) . "<br>";

// 4. Insérer 13 à l'indice 2 sans écraser
// array_splice(tableau, indice, combien_on_supprime, ce_qu_on_ajoute)
array_splice($notes, 2, 0, [13]);
echo "Après insertion de 13 à l'indice 2 : " . implode(", ", $notes) . "<br>";

// 5. Supprimer l'élément d'indice 1 avec unset()
unset($notes[1]);
echo "Après unset(\$notes[1]) (Attention au trou !) :<br>";
print_r($notes);
echo "<br>";

// 6. Corriger le trou avec array_values()
$notes = array_values($notes);
echo "Après array_values() (réindexé) :<br>";
print_r($notes);
echo "<br>";