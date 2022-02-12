<?php
/*
Template Name: 記事詳細テンプレート
Template Post Type: post
*/
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php get_header(); ?>
</head>

<body>
    <div class="wrapper">
        <header>
            <span>
                <?php bloginfo('name'); ?>
                <a href="<?php echo home_url()?>"></a>
            </span>
        </header>
        <div class="single">
            <div class="title">
                <h1><?php the_title(); ?></h1>
            </div>
            <div class="thumbnail">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="">
            </div>
            <div class="content">
                <?php the_content(); ?>
            </div>
            <div class="date">
                <span>最終更新日：<?php the_modified_date('Y/m/d') ?></span>
            </div>
        </div>
        <footer>
            <span>&copy; <?php bloginfo('name'); ?></span>
        </footer>
    </div>
</body>

</html>