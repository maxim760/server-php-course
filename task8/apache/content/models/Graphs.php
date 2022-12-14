<?php
/** @noinspection PhpUnhandledExceptionInspection @noinspection PhpComposerExtensionStubsInspection @noinspection SpellCheckingInspection */
namespace app\models;

require_once "../_helper.php";
use Amenadiel\JpGraph\Graph\Graph;
use Amenadiel\JpGraph\Plot\LinePlot;
use Amenadiel\JpGraph\Plot\BarPlot;
use Amenadiel\JpGraph\Plot\ScatterPlot;
use GdImage;
use Yii;

class Graphs {
    public static function start() {
        try {
            self::set_watermark(self::plotting_graph());
        } catch (Exception $e) {
            echo $e->getMessage();
            echo $e->getMessage();

        }
    }

    private static function plot(int $type, $data)
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

    private static function set_watermark(GdImage $image): void
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
    private static function plotting_graph(): GdImage
    {
        $type = Yii::$app->request->queryParams['type'] ?: "";
        $data = Yii::$app->request->queryParams['data'] ?: "";

        $graph = new Graph(540, 360);
        $graph->SetScale('textint', 100, 1000);
        $graph->SetBackgroundGradient('lightsteelblue', 'lightblue');
        $numbers = array_map("intval", explode(",", substr($data, 1, -1)));
        $graph->Add(self::plot(intval($type), $numbers));
        $graph->img->SetImgFormat('png');
        return $graph->Stroke(_IMG_HANDLER);
    }

}