<?php

namespace App\Controller;

use App\Service\Blade\BladeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Routing\Attribute\Route;

final class AnswerController extends AbstractController {
    public function __construct( private BladeService $bladeService ) { }
    #[Route('/answer', name: 'app_answer_index', methods: ['GET'])]
    // #[IsGranted('ROLE_USER')]
    public function index(): Response {
        return new Response(
            $this->bladeService->render(
                'answers',
                ['title' => 'Respuestas - Home']
            )
        );
    }
}