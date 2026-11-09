<?php
declare(strict_types=1);

// =============================================
// Étape 1 : Les quatre opérations
// =============================================

function additionner(float $a, float $b): float {
    return $a + $b;
}

function soustraire(float $a, float $b): float {
    return $a - $b;
}

function multiplier(float $a, float $b): float {
    return $a * $b;
}

function diviser(float $a, float $b): float {
    if ($b == 0) {
        throw new InvalidArgumentException("Division par zéro impossible");
    }
    return $a / $b;
}



// =============================================
// Étape 2 : Fonctions logiques
// =============================================

function estPair(int $n): bool {
    return $n % 2 === 0;
}

function estPositif(float $n): bool {
    return $n > 0;
}

function maximum(float $a, float $b, float $c): float {
    // Sans utiliser max()
    $max = $a;
    if ($b > $max) $max = $b;
    if ($c > $max) $max = $c;
    return $max;
}

function estPremier(int $n): bool {
    if ($n <= 1) return false;
    if ($n <= 3) return true;
    if ($n % 2 === 0 || $n % 3 === 0) return false;
    
    for ($i = 5; $i * $i <= $n; $i += 6) {
        if ($n % $i === 0 || $n % ($i + 2) === 0) {
            return false;
        }
    }
    return true;
}