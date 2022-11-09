<?php include_once('includes/header.php') ?>

<link rel="stylesheet" href="assets/css/QRCodeGenerator.css">
<link rel="stylesheet" href="../src/plugins/ion-range-slider/ion.rangeSlider.min.css">

<body>
    <?php include_once('includes/navbar.php') ?>

    <?php include_once('includes/right_sidebar.php') ?>

    <?php include_once('includes/left_sidebar.php') ?>

    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-100px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Gerar QRCode</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><i class="fa-solid fa-qrcode"></i> QRCode</li>
                                    <li class="breadcrumb-item active" aria-current="page">Gerar QRCode</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4"><i class="fa-solid fa-arrow-right"></i> Escolher Quantidade</h4>
                            <p class="mb-20"></p>
                        </div>
                    </div>

                    <script src="../src/plugins/ion-range-slider/ion.rangeSlider.min.js"></script>

                    <form method="POST" action="print.php">
                        <div class="wizard-content">
                            <div class="row" style="margin: auto;">
                                <div class="col-md-12">
                                    <div class="form-group" style="width: 400px; margin: auto">
                                        <label><i class="fa-solid fa-boxes-stacked"></i> Quantidade</label>
                                        <input type="range" style="cursor: pointer" min="1" max="1000" step="1" name="qrcode" id="slider">

                                        <script>
                                            $("#slider").ionRangeSlider({
                                                type: 'single',
                                                min: 1,
                                                max: 1000,
                                                from: 500,
                                                grid: true
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-sm-12 text-center">
                                <div class="dropdown">
                                    <button type="submit" class="btn btn-primary" name="generate" id="generate"><i class="fa-solid fa-check"></i> Gerar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div>
                <?php include_once('includes/footer.php'); ?>
            </div>
        </div>
    </div>

    <?php include_once('includes/scripts.php') ?>
</body>

</html>