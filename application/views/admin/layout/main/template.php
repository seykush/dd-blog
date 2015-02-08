<!DOCTYPE html>
<html>
    <head><?php echo $tags; ?></head>
<body>
    <header>
        <?php echo isset($header)? $header : ''; ?>
    </header>
    <section id="content" class="container-fluid">
        <div class="row">
            <div class="main <?php echo isset($options['content_size'])? $options['content_size'] : 'col-sm-12'; ?>">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <?php echo isset($options['icon'])? $options['icon'] : ''; ?>
                            <?php echo isset($title)? $title : ''; ?>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <?php echo isset($footer)? $footer : ''; ?>
    </footer>
</body>
</html>

