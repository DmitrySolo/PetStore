<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Domain\Publisher;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, ValidatorInterface $validator)
    {

        $v = new Publisher('EA Sports Canada');
        $this->getDoctrine()->getManager()->persist($v);
        $validator->validate($v);
        $this->getDoctrine()->getManager()->flush();

        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
