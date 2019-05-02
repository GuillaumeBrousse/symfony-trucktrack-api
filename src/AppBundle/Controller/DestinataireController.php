<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Destinataire;
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
 * Destinataire controller.
 *
 */
class DestinataireController extends Controller
{
     /**
     * @GET("/")
     * @ApiDoc(
     *  output="array<AppBundle\Entity\Destinataire> as destinataires",
     *  resource=true,
     *  description="Retourne la liste des destinataires",
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
    public function getAllDestinataireAction(Request $request)
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();

        $destinataires['destinataires'] = $em->getRepository('AppBundle:Destinataire')->findAll();

        $serializer = $this->get('serializer');
        $json = $serializer->serialize($destinataires, 'json', SerializationContext::create()->setGroups(array('min_destinataire')));
        return new Response($json, Response::HTTP_OK);
    }
}
