<?php

namespace AppBundle\Services;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Game
{
    /**
     * @var SessionInterface
     */
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function playLetter(string $letter)
    {
        $playedLetters = $this->session->get('playedLetters') ?: [];
        $playedLetters[] = $letter;

        $this->session->set('playedLetters', $playedLetters);
    }
}
