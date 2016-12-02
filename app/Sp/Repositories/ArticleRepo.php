<?php

namespace Sp\Repositories;

use Carbon\Carbon;
use Sp\Models\Article;
use Sp\Models\Visits;
use Sp\Utils\Help;


class ArticleRepo
{

    public function search($query)
    {
        return Article::search($query)->with('user', 'category')->get();
    }

    public function save(Article $article)
    {
        $article->save();

        return $article;
    }   

    public function getAll()
    {
        return Article::with('status',  'category', 'user')->get();
    } 

    public function getAllFront()
    {
        return Article::with('status', 'user')->where('status_id', 3)->orderBy('created_at', 'DESC')->get();
    } 

    public function getById($id)
    {
        return Article::with('category', 'user', 'related.user', 'related.category', 'tags')->where('id', $id)->first();
    } 

    public function getByIdForEditing($id, $user_id)
    {
        return Article::with('category', 'user', 'related.user', 'related.category', 'tags')->where('id', $id)->where('user_id', $user_id)->first();
    } 

    public function getBySlug($slug)
    {
        return Article::with('category', 'user', 'related.user', 'related.category', 'tags')->where('slug', $slug)->first();
    } 

    public function getByStatus($status_id)
    {
        return Article::with('category', 'user', 'status')->where('status_id', $status_id)->orderBy('updated_at', 'DESC')->get();
    }

    public function getForUserByMonthForEarnings($user_id, $start_date, $end_date)
    {
        // $ids = $this->getUserPubblichedArticleIds($user_id);
        
        $articles = Article::whereHas('visits', function($q01) use($start_date, $end_date, $user_id){

            $q01 = $q01->where('visits.created_at', '>=', $start_date );
            $q01 = $q01->where('visits.created_at', '<', $end_date );

        })->with('category')->with(array('visits' => function($q03) use($start_date, $end_date, $user_id){

            $q03 = $q03->where('visits.created_at', '>=', $start_date );
            $q03 = $q03->where('visits.created_at', '<', $end_date );

        }))->where('user_id', $user_id)->get();

        $queries = \DB::getQueryLog();

        return $articles;

    }

    public function getForUserByMonthEarnings($user_id){
           $article_ids = $this->getUserPubblichedArticleIdsForRange($user_id);

           $visits = Visits::whereIn('article_id', $article_ids)->orderBy('created_at', 'ASC')->get()->groupBy(function($val) {
               return Carbon::parse($val->created_at)->format('Y-m');
            });

            $out = [];

            foreach ($visits as $dt => $data) {


                $month = $dt . '-01';

                $val = count(@$visits[$dt]);
                if(@$visits[$dt])
                {
                    $pay = array_sum(array_values(array_pluck(@$visits[$dt]->toArray(), 'payoff')));
                    
                }else{
                    $pay = 0.00;
                }

                $out[$month] = ['visits' => $val, 'payoff' => $pay];
            }


        return $out;
    }


    public function getForUserByMonthForEarningsChart($user_id, $start_date, $end_date)
    {
        // $ids = $this->getUserPubblichedArticleIds($user_id);

        $date_array = Help::createDateRangeArray($start_date, $end_date);
        
        $article_ids = $this->getUserPubblichedArticleIdsForRange($user_id);

        $visits = Visits::whereIn('article_id', $article_ids)->where('created_at', '>=', $start_date )->where('created_at', '<', $end_date )->get()->groupBy(function($val) {
            return Carbon::parse($val->created_at)->format('d');
     });

        // return $date_array;

        $labels_out = [];
        $vals_out = [];
        $pay_out = [];

        foreach ($date_array as $dt) {


            $dt = date('d', strtotime($dt));

            $val = count(@$visits[$dt]);
            if(@$visits[$dt])
            {
                $pay = array_sum(array_values(array_pluck(@$visits[$dt]->toArray(), 'payoff')));
                
            }else{
                $pay = 0.00;
            }
            $labels_out[] = $dt;
            $vals_out[] = $val;
            $pay_out[] = $pay;
        }


        return ['labels' => $labels_out, 'data' => $vals_out, 'payoff' => $pay_out];

    }

    
    protected function getUserPubblichedArticleIdsForRange($user_id)
    {
        return array_pluck(Article::where('user_id', $user_id)
            ->where('status_id', 3)
            ->orderBy('created_at', 'DESC')
            ->get(['id']), 'id');
    }
}
