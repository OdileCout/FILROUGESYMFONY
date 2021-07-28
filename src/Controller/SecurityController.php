<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use App\Form\UserType;
use App\Form\UserUpdateType;
use App\Repository\UserRepository;

class SecurityController extends AbstractController
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
     * @Route("/register", name="register")
     */
    public function register(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            //Hacher le mot de passe
            $user->setPassword($this->passwordEncoder->encodePassword($user,$user->getPassword()));
            //Modifier la date d'inscription
            $user->setDate(new \Datetime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            //Message de login
            $this->addFlash("message", "message de succès !");
            return $this->redirectToRoute("app_login"); 
        }
        return $this->render('security/register.html.twig', [
            'formulaire' => $form->createView(),
        ]);
    }

    /**
     * @Route("/profil", name="profil")
     */
    public function profil(Request $request)
    {
        return $this->render('security/profil.html.twig');
    }

    /**
     * @Route("/parametre", name="parametre")
     */
    public function parametre(Request $request)
    { 
        //Je récupere l'id de l'utilisateur connecté
        $userId = $this->getUser();
        $id = $userId->getId();
        //J'appelle entity manager
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->find($id);
        //J'appele le formulaire
        $form = $this->createForm(UserUpdateType::class, $user);
        $form->handleRequest($request);
        //Quand le bouton est submit
        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($this->passwordEncoder->encodePassword($user,$user->getPassword()));
            $em->flush();
            //Message de modif
            $this->addFlash("message", "modification de profil réussie !");
            return $this->redirectToRoute("profil"); 
        }
        return $this->render('security/parametre.html.twig', [
            'formulaire' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}" , name="delete", methods={"DELETE"})
     */
    public function deleteAction(User $id):Response {
        $em = $this->getDoctrine()->getManager();
        $em->remove($id);
        $em->flush();
       // return $this->redirectToRoute("app_login");
       return $this->json(['res'=>'Ok']) ;
    }
}
