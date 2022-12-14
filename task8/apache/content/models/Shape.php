<?php

namespace app\models;
class Shape {
    var int $item1, $item2, $item3, $item4, $item5;
    public function __toString(): string {
        return sprintf(
            '[%d,%d,%d,%d,%d]',
            $this->item1, $this->item2, $this->item3, $this->item4, $this->item5
        );
    }
}