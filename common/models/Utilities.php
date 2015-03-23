<?php
namespace common\models;
use Yii;
use yii\db\Query;


class Utilities extends \yii\db\ActiveRecord
{
    public static function backUrl()
    {
        if(empty(Yii::$app->session['back_url'])) {
            Yii::$app->session['back_url'] = \Yii::$app->urlManager->createUrl(['product/index']);
        }
        return Yii::$app->session['back_url'];
    }


    public static function setBackUrl($url)
    {
        Yii::$app->session['back_url'] = $url;
    }


    public static function retroGoBack()
    {
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit;
    }

    public static function findMaxFrom($table, $params = [])
    {
        $condition  = (isset($params['condition'])) ? $params['condition'] : [];
        $field      = (isset($params['field'])) ? $params['field'] : 'pos';

        $q = new \yii\db\Query();
        if(!$field) { $field = 'pos'; }
        return $q->from($table)->where($condition)->max($field);
    }    


    public static function createRandomName($length = 12) 
    {
        $letters = 'abcdefghijklmnopqrstuvwxyz';
        $allchar = 'abcdefghijklmnopqrstuvwxyz123456789';
        mt_srand (( double) microtime() * 1000000 );        
        $str = substr( $letters, mt_rand (0,26), 1);
        
        for ($i = 0; $i<$length-1 ; $i++) {    
            $str .= substr( $allchar, mt_rand (0,34), 1);
        }
        return $str;
    }



    public static function shiftItem($modelObject, $id, $direction, $params = null)   
    {
        // \yii\helpers\VarDumper::dump($params); exit;

        if(!in_array($direction, array('up', 'down')))  return false; 
        $fieldPosition = (isset($params['fieldPosition'])) ? $params['fieldPosition'] : 'pos';
       
        if(isset($params['beforeNormalize']) && $params['beforeNormalize'] === true) {
            static::normalizePositions($modelObject, $params);
        }

        $item = $modelObject::findOne($id);
        $posCurent = intval($item->{$fieldPosition});
        $posFound  = ($direction == 'up') ? $posCurent - 1 : $posCurent + 1;

        $query = $modelObject::find()->andWhere("$fieldPosition = $posFound");

        if(isset($params['condition'])) {
            $query->andWhere($params['condition']);
        }
        $shiftedItem = $query->one();

        if($shiftedItem !== null)    {
            $shiftedItem->{$fieldPosition} = $posCurent; 
            $shiftedItem->save();
            $item->{$fieldPosition} = $posFound;
            $item->save(); 
        }  
    }


    public static function normalizePositions($modelObject, $params = null)   
    {
        $fieldPosition = (isset($params['fieldPosition'])) ? $params['fieldPosition'] : 'pos';
        $query = $modelObject::find();
        if(isset($params['condition'])) {
            $query->where($params['condition']);
        }
        $result = $query->orderBy($fieldPosition)->all();
        if($result) {
            foreach($result as $k => $v) {
                if((int)$v['pos'] != ($k + 1)) {
                    $item = $modelObject::findOne((int)$v['id']);
                    $item->{$fieldPosition} = $k + 1;
                    $item->save();
                }
            }
        }

    }

    public static function checkIsWorkingHours()   
    {   

        $isWorkingHours = false;

        date_default_timezone_set('Europe/Moscow');
        $weekdayNumeric = date('N'); 
       
        // if working days
        if (in_array($weekdayNumeric, [1,2,3,4,5])) {
            $open_from = "08:00";
            $open_to = "19:00";
            if (date("H:i") > $open_from && date("H:i") < $open_to ) {
                $isWorkingHours = true;
            }
        // if saturday
        } elseif ($weekdayNumeric == 6)  {
            $open_from = "10:00";
            $open_to = "14:00";
            if (date("H:i") > $open_from && date("H:i") < $open_to ) {
                $isWorkingHours = true;
            }
        }

        return $isWorkingHours;
    }



}
