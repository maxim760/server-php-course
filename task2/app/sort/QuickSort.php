<?php
class QuickSort {
    const SEP = ",";
    private array $array;
    public function __construct(string $str) {
        $arr = explode(self::SEP, $str);
        if(!$this->checkValidity($arr)) {
            return;
        }
        $this->array = $arr;
        $this->sort(0, count($arr) - 1);
    }
    private function checkValidity(&$arr): bool {
        for ($i = 0; $i < count($arr); $i++) {
            if(!is_numeric($arr[$i])) {
                return false;
            }
        }
        return true;
    }
    private function sort($low, $high) {
        $i = $low;
        $j = $high;
        $middle = $this->array[ ( $low + $high ) / 2 ];
        do {
            while($this->array[$i] < $middle) ++$i;
            while($this->array[$j] > $middle) --$j;
            if($i <= $j){
                $temp = $this->array[$i];
                $this->array[$i] = $this->array[$j];
                $this->array[$j] = $temp;
                $i++;
                $j--;
            }
        } while($i < $j);
        if($low < $j){
            // рекурсивно вызываем сортировку для левой части
            $this->sort($low, $j);
        }

        if($i < $high){
            // рекурсивно вызываем сортировку для правой части
            $this->sort($i, $high);
        }
    }
    public function getSortedStr() {
        if(isset($this->array)) {
            return join($this->array, self::SEP);
        }
        return "not valid string";
    }
}
?>