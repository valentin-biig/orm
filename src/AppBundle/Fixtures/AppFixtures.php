<?php

namespace AppBundle\Fixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;
use Symfony\Component\Finder\Finder;

/**
 * Class AppFixtures
 */
class AppFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getAliceFiles() as $file) {
            printf("  > %s\n", $file->getRelativePathname());

            Fixtures::load($file, $manager);
        }
    }

    /**
     * @return Finder
     */
    private function getAliceFiles()
    {
        return Finder::create()->files()
            ->name('*.yml')
            ->depth(0)
            ->sortByName()
            ->in(realpath(sprintf('%s/../../../app/Resources/fixtures', __DIR__)));
    }
}