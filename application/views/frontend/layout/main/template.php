<!DOCTYPE html>
<html>
    <head><?php echo $tags; ?></head>
<body>
    <header>
        <?php echo isset($header)? $header : ''; ?>
    </header>
    <section id="content" class="container-fluid">
        <div class="row">
            <?php echo isset($content)? $content : ''; ?>
        </div>
    </section>
    <footer>
        <?php echo isset($footer)? $footer : ''; ?>
    </footer>
</body>
</html>