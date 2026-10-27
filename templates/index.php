<!DOCTYPE html>
<html lang="<?= $config['website']['lang-doc'] ?>">

<head>
    <?php include TEMPLATE . LAYOUT . "head.php"; ?>
    <?php include TEMPLATE . LAYOUT . "css.php"; ?>
</head>

<body>

    <div id="wrapper">
        <div class="content1">
        <?php
        include TEMPLATE . LAYOUT . "seo.php";
        include TEMPLATE . LAYOUT . "menu.php";
        if ($source != 'index') include TEMPLATE . LAYOUT . "slide.php";
        if ($source != 'index') include TEMPLATE . LAYOUT . "breadcrumb.php";
        ?>
        <div class="<?= ($source == 'index') ? 'wrap-home' : 'wrap-main' ?> w-clear"><?php include TEMPLATE . $template . "_tpl.php"; ?></div>
        <?php
        include TEMPLATE . LAYOUT . "footer.php";
        include TEMPLATE . LAYOUT . "bonut.php";
        include TEMPLATE . LAYOUT . "modal.php";
        include TEMPLATE . LAYOUT . "js.php";
        ?>
        </div>
    </div>

</body>

</html>
