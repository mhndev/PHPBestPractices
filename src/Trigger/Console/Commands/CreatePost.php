<?php
namespace mhndev\bestPractice\Trigger\Console\Commands;

use mhndev\bestPractice\App\Action\Post\ActionCreatePost;
use mhndev\bestPractice\App\Entity\EntityPost;
use mhndev\bestPractice\App\Entity\EntityUser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CreatePost
 * @package mhndev\bestPractice\Trigger\Console\Commands
 */
class CreatePost extends Command
{

    /**
     * @var ActionCreatePost
     */
    protected $createPostAction;

    /**
     * @return ActionCreatePost
     */
    public function getCreatePostAction(): ActionCreatePost
    {
        return $this->createPostAction;
    }

    /**
     * @param ActionCreatePost $createPostAction
     * @return self
     */
    public function setCreatePostAction(ActionCreatePost $createPostAction): self
    {
        $this->createPostAction = $createPostAction;

        return $this;
    }

    /**
     * command configuration
     */
    protected function configure()
    {
        $this->setName('app:create-post')
            ->setDescription('Creates a new post.')
            ->setHelp('This command allows you to create a post...')
            ->addOption('title',null, InputOption::VALUE_REQUIRED, 'The post title.')
            ->addOption('body', null,InputOption::VALUE_REQUIRED, 'The post body')
            ->addOption('user_id', null,InputOption::VALUE_REQUIRED, 'The post owner user identifier');
    }

    /**
     * Execute console command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Post Creating',
            '============',
        ]);

        $post = new EntityPost;
        $user = new EntityUser;
        $user->setIdentifier($input->getOption('user_id'));

        $post->setTitle($input->getOption('title'));
        $post->setBody($input->getOption('body'));
        $post->setUser($user);

        $this->createPostAction->__invoke($post);

        $output->write('post created.');
    }

}
