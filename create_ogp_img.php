<?php
$fontSize = 25; // 文字サイズ
$fontFamily = './rounded-mplus-1c-bold.ttf'; // 字体
$txtX = $fontSize; // 文字の横位置(文字の左が基準)
$txtY = $fontSize * 4; // 文字の縦位置(文字のベースラインが基準)
$txt = $_GET['text']; // テキスト
$txt = mb_wordwrap($txt, $width = 16, $break = PHP_EOL);

$img = imagecreatefromjpeg('og_base.jpeg'); // テキストを載せる画像
// $img = imagecreatefromjpg('ogp_base.jpg'); // 元画像がjpgの場合はこうなります
$color = imagecolorallocate($img, 0, 0, 0); // テキストの色指定(RGB)

imagettftext($img, $fontSize, 0, $txtX, $txtY, $color, $fontFamily, $txt);
header('Content-Type: image/png');
imagepng($img);
imagedestroy($img);

function mb_wordwrap($str, $width = 35, $break = PHP_EOL)
{
    $c = mb_strlen($str);
    $arr = [];
    for ($i = 0; $i <= $c; $i += $width) {
        $arr[] = mb_substr($str, $i, $width);
    }
    return implode($break, $arr);
}
