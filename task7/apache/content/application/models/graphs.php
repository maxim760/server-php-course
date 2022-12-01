<?php
/** @noinspection PhpUnhandledExceptionInspection @noinspection PhpComposerExtensionStubsInspection @noinspection SpellCheckingInspection */
require_once 'application/_helper.php';
require '../vendor/autoload.php';
use Amenadiel\JpGraph\Graph\Graph;
use Amenadiel\JpGraph\Plot\LinePlot;
use Amenadiel\JpGraph\Plot\BarPlot;
use Amenadiel\JpGraph\Plot\ScatterPlot;
class GraphsModel extends Model {
    public string $type = "";
    public string $data = "";
    public function __construct()
    {
        if (array_key_exists('type', $_GET)) $this->type = $_GET['type'];
        if (array_key_exists('data', $_GET)) $this->data = $_GET['data'];
    }

    public function start() {
        try {
            $this->set_watermark($this->plotting_graph());
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private function plot(int $type, $data)
    {
        $plot_type = match ($type) {
            0 => new ScatterPlot($data),
            1 => new BarPlot($data),
            2 => new LinePlot($data),
            default => throw new Exception()
        };
        if ($type == 0) {
            $plot_type->mark->SetType(MARK_DTRIANGLE);
            $plot_type->mark->SetWidth(18);
            $plot_type->SetImpuls();

        }
        return $plot_type;
    }

    private function set_watermark(GdImage $image): void
    {
        $stamp = imagecreate(140, 85);
        imagecolorallocatealpha($stamp, 255, 255, 255, 127);
        imagestring($stamp, 4, 0, 0, 'Maxim Tomanov',
            imagecolorallocatealpha($stamp, 0, 0, 0, 100));
        $stampWidth = imagesx($stamp);
        $stampHeight = imagesy($stamp);
        imagecopy(
            $image, $stamp,
            imagesx($image) - $stampWidth,
            imagesy($image) - $stampHeight+60,
            0, 0,
            $stampWidth, $stampHeight
        );
        header('Content-type: image/png');
        imagepng($image);
        imagedestroy($image);
    }

    /**
     * @throws Exception
     */
    private function plotting_graph(): GdImage
    {
        $graph = new Graph(540, 360, );
        $graph->SetScale('textint', 100, 1000);
        $graph->SetBackgroundGradient('lightsteelblue', 'lightblue');
        $numbers = array_map("intval", explode(",", substr($this->data, 1, -1)));
        $graph->Add($this->plot(intval($this->type), $numbers));
        $graph->img->SetImgFormat('png');
        return $graph->Stroke(_IMG_HANDLER);
    }

}