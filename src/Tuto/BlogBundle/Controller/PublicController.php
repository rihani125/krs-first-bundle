  <?php

  namespace Tuto\BlogBundle\Controller;

  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Tuto\BlogBundle\Entity\Article ;
  use Tuto\BlogBundle\Form\ArticleType ;

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
          $em = $this->getDoctrine()->getEntityManager();

          $from_add_article = $this->createForm(new ArticleType());

          $request = $this->getRequest();
          if($request->isMethod('POST')) {
             $from_add_article->handleRequest($request);
           if($from_add_article->isValid()) {
             $a = $from_add_article->getData() ;
             $em->persist($a);
             $em->flush();
           }
          }

          return $this->render('BlogBundle:Public:add_article.html.twig', array(
                  'form' => $from_add_article->createView(),
            ));

      }
      public function editAction(Article $article) {

          $em = $this->getDoctrine()->getEntityManager();

          $from_add_article = $this->createForm(new ArticleType(), $article);

          $request = $this->getRequest();
          if($request->isMethod('POST')) {
         
             $from_add_article->handleRequest($request);
            if($from_add_article->isValid()) {
             $a = $from_add_article->getData() ;
             $em->persist($a);
             $em->flush();
           }
           
          }

          return $this->render('BlogBundle:Public:edit_article.html.twig', array(
                  'form' => $from_add_article->createView(),
                  'id' => $article->getId()
            ));
      }
      public function voirAction(Article $article) {
          return $this->render('BlogBundle:Public:voir_article.html.twig',array(
                  'article_title' => $article->getTitle(),
            ));
      }
  }
