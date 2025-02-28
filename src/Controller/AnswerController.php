<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class AnswerController extends AbstractController
{
    #[Route('/answer', name: 'app_answer_index', methods: ['GET'])]
    #[IsGranted('ROLE_USER')]
    public function index(): JsonResponse {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/AnswerController.php',
        ]);
    }
}