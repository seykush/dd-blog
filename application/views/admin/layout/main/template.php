<!DOCTYPE html>
<html lang="en-us">
<head>
    <?php echo $tags; ?>
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
<!--    <script data-pace-options='{ "restartOnRequestAfter": true }' src="/assets/library/pace/pace.min.js"></script>-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">-->

</head>
<body class="">
    <header id="header">
        <?php echo isset($header)? $header : ''; ?>
    </header>
    <aside id="left-panel">
        <?php echo isset($left_side)? $left_side : ''; ?>
    </aside>
    <div id="main" role="main">
        <div id="ribbon">
            <span class="ribbon-button-alignment">
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"></i>
					</span>
			</span>
            <ol class="breadcrumb">
                <?php echo isset($options['bread_crumbs'])? $options['bread_crumbs'] : ''; ?>
            </ol>
        </div>
        <div id="content">
            <?php echo $content; ?>
        </div>
    </div>
    <div class="page-footer">
        <?php echo isset($footer)? $footer : ''; ?>
    </div>
    <script src="/assets/library/smart-admin/js/app.config.js"></script>
    <script src="/assets/library/smart-admin/js/app.min.js"></script>
</body>
</html>


