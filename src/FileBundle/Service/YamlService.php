<?php

namespace FileBundle\Service;

use Doctrine\ORM\EntityManager;
use FileBundle\Entity\Key;
use FileBundle\Entity\Value;
use UserBundle\Entity\User;
use Symfony\Component\Yaml\Yaml;

class YamlService {
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function yamlParser($path, $fileEntity)
    {
        $file_contents = Yaml::parseFile($path.'/'.$fileEntity->getFile());
//        dump($file_contents);
//        die();

        foreach ($file_contents['parameters'] as $file_key => $file_value)
        {
            if ($file_value != NULL)
            {
                $key = new Key();
                $value = new Value();
                $key->setFile($fileEntity);
                $value->setLanguage($fileEntity->getSourceLanguage());
                $key->setName($file_key);
                $key->addValue($value);
                $value->setKey($key);
                $value->setValue($file_value);
                $value->setUser($fileEntity->getUser());
                $this->em->persist($key);
                $this->em->persist($value);
            }
        }
        $this->em->flush();
    }
}