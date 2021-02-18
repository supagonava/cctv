<?php use yii\helpers\Url; ?>

<section class="section pb-5">
    <div class="card">
        <div class="card-header bg-white text-center">
            <h4>ใบเสนอราคาของฉัน</h4>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table product-table table-cart-v-2">

                    <thead class="mdb-color lighten-5">
                        <tr>
                            <td>ข้อมูลห้อง</td>
                            <td>งบประมาณที่เสนอ</td>
                            <td>การตอบกลับ</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($quatationList as $quatation) : ?>
                            <tr>
                                <td><?= $quatation->Room_Size ?></td>
                                <td><?= $quatation->bugget ?></td>
                                <td>ยังไม่มีการตอบกลับจากผู้รับเหมา</td>
                                <td>
                                    <a href="<?= Url::to(["site/estimate-price?id=$quatation->id"]) ?>" class="btn btn-info btn-floating">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?= Url::to(["site/remove-quatation?id=$quatation->id"]) ?>" class="btn btn-danger btn-floating" onclick="return confirm('คุณต้องการจะลบรายการนี้หรือไม่?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>