<?php
namespace frontend\controllers;

use Yii;
use common\models\Mainpage;
use common\models\Popular;
use common\models\Product;
use common\models\Manufacturer;
use common\models\Article;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;



class SiteController extends Controller
{
    


    public function actions()
    {
        return [
            // 'error' => [
            //     'class' => 'yii\web\ErrorAction',
            // ],
            'errorHandler' => [
                'errorAction' => 'site/error',
            ],
            'static' => [
                'class' => '\yii\web\ViewAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {   
        $connection = \Yii::$app->db;
        $command = $connection
            ->createCommand('SET SQL_BIG_SELECTS=1')
            ->execute();

        $items = Mainpage::queryFull()->all();
        $populars = Popular::getProductList();
        $news = Article::listForMainpage();

        return $this->render('index', [
                                        'items' => $items,
                                        'populars' => $populars,
                                        'news' => $news,
                                        ]);
    }

    public function actionError() 
    {   
        return $this->goHome();
    }    



    public function actionSitemap() 
    {
        $urls = [];
        $perPage = 20;
        
        $pages = ['about', 'contact', 'feedback', 'warranty', 'delivery', 'payment', 'wholesale', 'turboservice', 'price', 'photogallery', 'turboservice_gallery', 'turborepair', 'repair-price'];
        foreach ($pages as $page ) {
            // $urls[] = 'page/' .$page;
            $urls[] = $page;
        }

        $types = ['passenger', 'trucks', 'tuning', 'refurbish', 'ship', 'cartridges', 'manufacturers/honeywell_garrett', 'manufacturers/borg_warner_schwitzer_3k'];
        foreach ($types as $type ) {
            $urls[] = 'turboshop/' .$type;
        }
        
        $products = Product::queryProductFull()
            ->andWhere('product.state = ' . Product::STATE_ACTIVE)
            ->andWhere('product.brand_id IS NOT NULL')
            ->andWhere('product.model_id IS NOT NULL')
            ->orderBy('product.category_id, product.brand_id, product.model_id')
            ->groupBy('product.model_id')
            ->asArray()
            ->all();

        $prev_brand_id = 0;

        foreach ($products as $product ) {
            if($prev_brand_id != $product['brand_id']) {

                $total = Product::queryProductFull()
                    ->andWhere(['category.alias' => $product['category_alias'], 'brand.alias' => $product['brand_alias']])
                    ->count();
                $pages = ceil($total /$perPage); 
            
                $urls[] = 'turboshop/' .$product['category_alias'] .'/' .$product['brand_alias'];
                if($pages > 1) {
                    for ($i = 2; $i <= $pages; $i++) {
                        $urls[] = 'turboshop/' .$product['category_alias'] .'/' .$product['brand_alias'] .'?page=' .$i;
                    }
                }
            }
            $urls[] = 'turboshop/' .$product['category_alias'] .'/' .$product['brand_alias'] .'/' .$product['model_alias'];

            $prev_brand_id = $product['brand_id'];
        }    
       
        $products = Product::queryProductFull()
            ->andWhere('product.state = ' . Product::STATE_ACTIVE)
            ->andWhere('product.type  = ' . Product::TYPE_COMMON)
            ->orderBy('product.category_id, product.brand_id, product.model_id')
            ->asArray()
            ->all();

        foreach ($products as $product ) {
            $urls[] = 'goods/' .$product['brand_alias'] .'/'  .$product['model_alias'] .'/' .trim($product['partnumber']);
        }


        $products = Product::queryProductFull()
            ->andWhere('product.state = ' . Product::STATE_ACTIVE)
            ->andWhere('product.type  = ' . Product::TYPE_TUNING)
            ->orderBy('product.category_id, product.brand_id, product.model_id')
            ->asArray()
            ->all();

        // tuning
        foreach ($products as $product ) {
            $urls[] = 'tuning/' .$product['id'];
        }


        // manufacturers
        $rows = Manufacturer::find()->asArray()->all();
        foreach($rows as $row) {
            $manufacturer_alias = $row['alias'];
            $total = Product::queryProductFull()
                ->andWhere(['manufacturer.alias' => $manufacturer_alias,
                            'product.type' => Product::TYPE_COMMON])
                ->count();
            $pages = ceil($total / 40); 
            for ($i = 1; $i <= $pages; $i++) {
                $str = 'turboshop/manufacturers/' .$manufacturer_alias;
                if($i >1) {
                    $str .= '?page=' .$i;
                }
                $urls[] = $str;
            }
        }
        // end manufacturers


        $articles = Article::find()
            ->select('alias')
            ->andWhere(['state' => 1])
            ->asArray()
            ->all();
        foreach ($articles as $article ) {
            $urls[] = 'article/' .$article['alias'];
        }


        // $this->layout = 'sitemap_xml';
        // return $this->render('sitemap', ['urls' => $urls]);
        $response = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
        // $lastmod = date('Y-m-d');
        // $changefreq = 'daily';
        
        $changefreq = 'weekly';

        foreach($urls as $url) {
            $randomDaysAgo =  rand(1, 6);
            $lastmod = date('Y-m-d', strtotime("-$randomDaysAgo days"));
            
$response .= '
<url>
    <loc>http://turbomaster.ru/' .$url .'</loc>
    <lastmod>' .$lastmod .'</lastmod>
    <changefreq>' .$changefreq .'</changefreq>
    <priority>1</priority>
</url>';
        }

        $response .= '
</urlset>';

    header("Content-Type: text/xml");
    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    echo $response;
   exit;
}





}
