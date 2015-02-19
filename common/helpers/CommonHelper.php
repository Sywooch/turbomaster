<?php
namespace yii\helpers;

use \Yii;

class CommonHelper extends BaseStringHelper
{


    public static function getImageSrc($filePath, $blankImage=null)
    {   
        $imageFile = Yii::getAlias('@public') .$filePath;
        $imageFile = str_replace('\\', '/', $imageFile);
        // $imageFile = str_replace('/', DIRECTORY_SEPARATOR, $imageFile);
        if(is_file($imageFile)) {
            $imageSrc = Yii::$app->request->baseUrl . $filePath;
        }   elseif($blankImage) {
            $imageSrc = Yii::$app->request->baseUrl . $blankImage;
        }   else {
            $imageSrc = false;
        }
        return $imageSrc;
    } 

    // function getImage($filename, $options) {
    //     $options['src'] = Yii::$app->params['baseUrl'] . '/images/' . $filename;
    //     return Html::tag('img', '', $options);
    // }

    public static function isPortrait($filePath)
    { 
        $imageFile = Yii::getAlias('@public') .$filePath;
        $imageFile = str_replace('\\', '/', $imageFile);
        if(is_file($imageFile)) {   
            $sizes = getimagesize($imageFile);
            if($sizes[1] >= $sizes[0]) {
                return true;
            }    
        }
        return false;
    }    


    public static function formatPrice($price)
    {   
        if(empty($price)) return 0;
        return number_format((int)$price, 0, ' ', ' ');
    }

    


}
