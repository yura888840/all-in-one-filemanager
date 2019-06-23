<?php

namespace App\Command;

use App\CredentialsProvider\CredentialsRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use League\Flysystem\Filesystem;
use App\CloudConnection\FilesystemFactory;

class DropboxWithProvidersCommand extends Command
{
    protected static $defaultName = 'app:dropbox:providers';

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

        $credentials = CredentialsRepository::getByIds(CredentialsRepository::DROPBOX, 123, 0);

        /** @var Filesystem $filesystem */
        $filesystem = FilesystemFactory::getFilesystem(CredentialsRepository::DROPBOX, $credentials);

        $contents = $filesystem->listContents('/');

        var_dump($contents);

        //$file = $filesystem->createDir('test');

        //$filesystem->copy('Get Started with Dropbox.pdf', 'test/Get Started with Dropbox.pdf');

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');
    }
}
