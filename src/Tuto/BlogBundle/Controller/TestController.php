<?php
namespace Tuto\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response ;
class TestController extends Controller
{
    public function indexAction()
    {
        return new Response("ceci est un test !!!") ;
    }
}
