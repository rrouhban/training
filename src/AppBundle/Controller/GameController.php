<?php


namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GameController
 *
 * @Route("/game")
 */
class GameController extends AbstractController
{
    /**
     * @Route("", name="game_homepage")
     */
    public function homeAction()
    {
        $game = [
            'word' => 'BURGER',
            'playedLetters' => ['E', 'U'],
        ];

        return $this->render('game/home.html.twig', [
            'game' => $game,
        ]);
    }

    /**
     * @Route("/won", name="game_won")
     */
    public function wonAction()
    {
        return $this->render('game/won.html.twig');
    }

    /**
     * @Route("/hanged", name="game_failed")
     */
    public function hangedAction()
    {
        return $this->render('game/hanged.html.twig');
    }

    /**
     * @Route("/play/{letter}", requirements={"letter"="[A-Z]"}, name="game_play_letter")
     */
    public function playLetterAction($letter)
    {
        return $this->redirectToRoute('game_homepage');
    }
}
