## Тестовое задание PHP.
Необходимо разбить список на заданное число равномерных колонок. 
Число элементов в колонках не должно отличаться более чем на один элемент. 
Порядок следования элементов должен остаться прежним в каждом столбце. 

## Например разбиение на 4-е колонки для списка 
[Banh khot, Banh xeo, Bun bo Hue, Cao lau, Cha ca, Ga tan, Goi cuon, Nem ran, Pho, Rau muong] должно выглядеть следующим образом:

Banh khot
Cao lau
Goi cuon
Pho
Banh xeo
Cha ca
Nem ran
Rau muong
Bun bo Hue
Ga tan

## Результатом выполнения задания должна быть функция следующего вида:
   function splitList($list, $n)
,где 
$list - исходный список представленный в виде массива;
$n  - число столбцов;

Результатом выполнения функции должен быть массив длиной $n, элементами которого являются колонки. Каждая колонка - массив элементов.

## Для проверки работы функции можете воспользоваться 
тестовыми данными приведенными в таблице - PHPTestData.

## class ArraySplitTest extends TestCase
{

   /**
    * @dataProvider dataProvider
    */
   public function testArraySplit($list, $columns, $expected)
   {
       $result = arraySplit($list, $columns);

       self::assertSameSize($result, $expected);
       for ($i = 0; $i < count($expected); ++$i) {
           self::assertSameSize($result[$i], $expected[$i], 'Row: '.$i);
           for ($j = 0; $j < count($expected[$i]); ++$j) {
               self::assertEquals($result[$i][$j], $expected[$i][$j], 'Row: '. $i . '; Column: '. $j);
           }
       }
   }

   public static function dataProvider()
   {
       return [
           [
               range(1,10),
               3,
               [
                   [1,5,8],
                   [2,6,9],
                   [3,7,10],
                   [4],
               ]
           ],
           [
               range(1,10),
               4,
               [
                   [1,4,7,9],
                   [2,5,8,10],
                   [3,6],
               ]
           ],
           [
               range(1,4),
               5,
               [
                   [1,2,3,4],
               ]
           ],
       ];
   }
}
