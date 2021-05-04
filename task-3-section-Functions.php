<html>
<head> 
	<title>Задача 3 (розділ ФУНКЦІЇ)</title> 
	<meta charset="UTF-8"> </head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <b>Введіть список цілих чисел, розділених комами:</b> 
    <input type="text" name="userNumbers" size="100">
    <input type="submit" value="Надіслати">
</form>
<?php
// Через форму необхідно передати список цілих чисел та вивести наступні результати:
// 1) Суму цих чисел; 2) Середнє значення (float); 3) Кількість парних чисел; 4) Всі непарні числа.

class NumbersChecking 
{
  public function checkNumbers($numbers)
  {
    $pattern = '/^[0-9,]{1,100}+$/';
    $numbers = str_replace(" ", "", $numbers);

    if ( !preg_match($pattern, $numbers) ) {
    	echo "Не правильно введено список цілих чисел, розділених комами. Повторіть спробу !<br>";
    }
    else {
    	$ar = explode(',', $numbers);
    }

  return $ar;
  }
}

class Sum 
{
  public function getSum($x)
  {
    if ($x) {
    	echo '<br>Cума введених чисел: ' . array_sum($x) . '<br>';
    }
  }
}

class Middle
{
  public function getMid($a)
  {
	if ($a) {
		echo '<br>Cереднє значення усіх введених чисел: ' . (float)(array_sum($a)/count($a)) . '<br>';
	}
  }
}


class EvenNumbers
{
  public function calcEvenNumbers($b)
  {
	$evens = 0;
	
	for ($i=0; $i < count($b); $i++) {
		
		if( ($b[$i] % 2) == 0 ) {
			$evens++;
		}
	}
	
	if ($b) {
		echo '<br>Кількість парних чисел cеред усіх введених чисел: ' . $evens . '<br>';
	}
  }
}

class OddNumbers
{
  public function getOddNumbers($c)
  {
    if ($c) {
       echo '<br>Непарні числа cеред усіх введених чисел: <br>';

       for ($n=0; $n < count($c); $n++) {
			    
		 if( ($c[$n] % 2) !== 0 ) {
			echo $c[$n] . '<br>';
		 }

	   }
    }	
  }
}

error_reporting(0);

if ( !empty($_POST['userNumbers']) ) {

	$num = new NumbersChecking();

	$list = $num->checkNumbers($_POST['userNumbers']);

	$sum = new Sum();

	$middle = new Middle();

	$evens = new EvenNumbers();

	$odds = new OddNumbers();
	
	$sum->getSum($list);

	$middle->getMid($list);

	$evens->calcEvenNumbers($list);

	$odds->getOddNumbers($list);
}

?>
</body>
</html>