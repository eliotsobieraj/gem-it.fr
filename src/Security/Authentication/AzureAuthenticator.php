<?php

namespace App\Security\Authentication;

use App\Entity\User;
use App\Repository\UserRepository;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use KnpU\OAuth2ClientBundle\Client\OAuth2ClientInterface;
use KnpU\OAuth2ClientBundle\Security\Authenticator\OAuth2Authenticator;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;
use Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface;

class AzureAuthenticator extends OAuth2Authenticator implements AuthenticationEntrypointInterface
{
    public function __construct(
        private readonly RouterInterface             $router,
        private readonly ClientRegistry              $clientRegistry,
        private readonly UserRepository              $userRepository
    )
    {
    }

    public function supports(Request $request): ?bool
    {
        return $request->attributes->get("_route") === "connect_azure_check";
    }

    private function getClient(): OAuth2ClientInterface
    {
        return $this->clientRegistry->getClient("azure");
    }

    public function authenticate(Request $request): Passport
    {
        $credential = $this->fetchAccessToken($this->getClient());
        $resourceOwner = $this->getClient()->fetchUserFromToken($credential)->toArray();

        $user = $this->userRepository->findOneBy([
            "email" => $resourceOwner["upn"]
        ]);

        if ($user === null) {
            $user = new User();
            $user->setFirstName($resourceOwner["given_name"]);
            $user->setLastName($resourceOwner["family_name"]);
            $user->setEmail($resourceOwner["upn"]);

            $this->userRepository->save($user, true);
        }

        return new SelfValidatingPassport(
            new UserBadge($user->getUserIdentifier(), fn() => $user)
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        return new RedirectResponse(
            $this->router->generate("app_home")
        );
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        $message = strtr($exception->getMessageKey(), $exception->getMessageData());

        return new Response($message, Response::HTTP_FORBIDDEN);
    }

    public function start(Request $request, AuthenticationException $authException = null): Response
    {
        return new RedirectResponse(
            "/connect/azure",
            Response::HTTP_TEMPORARY_REDIRECT
        );
    }
}