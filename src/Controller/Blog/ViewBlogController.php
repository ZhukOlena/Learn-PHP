<?php

namespace App\Controller\Blog;

use App\Repository\BlogCommentRepository;
use App\Repository\BlogRepository;

class ViewBlogController
{
    private BlogRepository $blogRepository;
    private BlogCommentRepository $commentRepository;

    public function __construct(BlogRepository $blogRepository, BlogCommentRepository $commentRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->commentRepository = $commentRepository;
    }

    public function handleAction($blogId)
    {
        $blog = $this->blogRepository->find($blogId);

        if (false === $blog) {
            print 'Blog not found';
            exit();
        }

        $comments = $this->commentRepository->findByBlog($blogId);

        include __DIR__.'/../../Resources/views/blog/view.php';
    }
}
