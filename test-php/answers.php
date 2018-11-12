<?php

function checkObject(Fruit $obj)
{
    return $obj->getType();
}

$cabbage = new Cabbage();
$potato = new Potato();
$apple = new Apple();
checkObject($cabbage);
checkObject($potato);
checkObject($apple);
Orange::make();

/*
 * Róznica między public, protected, private
 * public = atrybut jest widoczny na zewnątrz klasy i może byc dziedziczony
 * protected = atrybut nie jest widoczny na zewnątrz klasy i może byc dziedziczony
 * private = atrybut nie jest widoczny na zewnątrz klasy i nie  może byc dziedziczony
 *
 * Dlaczego brak metody getType w klasie Fruit powoduje błąd
 * Bo jej implementację wymusza PlantInterface, który pośrednio dziedziczy klasa Fruit
 *
 * Czym jest klasa abstrakcyjna
 * To klasa której nie można instancjonować za pomocą new. Może być tylko instancjonowana przez klasę dziedziczącą
 * Klasa która po niej dziedziczy zyskuje natomiast dostęp do  metod z klasy abstrakcyjnej (w odróżnieniu od interfejsu,
 * który tylko wymusza implementacje zawartych w nim metod ale nie daje nic bazowego jeśli chodzi o body tych metod.
 * Daje tylko  nazwy metod wraz z parametrami)
 *
 * Co trzeba zmienić w funkcji checkObject by działała poprawnie i dlaczego
 * checkObject powinna zamiast konkretnej klasy, jako typehint przyjmować PlantInterface (ogólnie interface)
 */
/*
Jak można zastosować wyjątki (konstrukcja try cache) by zapobiec błędne wywołania funkcji checkObject (PHP 7 TypeError)
*/
try {
    checkObject($cabbage);
} catch (TypeError $error) {
    //wrong type given as parameter, deal with it
    echo $error->getMessage();
}

//Utwórz tablicę danych zawierającą listę użytkowników



$cabbage = new Cabbage();
$potato = new Potato();
$apple = new Apple();
$orange = new Orange();

$users = ['Ania', 'Tomek', 'Basia', 'Jasio'];
$plants = [$cabbage, $potato, $apple, $orange];

$users = array_flip($users);
foreach ($users as $username => &$value) {
    $value = $plants[$value];
}
//Posortuj alfabetycznie
asort($users);
//Następnie usuń użytkowników, którzy mają przypisany owoc jabłko klasa „Apple”
foreach ($users as $username => $fruit) {
    if ($fruit instanceof Apple) {
        unset($users[$username]);
    }
}
//    5. Wyświetl listę pozostałych użytkowników w tablicy wraz z owocami jakie posiadają
// 

foreach ($users as $user => $fruit) {
    echo ("{$user} has {$fruit}");
}

//Zagadnienia z SQL:
//Jaka jest różnica między join, inner join, left join, right join
/*
 * Inner join i join to de facto te same zapytania = zwróci tylko rekordy pokrywające się w obu tabelach
 * left join zwróci wszystkie rekordy z lewej tabeli i tylko pasujące z prawej, null jeśli brak pasującego
 * right join zwróci wszystkie rekordy z prawej tabeli i tylko pasujące z lewej, null jeśli brak pasującego
 * */

/*
 * Jakie funkcje agregujące?
 * Głównie używałem group by
 */
