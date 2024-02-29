<?php 

// https://stackoverflow.com/questions/6718598/download-the-contents-of-a-url-in-php-even-if-it-returns-a-404
echo file_get_contents(
    'https://new.uservideo.xyz/wp-sitemap-posts-file-51.xml',
    false,
    stream_context_create([
        'http' => [
            'ignore_errors' => true,
        ],
    ])
);
