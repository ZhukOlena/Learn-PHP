<?php

namespace App\Controller\Blog;

use App\Entity\BlogComment;
use App\Repository\BlogCommentRepository;
use Symfony\Component\HttpFoundation\Request;

class CreateBlogCommentController
{
    /**
     * @var \PDO
     */
    private \PDO $pdo;

    /**
     * @param \PDO $pdo
     */
    public function __construct(BlogCommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }
    public function handleAction(Request $request): void
    {
        $comment = new BlogComment();
        $comment->setblogId($request->get('blog_id'));
        $comment->setTitle($request->get('title'));
        $comment->setMessage($request->get('message'));

        $this->commentRepository->save($comment);


        $redirectUrl = '/blogs/'.$request->get('blog_id');

        //Location: /blogs/6

        header('Location: '.$redirectUrl);

    }
}