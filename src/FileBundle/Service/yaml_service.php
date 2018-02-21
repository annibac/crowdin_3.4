<?php

namespace FileBundle\YamlService;

use Doctrine\ORM\EntityManager;
use FileBundle\Entity\Key;
use FileBundle\Entity\Value;
use Symfony\Component\Yaml\Yaml;

class YamlService {
    private $em;

    private function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    private function yamlParser($fileEntity)
    {
        $file_contents = Yaml::parseFile(file_get_contents('/path/to/file.yaml'));

        foreach ($file_contents as $file_key => $file_value)
        {
            $key = new Key();
            $value = new Value();
            $key->setFile($fileEntity);
            $value->setKey($file_key);
            $value->setLanguage($fileEntity->getSourceLanguage());
            $key->setValues($value->$value);
            $this->em->persist($key);
            $this->em->persist($value);
        }
        $this->em->flush();
    }
}