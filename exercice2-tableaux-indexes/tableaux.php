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
