<?php

namespace AppBundle\Services;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Game
{
    const WORD = 'BURGER';

    /** @var SessionInterface */
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function start(): void
    {
        if ($this->session->has('word')) {
            return;
        }

        $this->session->set('word', self::WORD);
    }

    public function getWord(): string
    {
        return $this->session->get('word');
    }

    public function getPlayedLetters(): array
    {
        return $this->session->get('playedLetters') ?: [];
    }

    public function isWon(): bool{
        $playedLetters = $this->getPlayedLetters();

        $word = $this->getWord();
        $wordLetters = str_split($word);

        $foundLetters = [];
        foreach ($playedLetters as $playedLetter) {
            if (in_array($playedLetter, $wordLetters))
            {
                $foundLetters[] = $playedLetter;
            }
        }

        $diff = array_diff($wordLetters, $foundLetters);
        return 0 === count($diff);
    }

    public function clear()
    {
        $this->session->remove('playedLetters');
    }

    public function playLetter(string $letter): void
    {
        $playedLetters = $this->getPlayedLetters();
        $playedLetters[] = $letter;

        $this->session->set('playedLetters', $playedLetters);
    }
}
