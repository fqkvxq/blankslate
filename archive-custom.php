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
                takuyakawai.com
                <a href="./loop.html"></a>
            </span>
        </header>
        <div class="loop">
            <?php
            //$argsのプロパティを変えていく
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 10,
                'no_found_rows' => false,  //ページャーを使う時はfalseに。
            );
            $the_query = new WP_Query($args);
            ?>
            <pre>
                <?php var_dump($the_query->post_count) ?>
                <?php var_dump($the_query->posts[0]->post_title); ?>
                <?php var_dump($the_query->posts[0]->guid); ?>
            </pre>
            <?php for ($i = 0; $i < $the_query->post_count; $i++) : ?>
                <?php $post_url = $the_query->posts[$i]->guid;?>
                <div class="article">
                    <div class="thumbnail">
                        <img src="https://via.placeholder.com/1200x630" alt="">
                    </div>
                    <div class="title">
                        <h2><?php echo($the_query->posts[$i]->post_title); ?></h2>
                    </div>
                    <a href="<?php echo $post_url ?>"></a>
                </div>
            <?php endfor; ?>
            <div class="article">
                <div class="thumbnail">
                    <img src="https://via.placeholder.com/1200x630" alt="">
                </div>
                <div class="title">
                    <h2>Uber Eats(ウーバーイーツ)のクーポンの使い方</h2>
                </div>
            </div>
            <div class="article">
                <div class="thumbnail">
                    <img src="https://via.placeholder.com/1200x630" alt="">
                </div>
                <div class="title">
                    <h2>Uber Eats(ウーバーイーツ)のクーポンの使い方</h2>
                </div>
            </div>
            <div class="article">
                <div class="thumbnail">
                    <img src="https://via.placeholder.com/1200x630" alt="">
                </div>
                <div class="title">
                    <h2>Uber Eats(ウーバーイーツ)のクーポンの使い方</h2>
                </div>
            </div>
            <div class="article">
                <div class="thumbnail">
                    <img src="https://via.placeholder.com/1200x630" alt="">
                </div>
                <div class="title">
                    <h2>Uber Eats(ウーバーイーツ)のクーポンの使い方</h2>
                </div>
            </div>
        </div>
        <footer>
            <span>&copy; takuyakawai.com</span>
        </footer>
    </div>
</body>

</html>