<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Vehicule;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Vehicule controller.
 *
 */
class VehiculeController extends Controller
{
     /**
     * @GET("/")
     * @ApiDoc(
     *  output="array<AppBundle\Entity\Vehicule> as vehicules",
     *  resource=true,
     *  description="Retourne la liste des vehicules",
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
    public function getAllChauffeurAction(Request $request)
    {
        $client = $this->getUser()->getClient();

        if(!$client)
            return new Response('NOPE', Response::HTTP_UNAUTHORIZED)

        $em = $this->getDoctrine()->getManager();

        $vehicules['vehicules'] = $em->getRepository('AppBundle:Vehicule')->findByClient($user->getClient());

        $serializer = $this->get('serializer');
        $json = $serializer->serialize($vehicules, 'json', SerializationContext::create()->setGroups(array('min_chauffeur')));
        return new Response($json, Response::HTTP_OK);
    }
}
