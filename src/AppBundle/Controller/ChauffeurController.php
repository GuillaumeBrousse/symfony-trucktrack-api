<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Chauffeur;
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
 * Chauffeur controller.
 *
 */
class ChauffeurController extends Controller
{
    /**
     * @GET("/positions")
     * @ApiDoc(
     *  resource=true,
     *  description="Retourne la dernière position connu de tous les chauffeurs du client",
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
    public function getPositionChauffeursAction(Request $request)
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();

        $chauffeurs = $em->getRepository('AppBundle:Chauffeur')->getPositionChauffeursByClient($user->getClient());
        $serializer = $this->get('serializer');
        $json = $serializer->serialize($chauffeurs, 'json', SerializationContext::create()->setGroups(array('coords_chauffeur')));
        return new Response($json, Response::HTTP_OK);

    }

    /**
     * @GET("/")
     * @ApiDoc(
     *  output="array<AppBundle\Entity\Chauffeur> as chauffeurs",
     *  resource=true,
     *  description="Retourne la liste des chauffeurs",
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
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();

        $chauffeurs['chauffeurs'] = $em->getRepository('AppBundle:Chauffeur')->findByClient($user->getClient());

        $serializer = $this->get('serializer');
        $json = $serializer->serialize($chauffeurs, 'json', SerializationContext::create()->setGroups(array('min_chauffeur')));
        return new Response($json, Response::HTTP_OK);
    }

    /**
     * @GET("/{id}")
     * @ApiDoc(
     *  output="AppBundle\Entity\Chauffeur",
     *  resource=true,
     *  description="Retourne un chauffeur",
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
    public function getOneChauffeurAction(Request $request, $id)
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();

        $chauffeurs = $em->getRepository('AppBundle:Chauffeur')->findOneBy(array(
            'client'=> $user->getClient(),
            'id'    => $id
        ));

        $serializer = $this->get('serializer');
        $json = $serializer->serialize($chauffeurs, 'json', SerializationContext::create()->setGroups(array('max_chauffeur')));
        return new Response($json, Response::HTTP_OK);

    }


     /**
     * @Post("/")
     * @ApiDoc(
     *  output="AppBundle\Entity\Chauffeur",
     *  resource=true,
     *  description="Créer un compte chauffeur et le lie au client",
     *  requirements={
     *      {
     *          "name"="access_token",
     *          "dataType"="string",
     *          "requirement"="\s+",
     *          "description"="token authentication api"
     *      }
     *  },
     *  input="AppBundle\Form\ChauffeurType",
     *  statusCodes={
     *         200="Returned when successful",
     *         401="Returned when unauthorized",
     *         400="Returned when error form or user exist"
     *  }
     * )
     */
    public function newChauffeurAction(Request $request)
    {

        $user = $this->getUser();

        if(!$user->getClient())
            return new Response('NOPE', Response::HTTP_BAD_REQUEST);

        $chauffeur = new Chauffeur();
        $form = $this->createForm('AppBundle\Form\ChauffeurType', $chauffeur);
        $form->submit($request->get($form->getName()), false);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $chauffeur->setClient($user->getClient());
            $chauffeur->getUser()->setEnabled(1);
            $em->persist($chauffeur->getUser());
            $em->persist($chauffeur);
            $em->flush($chauffeur);

            $serializer = $this->get('serializer');
            $json = $serializer->serialize($chauffeur, 'json', SerializationContext::create()->setGroups(array('min_chauffeur')));

            return new Response($json, Response::HTTP_OK);

        }

        $serializer = $this->get('serializer');
        $json = $serializer->serialize($chauffeur, 'json', SerializationContext::create()->setGroups(array('min_chauffeur')));
        return new Response($json, Response::HTTP_BAD_REQUEST);

    }
}
