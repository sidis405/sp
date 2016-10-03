<?php

namespace Sp\Handlers\Events;

use Illuminate\Session\Store;
use Sp\Models\Article;
use Sp\Models\Visits;
use Sp\Utils\Help;

class ArticleWasVisitedHandler {

    function __construct(Store $session)
    {
        $this->session = $session;
    }


    public function handle(Article $article)
    {

        if($this->checkCountConditions($article))
        {
            $article->increment('view_counter');
            $article->increment('payoff_counter', $article->category()->get()->toArray()[0]['payoff']/1000);
            $this->countVisit($article);
            $this->storeArticle($article);
        }

    }

    public function checkCountConditions($article)
    {
        // return true;
        // check that the referres is neither empty or a local url
        if($article->referrer != env('LOCAL_URL'))
        // if($article->referrer != env('LOCAL_URL') && strlen($article->referrer) > 0)
        {
            // check that the uses is either unlogged or not an admin
            if((\Auth::user() && \Auth::user()->role !== 'admin' && $article->user_id !== \Auth::user()->id) || !\Auth::user() ) 
            {
                // check that the visitor has not stored this article in the session (24 hrs)
                if ( ! $this->isArticleVisited($article))
                {
                    return true;
                }
            }
        }

        return false;
    }

    public function countVisit($article)
    {

        $visit = new Visits;
        $visit->article_id = $article->id;
        $visit->origin = Help::get_domain($article->referrer);
        if(\Auth::user())
        {
            $visit->user_id = \Auth::user()->id;
        }
        $visit->sharecode = $article->sharecode;
        $visit->ip = $article->ip;
        $visit->payoff = $this->getNewPayoff($article);
        $visit->save();
    }

    public function getNewPayoff($article)
    {
        $visit_payoff = $article->category()->get()->toArray()[0]['payoff']/1000;

        if($article->payoff_counter + $visit_payoff < 200)
        {
            return $article->payoff_counter + $visit_payoff;
        }

        return 200;
    }

    private function isArticleVisited($article)
    {

        $visited = $this->session->get('visited_articles', []);

        return in_array($article->id, $visited);
    }

    private function storeArticle($article)
    {    
        $this->session->push('visited_articles', $article->id);
    }


}