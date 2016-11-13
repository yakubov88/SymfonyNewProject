<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\TableDatabase;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bridge\Doctrine;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em=$this->getDoctrine()->getManager();
        $data=$em->getRepository('AdminBundle:TableDatabase')->findAll();

        $repo = $this ->getDoctrine()
            ->getManager()
            ->getRepository('AdminBundle:TableDatabase');

        $qb = $repo->createQueryBuilder('t')
                    ->select('COUNT(t)');

        $count = $qb->getQuery()->getSingleScalarResult();

        return $this->render('AdminBundle:Default:index.html.twig',array('data'=>$data,'count'=>$count));
    }
    public function getDoctrineValueAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $title=$request->request->get('title');
        $description=$request->request->get('description');
        $pacient=$request->request->get('pacient');
        $info=$request->request->get('info');
        $entity= new TableDatabase();
        $entity->setTitle($title);
        $entity->setDescription($description);
        $entity->setPacient($pacient);
        $entity->setInfo($info);

        $em->persist($entity);
        $em->flush();

        $this->get('session')->getFlashBag()->add('info', "get data.");
        return $this->redirect($this->generateUrl('admin'));

    }
    public  function  getFormAction ()
    {
        return $this->render('AdminBundle:Default:get.html.twig');
    }

    public function updateAction ($id)
    {
        $em=$this->getDoctrine()->getManager();
        $user=$em->getRepository('AdminBundle:TableDatabase')->findOneBy(array('id'=>$id));


        return $this->render('AdminBundle:Default:update.html.twig',array('user'=>$user));

    }

    public function updatenewAction (Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $title=$request->request->get('title');
        $description=$request->request->get('description');
        $pacient=$request->request->get('pacient');
        $info=$request->request->get('info');
        $id = $request->request->get('id');

        $entity= $em->getRepository('AdminBundle:TableDatabase')->findOneBy(array('id'=>$id));
        $entity->setTitle($title);
        $entity->setDescription($description);
        $entity->setPacient($pacient);
        $entity->setInfo($info);

        $em->flush();

        $this->get('session')->getFlashBag()->add('info', "update data");

        return $this->redirect($this->generateUrl('admin'));

    }

    public function deleteAction ($id)
    {
        try
            {
                $em = $this->getDoctrine()->getManager();
                $entity= $em->getRepository('AdminBundle:TableDatabase')->findOneBy(array('id'=>$id));

                $em->remove($entity);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', "delete data");

                return $this->redirect($this->generateUrl('admin'));
            }
        catch (EntityNotFoundExceptionxception $ex )
            {
                $ex->getMessage();
            }

    }

    public  function  bootstrapAction ()
    {
        return $this->render('AdminBundle:Default:bootstrap.html.twig');
    }

    public  function  modalAction ()
    {
        return $this->render('AdminBundle:Default:modal.html.twig');
    }
}
