<?php

use common\models\SiteInfo; ?>

<section id="productDetails" class="pb-5">
    <div class="card mt-5 hoverable">
        <div class="card-header bg-white text-dark">
            <h2><?= $product->name ?></h2>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6">
                <div id="carousel-thumb" class="carousel slide carousel-thumbnails" data-ride="carousel">
                    <div class="carousel-inner text-center text-md-left" role="listbox">
                        <?php
                        $active = true;
                        foreach ($product->productscontents as $content) : ?>
                            <!-- ถ้ามีรูป -->
                            <?php if (!empty($content->file_path)) : ?>
                                <!-- แสดงรูป -->
                                <div class="carousel-item <?= $active ? 'active' : '' ?>">
                                    <img style="height: 50vh;object-fit:cover" src="<?= SiteInfo::backendWeb() . "/$content->file_path" ?>" alt="<?= $content->id ?>" class="img-fluid">
                                </div>
                            <?php $active = false;
                            endif; ?>
                        <?php endforeach; ?>

                    </div>
                    <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-5 mr-3 text-center text-md-left">
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="row mt-3 mb-4">
                            <div class="col-12">
                                <h3>รายละเอียด : </h3>
                                <h4><?= $product->description ?></h4>
                                <hr>
                            </div>
                            <div class="col-12">
                                <h3>ข้อมูลร้านค้า : </h3>
                                <h4><?= $product->store->name ?></h4>
                                <hr>
                            </div>
                            <div class="col-12">
                                <h3>ราคา : <?= $product->price ?></h3>
                                <div class="col-md-12 text-center text-md-left text-md-right">
                                    <button class="btn btn-primary btn-rounded waves-effect waves-light w-100">
                                        <i class="fas fa-cart-plus mr-2" aria-hidden="true"></i> สั่งซื้อ
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>