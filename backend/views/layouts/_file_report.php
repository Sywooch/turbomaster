 <?php 
            if($file_name = Yii::$app->request->get('file_report')) { 
                $file_name = Yii::getAlias('@backend/web/excel/') .$file_name .'.txt';
                $file_name = str_replace('\\', '/', $file_name);

                if(is_file($file_name)) {
                    $file = file_get_contents($file_name);
                ?>

                <div style="margin: 40px 0 0 40px; width: 480px; box-shadow: 0 2px 2px rgba(0, 0, 0, 0.05); padding: 10px 20px 40px 30px;">
                    <h3 style="margin-bottom: 20px; color: #777;">При загрузке не найдены товары с артикулами:</h3>
                    <div style="width: 460px; max-height: 300px; overflow: auto;">
                        <?= nl2br(htmlspecialchars($file));  ?>
                    </div>

                    <?php
                    $urlFileName = Yii::$app->request->baseUrl .'/excel/' .Yii::$app->request->get('file_report') .'.txt';
                    ?>

                    <p style="margin: 30px 0 0 0;">
                        <a href="<?= Yii::$app->request->baseUrl .'/excel/' .Yii::$app->request->get('file_report') ?>.txt" style="border-bottom: 1px dotted #777;" target="_blank">Файл с отчетом</a>
                    </p>

                </div>
     <?php      }
            }   ?>