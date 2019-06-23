<?php

namespace App\Command;

use League\Flysystem\FilesystemInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class GoogleDriveCommand extends Command
{
    protected static $defaultName = 'app:google-drive';

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

        $client = $this->getClient();

        $service = new \Google_Service_Drive($client);

        $optParams = array(
            'pageSize' => 10,
            'fields' => 'nextPageToken, files(id, name)'
        );
        $results = $service->files->listFiles($optParams);

        if (count($results->getFiles()) == 0) {
            print "No files found.\n";
        } else {
            print "Files:\n";
            foreach ($results->getFiles() as $file) {
                printf("%s (%s)\n", $file->getName(), $file->getId());
            }
        }

        $file = new \Google_Service_Drive_DriveFile();
        $file->setName('testtt');
        $file->setFileExtension('csv');
        

        $service->files->create($file,[
            //'data' => '12;23;435',
            //'mimeType' => 'application/octet-stream',
            //'uploadType' => 'media'
        ]);

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');
    }

    private function getClient()
    {
        $config = [
            'client_id' => '533870232482-9khvkh4k98hpp8542sij5si40s6g8pnh.apps.googleusercontent.com',
            'client_secret' => 'Z5BxEDAE10B7ydW5Ub6tmSkz',
            'redirect_uris' => [
                'urn:ietf:wg:oauth:2.0:oob',
                'http://localhost'
            ]
        ];

        $client = new \Google_Client();
        $client->setApplicationName('Google Drive API PHP Quickstart');
        $client->setScopes(\Google_Service_Drive::DRIVE);
        //$client->setAuthConfig('credentials.json');
        $client->setAccessType('online');
        $client->setPrompt('select_account consent');

        $client->setClientId($config['client_id']);
        $client->setClientSecret($config['client_secret']);
        if (isset($config['redirect_uris'])) {
            $client->setRedirectUri($config['redirect_uris'][0]);
        }


        // Load previously authorized token from a file, if it exists.
        // The file token.json stores the user's access and refresh tokens, and is
        // created automatically when the authorization flow completes for the first
        // time.
        $tokenPath = 'token.json';
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $client->setAccessToken($accessToken);
        }
        //$token = $client->fetchAccessTokenWithAuthCode('4/agFzosIvgATS9cR0XCgkp8jV39oy85owF1tIAn6z_fgqOrUxQxh2C5o');
        //$client->setAccessToken($token);

        // If there is no previous token or it's expired.
        if ($client->isAccessTokenExpired()) {
            // Refresh the token if possible, else fetch a new one.

            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            } else {
                // Request authorization from the user.
                $authUrl = $client->createAuthUrl();
                //var_dump(file_get_contents($authUrl));
                //var_dump($client->createAuthUrl());die();
                printf("Open the following link in your browser:\n%s\n", $authUrl);
                print 'Enter verification code: ';
                $authCode = trim(fgets(STDIN));

                // Exchange authorization code for an access token.
                $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                $client->setAccessToken($accessToken);

                // Check to see if there was an error.
                if (array_key_exists('error', $accessToken)) {
                    throw new Exception(join(', ', $accessToken));
                }
            }
            // Save the token to a file.
            if (!file_exists(dirname($tokenPath))) {
                mkdir(dirname($tokenPath), 0700, true);
            }
            file_put_contents($tokenPath, json_encode($client->getAccessToken()));
        }
        return $client;
    }

}
