<?php
class Deur {
    private bool $opSlot;
    private bool $deuropening; // false = closed, true = open
    public string $deurNaam;

    public function __construct(string $deurNaam) {
        $this->opSlot = true; // The door is closed and needs to be opened with a key
        $this->deuropening = false; // De deur is dicht en moet met de klink worden opengemaakt The door is closed and needs to be opened with the door handle
        $this->deurNaam = $deurNaam;
        
        // Prints the text when the door is closed
        echo "De '{$this->deurNaam}' is op slot en dicht.<br>\n";
    }
    // The functions of the 2 ways you can use the key and prints the result of it
    public function sleutelGebruiken(string $richting): void {
        switch (strtolower($richting)) {
            case "links":
                $this->opSlot = false;
                echo "Je draait de sleutel naar links. De '{$this->deurNaam}' is nu ontgrendeld.<br>\n";
                break;
            case "rechts":
                $this->opSlot = true;
                echo "Je draait de sleutel naar rechts. De '{$this->deurNaam}' is op slot.<br>\n";
                break;
            default:
                echo "[Foutmelding] Onbekende '{$richting}' voor de sleutel. Draai de sleutel naar links of rechts.<br>\n";
                break;
        }
    }
    // The function of the door if there's an error or if the door was already open.
    public function deurOpenen(): void {
        if ($this->opSlot) {
            echo "[Foutmelding] Actie mislukt! Je kunt de '{$this->deurNaam}' niet openmaken omdat hij nog op slot zit.<br>\n";
        } else {
            if ($this->deuropening) {
                echo "[Melding] De '{$this->deurNaam}' was al open.<br>\n";
            } else {
                
            }
        }
    }

    public function doorDeurLopen(): void {
        // Function for walking through the door if the door is unlocked
        if (!$this->opSlot && $this->deuropening) {
            echo "[Succes] Je bent door de '{$this->deurNaam}' gelopen!<br>\n";
        } else {
            echo "[Foutmelding] Kan niet door de '{$this->deurNaam}' lopen! ";
            
            // Function for not being able to walk through the door if the door is still locked or if it hasn't been opened yet
            if ($this->opSlot && !$this->deuropening) {
                echo "De deur zit zowel op slot als dicht.<br>\n";
            } elseif ($this->opSlot) {
                echo "De deur zit nog op slot.<br>\n";
            } else {
                echo "De deur is nog dicht (je moet eerst de klink gebruiken).<br>\n";
            }
        }
    }
}

?>