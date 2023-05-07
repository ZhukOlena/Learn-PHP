<?php

namespace App;

use App\Controller\Faq\ListFaqController;
use App\Repository\BlogCommentRepository;
use App\Repository\BlogRepository;
use App\Repository\FaqRepository;
use App\Service\Calculator\Calculator;
use App\Service\Calculator\CalculatorCommandsRegistry;
use App\Service\Calculator\Command\AddCalculatorCommand;
use App\Service\Calculator\Command\DivCalculatorCommand;
use App\Service\Calculator\Command\PiCalculatorCommand;
use App\Service\Calculator\Command\SinCalculatorCommand;
use App\Service\Calculator\Command\SubCalculatorCommand;
use App\Service\Calculator\Validator\LeftAndRightExistenceValidator;
use App\Service\Calculator\Validator\LeftExistenceValidator;
use App\Service\Calculator\Validator\NoneExistenceValidator;
use Symfony\Component\HttpFoundation\Request;

include_once __DIR__.'/../config/bootstrap.php';

$request = Request::createFromGlobals();

$pdo = new \PDO('mysql:dbname=learn-php;host=learn-php-mysql', 'Olena', '123');
$blogRepository = new BlogRepository($pdo);
$blogCommentRepository = new BlogCommentRepository($pdo);
$faqRepository =  new FaqRepository($pdo);


if ($request->getRequestUri() === '/') {
    $controller = new \App\Controller\HomeController();
    $controller->handleAction();

    exit();
}

if (strpos($request->getRequestUri(), '/calculator') === 0) {
    $registry = new CalculatorCommandsRegistry();
    $registry->add('add', new AddCalculatorCommand(), new LeftAndRightExistenceValidator());
    $registry->add('sub', new SubCalculatorCommand(), new LeftAndRightExistenceValidator());
    $registry->add('div', new DivCalculatorCommand(), new LeftAndRightExistenceValidator());
    $registry->add('pi', new PiCalculatorCommand(), new NoneExistenceValidator());
    $registry->add('sin', new SinCalculatorCommand(), new LeftExistenceValidator());

    $calculator = new Calculator($registry);

    $controller = new \App\Controller\CalculatorController($calculator);
    $controller->handleAction();

    exit();
}

if (strpos($request->getRequestUri(), '/blogs') === 0) {
    if (\preg_match('#/blogs/(\d+)#', $request->getRequestUri(), $parts)) {
        $blogId = $parts[1];

        $controller = new \App\Controller\Blog\ViewBlogController($blogRepository, $blogCommentRepository);
        $controller->handleAction($blogId);

        exit();
    }

    if ($request->getRequestUri() === '/blogs/comments/new') {
        $controller = new \App\Controller\Blog\CreateBlogCommentController($blogCommentRepository);
        $controller->handleaction();

        exit();
    }

    $controller = new \App\Controller\Blog\ListBlogsController($blogRepository);
    $controller->handleAction();

    exit();
}

if (strpos($request->getRequestUri(), '/faq') === 0) {
    $controller = new ListFaqController($faqRepository);
    $controller->handleAction();

    exit();
}


print 'page not found';
exit();
