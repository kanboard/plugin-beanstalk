<?php

namespace Kanboard\Plugin\Beanstalk;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;
use Pheanstalk\Pheanstalk;
use SimpleQueue\Adapter\BeanstalkQueueAdapter;
use SimpleQueue\Queue;

require_once __DIR__.'/vendor/autoload.php';

defined('QUEUE_NAME') or define('QUEUE_NAME', 'kanboard');
defined('BEANSTALKD_HOSTNAME') or define('BEANSTALKD_HOSTNAME', '127.0.0.1');

class Plugin extends Base
{
    public function initialize()
    {
        $queue = new Queue(new BeanstalkQueueAdapter(new Pheanstalk(BEANSTALKD_HOSTNAME), QUEUE_NAME));
        $this->queueManager->setQueue($queue);
    }

    public function onStartup()
    {
        Translator::load($this->language->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getPluginName()
    {
        return 'Beanstalk';
    }

    public function getPluginDescription()
    {
        return t('Use Beanstalk to process background jobs');
    }

    public function getPluginAuthor()
    {
        return 'Frédéric Guillot';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/kanboard/plugin-beanstalk';
    }
}
