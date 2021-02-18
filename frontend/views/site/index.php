<?php

use common\models\Productscontent;
use common\models\SiteInfo;
use yii\helpers\Url;

?>
<div class="row pt-4">
    <div class="col-lg-12">
        <section>
            <div class="row">
                <?php if (!Yii::$app->user->isGuest) : ?>
                    <div class="col-12">
                        <div class="view  z-depth-1">
                            <img src="https://mdbootstrap.com/img/Photos/Others/ecommerce5.jpg" class="img-fluid" alt="sample image">
                            <div class="mask rgba-stylish-slight">
                                <div class="dark-grey-text text-right pt-lg-5 pt-md-1 mr-5 pr-md-4 pr-0">
                                    <div>
                                        <h3 class="card-title font-weight-bold pt-md-3 pt-1">
                                            <strong>การพัฒนาระบบสารสนเทศเพื่อการจัดการ</strong><br>
                                            <strong>ประเมินราคาติดตั้งกล้องวงจรปิด</strong>
                                        </h3>
                                        <p class="pb-lg-3 pb-md-1 clearfix d-none d-md-block">Development of CCTV Installation Cost Estimate Management Information System</p>
                                        <a href="<?= Url::to(["site/estimate-price"]) ?>" class="btn mr-0 btn-primary btn-rounded clearfix d-none d-md-inline-block">ประเมินราคา</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="col-12">
                        <div class="view  z-depth-1">
                            <img src="https://mdbootstrap.com/img/Photos/Others/ecommerce5.jpg" class="img-fluid" alt="sample image">
                            <div class="mask rgba-stylish-slight">
                                <div class="dark-grey-text text-right pt-lg-5 pt-md-1 mr-5 pr-md-4 pr-0">
                                    <div>
                                        <h2 class="card-title font-weight-bold pt-md-3 pt-1">
                                            <strong>Sale from 20% to 50% on every tablet!
                                            </strong>
                                        </h2>
                                        <p class="pb-lg-3 pb-md-1 clearfix d-none d-md-block">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <section>
            <h4 class="font-weight-bold mt-4 dark-grey-text">
                <strong>สินค้าทั้งหมด</strong>
            </h4>
            <hr class="mb-5">
            <div class="row">
                <?php
                foreach ($products as $product) : ?>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card card-ecommerce" onclick="window.open('<?= Url::to(['site/product-view']) . '?id=' . $product->id ?>','_self')">
                            <div class="view overlay">
                                <?php $firstImage = Productscontent::find()->where(["product_id" => $product->id])->orderBy("id")->one(); ?>
                                <?php if (!empty($firstImage)) : ?>
                                    <img style="width: 100%;object-fit: cover;" src="<?= SiteInfo::backendWeb() . $firstImage->file_path ?>" class="img-fluid">
                                <?php else : ?>
                                    <img style="width: 100%;object-fit: cover;" src="<?= SiteInfo::backendWeb() . "/imgAssets/comingsoon.png" ?>" class="img-fluid">
                                <?php endif; ?>
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mb-1">
                                    <strong>
                                        <a href="" class="dark-grey-text"><?= $product->name ?></a>
                                    </strong>
                                </h5>
                                <div class="card-footer pb-0">
                                    <div class="row mb-0">
                                        <span class="float-left">
                                            <strong><?= $product->price ?> บาท</strong>
                                        </span>
                                        <span class="float-right">
                                            <a class="" data-toggle="tooltip" data-placement="top" title="ซื้อเดี๋ยวนี้">
                                                <i class="fas fa-shopping-cart ml-3"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
</div>