<?php

namespace Tuto\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PublicController extends Controller
{
    public function indexAction()
    {
        return $this->render('BlogBundle:Public:index.html.twig',array(
        'articles'=> array(
                  array('titre' => 'Ouverture de blog 1!!',
                  'auteur' => array(
                        'username' => 'Ahmed-1',
                        'id' => 1,
                        'nbArticle' => 52,
                    ),
                   'contenu' => 'ceci est le contenu de l\'article' ,
                   'date' => new \DateTime() ,
                   ),
                  array('titre' => 'Ouverture de blog 2!!',
                  'auteur' => array(
                        'username' => 'Ahmed-1',
                        'id' => 1,
                        'nbArticle' => 52,
                    ),
                   'contenu' => 'ceci est le contenu de l\'article' ,
                   'date' => new \DateTime() ,
                   ),
                  array('titre' => 'Ouverture de blog 3 !!',
                  'auteur' => array(
                        'username' => 'Ahmed-1',
                        'id' => 1,
                        'nbArticle' => 52,
                    ),
                   'contenu' => 'ceci est le contenu de l\'article' ,
                   'date' => new \DateTime() ,
                   ),
                 ),
        ));
    }

    public function articleAction($slog, $annee, $_local, $_format) {
    	return $this->render('BlogBundle:Public:article.html.twig', array(
                'slog' => $slog,
                'annee' => $annee, 
                'locale' => $_local,
                'format' => $_format
    		));

    }

    public function addAction() {
        return $this->render('BlogBundle:Public:add_article.html.twig');

    }
    public function editAction($id) {
        return $this->render('BlogBundle:Public:edit_article.html.twig');

    }
    public function deleteAction($id) {
        return $this->render('BlogBundle:Public:delete_article.html.twig');
    }
}
