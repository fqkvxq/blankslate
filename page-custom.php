<?php
/*
Template Name: 記事一覧テンプレート
Template Post Type: page
*/
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <?php get_header(); ?>
</head>

<body>
    <div class="wrapper">
        <header>
            <span>
                <?php bloginfo('name'); ?>
                <a href="<?php echo home_url() ?>" aria-label="<?php bloginfo('name'); ?>"></a>
            </span>
        </header>
        <div class="loop">
            <?php
            //$argsのプロパティを変えていく
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
            $args = array(
                'post_type' => 'post',
                // 'posts_per_page' => 10,
                'no_found_rows' => false,  //ページャーを使う時はfalseに。
                'paged' => $paged,
                'orderby'     => 'modified', //更新日順
                'category__not_in' => array(4),
            );
            $the_query = new WP_Query($args);
            ?>
            <?php for ($i = 0; $i < $the_query->post_count; $i++) : ?>
                <?php $post_url = $the_query->posts[$i]->guid; ?>
                <div class="article">
                    <div class="thumbnail">
                        <img src="https://kawaikikaku.tokyo/wp-content/themes/blankslate/create_ogp_img.php?text=<?php echo ($the_query->posts[$i]->post_title); ?>" width="200" height="100" alt="">
                    </div>
                    <div class="title">
                        <h2><?php echo ($the_query->posts[$i]->post_title); ?></h2>
                    </div>
                    <a href="<?php echo $post_url ?>" aria-label="<?php echo ($the_query->posts[$i]->post_title); ?>"></a>
                </div>
            <?php endfor; ?>
            <div class="pnavi">
                <?php //ページリスト表示処理
                global $wp_rewrite;
                $paginate_base = get_pagenum_link(1);
                if (strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()) {
                    $paginate_format = '';
                    $paginate_base = add_query_arg('paged', '%#%');
                } else {
                    $paginate_format = (substr($paginate_base, -1, 1) == '/' ? '' : '/') .
                        user_trailingslashit('page/%#%/', 'paged');
                    $paginate_base .= '%_%';
                }
                echo paginate_links(array(
                    'base' => $paginate_base,
                    'format' => $paginate_format,
                    'total' => $the_query->max_num_pages,
                    'mid_size' => 1,
                    'current' => ($paged ? $paged : 1),
                    'prev_text' => '< Prev',
                    'next_text' => 'Next >',
                )); ?>
            </div>
        </div>
        <footer>
            <span>&copy; <?php bloginfo('name'); ?></span>
        </footer>
    </div>
    <!-- ClickHeat -->
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