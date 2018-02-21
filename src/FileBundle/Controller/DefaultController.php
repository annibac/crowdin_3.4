<?php

namespace FileBundle\Controller;

use FileBundle\Entity\File;
use FileBundle\Entity\Key;
use FileBundle\Entity\Value;
use FileBundle\Form\FileType;
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
            // $file stores the uploaded PDF file
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
            $yaml_service = $this->container->get('app.yaml_service');
            $yaml_service->yamlParser($fileEntity);
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

}
