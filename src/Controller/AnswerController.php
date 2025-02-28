<?php

namespace App\Controller;

use App\Service\Blade\BladeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Routing\Attribute\Route;

final class AnswerController extends AbstractController {
    #[Route('/answer', name: 'app_answer_index', methods: ['GET'])]
    // #[IsGranted('ROLE_USER')]
    public function index(BladeService $bladeService): Response {
        return new Response(
            $bladeService->render(
                'answers.index',
                ['title' => 'Respuestas - Home']
            )
        );
    }
}