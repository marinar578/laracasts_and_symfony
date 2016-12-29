<?php namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SayHelloCommand extends Command{

	public function configure()
	{
		$this->setName('sayHelloTo')
			->setDescription('Offer a greeting to the user.')
			->addArgument('name', InputArgument::REQUIRED, 'Your name');
	}

	public function execute(InputInterface $input, OutputInterface $output)
	{
		$message = 'Hello, ' . $input->getArgument('name');

		$output->writeln("<comment>$message</comment>");
	}
}