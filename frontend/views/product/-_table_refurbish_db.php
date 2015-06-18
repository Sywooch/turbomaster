<?php
if(count($products) > 0) { ?>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr class="danger">
                        <th>п/п</i></th>
                        <th>Номер</th>
                        <th>Взаимозаменяемость</th>
                        <th>Применение</th>
                        <th>Состояние</th>
                        <th>Артикул</th>
                        <th nowrap>Цена, руб.</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                foreach($products as $key => $product) {  ?>
                    <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= $product['partnumber'] ?></td>
                    <td><?= str_replace(',', ' / ', $product['interchange']) ?></td>
                    <td><?= $product['brand_name'] ?></td>
                    <td class="nowrap">Оборотный ТК</td>
                    <td><?= $product['manufacturer_name'] ?></td>
                    <td><?= $product['price'] ?></td>
                    </tr>
                <?php  }  ?>
                </tbody>
            </table>
        </div>
<?php } ?>