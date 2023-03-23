<?php

/**
 * Zadanie 1
 */
class Pipeline
{
    public static function make(...$funcs)
    {
        return function($arg) use ($funcs)
        {
            foreach ($funcs as $func)
            {
                $arg = $func($arg);
            }
            return $arg;
        };
    }
}

$fun = Pipeline::make(function($x) { return $x * 3; }, function($x) { return $x + 1; });
echo $fun(5);

/**
 * Zadanie 2
 */
class TextInput
{
    public string $value;

    public function __construct($value) {
        $this->value = $value;
    }

    public function add(string | int $text):void{

        $this->value .= $text;
    }

    public function getValue():string{
        return $this->value;
    }
}

$text = new TextInput("ONX ");
$text->add("Center");
echo $text->getValue();

class NumericInput extends TextInput {
    public function add(string | int $text):void {
        if (is_numeric($text)) {
            $this->value .= $text;
        }
    }
}

$input = new NumericInput('');
$input->add('213213');
$input->add("abcds424a");
$input->add("456");
echo $input->getValue();

/**
 * Zadanie 3
 */
class RankingTable {
    private $players = array();

    /**
     * @param $players
     */
    public function __construct($players) {
        //utworzenie tablicy z imionami graczy przypisanie do nich wyników i ilości zagranych gier
        $this->players = array_combine($players, array_fill(0, count($players), array('score' => 0, 'gamesPlayed' => 0)));
    }


    /**
     * Metoda dodająca punkty
     * @param string $playerName
     * @param int $score
     * @return void
     */
    public function recordResult(string $playerName, int $score):void {
        $this->players[$playerName]['score'] += $score;
        $this->players[$playerName]['gamesPlayed']++;
    }

    /**
     * Sortowanie na podstawie ilosci punktow i ilosci meczy
     * @param int $rank
     * @return string
     */
    public function playerRank(int $rank):string {
        uasort($this->players, function($a, $b) {
            //warunek na sprawdzenie punktow
            if ($a['score'] != $b['score']) {
                return $b['score'] - $a['score'];
                //warunek na sprawdzenie iosci gier jesli punkty sa takie same
            } else if ($a['gamesPlayed'] != $b['gamesPlayed']) {
                return $a['gamesPlayed'] - $b['gamesPlayed'];
                //Jezeli wszystko powyzej false wtedy sortowanie po nazwie
            } else {
                return strcmp(key($b), key($a));
            }
        });

        $keys = array_keys($this->players);
        return $keys[$rank-1];
    }
}

$table = new RankingTable(array('Jan', 'Maks', 'Monika'));
$table->recordResult('Jan', 5);
$table->recordResult('Maks', 3);
$table->recordResult('Maks', 2);
$table->recordResult('Monika', 5);

echo $table->playerRank(1); // "Jan"


/**
 * Zadanie 4
 */
class Tezaurus{

    private $tezaurus;

    /**
     * @param array $tezaurus
     */
    public function __construct(array $tezaurus) {
        $this->tezaurus = $tezaurus;
    }

    /**
     * Ustawienie słowa i wykonanie json_encode
     * @param string $word
     * @return string
     */
    public function getSynonyms(string $word): string {
        if (isset($this->tezaurus[$word])) {
            return json_encode(array(
                'word' => $word,
                'synonyms' => $this->tezaurus[$word]
            ));
        } else {
            return json_encode(array(
                'word' => $word,
                'synonyms' => array()
            ));
        }
    }

}
$tezaurus = new Tezaurus(array(
    "market" => array("trade"),
    "small" => array("little", "compact")
));

echo $tezaurus->getSynonyms("small");
