<?php
    class Drawer {
        const COLORS = ["orange", "red", "blue", "green"];
        private int $figureType;
        private string $color;
        private int $width;
        private int $height;
        public function __construct(int $value) {
            $this->figureType = $value & bindec("11");
            $this->width = ((($value >> 4) & bindec("111111")) + 1)  * 10;
            $this->height = ((($value >> 10) & bindec("111111")) + 1) * 10;
            $colorType = ($value >> 2) & bindec("11");
            $this->color = self::COLORS[$colorType];
            $this->paint();
        }

        private function paint() {
            echo $this->figureType . "<br>"
                . $this->color . "<br>"
                . "width: " . $this->width . "<br>"
                . "height: " . $this->height . "<br>";
            switch ($this->figureType) {
                case 0: {
                    $r = $this->width * 0.5;
                    echo "<svg width='$this->width' height='$this->width'>
                            <circle cx='50%' cy='50%' r='$r' fill='$this->color' />
                          </svg>";
                    break;
                }
                case 1: {
                    $dot1 = intval($this->width / 2) . "," . 0;
                    $dot2 = 0 . "," . $this->height;
                    $dot3 = $this->width . "," . $this->height;
                    $top = -2 * $this->height;
                    echo "<svg height='$this->height' width='$this->width'>";
                    echo "<polygon points='$dot1 $dot2 $dot3' fill='$this->color' transform='scale(1, 0.5)' />";
                    echo "<polygon points='$dot1 $dot2 $dot3' fill='$this->color' style='transform-origin: top' transform='scale(1, 0.5) rotate(180) translate(0, $top)'  />";
                    echo "</svg>";
                    break;
                }
                case 2: {
                    echo "<svg width='$this->width' height='$this->height'>";
                    echo "<rect width='$this->width' height='$this->height' x='0' y='0' fill='$this->color' />";
                    echo "</svg>";
                    break;
                }
                case 3: {
                    $dot1 = intval($this->width / 2) . "," . 0;
                    $dot2 = 0 . "," . $this->height;
                    $dot3 = $this->width . "," . $this->height;
                    echo "<svg height='$this->height' width='$this->width'>";
                    echo "<polygon points='$dot1 $dot2 $dot3' fill='$this->color' />";
                    echo "</svg>";
                    break;
                }
            }
        }

    }
?>