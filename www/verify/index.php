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

        <!-- OneTrust Cookies Consent Notice start for https://www.budlighthoopschallenge.com -->
        <script src="https://cdn.cookielaw.org/consent/415c16ee-d80b-4eec-882c-530ee5a51e22.js" type="text/javascript" charset="UTF-8"></script>
        <script type="text/javascript">
        function OptanonWrapper() { }
        </script>
        <!-- OneTrust Cookies Consent Notice end for https://www.budlighthoopschallenge.com -->

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

    <body id="verify-age-wrapper" style="background: url(<?php echo $enConfigClient['environment']['s3_uploads_url']; ?>/images/logout/loggedOutLogo_verify.jpg) no-repeat; background-size: cover; background-position: center;">
        <div class="container-fluid pt-4">
            <div class="container-body">
                <div class="justify-content-center">
                    <form id="verify-age-form" autocomplete="off" novalidate>
                        <div>
                            <img src="<?php echo $enConfigClient['environment']['s3_uploads_url']; ?>/images/logout/loggedout-program-logo.png"></img>
                        </div>
                        <h1>We need to check your ID</h1>
                        <h4>You must be of legal drinking age to enter this site.</h4>
                        <div class="custom-form-row text-center">
                            <div class="form-group">
                                <select class="form-control custom-select custom-select-month" name="dob_month" required>
                                    <option value="" selected>MM</option>

                                    <?php foreach (range(1, 12) as $month) { ?>
                                        <?php $month = str_pad($month, 2, 0, STR_PAD_LEFT); ?>
                                        <option value="<?php echo $month; ?>"><?php echo $month; ?></option>
                                    <?php } ?>
                                </select>

                                <div class="invalid-feedback">
                                    Please select a month
                                </div>
                            </div>

                            <div class="form-group">
                                <select class="form-control custom-select custom-select-day" name="dob_day" required>
                                    <option value="" selected>DD</option>

                                    <?php foreach (range(1, 31) as $day) { ?>
                                        <?php $day = str_pad($day, 2, 0, STR_PAD_LEFT); ?>
                                        <option value="<?php echo $day; ?>"><?php echo $day; ?></option>
                                    <?php } ?>
                                </select>

                                <div class="invalid-feedback">
                                    Please select a day
                                </div>
                            </div>

                            <div class="form-group">
                                <select class="form-control custom-select custom-select-year" name="dob_year" required>
                                    <option value="" selected>YYYY</option>

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

                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary btn-block">Enter</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="verify-age-failed" class="d-none">
                    <h1>
                        Sorry, you must be <?php echo $registrationAgeMinimum; ?> or older to view this site.
                    </h1>
                </div>
                <div class="page-footer">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <a href="https://www.budlight.com/en/privacy-policy.html" target="_blank" data-gtm-dimension="v2/Logged_Out/Initial/Link_Success/Privacy_Client">Privacy Policy</a> |
                            <a href="https://www.budlight.com/en/terms-and-conditions.html" target="_blank">Terms of Use</a> |
                            <a href="<?php echo $enConfigClient['environment']['s3_uploads_url']; ?>/images/pdf/sweepstakes-rules.pdf" target="_blank">Sweepstakes Rules</a> |
                            <a href="<?php echo $enConfigClient['environment']['s3_uploads_url']; ?>/images/pdf/contest-rules.pdf" target="_blank">Contest Rules</a> |
                            <a href="https://www.budlight.com/en/california-residents-privacy-rights.html" target="_blank">CA Privacy Info</a>
                        </div>
                    </div>
                    <div class="row no-margin-bottom">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <strong>BUD LIGHT<sup>&reg;</sup> MARCH TO THE CHAMPIONSHIP SWEEPSTAKES</strong><br>
                            <p>NO PURCHASE NECESSARY. Open to U.S. residents 21+. Begins on 3/1/2022 and ends on 4/6/2022. See <a href="<?php echo $enConfigClient['environment']['s3_uploads_url']; ?>/images/pdf/rules-terms.pdf">Official Rules</a> at <a href="https://www.budlighthoopschallenge.com/" target="_blank">budlighthoopschallenge.com</a> for entry, prize, and details. Message and data rates may apply. Void where prohibited.</p>
                            <p>&copy; 2022 A-B, BUD LIGHT &reg; BEER, ST. LOUIS, MO. [110 calories, 6.6g carbs, 0.9g protein and 0.0g fat, per 12 oz.], BUD LIGHT &reg; SELTZER, ST. LOUIS, MO. [100 calories, 2.0g carbs, &lt;1g sugar and 0.0g fat, per 12 oz.] </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <strong>ENJOY RESPONSIBLY.</strong><br>
                            &copy; 2021 Anheuser-Busch, Bud Light<sup>&reg;</sup> Beer, St. Louis, MO.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
