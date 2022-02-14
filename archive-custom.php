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
    <link rel="stylesheet" href="./style.css">
    <?php get_header(); ?>
</head>

<body>
    <div class="wrapper">
        <header>
            <span>
                <?php bloginfo('name'); ?>
                <a href="<?php echo home_url() ?>"></a>
            </span>
        </header>
        <div class="loop">
            <?php
            //$argsのプロパティを変えていく
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 5,
                'no_found_rows' => false,  //ページャーを使う時はfalseに。
            );
            $the_query = new WP_Query($args);
            ?>
            <?php for ($i = 0; $i < $the_query->post_count; $i++) : ?>
                <?php $post_url = $the_query->posts[$i]->guid; ?>
                <div class="article">
                    <div class="thumbnail">
                        <img src="<?php echo get_the_post_thumbnail_url($the_query->posts[$i]); ?>" alt="">
                    </div>
                    <div class="title">
                        <h2><?php echo ($the_query->posts[$i]->post_title); ?></h2>
                    </div>
                    <a href="<?php echo $post_url ?>"></a>
                </div>
                <?php
                $pagination_args = array(
                    'mid_size' => 1,
                    'prev_text' => '&lt;&lt;前へ',
                    'next_text' => '次へ&gt;&gt;',
                    'screen_reader_text' => ' ',
                );
                the_posts_pagination($pagination_args);
                ?>
            <?php endfor; ?>
        </div>
        <footer>
            <span>&copy; <?php bloginfo('name'); ?></span>
        </footer>
    </div>
</body>

</html>