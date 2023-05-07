<?php

namespace App\Controller\Faq;

use App\Repository\FaqRepository;

class ListFaqController
{
    private FaqRepository $faqRepository;

    public function __construct(FaqRepository $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }

    public function handleAction()
    {
        $elements = $this->faqRepository->findAll();

        include __DIR__.'/../../Resources/views/faq/list.php';
    }
}