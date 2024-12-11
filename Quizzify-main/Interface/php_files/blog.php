<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzify Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .container {
            margin-top: 20px;
            width: 75%;
        }

        .title {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .single-news {
            background-color: #ddd;
            padding: 30px;
            margin-bottom: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="title text-center">Quizzify Blog</h1>
    <hr>
    <div class="list-wrapper">
        <?php
        if (file_exists('news.json')) {
            $api_url = 'news.json';
            $newslist = json_decode(file_get_contents($api_url));
        } else {
            $news_keyword = 'technology'; // Change this keyword if needed
            $api_url = '
            https://newsapi.org/v2/everything?q=tesla&from=2023-08-06&sortBy=publishedAt&apiKey=ff2e28126f234c9b843509f5d286a1ce' . $news_keyword . '&from=2020-02-26&sortBy=publishedAt&apiKey=e935ddb73b0147458f29105d83c0c535';
            $newslist = file_get_contents($api_url);
            file_put_contents('news.json', $newslist);
            $newslist = json_decode($newslist);
        }

        if ($newslist && property_exists($newslist, 'articles')) {
            foreach ($newslist->articles as $news) {
                ?>
                <div class="row single-news">
                    <div class="col-4">
                        <img style="width: 100%;" src="<?php echo $news->urlToImage; ?>">
                    </div>
                    <div class="col-8">
                        <h2><?php echo $news->title; ?></h2>
                        <small><?php echo $news->source->name; ?></small>
                        <?php if ($news->author && $news->author != '') { ?>
                            <small> | <?php echo $news->author; ?></small>
                        <?php } ?>
                        <p><?php echo $news->description; ?></p>
                        <a href="<?php echo $news->url; ?>" class="btn btn-sm btn-primary" style="float: right;"
                           target="_blank">Read More >></a>
                    </div>
                </div>
            <?php }
        } else {
            echo "<p>No news articles found.</p>";
        }
        ?>
    </div>
</div>
</body>
</html>
