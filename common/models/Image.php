<?php

namespace common\models;

use Yii;


class Image 
{
   
   
    public static function  createImagesByPattern($uploadedFile, $subDirectory, $imageName, $patternArray) 
    {

        $imageProcessor = new \yii\image\ImageDriver;

        foreach ($patternArray as $key => $property) {

            if(is_file($uploadedFile))  {
                $createdImage = $imageProcessor->load($uploadedFile);
                $target_w  = $property['width'];  
                $target_h  = $property['height'];

                if( !isset($property['crop'])) {
                    // просто уменьшаем без crop, сохраняя пропорции оригинала 
                    $createdImage->resize($target_w, $target_h);
                } else { 
                    $target_hw_ratio  = $target_h / $target_w;
                    $originalSizes = getimagesize($uploadedFile);
                    $original_w  = $originalSizes[0];  
                    $original_h  = $originalSizes[1];
                    $original_hw_ratio = $original_h / $original_w;
                    // если по пропорции оригинал шире создаваемой миниатюры
                    if($original_hw_ratio <= $target_hw_ratio) { 
                        $ratio =  $target_h / $original_h;
                        $createdImage->resize(round($original_w * $ratio), $target_h, \yii\image\drivers\Image::HEIGHT);
                    }  else  { 
                        $ratio =  $target_w / $original_w;
                        $createdImage->resize($target_w, round($original_h * $ratio), \yii\image\drivers\Image::WIDTH);
                    }
                    $createdImage->crop($target_w, $target_h);
                }
                if(isset($property['sharpen'])) $createdImage->sharpen($property['sharpen']);

                if(isset($property['watermark'])) {
                    $watermark = \yii\image\drivers\Image::factory($property['watermark']['fileName']);
                    $opacity = $property['watermark']['opacity'];

                    $createdImage->watermark($watermark, $offset_x = NULL, $offset_y = NULL, $opacity);
                }
                

                $createdImageName = Yii::getAlias('@public/photo/') .$subDirectory .DIRECTORY_SEPARATOR .$key .DIRECTORY_SEPARATOR .$imageName;
                $quality = (isset($property['quality'])) ? $property['quality'] : 100;
                $createdImage->save($createdImageName, $quality); 
            }  //is_file
        }  //foreach patternArray
    }


    public static function deleteImages($imageName, $directory, $arraySubdirectories) 
    {
        foreach ($arraySubdirectories as $subdirectory) {
            $file = Yii::getAlias('@public/photo/') .$directory .DIRECTORY_SEPARATOR .$subdirectory .DIRECTORY_SEPARATOR .$imageName;
            @unlink($file);         
        }
    }





}
