<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class UserDeleteCommand
 */
class UserDeleteCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('app:user-delete')
            ->setDescription('Hello PhpStorm')
            ->setDefinition([
                new InputArgument('id', InputArgument::REQUIRED, 'The user id'),
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
        $userRepository = $em->getRepository('AppBundle:User');

        $id   = $input->getArgument('id');
        $user = $userRepository->find($id);

        $em->remove($user);
        $em->flush();
    }
}
