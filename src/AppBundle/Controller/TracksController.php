<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Tracks;
use AppBundle\Entity\Intervention;
use AppBundle\Form\TracksType;
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
 * Tracks controller.
 *
 */
class TracksController extends Controller
{
    /**
     * @POST("/")
     * @ApiDoc(
     *  output="AppBundle\Entity\Tracks",
     *  resource=true,
     *  description="Post la derniere position du chauffeur",
     *  requirements={
     *      {
     *          "name"="access_token",
     *          "dataType"="string",
     *          "requirement"="\s+",
     *          "description"="token authentication api"
     *      }
     *  },
     *  input="AppBundle\Form\TracksType",
     *  statusCodes={
     *         200="Returned when successful",
     *         401="Returned when unauthorized",
     *         400="Returned when error form or user exist"
     *  }
     * )
     */
    public function postTracksAction(Request $request)
    {
        $chauffeur = $this->getUser()->getChauffeur();
        if(!$chauffeur)
            return new Response('NOPE', Response::HTTP_UNAUTHORIZED);
            
        $em = $this->getDoctrine()->getManager();
        $mission = $em->getRepository('AppBundle:Mission')->getActiveMissionByChauffeur($chauffeur);

        $tracks = new Tracks();
        $form = $this->createForm(TracksType::class, $tracks);
        $form->submit(json_decode($request->request->get('tracks'), true), false);

        if($form->isValid()){
            $tracks->setSuiviMission($mission->getSuiviMission());
            $em->persist($tracks);
            $em->flush();

            return new Response('OK', Response::HTTP_OK);
        }else{
            return new Response('Form error', Response::HTTP_BAD_REQUEST);
        }

        

    }
}
