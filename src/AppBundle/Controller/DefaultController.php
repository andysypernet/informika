<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Repository\GoodsRepository;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template("index.html.twig")
     */
    public function indexAction(Request $request)
    {
        $type = intval($request->get( 'type' ));

        /** @var GoodsRepository $repository */
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Prices');

        $products = $repository->findGoods($type);
        $product = [];
        $index = 0;
        $i = 0;
        foreach ($products as $item) {

            if($index == $item['id']) {
                is_array($product[$index]['basename']) ? $base_name = $product[$index]['basename'] : $base_name = [$product[$index]['basename']];
                $product[$index]['basename'] = array_merge([$products[$i]['basename']],$base_name);
            } else {
                $product[$item['id']] = $products[$i];
            }
            $i++;
            $index = $item['id'];
        }

        $response = [
            'product' => $product,
            'type' => $type
        ];

        return $response;
    }
}
