<?php namespace Acme;

use Acme\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AddCommand extends Command{

	public function configure()
	{
		$this->setName('add')
			->setDescription('Show all tasks.');
	}

	public function execute(InputInterface $input, OutputInterface $output)
	{
		
	}

}