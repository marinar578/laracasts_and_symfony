<?php namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class NewCommand extends Command{

	public function configure()
	{
		$this->setName('new')
			->setDescription('Create a new Laravel application.')
			->addArgument('name', InputArgument::REQUIRED);
	}

	public function execute(InputInterface $input, OutputInterface $output)
	{
		// assert that the folder doesn't already exist

		// download nightly version of Laravel

		// extract zip file

		// alert the user that they're ready to go
	}
}