<?php

namespace App\Controller;

use App\Entity\Record;
use App\Form\RecordType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RecordController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request)
    {
        $record = new Record();

        $form = $this->createForm(RecordType::class, $record);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $record = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($record);
            $em->flush();

            $this->redirectToRoute('index');
        }

        $records = $this->getDoctrine()->getManager()->getRepository(Record::class)->findAll();

        // replace this line with your own code!
        return $this->render('index.html.twig', ['records' => $records, 'form' => $form->createView()]);
    }
}
