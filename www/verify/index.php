<?php
require_once '../../../budlight-mm-portal/vendor/engaged-nation/portal-core/FrontEnd/Bootstrap/client-front-end.php';

$assetVersion = ($enConfigClient['environment']['env'] == 'dev') ? time() : $enConfigClient['environment']['deploy_id'];
$registrationAgeMinimum = $enConfigClient->getDatabaseConfig('registration_age_minimum', '21');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bud Light March to the Championship</title>
        <?php
            require_once __DIR__ . '/../../../budlight-mm-portal/vendor/engaged-nation/portal-core/GoogleTagManager/Resources/public/gtm.php';

            // Client GTM. Only fire on PROD environment.
            if ($enConfigClient['environment']['env'] == 'prod') {
        ?>
            <!-- Google Tag Manager -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-NDR3H7X');</script>
            <!-- End Google Tag Manager -->
        <?php } ?>
        <meta name="description" content="Take a shot at becoming a millionaire during the men's college basketball tournament! Play free games to win prizes during the Big Dance." />

        <!-- Required meta tags for boostrap v4.4 -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://ds94t24nq4vzb.cloudfront.net/fontawesome/5-12-0/css/all.min.css">
        <link rel="stylesheet" href="https://ds94t24nq4vzb.cloudfront.net/bootstrap/4-4-1/bootstrap.min.css">
        <link rel="stylesheet" href="/verify/css/style.css?v=<?php echo $assetVersion ?>">
        <link rel="stylesheet" href="https://portal.budlighthoopsindy.com/css/animation/button/shrink-effect.css">

        <script src="https://ds94t24nq4vzb.cloudfront.net/fontawesome/5-12-0/js/all.min.js"></script>
        <script src="https://ds94t24nq4vzb.cloudfront.net/jquery/3-3-1/jquery-3.3.1.min.js"></script>
        <script src="https://ds94t24nq4vzb.cloudfront.net/bootstrap/4-4-1/bootstrap.min.js"></script>

        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $enConfigClient['environment']['s3_uploads_url']; ?>/skins/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $enConfigClient['environment']['s3_uploads_url']; ?>/skins/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $enConfigClient['environment']['s3_uploads_url']; ?>/skins/favicon-16x16.png">
        <link rel="manifest" href="<?php echo $enConfigClient['environment']['s3_uploads_url']; ?>/skins/site.webmanifest">
        <link rel="mask-icon" href="<?php echo $enConfigClient['environment']['s3_uploads_url']; ?>/skins/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#FFFFFF">

        <!-- OneTrust Cookies Consent Notice start for budlighthoopsindy.com -->
        <script src="https://cdn.cookielaw.org/consent/415c16ee-d80b-4eec-882c-530ee5a51e22.js" type="text/javascript" charset="UTF-8"></script>
        <script type="text/javascript">
        function OptanonWrapper() { }
        </script>
        <!-- OneTrust Cookies Consent Notice end for budlighthoopsindy.com -->

        <script>
            var EngagedNation = EngagedNation || {};
            EngagedNation.Config = EngagedNation.Config || {};
            EngagedNation.Constant = EngagedNation.Constant || {};

            EngagedNation.Config.RegistrationAgeMinimum = parseInt('<?php echo $registrationAgeMinimum; ?>');
            EngagedNation.Constant.VERIFIED_AGE = 'verifiedAge'
        </script>
        <script src="/verify/js/form.js?v=<?php echo $assetVersion ?>"></script>
        <script src="/verify/js/init.js?v=<?php echo $assetVersion ?>"></script>
    </head>

    <body>
        <?php
            // Client GTM. Only fire on PROD environment.
            if ($enConfigClient['environment']['env'] == 'prod') {
        ?>
            <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NDR3H7X"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
        <?php } ?>
        <div id="verify-age-form" class="container-fluid pt-4">
            <div class="wrapper">
                <div class="row justify-content-center">

                    <form class="col-sm-12 col-md-9 col-xl-5" autocomplete="off" novalidate>
                        <div class="img-wrapper">
                            <img src="https://budlight-mm-uploads.s3-us-west-2.amazonaws.com/images/logout/Bud-Light-Indy-MDMM-500h.png" class="img-fluid mb-3">
                        </div>
                        <div class="messageWrapper">
                            <div class="lines line1">MARCH 15 - APRIL 6, 2021</div>
                            <div class="lines line1">TAKE YOUR SHOT AT WINNING</div>
                            <div class="lines line2">FABULOUS PRIZES!</div>
                        </div>
                        <p class="h1 text-center mb-4">
                            We need to check your ID before you proceed.
                            <br class="mb-4">
                            You must be of legal drinking age to enter this site.
                        </p>
                        <div class="form-row">
                            <div class="form-group text-center col-4">
                                <label>Month</label>

                                <select class="form-control custom-select" name="dob_month" required>
                                    <option selected></option>

                                    <?php foreach (range(1, 12) as $month) { ?>
                                        <?php $month = str_pad($month, 2, 0, STR_PAD_LEFT); ?>
                                        <option value="<?php echo $month; ?>"><?php echo $month; ?></option>
                                    <?php } ?>
                                </select>

                                <div class="invalid-feedback">
                                    Please select a month
                                </div>
                            </div>

                            <div class="form-group text-center col-4">
                                <label>Day</label>

                                <select class="form-control custom-select" name="dob_day" required>
                                    <option selected></option>

                                    <?php foreach (range(1, 31) as $day) { ?>
                                        <?php $day = str_pad($day, 2, 0, STR_PAD_LEFT); ?>
                                        <option value="<?php echo $day; ?>"><?php echo $day; ?></option>
                                    <?php } ?>
                                </select>

                                <div class="invalid-feedback">
                                    Please select a day
                                </div>
                            </div>

                            <div class="form-group text-center col-4">
                                <label>Year</label>

                                <select class="form-control custom-select" name="dob_year" required>
                                    <option selected></option>

                                    <?php
                                        $currentYear = (new \DateTime)->format('Y');
                                        foreach (array_reverse(range($currentYear - 100, $currentYear)) as $year) {
                                    ?>
                                        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                    <?php } ?>
                                </select>

                                <div class="invalid-feedback">
                                    Please select a year
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-lg btn-primary btn-block en-button-animations-shrink-effect">Enter</button>
                    </form>
                </div>

                <div class="page-footer">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div><strong>BUD LIGHT&reg; INDY MARCH TO THE CHAMPIONSHIP</strong></div>
                            <div>
                                No Purchase Necessary. Open to IL and IN residents 21+. Begins at 7:00 p.m. EDT on 3/14/21 and ends at 11:59 pm on 4/5/21.
                                Multiple game periods. See <a href="/images/pdf/rules-terms.pdf" target="_blank" class="text-link">Official Rules</a>
                                at www.budlighthoopsindy.com for entry deadlines, prizes and details. Message and data rates may apply.
                                Void where prohibited.
                            </div>

                            <br>

                            <div><strong>ENJOY RESPONSIBLY</strong></div>

                            <div>&copy; 2022 Anheuser-Busch, Bud Light&reg; Beer, St. Louis, MO</div>
                            <div>
                                <a href="https://www.budlight.com/en/privacy-policy.html" target="_blank" class="text-link">Terms of Service</a> and
                                <a href="https://www.budlight.com/en/terms-and-conditions.html" target="_blank" class="text-link">Privacy Policy</a>.
                                <a href="https://www.budlight.com/en/california-residents-privacy-rights.html" target="_blank" class="text-link">CA Privacy Info</a>.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="verify-age-failed" class="container-fluid pt-4 d-none">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-9 col-xl-4">
                    <div class="failedWrapper">
                        <img src="https://budlight-mm-uploads.s3-us-west-2.amazonaws.com/images/logout/Bud-Light-Indy-MDMM-500h.png" class="img-fluid mb-3">

                        <p class="h1 text-center">
                            Sorry, you must be <?php echo $registrationAgeMinimum; ?> or older to view this site.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
