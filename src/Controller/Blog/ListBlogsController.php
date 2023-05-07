<?php

namespace App\Controller\Blog;

use App\Repository\BlogRepository;

class ListBlogsController
{
    private BlogRepository $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function handleAction ()
    {
        $blogs = $this->blogRepository->findAll();

        include_once __DIR__.'/../../Resources/views/blog/list.php';
    }
}