<?php
declare(strict_types=1);

require_once __DIR__ . '/fonctions.php';

echo "=== Étape 1 : Les quatre opérations ===<br>";
echo "12 + 8 = " . additionner(12, 8) . "<br>";
echo "12 - 8 = " . soustraire(12, 8) . "<br>";
echo "12 * 8 = " . multiplier(12, 8) . "<br>";

try {
    echo "12 / 8 = " . diviser(12, 8) . "<br>";
    echo "Division par zéro : " . diviser(10, 0) . "<br>";
} catch (InvalidArgumentException $e) {
    echo " Erreur : " . $e->getMessage() . "<br>";
}

echo "<br>=== Étape 2 : Fonctions logiques ===<br>";
echo "7 est pair ? " . (estPair(7) ? "Oui" : "Non") . "<br>";
echo "Maximum entre 10, 5 et 8 : " . maximum(10, 5, 8) . "<br>";
echo "17 est premier ? " . (estPremier(17) ? "Oui" : "Non") . "<br>";

echo "<br>=== Étape 3 : Calculs commerciaux ===<br>";
$facture = calculerFacture(100, 10, 10, 20); // 10 articles à 100 MAD, remise 10%, TVA 20%
echo "Facture : " . number_format($facture, 2, ",", " ") . " MAD<br>";

echo "<br>=== Étape 4 : Statistiques et géométrie ===<br>";
echo "Moyenne (15, 12, 18) : " . moyenne(15, 12, 18) . "<br>";
echo "Aire du cercle (rayon 5) : " . aireCercle(5) . "<br>";
echo "30°C en Fahrenheit : " . celsiusVersFahrenheit(30) . "<br>";

echo "<br>=== Étape 5 : Fonctions à boucle ===<br>";
echo "5! = " . factorielle(5) . "<br>";
echo "Fibonacci(8) : " . implode(", ", fibonacci(8)) . "<br>";
echo "PGCD(48, 18) = " . pgcd(48, 18) . "<br>";