<?php

namespace App\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AzureController extends AbstractController
{
    #[Route("/connect/azure", name: "connect_azure_start")]
    public function connectAction(ClientRegistry $clientRegistry): Response
    {
        return $clientRegistry
            ->getClient("azure")
            ->redirect([
                "public_profile", "email"
            ]);
    }

    #[Route("/connect/azure/check", name: "connect_azure_check")]
    public function connectCheckAction(Request $request, ClientRegistry $clientRegistry)
    {

    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
