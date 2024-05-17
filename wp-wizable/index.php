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
	$category = esc_html('サイトマップ');//
}

// ホームURLの取得
$home = esc_url(home_url('/'));

$author = get_the_author_meta('display_name') ?: 'HOJO Kita';

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $meta_title; ?></title>
    <meta name="description" content="<?php echo $meta_description; ?>">
    <?php wp_head(); ?>
	
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
	
</head>
<body <?php body_class(); ?>>
    <header>
		
        <nav class="row small">
			<label>PR</label>
            <a class="home" href="<?php echo $home; ?>"><?php bloginfo('name'); ?></a>						
            <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'privacy-policy' ) ) ); ?>">Privacy Policy</a>
            <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'terms-of-rule' ) ) ); ?>">Terms of Rule</a>
            <a class="contact" href="mailto:hojo.kita@gmail.com?subject=<?php echo urlencode(get_bloginfo('name') . 'へのお問い合わせ'); ?>&body=<?php echo urlencode('内容は端的にお願い致します'); ?>" target="_blank">Contact</a>
        </nav>
		
    </header>
    <main>
		<div class="title">			
	        <p class="category left"><?php echo $category; ?></p>
	        <h1 class="title center"><?php the_title(); ?></h1>
	        <p class="author right"><?php echo $author; ?></p>
		</div>
        <div class="content">
	        <?php the_content(); ?>			
		</div>

       <?php if (is_active_sidebar('main_widget')) : ?>
           <?php dynamic_sidebar('main_widget'); ?>
       <?php endif; ?>

    </main>
    <footer>
		<nav class="small right">
            <a class="home" href="<?php echo $home; ?>">一覧に戻る</a>			
		</nav>		
        <p class="copyright center small">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
