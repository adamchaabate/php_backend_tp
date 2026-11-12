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


echo "<hr>";
echo "<h2>=== Étape 5 : Tri et extraction ===</h2>";

// 1. Trier par ordre croissant et décroissant sur une copie
$copie = $notes;
sort($copie);
echo "Croissant : " . implode(", ", $copie) . "<br>";

$copie = $notes;
rsort($copie);
echo "Décroissant : " . implode(", ", $copie) . "<br>";

// 2. Les 3 meilleures notes
$copie = $notes;
rsort($copie); // كنرتبو تنازلياً
$meilleures = array_slice($copie, 0, 3); // كناخدو أول 3
echo "Les 3 meilleures notes : " . implode(", ", $meilleures) . "<br>";

// 3. Prénoms triés et inversés
$prenomsTries = $prenoms;
sort($prenomsTries); // ترتيب أبجدي
echo "Prénoms triés : " . implode(", ", $prenomsTries) . "<br>";
echo "Prénoms inversés : " . implode(", ", array_reverse($prenomsTries)) . "<br>";



echo "<hr>";
echo "<h2>=== Étape 6 : Transformer avec array_map, filter, reduce ===</h2>";

// 1. Bonus : +1 sans dépasser 20
$notesBonus = array_map(fn($n) => min(20, $n + 1), $notes);
echo "Notes avec bonus : " . implode(", ", $notesBonus) . "<br>";

// 2. Admis (>= 10) reindexé
$admis = array_values(array_filter($notes, fn($n) => $n >= 10));
echo "Notes admis : " . implode(", ", $admis) . "<br>";

// 3. Total avec array_reduce
$totalReduce = array_reduce($notes, fn($cumul, $n) => $cumul + $n, 0);
echo "Total (array_reduce) : $totalReduce<br>";

// 4. Prénoms en majuscules
$prenomsMaj = array_map('strtoupper', $prenoms);
echo "Prénoms en majuscules : " . implode(", ", $prenomsMaj) . "<br>";

// 5. Mentions
function getMention(float $note): string {
    if ($note < 10) return "Ajourné";
    if ($note < 14) return "Passable";
    if ($note < 16) return "Assez bien";
    return "Bien";
}
$mentions = array_map(fn($n) => "$n → " . getMention($n), $notes);
echo "Mentions :<br>";
foreach ($mentions as $m) {
    echo "- $m<br>";
}




echo "<hr>";
echo "<h2>=== Étape 7 : Chaînes, fusion et ensembles ===</h2>";

// 1. Prénoms séparés par des virgules
echo "Prénoms : " . implode(", ", $prenoms) . "<br>";

// 2. Explode, unique
$chaine = "php, js, sql, php, html, js";
$tableauChaine = explode(", ", $chaine);
$tableauUnique = array_unique($tableauChaine);
echo "Dédoublonné : " . implode(", ", $tableauUnique) . "<br>";

// 3. Fusion et dédoublonnage
$arr1 = ["php", "sql"];
$arr2 = ["js", "sql"];
$fusion = array_unique(array_merge($arr1, $arr2));
echo "Fusion : " . implode(", ", $fusion) . "<br>";

// 4. Intersect et Diff
$a = ["php", "js", "sql"];
$b = ["js", "html", "sql"];
echo "Communs (intersect) : " . implode(", ", array_intersect($a, $b)) . "<br>";
echo "Uniques à A (diff) : " . implode(", ", array_diff($a, $b)) . "<br>";

// 5. array_chunk
$paquets = array_chunk(range(1, 10), 3);
echo "Paquets de 3 : <br>";
foreach ($paquets as $p) {
    echo "[" . implode(", ", $p) . "] ";
}
echo "<br>";


echo "<hr>";
echo "<h2>=== Étape 8 : Mini-problème : le carnet de notes ===</h2>";

function moyenneCarnet(array $notes): float {
    if (empty($notes)) return 0.0;
    return array_sum($notes) / count($notes);
}

function medianeCarnet(array $notes): float {
    if (empty($notes)) return 0.0;
    sort($notes);
    $milieu = intdiv(count($notes), 2);
    if (count($notes) % 2 === 0) {
        return ($notes[$milieu - 1] + $notes[$milieu]) / 2;
    }
    return $notes[$milieu];
}

function admisCarnet(array $notes, float $seuil = 10): array {
    return array_values(array_filter($notes, fn($n) => $n >= $seuil));
}

function meilleuresCarnet(array $notes, int $n = 3): array {
    rsort($notes);
    return array_slice($notes, 0, $n);
}

function histogramme(array $notes): void {
    foreach ($notes as $note) {
        echo str_pad((string)$note, 4, " ", STR_PAD_LEFT) . " | " . str_repeat("*", $note) . "<br>";
    }
}

// Test avec les notes
echo "Moyenne : " . moyenneCarnet($notes) . "<br>";
echo "Médiane : " . medianeCarnet($notes) . "<br>";
echo "Admis : " . implode(", ", admisCarnet($notes)) . "<br>";
echo "3 meilleures : " . implode(", ", meilleuresCarnet($notes)) . "<br>";
echo "Histogramme :<br>";
histogramme($notes);

// Test avec un tableau vide (pour vérifier qu'il n'y a pas d'erreur)
echo "<br><b>Test avec un tableau vide :</b><br>";
$vide = [];
echo "Moyenne : " . moyenneCarnet($vide) . "<br>";
echo "Médiane : " . medianeCarnet($vide) . "<br>";
echo "Admis : " . implode(", ", admisCarnet($vide)) . "<br>";