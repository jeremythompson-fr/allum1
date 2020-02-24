<?php

//fonction affiche allumettes

$match = 11;
$input = "";

function generate($match, $input, $player)
{
    for($gen = 1; $gen <= $match; $gen++) {
        echo "|";
    }
    echo "\n";

    if($player == 1){
        player1($match);
    }elseif($player == "AI"){
        AI($match, $input);
    }    
}

function player1($match)
{
    echo "Your turn :\nMatches : ";
    // sleep(1);
    $input = readline();
    verify($input, $match);
}

function verify($input, $match){

    if($input >= 1 && $input <= 3 && $input <= $match){

        $match -= $input;
        echo "Player removed " . $input . " match(es)\n";
        sleep(1);
        if($match > 1) {
            generate($match, $input, "AI");
        }
        elseif($match == 1){
            echo "AI's turn...\n";
            sleep(1);
            echo "AI removed 1 match(es)\nI lost ... snif ... but I ' ll get you next time !!\n";
            return;
        }
        elseif($match == 0 || $match < 0){
            echo "You lost, too bad...\n";
            return;
        }    
    }elseif($input < 0) {
        echo "Error : invalid input (positive number expected)\n";
        player1($match);
    }elseif($input == 0){
        echo "Error : you have to remove at least one match\n";
        player1($match);
    }elseif($input > 3){
        echo "Error : not enough matches Matches :\n";
        player1($match);
    }elseif($input > $match){
        echo "Error : not enough matches Matches :\n";
        player1($match);
    }
}

function AI($match, $input)
{
    echo "AI's turn...\n";
    sleep(1);
 
    if($match == 10){
        $AI_input = 1;
    }elseif($match == 9){
        $AI_input = 1;
    }elseif($match <= 8 && $match > 5){
        $AI_input = $match - 5;
    }elseif($match == 5){
        $AI_input = 1;
    }elseif($match < 5){
        $AI_input = $match - 1;
    }

    $match -= $AI_input;

    echo "AI removed ". $AI_input . " match(es)\n";
    sleep(1);
    generate($match, $AI_input, 1);
}

generate($match, $input, 1);