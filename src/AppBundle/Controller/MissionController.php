<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Mission;
use AppBundle\Form\MissionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations,
    FOS\RestBundle\Controller\Annotations\NoRoute,
    FOS\RestBundle\Controller\Annotations\Get,
    FOS\RestBundle\Controller\Annotations\Delete,
    FOS\RestBundle\Controller\Annotations\Put,
    FOS\RestBundle\Controller\Annotations\Post;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;

/**
 * Mission controller.
 *
 */
class MissionController extends Controller
{
    
    

    /**
     * @GET("/new")
     * @ApiDoc(
     *  output="AppBundle\Entity\Mission",
     *  resource=true,
     *  description="Renvoie la liste des chaffeurs/vehicules/destinatires/remettants pour la création d'une mission",
     *  requirements={
     *      {
     *          "name"="access_token",
     *          "dataType"="string",
     *          "requirement"="\s+",
     *          "description"="token authentication api"
     *      }
     *  },
     *  statusCodes={
     *         200="Returned when successful",
     *         401="Returned when unauthorized",
     *         400="Returned when error form or user exist"
     *  }
     * )
     */
    public function newMissionAction(Request $request)
    {
        $client = $this->getUser()->getClient();

        $em = $this->getDoctrine()->getManager();

        if(!$client)
            return new Response('NOPE', Response::HTTP_UNAUTHORIZED);

        $chauffeurs = $em->getRepository('AppBundle:Chauffeur')->findByClient($client);
        $vehicules = $em->getRepository('AppBundle:Vehicule')->findByClient($client);
        $destinataires = $em->getRepository('AppBundle:Destinataire')->findAll();
        $remettants = $em->getRepository('AppBundle:Remettant')->findAll();
        $states = $em->getRepository('AppBundle:State')->findAll();

        $serializer = $this->get('serializer');
        $json = $serializer->serialize(
            array('chauffeurs' => $chauffeurs, 'vehicules' => $vehicules, 'destinataires' => $destinataires, 'remettants' => $remettants, 'states' => $states),
            'json', 
            SerializationContext::create()->setGroups(array('select'))
        );
        return new Response($json, Response::HTTP_OK);
    }    

    /**
     * @POST("/new")
     * @ApiDoc(
     *  output="integer",
     *  resource=true,
     *  description="Création d'une mission",
     *  requirements={
     *      {
     *          "name"="access_token",
     *          "dataType"="string",
     *          "requirement"="\s+",
     *          "description"="token authentication api"
     *      }
     *  },
     *  input="AppBundle\Form\MissionType",
     *  statusCodes={
     *         200="Returned when successful",
     *         401="Returned when unauthorized",
     *         400="Returned when error form or user exist"
     *  }
     * )
     */
    public function postMissionAction(Request $request)
    {
        $client = $this->getUser()->getClient();

        $em = $this->getDoctrine()->getManager();

        if(!$client)
            return new Response('NOPE', Response::HTTP_UNAUTHORIZED);

        $mission = new Mission();
        $form = $this->createForm(MissionType::class, $mission);
        $form->submit($request->request->get($form->getName()), false);

        if($form->isValid()){
            $mission->setClient($client);
            $em->persist($mission);
            $em->flush();   
            
            return new Response($mission->getId(), Response::HTTP_OK);
        }

        $serializer = $this->get('serializer');
        $json = $serializer->serialize(
            array('errors' => $form->getErrors(), 'mission' => $mission),
            'json', 
            SerializationContext::create()->setGroups(array('max_mission'))
        );
        return new Response($json, Response::HTTP_BAD_REQUEST);
    }

    /**
     * @GET("/")
     * @ApiDoc(
     *  output="array<AppBundle\Entity\Mission> as missions",
     *  resource=true,
     *  description="Retourne la liste des missions",
     *  requirements={
     *      {
     *          "name"="access_token",
     *          "dataType"="string",
     *          "requirement"="\s+",
     *          "description"="token authentication api"
     *      }
     *  },
     *  statusCodes={
     *         200="Returned when successful",
     *         401="Returned when unauthorized",
     *         400="Returned when error form or user exist"
     *  }
     * )
     */
    public function getAllMissionAction(Request $request)
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();

        if($user->getClient())
            $missions['missions'] = $em->getRepository('AppBundle:Mission')->findByClient($user->getClient());
        else
            $missions['missions'] = $em->getRepository('AppBundle:Mission')->getAllMissionsByChauffeur($user->getChauffeur());

        $serializer = $this->get('serializer');
        $json = $serializer->serialize($missions, 'json', SerializationContext::create()->setGroups(array('min_mission')));
        return new Response($json, Response::HTTP_OK);

    }
    

    /**
     * @GET("/{id}")
     * @ApiDoc(
     *  output="AppBundle\Entity\Mission",
     *  resource=true,
     *  description="Retourne le detail d'une mission",
     *  requirements={
     *      {
     *          "name"="access_token",
     *          "dataType"="string",
     *          "requirement"="\s+",
     *          "description"="token authentication api"
     *      }
     *  },
     *  statusCodes={
     *         200="Returned when successful",
     *         401="Returned when unauthorized",
     *         400="Returned when error form or user exist"
     *  }
     * )
     */
    public function getOneMissionAction(Request $request, $id)
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();

        if($user->getClient())
            $mission = $em->getRepository('AppBundle:Mission')->findOneBy(array(
                "client" => $user->getClient(),
                "id" => $id
            ));
        else
            $mission = $em->getRepository('AppBundle:Mission')->getOneMissionByChauffeur($id, $user->getChauffeur());

        $serializer = $this->get('serializer');
        $json = $serializer->serialize($mission, 'json', SerializationContext::create()->setGroups(array('max_mission')));
        return new Response($json, Response::HTTP_OK);
    }


}
