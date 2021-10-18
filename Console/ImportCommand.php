<?php

namespace Awm\CustomerImport\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Awm\CustomerImport\Model\Files;
use Awm\CustomerImport\Model\Customers\Import;

class ImportCommand extends Command
{
    public const NAME = 'name';

    public const PATH = 'path';

    /**
     * @var Files
     */
    protected $files;

    /**
     * @var Import
     */
    protected $customersImport;


    public function __construct(
        Files $files,
        Import $customerImport,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->files = $files;
        $this->customersImport = $customerImport;
    }

    /**
     * Responsible to run the console command
     */
    protected function configure()
    {
        $options=[
            new InputArgument(self::NAME, InputArgument::REQUIRED, "Profile Name"),
            new InputArgument(self::PATH, InputArgument::REQUIRED, "File's Path"),
        ];

        $this->setName('customer:import')
            ->setDescription('Customer import command line')
            ->setDefinition($options);

        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return $this|int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $data = $this->files->readFile(
            $input->getArgument(self::PATH),
            $input->getArgument(self::NAME)
        );
        $this->customersImport->import($data);

        $output->writeln('done');
        return $this;
    }

}
