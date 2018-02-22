<?php

namespace FileBundle\Controller;

use FileBundle\Entity\File;
use FileBundle\Entity\Key;
use FileBundle\Entity\Value;
use FileBundle\Form\AddTrad;
use FileBundle\Form\FileType;
use UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Yaml;

class DefaultController extends Controller
{
    /**
     * @Route("/file/new")
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $fileEntity = new File();

        $form = $this->createForm(FileType::class, $fileEntity);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $fileEntity->getFile();

            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('files_directory'),
                $fileName
            );

            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $fileEntity->setFile($fileName);
            $fileEntity->setUser($this->getUser());
            $fileEntity->setSourceLanguage($form->get('sourceLanguage')->getData());
            $yaml_service = $this->container->get('file.yaml_service');
            $yaml_service->yamlParser($this->getParameter('files_directory'), $fileEntity);

            $em->persist($fileEntity);
            $em->flush();
        }

        return $this->render('FileBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }

    /**
     * @Route("/add/traduction")
     */
    public function addTradAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $fileEntity = new Value();

        $form = $this->createForm(AddTrad::class, $fileEntity);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

        }

        return $this->render('FileBundle:Default:addTrad.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/user/files")
     */
    public function UserFilesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $files = $this->getUser()->getFiles();

        return $this->render('FileBundle:Default:userFiles.html.twig', array('files' => $files));
    }


}
