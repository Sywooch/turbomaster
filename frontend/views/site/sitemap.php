<?php
// $lastmod = date('Y-m-d');
$lastmod = date('Y-m-d', strtotime("-1 days")); // yesterday

// $changefreq = 'weekly';
$changefreq = 'daily';

foreach($urls as $url) {  ?>
<url>
    <loc>http://turbomaster.ru/<?= $url ?></loc>
    <lastmod><?= $lastmod ?></lastmod>
    <changefreq><?= $changefreq ?></changefreq>
    <priority>1</priority>
</url>
<?php } ?>