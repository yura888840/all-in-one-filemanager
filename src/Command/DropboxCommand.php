<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use League\Flysystem\Filesystem;
use Spatie\Dropbox\Client;
use Spatie\FlysystemDropbox\DropboxAdapter;

class DropboxCommand extends Command
{
    protected static $defaultName = 'app:dropbox';

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if ($input->getOption('option1')) {
            // ...
        }

        $authorizationToken = 'uKdYzInAXpAAAAAAAAAAxM0bRAy7ryVB7EcJxYvP4y0gfxeB97XkNzoLF54iG37z';

        $client = new Client($authorizationToken);

        $adapter = new DropboxAdapter($client);

        $filesystem = new Filesystem($adapter, ['case_sensitive' => false]);

        $contents = $filesystem->listContents('test');

        var_dump($contents);

        //$file = $filesystem->createDir('test');

        //$filesystem->copy('Get Started with Dropbox.pdf', 'test/Get Started with Dropbox.pdf');

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');
    }
}
