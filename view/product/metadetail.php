<meta name="title" content="<?= $view_data['model']['SeoTitle'] ?>" />
<meta name="description" content="<?= $view_data['model']['SeoDescription'] ?>" />
<meta name="keyword" content="<?= $view_data['model']['SeoKeyword'] ?>" />

<meta property="fb:app_id" content="<?= $_SESSION['InfoWeb']['OgFacebookId'] ?>" />
<meta property="og:url" content="<?= base_url ?>/<?= $view_data['model']['CategoryAlias'] ?>/<?= $view_data['model']['Alias'] ?>.html" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?= $view_data['model']['SeoTitle'] ?>" />
<meta property="og:description" content="<?= $view_data['model']['SeoDescription'] ?>" />
<meta property="og:site_name" content="<?= $_SESSION['InfoWeb']['OgSiteName'] ?>" />
<meta property="og:image" content="<?= base_url ?>/images/products/<?= $view_data['model']['Image'] ?>" />
