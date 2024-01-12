<?php







$goku = new Hero("Goku");
$vegeta = new Hero("Vegeta");
$piccolo = new Hero("Piccolo");
$gohan = new Hero("Gohan");
$krilin = new Hero("Krilin");

$freezer = new Vilain("Freezer");
$cell = new Vilain("Cell");
$boo = new Vilain("Boo");
$zamasu = new Vilain("Zamasu");
$babidi = new Vilain("Babidi");

$tabHeroes = array($goku, $vegeta, $piccolo, $gohan, $krilin);
$tabVilains = array($freezer, $cell, $boo, $zamasu, $babidi);

// ${$tabHeroes[$position]}
// ${$tabVilains[$position]}

$position = 0;
$victoireHeroes = 0;
$victoireVilains = 0;
$exitFight = 1;
do {
    echo "\nMenu :\n(1)Lancer les combats\n(2)Quitter le jeu\n";
    $inputMenuChoice = readline("Votre choix.\n");

    if ($inputMenuChoice == 1) {
        echo "Une serie de combats va commencer entre les Héros et les Méchants, la première équipe à 3 victoires remporte la partie.\n";
        echo "\e[1;35m^^^^OBJECTIF : ^^^^\e[0m\n";
        echo "\e[1;35mGagner trois combat .\e[0m\n";
        echo "\e[1;32m^^^^QUETE : ^^^^\e[0m\n";
        echo "\e[1;32mGagner trois combat à la suite .\e[0m\n";
        $numeroDeCombat = 1;

        do {


            echo "\e[1;34mDebut du combat N°\e[0m " . $numeroDeCombat . "\n";
            echo "** " . $tabHeroes[$position]->getName() . " **   Vs   ** " . $tabVilains[$position]->getName() . "\n";
            echo $tabHeroes[$position]->getHinfo() . "\n";

            echo $tabVilains[$position]->getVinfo() . "\n";
            $oldHeroLevel = $tabHeroes[$position]->getLevel();
            $oldHeroHeartPoint = $tabHeroes[$position]->getHeroHp();
            $oldHeroAttackPoint = $tabHeroes[$position]->getHeroAp();
            $oldVilainLevel = $tabVilains[$position]->getLevel();
            $oldVilainHeartPoint = $tabVilains[$position]->getVilainHp();
            $oldVilainAttackPoint = $tabVilains[$position]->getVilainAp();

            do {
                if ($tabVilains[$position]->checkKamehameha() == false) {
                    $actionVilain = rand(1, 2);
                    switch ($actionVilain) {
                        case 1:
                            echo "Votre adversaire choisit d'attaquer\n";
                            break;
                        case 2:
                            echo "Votre adversaire choisit d'esquiver\n";
                            break;
                    }
                } else {
                    $actionVilain = rand(1, 2, 3);
                    switch ($actionVilain) {
                        case 1:
                            echo "Votre adversaire choisit d'attaquer\n";
                            break;
                        case 2:
                            echo "Votre adversaire choisit d'esquiver\n";
                            break;
                        case 3:
                            echo "Votre adversaire choisit d'utiliser son Kamehameha\n";
                            break;
                    }
                }

                if ($tabHeroes[$position]->checkKamehameha() == false) {
                    echo "\nMenu de combat : \n(1)Attaquer \n(2)Esquiver \n";
                } else {
                    echo "\nMenu de combat : \n(1)Attaquer \n(2)Esquiver \n(3)Kamehameha \n";
                }


                $inputFightMenu = readline("Votre choix : ");
                if ($inputFightMenu == 1 && $actionVilain == 1) {
                    echo "Vous vous attaquez mutuellement\n";
                    $tabHeroes[$position]->setHeroHp($tabHeroes[$position]->getAttacked($tabHeroes[$position]->getHeroHp(), $tabVilains[$position]->getVilainAp()));
                    $heroHp = $tabHeroes[$position]->getHeroHp();
                    $tabVilains[$position]->setVilainHp($tabVilains[$position]->getAttacked($tabVilains[$position]->getVilainHp(), $tabHeroes[$position]->getHeroAp()));
                    $vilainHp = $tabVilains[$position]->getVilainHp();
                    echo $tabHeroes[$position]->getHinfo();
                    echo $tabVilains[$position]->getVinfo();
                } elseif ($inputFightMenu == 2 && $actionVilain == 2) {
                    echo "Vous esquivez tout en sachant que votre adversaire va esquiver (realy?)\n";
                    $heroHp = $tabHeroes[$position]->getHeroHp();
                    $vilainHp = $tabVilains[$position]->getVilainHp();
                    echo $tabHeroes[$position]->getHinfo();
                    echo $tabVilains[$position]->getVinfo();
                } elseif ($inputFightMenu == 1 && $actionVilain == 2) {
                    $esquive = rand(0, 2);
                    if ($esquive < 1) {
                        echo "Votre adversaire rate son esquive et votre attaque le touche \n";
                        //le vilain prend des degats
                        $tabVilains[$position]->setVilainHp($tabVilains[$position]->getAttacked($tabVilains[$position]->getVilainHp(), $tabHeroes[$position]->getHeroAp()));
                        $vilainHp = $tabVilains[$position]->getVilainHp();
                        $heroHp = $tabHeroes[$position]->getHeroHp();
                        echo $tabHeroes[$position]->getHinfo();
                        echo $tabVilains[$position]->getVinfo();
                    } else {
                        echo "Votre adversaire esquive votre attaque \n";
                        $heroHp = $tabHeroes[$position]->getHeroHp();
                        $vilainHp = $tabVilains[$position]->getVilainHp();
                        echo $tabHeroes[$position]->getHinfo();
                        echo $tabVilains[$position]->getVinfo();
                    }
                } elseif ($inputFightMenu == 2 && $actionVilain == 1) {
                    $esquive = rand(0, 2);
                    if ($esquive < 1) {
                        echo "Vous ratez votre action et vous prennez des degats \n";
                        //le heros prend des degats
                        $tabHeroes[$position]->setHeroHp($tabHeroes[$position]->getAttacked($tabHeroes[$position]->getHeroHp(), $tabVilains[$position]->getVilainAp()));
                        $heroHp = $tabHeroes[$position]->getHeroHp();
                        $vilainHp = $tabVilains[$position]->getVilainHp();
                        echo $tabHeroes[$position]->getHinfo();
                        echo $tabVilains[$position]->getVinfo();
                    } else {
                        echo "Vous esquivez son attaque \n";
                        $heroHp = $tabHeroes[$position]->getHeroHp();
                        $vilainHp = $tabVilains[$position]->getVilainHp();
                        echo $tabHeroes[$position]->getHinfo();
                        echo $tabVilains[$position]->getVinfo();
                    }
                } elseif ($inputFightMenu == 1 && $actionVilain == 3) {
                    echo "Vous vous prenez un violent kamehameha de votre adversaire et enchainez avec une attaque\n";
                    $tabHeroes[$position]->setHeroHp($tabHeroes[$position]->getAttacked($tabHeroes[$position]->getHeroHp(), $tabVilains[$position]->getApKamehameha()));
                    $heroHp = $tabHeroes[$position]->getHeroHp();
                    $tabVilains[$position]->setVilainHp($tabVilains[$position]->getAttacked($tabVilains[$position]->getVilainHp(), $tabHeroes[$position]->getHeroAp()));
                    $vilainHp = $tabVilains[$position]->getVilainHp();
                    echo $tabHeroes[$position]->getHinfo();
                    echo $tabVilains[$position]->getVinfo();
                } elseif ($inputFightMenu == 3 && $actionVilain == 1) {
                    echo "Votre adversaire se prend un violent kamehameha de votre part et enchaine avec une attaque\n";
                    $tabHeroes[$position]->setHeroHp($tabHeroes[$position]->getAttacked($tabHeroes[$position]->getHeroHp(), $tabVilains[$position]->getVilainAp()));
                    $heroHp = $tabHeroes[$position]->getHeroHp();
                    $tabVilains[$position]->setVilainHp($tabVilains[$position]->getAttacked($tabVilains[$position]->getVilainHp(), $tabHeroes[$position]->getApKamehameha()));
                    $vilainHp = $tabVilains[$position]->getVilainHp();
                    echo $tabHeroes[$position]->getHinfo();
                    echo $tabVilains[$position]->getVinfo();
                } elseif ($inputFightMenu == 2 && $actionVilain == 3) {
                    echo "Vous vous prenez un violent kamehameha de votre adversaire (esquive impossible)\n";
                    $tabHeroes[$position]->setHeroHp($tabHeroes[$position]->getAttacked($tabHeroes[$position]->getHeroHp(), $tabVilains[$position]->getApKamehameha()));
                    $heroHp = $tabHeroes[$position]->getHeroHp();
                    $tabVilains[$position]->setVilainHp($tabVilains[$position]->getAttacked($tabVilains[$position]->getVilainHp(), $tabHeroes[$position]->getHeroAp()));
                    $vilainHp = $tabVilains[$position]->getVilainHp();
                    echo $tabHeroes[$position]->getHinfo();
                    echo $tabVilains[$position]->getVinfo();
                } elseif ($inputFightMenu == 3 && $actionVilain == 2) {
                    echo "Votre adversaire se prend un violent kamehameha de votre part  (esquive impossible)\n";
                    $tabHeroes[$position]->setHeroHp($tabHeroes[$position]->getAttacked($tabHeroes[$position]->getHeroHp(), $tabVilains[$position]->getVilainAp()));
                    $heroHp = $tabHeroes[$position]->getHeroHp();
                    $tabVilains[$position]->setVilainHp($tabVilains[$position]->getAttacked($tabVilains[$position]->getVilainHp(), $tabHeroes[$position]->getApKamehameha()));
                    $vilainHp = $tabVilains[$position]->getVilainHp();
                    echo $tabHeroes[$position]->getHinfo();
                    echo $tabVilains[$position]->getVinfo();
                } elseif ($inputFightMenu == 3 && $actionVilain == 3) {
                    echo "Chacun se mange un Kamehameha de la part de l'autre\n";
                    $tabHeroes[$position]->setHeroHp($tabHeroes[$position]->getAttacked($tabHeroes[$position]->getHeroHp(), $tabVilains[$position]->getApKamehameha()));
                    $heroHp = $tabHeroes[$position]->getHeroHp();
                    $tabVilains[$position]->setVilainHp($tabVilains[$position]->getAttacked($tabVilains[$position]->getVilainHp(), $tabHeroes[$position]->getApKamehameha()));
                    $vilainHp = $tabVilains[$position]->getVilainHp();
                    echo $tabHeroes[$position]->getHinfo();
                    echo $tabVilains[$position]->getVinfo();
                }
            } while ($heroHp > 0 || $vilainHp > 0);
            if ($heroHp <= 0) {
                echo "\e[1;31mLe vilain ..... à gagné le combat\e[0m \n";
                $victoireVilains++;
                $tabVilains[$position]->activateKamehameha($numeroDeCombat);
                $tabVilains[$position]->levelUp($oldVilainLevel, $oldVilainHeartPoint, $oldVilainAttackPoint);
                echo $tabVilains[$position]->getVinfo();
            } elseif ($vilainHp <= 0) {
                echo "\e[1;33mLe hero ..... à gagné le combat\e[0m \n";
                $victoireHeroes++;
                $tabHeroes[$position]->activateKamehameha($numeroDeCombat);
                $tabHeroes[$position]->levelUp($oldHeroLevel, $oldHeroHeartPoint, $oldHeroAttackPoint);
            }
            echo "----------------Evolution des matchs-----------------\n";
            echo "----------HEROES:" . $victoireHeroes . "/3----------VILAINS:" . $victoireVilains . "/3------------\n";


            $numeroDeCombat++;
            $position++;
            if ($victoireHeroes == 3 || $victoireVilains == 3) {
                $exitFight = 0;
            }


            // $exitFight = 1;
        } while ($exitFight != 0);
        if ($victoireVilains == 3) {
            echo "\e[1;31mLes vilains ont gagné la partie\e[0m \n";
            $victoireVilains++;
        } elseif ($victoireHeroes == 3) {
            echo "\e[1;33mLes heros ont gagné la partie\e[0m \n";
            $victoireHeroes++;
        }


        $exit = 1;
    } elseif ($inputMenuChoice == 2) {
        $exit = 0;
    } else {
        echo "Saisie incorrecte";
        $exit = 1;
    }
} while ($exit != 0);