<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Incident;
use AppBundle\Entity\Intervention;
use AppBundle\Form\IncidentType;
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
 * Incident controller.
 *
 */
class IncidentController extends Controller
{
    /**
     * @GET("/")
     * @ApiDoc(
     *  output="AppBundle\Entity\Incident",
     *  resource=true,
     *  description="Retourne la liste des incidents pour un client",
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
    public function getIncidentAction(Request $request)
    {
        $client = $this->getUser()->getClient();

        $em = $this->getDoctrine()->getManager();

        if(!$client)
            return new Response('NOPE', Response::HTTP_UNAUTHORIZED);

        $incidents["incidents"] = $em->getRepository('AppBundle:Incident')->findByClient($client);

        $serializer = $this->get('serializer');
        $json = $serializer->serialize($client, 'json', SerializationContext::create()->setGroups(array('min_incident')));
        return new Response($json, Response::HTTP_OK);

    }
    /**
     * @POST("/")
     * @ApiDoc(
     *  output="AppBundle\Entity\Incident",
     *  resource=true,
     *  description="Crée un incident sur la mission en cours du chauffeur authentifié",
     *  requirements={
     *      {
     *          "name"="access_token",
     *          "dataType"="string",
     *          "requirement"="\s+",
     *          "description"="token authentication api"
     *      }
     *  },
     *  input="AppBundle\Form\IncidentType",
     *  statusCodes={
     *         200="Returned when successful",
     *         401="Returned when unauthorized",
     *         400="Returned when error form or user exist"
     *  }
     * )
     */
    public function postIncidentAction(Request $request)
    {
        $chauffeur = $this->getUser()->getChauffeur();

        if(!$chauffeur)
            return new Response('NOPE', Response::HTTP_UNAUTHORIZED);

        $em = $this->getDoctrine()->getManager();
        $mission = $em->getRepository('AppBundle:Mission')->getActiveMissionByChauffeur($chauffeur);
        $incident = new Incident(); 

        $form = $this->createForm(IncidentType::class, $incident);
        $form->submit(json_decode($request->request->get('incident'), true), false);
        if($form->isValid()){
            $intervention = new Intervention();
            $intervention->setTechnicien($em->getRepository('AppBundle:Technicien')->find(1));
            $intervention->setVehicule($em->getRepository('AppBundle:Vehicule')->findBy(array('isIntervention' => true))[0]);
            $intervention->setSuiviMission($mission->getSuiviMission());
            $intervention->setState(1);
            $intervention->setIncident($incident);
            $em->persist($intervention);
            $em->persist($incident);
            $em->flush();
            
            $serializer = $this->get('serializer');
            $json = $serializer->serialize($intervention, 'json', SerializationContext::create()->setGroups(array('max_intervention')));
            return new Response($json, Response::HTTP_OK);
        }else{
            return new Response('Form error', Response::HTTP_BAD_REQUEST);
        }


    }
}
