<?php

namespace App\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Scheb\TwoFactorBundle\Security\TwoFactor\Provider\Totp\TotpAuthenticatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Asset\Packages;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route(path: '/auth/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route(path: '/auth/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    // TODO implement 2fa later :-)
    #[IsGranted('IS_AUTHENTICATED_FULLY')]
    #[Route(path: '/enable2fa', name: 'app_login_enable2fa')]
    public function enable2FA(TotpAuthenticatorInterface $authenticator, EntityManagerInterface $manager): Response
    {
        /**
         * @var $user \App\Entity\User
         */
        $user = $this->getUser();
        if (!$user->isTotpAuthenticationEnabled()) {
            $user->setTotpSecret($authenticator->generateSecret());
            $manager->flush($user);
        }

        return $this->render('login/enable2fa.html.twig', []);
    }

    #[IsGranted('IS_AUTHENTICATED_FULLY')]
    #[Route(path: '/qr-code', name: 'app_qr_code')]
    public function displayGoogleAuthenticatorQRCode(TotpAuthenticatorInterface $authenticator, Packages $packages): Response
    {
        /**
         * @var $user \App\Entity\User
         */
        $user = $this->getUser();
        $writer = new PngWriter();

        $qrCodeContent = new QrCode($authenticator->getQRContent($user));
        $logo = null;
        $label = new Label(
            text: 'Label',
            textColor: new Color(255, 0, 0)
        );

        $result = $writer->write($qrCodeContent, $logo, $label);

        return new Response($result->getString(), 200, ['Content-Type' => 'image/png']);

    }
}
