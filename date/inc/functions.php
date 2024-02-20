<?php

function validateName($name) {
    return preg_match('/^[a-zA-Z ]{2,}$/', $name);
}

function validateTeam($team) {
    return preg_match('/^[a-zA-Z0-9 ]+$/', $team);
}

function validateAge($age) {
    return is_numeric($age) && $age >= 18 && $age <= 40;
}

function saveParticipant($vardas, $pavarde, $komanda, $amzius) {
    $duomenys = "$vardas, $pavarde, $komanda, $amzius\n";

    $esamiDalyviai = file('date/turnyro_dalyviai.txt', FILE_IGNORE_NEW_LINES);
    foreach ($esamiDalyviai as $dalyvis) {
        list($esamasVardas, $esamaPavarde, $esamaKomanda, $esamasAmzius) = explode(', ', $dalyvis);
        if ($vardas == $esamasVardas && $pavarde == $esamaPavarde && $komanda == $esamaKomanda && $amzius == $esamasAmzius) {
            return;
        }
    }

    file_put_contents('date/turnyro_dalyviai.txt', $duomenys, FILE_APPEND);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vardas = $_POST['vardas'];
    $pavarde = $_POST['pavarde'];
    $komanda = $_POST['komanda'];
    $amzius = $_POST['amzius'];

    if (validateName($vardas) && validateName($pavarde) && validateTeam($komanda) && validateAge($amzius)) {
        saveParticipant($vardas, $pavarde, $komanda, $amzius);
    }
}

$dalyviai = file('date/turnyro_dalyviai.txt', FILE_IGNORE_NEW_LINES);