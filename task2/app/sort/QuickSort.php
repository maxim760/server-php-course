<?php
class QuickSort {
    const SEP = ",";
    private array $array;
    public function __construct(string $str) {
        $arr = explode(self::SEP, $str);
        $this->array = $arr;
        $this->sort(0, count($arr) - 1);
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
            $this->sort($low, $j);
        }

        if($i < $high){
            $this->sort($i, $high);
        }
    }
    public function getSortedStr(): string {
        if(isset($this->array)) {
            return join($this->array, self::SEP);
        }
        return "not valid string";
    }
}
?>