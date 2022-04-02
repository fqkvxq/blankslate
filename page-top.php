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
    <meta property="og:url" content="<?php echo (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php the_title(); ?>" />
    <meta property="og:description" content="" />
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
    <meta property="og:image" content="https://kawaikikaku.tokyo/wp-content/themes/blankslate/create_ogp_img.php?text=<?php the_title(); ?>" />
    <meta name="twitter:card" content="summary_large_image" />
    <?php get_header(); ?>
</head>

<body>
    <!-- Google 構造化データ マークアップ支援ツールが生成した JSON-LD マークアップです。 -->
    <?php $ID = $post->post_author; ?>
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Article",
            "headline": "<?php the_title(); ?>",
            "datePublished": "<?php the_time('Y/m/d') ?>",
            "dateModified": "<?php the_modified_date('Y/m/d') ?>",
            "image": "<?php the_post_thumbnail_url(); ?>",
            "author": {
                "@type": "Person",
                "name": "<?php echo get_the_author_meta('user_login',$ID); ?>"
            }
        }
    </script>
    <div class="wrapper">
        <header>
            <span>
                <?php bloginfo('name'); ?>
                <a href="<?php echo home_url() ?>" aria-label="<?php bloginfo('name'); ?>"></a>
            </span>
        </header>
                <?php if (is_user_logged_in()) : ?>
            <?php
            $edit_page_url = get_edit_post_link($post_id);
            ?>
            <a href="<?php echo $edit_page_url; ?>">記事を編集</a>
        <?php endif; ?>
        <div class="single">
            <div class="title">
                <h1><?php the_title(); ?></h1>
            </div>
            <div class="content">
                <?php the_content(); ?>
            </div>
            <div class="date">
                <span>公開日：<time itemprop="datePublished" datetime="<?php the_time('c'); ?>"><?php the_time('Y/m/d') ?></span>
                <span>最終更新日：<time itemprop="dateModified" datetime="<?php the_modified_date('c'); ?>"><?php the_modified_date('Y/m/d') ?></span>
            </div>
        </div>
        <footer>
            <span>&copy; <?php bloginfo('name'); ?></span>
        </footer>
    </div>
    <script type="text/javascript" src="https://kawaikikaku.tokyo/clickheat/js/clickheat.js"></script><noscript>
        <p><a href="http://www.dugwood.com/index.html">CMS</a></p>
    </noscript>
    <script>
        clickHeatSite = '';
        clickHeatGroup = encodeURIComponent(window.location.pathname + window.location.search);
        clickHeatServer = 'https://kawaikikaku.tokyo/clickheat/click.php';
        initClickHeat();
    </script>
</body>

</html>