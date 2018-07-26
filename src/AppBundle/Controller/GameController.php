<?php

namespace AppBundle\Controller;

use AppBundle\Services\Game;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GameController
 *
 * @Route("/game")
 */
class GameController extends AbstractController
{
    /**
     * @Route("/", name="game_homepage")
     */
    public function homeAction(SessionInterface $session, Game $game)
    {
        $game->start();

        return $this->render('game/start.html.twig', [
            'game' => $game,
        ]);
    }

    /**
     * @Route("/won", name="game_won")
     */
    public function wonAction()
    {
        return $this->render('game/success.html.twig');
    }

    /**
     * @Route("/hanged", name="game_failed")
     */
    public function hangedAction()
    {
        return $this->render('game/failure.html.twig');
    }

    /**
     * @Route("/clear", name="game_clear")
     */
    public function gameClearAction(Game $game)
    {
        $game->clear();

        return $this->redirectToRoute('game_homepage');
    }

    /**
     * @Route("/play/{letter}", requirements={"letter"="[A-Z]"}, name="game_play_letter")
     */
    public function playLetterAction($letter, Game $game)
    {
        $game->playLetter($letter);

        if ($game->isWon()) {
            $this->redirectToRoute('game_won');
        }

        return $this->redirectToRoute('game_homepage');
    }
}
