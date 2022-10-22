<?php

declare(strict_types=1);

class Tournament
{
    public $separatedInput;
    // public array $furtherDividedString;
    public $teamResults;

    public function __construct(string $input)
    {
        $this->separatedInput = explode("\n", $input);
        
        foreach($this->separatedInput as $sp) {
            $furtherDividedString = explode(";", $sp);

            $this->teamResults[$furtherDividedString[0]]['MP'] ++;
            $this->teamResults[$furtherDividedString[1]]['MP'] ++;
            
            if($furtherDividedString[2] == "win") {
                $this->teamResults[$furtherDividedString[0]]['W'] ++;
                $this->teamResults[$furtherDividedString[1]]['L'] ++;
            }

            else if($furtherDividedString[2] == "loss") {
                $this->teamResults[$furtherDividedString[1]]['W'] ++;
                $this->teamResults[$furtherDividedString[0]]['L'] ++;
            }

            else if($furtherDividedString[2] == "draw") {
                $this->teamResults[$furtherDividedString[1]]['D'] ++;
                $this->teamResults[$furtherDividedString[0]]['D'] ++;
            }
        }

        foreach($this->teamResults as $team) {
            $team['P'] = ($team['W'] * 3) + $team['D'];
            print_r($team);
        }
    }

}

$tournament = new Tournament("Allegoric Alaskans;Blithering Badgers;win
Devastating Donkeys;Courageous Californians;draw
Devastating Donkeys;Allegoric Alaskans;win
Courageous Californians;Blithering Badgers;loss
Blithering Badgers;Devastating Donkeys;loss
Allegoric Alaskans;Courageous Californians;win");

// print_r($tournament->separatedInput);
// print_r($tournament->further);

// print_r($tournament->teamResults);