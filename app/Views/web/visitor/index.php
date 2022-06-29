<?= $this->extend('web/layouts/visitor_app'); ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="row">
        <!--map-->
        <div class="col-md-7 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-auto">
                            <h5 class="card-title">Google Maps with Location</h5>
                        </div>
                        <?= $this->include('web/layouts/header-map'); ?>
                    </div>
                </div>
                <?= $this->include('web/layouts/main-map'); ?>
            </div>
        </div>

        <!--popular-->
        <div class="col-md-5 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-center">Recommendation</h5>
                </div>
                <div class="card-body">
                <?php $i = 0; ?>
                    <script>clearMarker();</script>
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                        <?php foreach ($data as $item) : ?>
                            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= esc($i); ?>" class="<?= ($i == 0) ? 'active' : ''; ?>"></li>
                            <?php $i++; ?>
                        <?php endforeach ; ?>
                        </ol>
                        <div class="carousel-inner">
                        <?php $i = 0; ?>
                        <?php foreach ($data as $item) : ?>
                            <div class="carousel-item<?= ($i == 0) ? ' active' : ''; ?>">
                                <script>objectMarker(<?= esc($item['lat']); ?>, <?= esc($item['long']); ?>);</script>
                                <a href="<?= base_url('/web/rumahGadang/'.esc($item['id'])); ?>" target="_blank">
                                    <img src="<?= base_url('assets/images/samples/1.png'); ?>" class="d-block w-100" alt="...">
                                </a>
                                <div class="carousel-caption d-none d-md-block">
                                    <?php $i++; ?>
                                    <h5><?= esc($item['name']); ?></h5>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
