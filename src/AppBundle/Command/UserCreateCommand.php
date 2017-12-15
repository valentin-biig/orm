<?php

namespace AppBundle\Command;

use AppBundle\Entity\Post;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class UserCreateCommand
 */
class UserCreateCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('app:user-create')
            ->setDescription('Hello PhpStorm');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();

        $user = new User();
        $user->setName('El amigo');

        $post = new Post();
        $post->setLabel('coucou');

        $post2 = new Post();
        $post2->setLabel('lol');

        $user->addPost($post);
        $user->addPost($post2);

        $em->persist($user);
        $em->flush();
    }
}
