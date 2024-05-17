<?php
// メタタイトルの設定
if (is_front_page()) {
    $meta_title = get_bloginfo('name');
    $meta_description = get_bloginfo('description');
} else {
    $meta_title = esc_html(get_the_title() . ' - ' . get_bloginfo('name'));
    $meta_description = wp_trim_words(strip_tags(get_the_content()), 120, ' ');
}

// カテゴリーの取得
$category = get_the_category();
if (!empty($category)) {
    $category = esc_html($category[0]->name);
} else {
    $category = '';
}

// ホームURLの取得
$home = esc_url(home_url('/'));
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $meta_title; ?></title>
    <meta name="description" content="<?php echo $meta_description; ?>">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <nav>
            <a class="home" href="<?php echo $home; ?>"><?php bloginfo('name'); ?></a>
            <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'privacy-policy' ) ) ); ?>">Privacy Policy</a>
            <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'terms-of-rule' ) ) ); ?>">Terms of Rule</a>
            <a class="contact" href="mailto:hojo.kita@gmail.com?subject=<?php echo urlencode(get_bloginfo('name') . 'へのお問い合わせ'); ?>&body=<?php echo urlencode('内容は端的にお願い致します'); ?>">Contact</a>
        </nav>
    </header>
    <main>
        <p class="category"><?php echo $category; ?></p>
        <h1 class="title"><?php the_title(); ?></h1>
        <p class="author"><?php the_author(); ?></p>

        <?php the_content('.content'); ?>

       <?php if (is_active_sidebar('main_widget')) : ?>
           <?php dynamic_sidebar('main_widget'); ?>
       <?php endif; ?>

    </main>
    <footer>
        <p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
