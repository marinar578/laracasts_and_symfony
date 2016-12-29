<?php namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use GuzzleHttp\ClientInterface;
use ZipArchive;

class NewCommand extends Command{

	protected $client;

	public function __construct(ClientInterface $client) {
		$this->client = $client;

		parent::__construct();
	}

	public function configure()
	{
		$this->setName('new')
			->setDescription('Create a new Laravel application.')
			->addArgument('name', InputArgument::REQUIRED);
	}

	public function execute(InputInterface $input, OutputInterface $output)
	{
		$directory = getcwd() . '/' . $input->getArgument('name');

		$this->assertApplicationDoesNotExist($directory, $output);

		// download nightly version of Laravel
		$this->download($zipFile = $this->makeFileName())
			->extract($zipFile, $directory);

		$output->writeln('<comment>Application Ready!</comment>');
	}

	private function assertApplicationDoesNotExist($directory, OutputInterface $output)
	{
		if (is_dir($directory))
		{
			$output->writeln('<error>Application already exists</error>');

			exit(1);
		}
	}

	private function makeFileName()
	{
		return getcwd() . '/laravel_' . md5(time().uniqid()) . '.zip';
	}

	private function download($zipFile)
	{
		$response = $this->client->get('http://cabinet.laravel.com/latest.zip')->getBody();

		file_put_contents($zipFile, $response);

		return $this;
	}

	private function extract($zipFile, $directory)
	{
		$archive = new ZipArchive;

		$archive->open($zipFile);
		$archive->extractTo($directory);
		$archive->close();

		return $this;
	}
}