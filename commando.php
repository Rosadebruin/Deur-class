<?php

require_once 'deurclass.php';

// Help function for HTML-tags that makes everything clean
function printTekst(string $tekst): void {
    $schoon = str_replace(['<br>', '<br/>', '<br />', "\n"], '', $tekst);
    $schoon = str_replace(['**', '<b>', '</b>'], '', $schoon);
    echo $schoon . PHP_EOL;
}

// Name of the door
$Deur = new Deur("deur");
echo PHP_EOL;

// Looks if the game is active or inactive
$spelBezig = true;

// Prints a text to ask the player what they want to do
printTekst("Wat wil je doen?");

// Prints all the choices the player can choose
while ($spelBezig) {
    echo PHP_EOL;
    printTekst("--- Kies een actie ---");
    printTekst("1. Sleutel naar links draaien (ontgrendelen)");
    printTekst("2. Sleutel naar rechts draaien (vergrendelen)");
    printTekst("3. Klink gebruiken (deur openen)");
    printTekst("4. Door de deur lopen");
    printTekst("5. Stoppen");
    echo PHP_EOL;

    // Asks the player for an input in the terminal
    $keuze = readline("Typ je keuze (1-5) en druk op Enter: ");
    echo PHP_EOL;

    // Registrates the choice of the player and makes it print the text
    switch (trim($keuze)) {
        case '1':
            $Deur->sleutelGebruiken("links");
            break;
        case '2':
            $Deur->sleutelGebruiken("rechts");
            break;
        case '3':
            $Deur->deurOpenen();
            break;
        case '4':
            $Deur->doorDeurLopen();
    
            // Shows a error message if the input is invalid
            break;
        default:
            printTekst("Ongeldige keuze, type een getal van 1 tot 5.");
            break;
    }
}