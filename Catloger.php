<?php

namespace Meduza\Plugin;

use Meduza\Build\Build;

class Catloger extends PluginBase
{
    public function __construct(Build $build)
    {
        parent::__construct($build);
    }

    public function run(): void
    {
        $config = $this->build->config()->getConfig();
        $content = $this->build->getContent();
        $catalog = [];

        foreach($content->getIterator() as $contentKey => $contentItem){
            $frontmatter = $contentItem->frontmatter()->getFrontmatter();
            foreach($frontmatter as $search => $values){
                // echo $contentItem->getSource(), PHP_EOL;
                // echo $search, ' -> ', PHP_EOL;
                // print_r($config['plugins']['Catloger']['catalog']);

                if(key_exists($search, $config['plugins']['Catloger']['catalog'])){
                    if(!is_array($values)){
                        $values = [$values];
                    }
                    foreach($values as $index){
                        $catalog['catalog'][$config['plugins']['Catloger']['catalog'][$search]][$index][] = [
                            'frontmatter' => $contentItem->frontmatter()->getFrontmatter(),
                            'markdown' => $contentItem->getMarkdown(),
                            'object' => $contentItem
                        ];
                    }
                }
            }
        }
        // print_r($catalog);exit();
        $this->build->setPluginData('catloger', $catalog);
    }
}