<?php
namespace Vnext\Training\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Vnext\Training\Model\StudentFactory;

class ToSlug extends Command
{

    /**
     * @inheritDoc
     */
    protected function configure()
    {
        $this->setName('toslug:command');
        $this->setDescription('This is my console command.');

        parent::configure();
    }


    protected $studentFactory;

    public function __construct( StudentFactory $studentFactory)
    {
        parent::__construct('toslug:command');
        $this->studentFactory = $studentFactory;
    }

    public static function toSlug($str, $delimiter = '-'){

        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;

    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return null|int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $post = $this->studentFactory->create();
        $students = $this->studentFactory->create()->getCollection();
        foreach($students as $student){
            $string = $student['name'] . '-' . $student['entity_id'];
            $slug = $this->toSlug($string);
            $postUpdate = $post->load($student['entity_id']);
            $postUpdate->setSlug($slug);
            $postUpdate->save();
        }
        $output->writeln('<info>Success change to slug.</info>');
    }
}
