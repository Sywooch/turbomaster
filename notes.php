<?php


\yii\helpers\VarDumper::dump($model); exit;

// my admin widget: -------------------------------

public function actionIndex()
    {   
        $model  = new Brand;
        $items  = Brand::find()->orderBy('name')->asArray()->all();
        $params = [
            'title_name'    => 'Марки авто',
            'posManipulate' => false,               // option
            'formPath'      => '/popular/_form',    // option
            'jsFile'        => 'js/brands.js',      // option

            'columns' => [
                [
                    'property'  => 'name',
                    'name'      => 'Название',
                    'width'     => '260',
                    'link'      => 'brand/update',      // option
                    'editorial' =>  true,               // option inline editor   
                    'toggleDot' =>  true,               // option 
                    'posManipulate' => true             // option  shift pos   
                    'style'     =>  'font-size: 15px;', // option 
                    'class'     =>  'hovered',          // option 
                ],
                [
                    'property'  => 'alias',
                    'name'      => 'Псевдоним',
                    'width'     => '260',
                ],
            ],
        ];

        return $this->render('/list/index', [
                'model'  => $model,
                'items'  => $items,
                'params' => $params,
                ]);
    }

// end my admin widget: -------------------------------



PostCategory::deleteAll(['post_id' => $this->id]);